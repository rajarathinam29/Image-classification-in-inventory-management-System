<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Sales;
use App\Models\SalesPayments;
use App\Models\ChequeReceived;
use App\Models\Customers;
use App\Models\Revenues;
use App\Models\Vouchers;
use App\Models\VoucherPayments;
use App\Models\CompanySettings;

class CollectCreditController extends Controller
{
    public function create() {
        return view('admin.collectcredit.create', ['title'=> 'Create CollectCredit']);
    }

    //Add Revenue
    public function addCollectCredit(Request $request) {   
        $roles = [
            'date' => 'required',
            'customer_id' => 'required', 
            'method' => 'required',
            'amount' => 'required',
            'payment.*.billId' =>'required',
            'payment.*.amount' =>'required',
            'companyBankId' => 'required_if:method,3',
            'chequeNo' => 'required_if:method,3',
            'effectiveDate' => 'required_if:method,3',
            'payeeName' => 'required_if:method,3'
        ];
        $errMessages = [
            'companyBankId.required_if' => 'The Bank Account field is required when method is Cheque.',
            'chequeNo.required_if' => 'The :attribute field is required when method is Cheque.',
            'effectiveDate.required_if' => 'The :attribute field is required when method is Cheque.',
            'payeeName.required_if' => 'The :attribute field is required when method is Cheque.',
        ];
        $validator = Validator::make($request->all(), $roles, $errMessages);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $settings = CompanySettings::where(['company_id'=>$request->companyId, 'branch_id'=> $request->branchId, 'setting_name'=> 'prefix'])->first();
        $prefix = json_decode($settings->setting)->sales_payment;

        $countSalesPayment = SalesPayments::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->withTrashed()->count();

        $refNo = $prefix.($countSalesPayment+1);
        //Add sales Payment
        $sales_payment = new SalesPayments;
        $sales_payment->date = date('Y-m-d H:i:s', strtotime($request->date));
        $sales_payment->customer_id = $request->customerId;
        $sales_payment->ref_no = $refNo;
        $sales_payment->payment_method = $request->method;
        $sales_payment->amount = $request->amount;
        $sales_payment->description = $request->description?$request->description:'';
        $sales_payment->company_id = $request->companyId;
        $sales_payment->branch_id = $request->branchId;
        $sales_payment->created_by = $request->loginId;
        if($sales_payment->save()){
            // Add Cheque
            if($request->method == 3){
                $cheque = new ChequeReceived;
                $cheque->cheque_no = $request->chequeNo;
                $cheque->issue_date = date('Y-m-d H:i:s', strtotime($request->date));
                $cheque->effective_date = date('Y-m-d', strtotime($request->effectiveDate));
                $cheque->amount = $request->amount;
                $cheque->payee_name = $request->payeeName;
                $cheque->refference = $request->description?$request->description:'';
                $cheque->issue_to = 'sales_payments';
                $cheque->issue_id = $sales_payment->id;
                $cheque->cheque_status = 0;
                $cheque->bank_id = $request->companyBankId;
                $cheque->company_id = $request->companyId;
                $cheque->branch_id = $request->branchId;
                $cheque->created_by = $request->loginId;
                $cheque->save();
            }

            $payments = $request->payments;

            //company Setting 
            $settings = CompanySettings::where(['company_id'=>$request->companyId, 'branch_id'=> $request->branchId, 'setting_name'=> 'prefix'])->first();
            $revenuePrefix = json_decode($settings->setting)->revenues;
            // add payment invoice
            if(count($payments)>0){
                $saledPoints = 0;
                foreach($payments as $payment){
                    
                    $countRevenue = Revenues::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->withTrashed()->count();

                    $refNoRe = $revenuePrefix.($countRevenue+1);
                    $revenue = new Revenues;
                    $revenue->ref_no = $refNoRe;
                    $revenue->date = date('Y-m-d H:i:s', strtotime($request->date));
                    $revenue->payment_type = 1;
                    $revenue->type_id = $payment['billId'];
                    $revenue->sales_payment_id = $sales_payment->id;
                    $revenue->payment_method = $request->method;
                    $revenue->amount = $payment['amount'];
                    $revenue->description = 'Sales '.$payment['invoice'].' credit invoice paid. '.($request->description?$request->description:'');
                    $revenue->company_id = $request->companyId;
                    $revenue->branch_id = $request->branchId;
                    $revenue->created_by = $request->loginId;
                    $revenue->save();
                    
                    if($payment['completePaid'] == 1){
                        $sales = Sales::find($payment['billId']);
                        $sales->payment_status = $payment['completePaid'];
                        $sales->save();
                    }
                    switch($request->method){
                        case 4:
                            $saledPoints += $payment['amount'];
                            break;
                        case 5:
                            if($payment['amount']>0){
                                $voucherPayment = new VoucherPayments;
                                $voucherPayment->payment_date = date('Y-m-d H:i:s', strtotime($request->date));
                                $voucherPayment->voucher_id = $request->voucherId;
                                $voucherPayment->revenue_id = $revenue->id;
                                $voucherPayment->amount = $payment['amount'];
                                $voucherPayment->company_id = $request->companyId;
                                $voucherPayment->branch_id = $request->branchId;
                                $voucherPayment->created_by = $request->loginId;
                                $voucherPayment->save();
                            }
                            break;
                    }
                }
                //update voucher when completely used
                if(isset($request->voucherId) && $request->balance_amount == 0){
                    $voucher = Vouchers::find($request->voucherId);
                    $voucher->status = 1;
                    $voucher->save();
                }
                // deduct customer points
                $customer = Customers::find($request->customer_id);
                if(isset($request->customer_id) && $request->method == 4){
                    $balancePoints = $customer->points - $saledPoints;

                    $customer->points = $balancePoints;
                    $customer->save();
                }

                $log = '{"title":"Customer credit bills paid.", "body":"Customer credit bills. <br><b>Customer name:</b>'.$customer->first_name.' '.$customer->last_name.'"}';
                $data = [
                    'moduleName'=> 'sales_collect_credit',
                    'moduleId'=> null,
                    'log'=> $log,
                    'userId'=> $request->loginId,
                    'companyId'=> $request->companyId,
                    'branchId'=> $request->branchId,
                ];
                $this->addActivityLog($data); 
            } 
        }
         
        
        return response()->json(['status' => TRUE, 'msg' => 'Credit Bills paid.']); 
    }

