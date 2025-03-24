<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\VoucherSales;
use App\Models\Vouchers;
use App\Models\VoucherSalePayments;
use App\Models\CompanySettings;

class VoucherSalesController extends Controller
{
    public function index() {
        return view('admin.vouchers.sales-list', ['title'=> 'Vouchers sales List']);
    }
    public function create() {
        return view('admin.vouchers.sale', ['title'=> 'Voucher Sale']);
    }
    public function edit() {
        return view('admin.vouchers.sales-edit', ['title'=> 'Edit Voucher sale']);
    }
    public function view() {
        return view('admin.vouchers.sales-view', ['title'=> 'View Voucher sale']);
    }
    public function addVoucherSale(Request $request){
        $validator = Validator::make($request->all(), [
            'invoice_date' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $invoice_id = '';
        if(isset($request->invoice_no) && !empty($request->invoice_no)){
            $invoice_id = $request->invoice_no;
            
        }else{
            $settings = CompanySettings::where(['company_id'=>$request->companyId, 'branch_id'=> $request->branchId, 'setting_name'=> 'prefix'])->first();
            $prefix = json_decode($settings->setting)->vouchers;
            //get last id
            $count_sale = VoucherSales::where([
                'created_by'=>$request->loginId, 
                'branch_id'=>$request->branchId, 
                'company_id'=>$request->companyId,
            ])->withTrashed()->count();    
            // $invoice_id = $request->companyId.'-'.$request->branchId.'-'.date('Ymd',strtotime($request->invoice_date)).'-'.$request->loginId.'-'.($count_sale+1);
            $invoice_id =  $prefix.($count_sale+1);
        }
        // //get last id
        // $count_sale = VoucherSales::where([
        //     'created_by'=>$request->loginId, 
        //     'branch_id'=>$request->branchId, 
        //     'company_id'=>$request->companyId,
        // ])->whereDate('date', '=', date('Y-m-d', strtotime($request->invoice_date)))->count();    
        // $invoice_id = $request->companyId.'-'.$request->branchId.'-'.date('ymd',strtotime($request->invoice_date)).'-'.$request->loginId.'-'.($count_sale+1);
        $grandTotal = $request->subtotal - $request->discount;
        //save sale
        $sale = new VoucherSales;
        $sale->invoice_id =  $invoice_id;
        $sale->date = date('Y-m-d H:i:s', strtotime($request->invoice_date));
        $sale->customer_id = $request->customer_id?$request->customer_id:null;
        $sale->company_id = $request->companyId;
        $sale->branch_id = $request->branchId;
        $sale->created_by = $request->loginId;
        if($request->discount > 0){
            $sale->discount_type = 0;
            $sale->discount = $request->discount;
        }
        
        if($sale->save()){ 
            //Add Vouchers
            foreach($request->vouchers as $voucher){
                $qty = $voucher['qty'];
                $amount = $voucher['amount'];
                $expiry_date = $voucher['expiry_date'];
                for($i=0; $i<$qty; $i++){
                    $voucher = new Vouchers;
                    $voucher->serial_no = $this->generateUniqueCode();
                    $voucher->amount = $amount;
                    $voucher->expiry_on = date('Y-m-d', strtotime($expiry_date));
                    $voucher->status = 0;
                    $voucher->issue_date = date('Y-m-d', strtotime($sale->date));
                    $voucher->issue_to = 'v_sale';
                    $voucher->issue_id = $sale->id;
                    $voucher->company_id = $request->companyId;
                    $voucher->branch_id = $request->branchId;
                    $voucher->created_by = $request->loginId;
                    $voucher->save();
                }
            }
            // Add payments
            if(count($request->payments)>0){
                foreach($request->payments as $payment){
                    $sale_payment = new VoucherSalePayments;
                    $sale_payment->date = date('Y-m-d H:i:s', strtotime($sale->date));
                    $sale_payment->voucher_sale_id = $sale->id;
                    $sale_payment->amount = $payment['amount'];
                    $sale_payment->payment_type = 1;
                    $sale_payment->payment_method = $payment['paymentMethod'];
                    $sale_payment->description = 'Voucher Sale '.$sale->invoice_id.' '.$payment['methodName'].' payment.';
                    $sale_payment->refference = isset($payment['card_no'])?$payment['card_no']:null;
                    $sale_payment->company_id = $request->companyId;
                    $sale_payment->branch_id = $request->branchId;
                    $sale_payment->created_by = $request->loginId;
                    $sale_payment->save();
                }
            }

            //Balance payment settled
            $balance = $request->paidAmount - $grandTotal;
            if($balance>0){
                $sale_payment = new VoucherSalePayments;
                $sale_payment->date = date('Y-m-d H:i:s', strtotime($sale->date));
                $sale_payment->voucher_sale_id = $sale->id;
                $sale_payment->amount = $balance;
                $sale_payment->payment_type = 0;
                $sale_payment->payment_method = 1;
                $sale_payment->description = 'Voucher Sale '.$sale->invoice_id.' payment balance paid.';
                $sale_payment->company_id = $request->companyId;
                $sale_payment->branch_id = $request->branchId;
                $sale_payment->created_by = $request->loginId;
                $sale_payment->save();
            }

            $log = '{"title":"Voucher sale Added.", "body":"Voucher sale added. <br><b>invoice No:</b>'.$sale->invoice_id.'"}';
            $data = [
                'moduleName'=> 'voucher_sales',
                'moduleId'=> $sale->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);

            return response()->json(['status' => TRUE, 'msg' => 'Voucher sale successfully added.', 'invoice_id' => $invoice_id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Voucher sale not added.']);
        }
    }

    public function generateUniqueCode()
    {
        do {
            // $code = Str::random(6);
            $code = random_int(1000, 999999); 
        } while (Vouchers::where("serial_no", "=", $code)->first());
  
        return $code;
    }

    public function getVoucherSalesData(Request $request){
        $vouchersales = VoucherSales::with('customer')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId])->orderBy('id', 'DESC')->get();
        $vouchersalesList = [];
        if(count($vouchersales)>0){
            foreach($vouchersales as $sale){
                $vouchers = Vouchers::where(['issue_to' => 'v_sale', 'issue_id' => $sale->id])->get();
                $subtotal = 0;
                foreach($vouchers as $voucher){
                    $subtotal += $voucher->amount;
                }

                $data = [
                    'id' => $sale->id,
                    'invoice_id' => $sale->invoice_id,
                    'date' => $sale->date,
                    'customer_id' => $sale->customer_id,
                    'customer_name' => $sale->customer_id ? $sale->customer->first_name.' '.$sale->customer->last_name : '',
                    'net_total' => $subtotal - $sale->discount
                ];
                array_push($vouchersalesList, $data);
            }
        }
        if(count($vouchersalesList)>0){
            $log = '{"title":"View voucher sales.", "body":"View voucher sales"}';
            $data = [
                'moduleName'=> 'voucher_sales',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'voucherSalesData' => $vouchersalesList]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Voucher sales not found.']);
    }

    public function getVoucherSaleData(Request $request){
        $vouchersales = VoucherSales::with('customer')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId, 'id'=>$request->voucherSaleId])->first();
        if(is_null($vouchersales)){
            return response()->json(['status' => FALSE, 'msg' => 'Voucher sales not found.']);
        }
        $vouchersales->vouchers = Vouchers::where(['issue_to' => 'v_sale', 'issue_id' => $vouchersales->id])->get();
        $vouchersales->payments = VoucherSalePayments::with('paymentMethod')->where('voucher_sale_id', $vouchersales->id)->get();

        $log = '{"title":"View voucher sale.", "body":"View voucher details<br><b>Voucher invoice no:</b> '.$vouchersales->invoice_id.'"}';
        $data = [
            'moduleName'=> 'voucher_sales',
            'moduleId'=> $vouchersales->id,
            'log'=> $log,
            'userId'=> $request->loginId,
            'companyId'=> $request->companyId,
            'branchId'=> $request->branchId,
        ];
        $this->addActivityLog($data);
        return response()->json(['status' => TRUE, 'voucherSalesData' => $vouchersales]);        
    }

    //Update Voucher sales
    public function updateVoucherSales(Request $request) {
        $validator = Validator::make($request->all(), [
            'date' => 'required', 
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $voucherSale = VoucherSales::find($request->voucherSalesId);
        $prevData = $voucherSale->getOriginal();
        $voucherSale->date = date('Y-m-d H:i:s', strtotime($request->date));
        $voucherSale->discount = $request->discount;
        $voucherSale->customer_id = $request->customer_name;
        $voucherSale->save();
        if($voucherSale->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $voucherSale->getChanges());
            $log = '{"title":"Voucher sale Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'voucher_sales',
                'moduleId'=> $voucherSale->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Voucher sale details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Voucher sale details not updated.']);
        }
    }
}


