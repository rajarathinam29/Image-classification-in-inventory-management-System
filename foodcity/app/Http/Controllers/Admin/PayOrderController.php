<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Purchase;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderproducts;
use App\Models\PurchasePayments;
use App\Models\ChequeIssued;
use App\Models\Expenses;
use App\Models\Suppliers;
use App\Models\CompanySettings;

class PayOrderController extends Controller
{
    public function create() {
        return view('admin.payorder.create', ['title'=> 'Create PayOrder']);
    }

    //Add Expenses
    public function addPayOrder(Request $request) {   
        $roles = [
            'date' => 'required',
            'suppliers' => 'required', 
            'purchaseType' => 'required', 
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
        $prefix = json_decode($settings->setting)->purchase_payment;

        $countPurchasePayment = PurchasePayments::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->withTrashed()->count();

        $refNo = $prefix.($countPurchasePayment+1);
        //Add Purchase Payment
        $purchase_payment = new PurchasePayments;
        $purchase_payment->date = date('Y-m-d H:i:s', strtotime($request->date));
        $purchase_payment->ref_no = $refNo;
        $purchase_payment->supplier_id = $request->suppliers;
        $purchase_payment->payment_method = $request->method;
        $purchase_payment->amount = $request->amount;
        $purchase_payment->description = $request->description?$request->description:'';
        $purchase_payment->company_id = $request->companyId;
        $purchase_payment->branch_id = $request->branchId;
        $purchase_payment->created_by = $request->loginId;

        if($purchase_payment->save()){
            // Add Cheque
            if($request->method == 3){
                $cheque = new ChequeIssued;
                $cheque->cheque_no = $request->chequeNo;
                $cheque->issue_date = date('Y-m-d H:i:s', strtotime($request->date));
                $cheque->effective_date = date('Y-m-d', strtotime($request->effectiveDate));
                $cheque->amount = $request->amount;
                $cheque->payee_name = $request->payeeName;
                $cheque->refference = $request->description?$request->description:'';
                $cheque->issue_to = 'purchase_payments';
                $cheque->issue_id = $purchase_payment->id;
                $cheque->cheque_status = 0;
                $cheque->company_bank_id = $request->companyBankId;
                $cheque->company_id = $request->companyId;
                $cheque->branch_id = $request->branchId;
                $cheque->created_by = $request->loginId;
                $cheque->save();
            }
            //Add invoices Payments
            $payments = $request->payments;
            if(count($payments)>0){
                foreach($payments as $payment){
                    $expenseprefix = json_decode($settings->setting)->expenses;
                    $countExpense = Expenses::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->withTrashed()->count();

                    $refNo = $expenseprefix.($countExpense+1);
                    $expense = new Expenses;
                    $expense->ref_no = $refNo;
                    $expense->date = date('Y-m-d H:i:s', strtotime($request->date));
                    $expense->payment_type = $request->purchaseType;
                    $expense->type_id = $payment['billId'];
                    $expense->purchase_payment_id = $purchase_payment->id;
                    $expense->payment_method = $request->method;
                    $expense->amount = $payment['amount'];
                    $expense->description = 'Purchase '.$payment['grn'].' credit invoice paid. '.($request->description?$request->description:'');
                    $expense->company_id = $request->companyId;
                    $expense->branch_id = $request->branchId;
                    $expense->created_by = $request->loginId;
                    $expense->save();
                    
                    if($payment['completePaid'] == 1){
                        $purchase = Purchase::find($payment['billId']);
                        $purchase->purchase_status = $payment['completePaid'];
                        $purchase->save();
                    }
                }
            }   
            $log = '{"title":"Purchase payment added.", "body":"Purchase payment added.<br><b>Amount: </b>'.$purchase_payment->amount.'"}';
            $data = [
                'moduleName'=> 'purchase_payments',
                'moduleId'=>$purchase_payment->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Credit Bills paid.']); 
        }
        return response()->json(['status' => FALSE, 'msg' => 'Credit Payment not added.']);
    }

    public function getSupplierCreditBills(Request $request){
        $purchases = Purchase::where(['suppliers_id' => $request->supplierId, 'purchase_status' => 0])->get();
        $supplier = Suppliers::find($request->supplierId);
        $creditBills = [];

        if(count($purchases)>0){
            foreach($purchases as $row) {
                $payments = Expenses::where(['payment_type' => 2, 'type_id' => $row->id])->get();
                $paidAmount = 0;
                if(count($payments)>0){
                    foreach($payments as $payment){
                        $paidAmount += $payment->amount;
                    }
                }
                $data = [
                    'id' => $row->id,
                    'grn_no' => $row->grn_no,
                    'net_amount' => ($row->total_amount - $row->discount + $row->cost) - $paidAmount
                ];
                array_push($creditBills, $data);
            }
        }

        if(count($creditBills)>0){
            $log = '{"title":"View Supplier credit Bills.", "body":"View Supplier credit Bills.<br> <b>Supplier name: </b>'.$supplier->company_name.'"}';
            $data = [
                'moduleName'=> 'purchase_payments',
                'moduleId'=>null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Credit Bills successfully loaded.', 'creditBillsData' => $creditBills]); 
        }

        return response()->json(['status' => FALSE, 'msg' => 'Credit Bills not found.']);
    }

    public function getSupplierPoCreditBills(Request $request){
        $purchaseOrders = PurchaseOrder::with('purchaseProducts')->where(['suppliers_id' => $request->supplierId, 'company_id' => $request->companyId, 'branch_id' => $request->branchId])->whereNotNull('wip_id')->get();
        $supplier = Suppliers::find($request->supplierId);
        $creditBills = [];

        if(count($purchaseOrders)>0){
            foreach($purchaseOrders as $row) {
                $products = $row->purchaseProducts;
                $totalAmount = 0;
                foreach($products as $product){
                    $subtotal = $product->units*$product->cost_price;
                    $totalAmount += $subtotal;
                }

                $payments = Expenses::where(['payment_type' => 3, 'type_id' => $row->id, 'company_id' => $request->companyId, 'branch_id' => $request->branchId])->get();
                $paidAmount = 0;
                if(count($payments)>0){
                    foreach($payments as $payment){
                        $paidAmount += $payment->amount;
                    }
                }
                $balance = $totalAmount - $paidAmount;
                if($balance>0){
                    $data = [
                        'id' => $row->id,
                        'grn_no' => $row->order_id,
                        'net_amount' => $balance
                    ];
                    array_push($creditBills, $data);
                }
                
            }
        }

        if(count($creditBills)>0){
            $log = '{"title":"View Supplier Purchase Order credit Bills.", "body":"View Supplier Purchase Order credit Bills.<br> <b>Supplier name: </b>'.$supplier->company_name.'"}';
            $data = [
                'moduleName'=> 'purchase_payments',
                'moduleId'=>null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Credit Bills successfully loaded.', 'creditBillsData' => $creditBills]); 
        }

        return response()->json(['status' => FALSE, 'msg' => 'Credit Bills not found.']);
    }
}