    public function getCustomerCreditBills(Request $request){
        $customer = Customers::find($request->customerId);
        $sales = Sales::with('salesProducts')->where(['customer_id' => $request->customerId, 'payment_status' => 0, 'company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->whereNotNull('credit_date')->get();
        $creditBills = [];

        if(count($sales)>0){
            foreach($sales as $row) {
                $salesProducts = $row->salesProducts;
                $subtotal = 0;
                $discount = 0;
                foreach($salesProducts as $product){
                    $vat = $product->vat*$product->sale_price/100;
                    $total = $product->qty*($product->sale_price+$vat);
                    $dis = $product->qty*($product->mrp-$product->sale_price);
                    $subtotal += $total;
                    $discount += $dis;
                }
                $payments = Revenues::where(['payment_type' => 1, 'type_id' => $row->id])->get();
                $paidAmount = 0;
                if(count($payments)>0){
                    foreach($payments as $payment){
                        $paidAmount += $payment->amount;
                    }
                }
                $data = [
                    'id' => $row->id,
                    'invoice_id' => $row->invoice_id,
                    'payable_amount' => ($subtotal - $row->discount + $row->shipping_cost) - $paidAmount
                ];
                array_push($creditBills, $data);
            }
        }

        if(count($creditBills)>0){
            $log = '{"title":"View customer credit bills.", "body":"View customer credit bills. <br><b>Customer name:</b>'.$customer->first_name.' '.$customer->last_name.'"}';
            $data = [
                'moduleName'=> 'sales_collect_credit',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Credit Invoice successfully loaded.', 'creditInvoicesData' => $creditBills]); 
        }

        return response()->json(['status' => FALSE, 'msg' => 'Credit Invoice not found.']);
    }
}
