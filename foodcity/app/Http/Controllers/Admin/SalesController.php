<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customers;
use App\Models\Sales;
use App\Models\SalesPayments;
use App\Models\SalesProducts;
use App\Models\Revenues;
use App\Models\Expenses;
use App\Models\VoucherPayments;
use App\Models\Vouchers;
use App\Models\CompanySettings;
use App\Models\Companies;

class SalesController extends Controller
{
    public function index() {
        return view('admin.sales.sales-list', ['title'=> 'Sales']);
    }
    public function create() {
        return view('admin.sales.create', ['title'=> 'Create Sales']);
    }
    public function edit() {
        return view('admin.sales.edit', ['title'=> 'Edit Sales']);
    }
    public function view() {
        return view('admin.sales.view', ['title'=> 'View Sales']);
    }
    
    
    public function getSalesData(Request $request){
        $company = Companies::find($request->companyId);
        $year = date('Y');
        if(date('m')<$company->starting_month){
            $year = date("Y", strtotime("-1 year"));
        }

        $startingDate = date('Y-m-1', strtotime($year.'-'.$company->starting_month.'-1'));

        $salesQuery = Sales::with('customer', 'salesProducts')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId])->orderBy('id', 'DESC');
        //isset customer
        if(isset($request->sltCustomer) && !empty($request->sltCustomer))
            $salesQuery->where('customer_id', $request->sltCustomer);

        //isset status
        if(isset($request->sltStatus))
            $salesQuery->where('sales_status', $request->sltStatus);

        //isset Payment status
        if(isset($request->sltPaymentStatus))
            $salesQuery->where('payment_status', $request->sltPaymentStatus);
        
        // isset fromDate
        if(isset($request->fromDate) && !empty($request->fromDate))
            $salesQuery->whereDate('invoice_date', '>=', date('Y-m-d', strtotime($request->fromDate)));

        // isset toDate
        if(isset($request->toDate) && !empty($request->toDate))
            $salesQuery->whereDate('invoice_date', '<=', date('Y-m-d', strtotime($request->toDate)));

        if(empty($request->fromDate) && empty($request->toDate)){
            $salesQuery->whereDate('invoice_date', '>=', $startingDate);
        }

        $sales = $salesQuery->get();
        $salesList = [];
        if(count($sales)>0){
            foreach($sales as $sale){
                $salesProducts = $sale->salesProducts;
                $subtotal = 0;
                $discount = 0;
                foreach($salesProducts as $product){
                    $vat = $product->vat*$product->sale_price/100;
                    $total = $product->qty*($product->sale_price+$vat);
                    $dis = $product->qty*($product->mrp-$product->sale_price);
                    $subtotal += $total;
                    $discount += $dis;
                }

                $data = [
                    'id' => $sale->id,
                    'invoice_id' => $sale->invoice_id,
                    'invoice_date' => $sale->invoice_date,
                    'customer_id' => $sale->customer_id,
                    'customer_name' => $sale->customer_id ? $sale->customer->first_name.' '.$sale->customer->last_name : '',
                    'net_total' => $subtotal - $sale->discount + $sale->shipping_cost,
                    'sales_status' => $sale->sales_status,
                    'payment_status' => $sale->payment_status
                ];
                array_push($salesList, $data);
            }
        }
        if(count($salesList)>0){
            $log = '{"title":"View All Sales.", "body":"View all Sales"}';
            $data = [
                'moduleName'=> 'sales',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'salesData' => $salesList]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'sales not found.']);
    }

    public function getCustomerSalesData(Request $request){
        $sales = Sales::with('customer', 'salesProducts')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId,'customer_id' => $request->customerId])->orderBy('id', 'DESC')->get();
        $customer = Customers::find($request->customerId);
        $salesList = [];
        if(count($sales)>0){
            foreach($sales as $sale){
                $salesProducts = $sale->salesProducts;
                $subtotal = 0;
                $discount = 0;
                foreach($salesProducts as $product){
                    $vat = $product->vat*$product->sale_price/100;
                    $total = $product->qty*($product->sale_price+$vat);
                    $dis = $product->qty*($product->mrp-$product->sale_price);
                    $subtotal += $total;
                    $discount += $dis;
                }

                $data = [
                    'id' => $sale->id,
                    'invoice_id' => $sale->invoice_id,
                    'invoice_date' => $sale->invoice_date,
                    'customer_id' => $sale->customer_id,
                    'customer_name' => $sale->customer_id ? $sale->customer->first_name.' '.$sale->customer->last_name : '',
                    'net_total' => $subtotal - $sale->discount + $sale->shipping_cost,
                    'sales_status' => $sale->sales_status
                ];
                array_push($salesList, $data);
            }
        }
        if(count($salesList)>0){
            $log = '{"title":"View customer Sales.", "body":"View customer: '.$customer->first_name.' '.$customer->last_name.'  Sales. <br><b>Loaded sales:</b>'.count($salesList).'"}';
            $data = [
                'moduleName'=> 'sales',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'salesData' => $salesList]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'sales not found.']);
    }

    public function getSale(Request $request){
        $sale = Sales::with('customer')->where('id', $request->saleId)->first();

        if(!is_null($sale)){
            $sale->salesProducts = SalesProducts::with('product')->where('sale_id', $request->saleId)->get();
            $sale->revenues = Revenues::with('paymentMethod')->where(['payment_type' => 1, 'type_id' => $request->saleId])->get();
            $sale->expenses = Expenses::with('paymentMethod')->where(['payment_type' => 1, 'type_id' => $request->saleId])->get();

            $log = '{"title":"View Sale.", "body":"View Sale details.<br><b>Invoice id:</b>'.$sale->invoice_id.'"}';
            $data = [
                'moduleName'=> 'sales',
                'moduleId'=> $sale->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'saleData' => $sale]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'sale not found.']);
    }

    public function addSale(Request $request){
        $validator = Validator::make($request->all(), [
            'invoice_date' => 'required',
            'products' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }

        $invoice_id = '';
        if(empty($request->invoice_no)){
            $settings = CompanySettings::where(['company_id'=>$request->companyId, 'branch_id'=> $request->branchId, 'setting_name'=> 'prefix'])->first();
            $prefix = json_decode($settings->setting)->sales;
            //get last id
            $count_sale = Sales::where([
                'created_by'=>$request->loginId, 
                'branch_id'=>$request->branchId, 
                'company_id'=>$request->companyId,
            ])->withTrashed()->count();    
            // $invoice_id = $request->companyId.'-'.$request->branchId.'-'.date('Ymd',strtotime($request->invoice_date)).'-'.$request->loginId.'-'.($count_sale+1);
            $invoice_id =  $prefix.($count_sale+1);
        }else{
            $invoice_id = $request->invoice_no;
        }
        
        $grandTotal = $request->grandTotal;

        //company Setting 
        $settings = CompanySettings::where(['company_id'=>$request->companyId, 'branch_id'=> $request->branchId, 'setting_name'=> 'prefix'])->first();
        
        //save sale
        $sale = new Sales;
        $sale->invoice_id =  $invoice_id;
        $sale->invoice_date = date('Y-m-d H:i:s', strtotime($request->invoice_date));
        $sale->customer_id = $request->customer_id?$request->customer_id:null;
        $sale->sales_status = 1;
        $sale->payment_status = 0;
        $sale->company_id = $request->companyId;
        $sale->branch_id = $request->branchId;
        $sale->created_by = $request->loginId;
        if($request->additionalDiscount > 0){
            $sale->discount_type = 0;
            $sale->discount = $request->additionalDiscount;
        }
        if(isset($request->credit_days)){
            $sale->credit_date = date('Y-m-d H:i:s', strtotime($request->invoice_date. ' + '.$request->credit_days.' days'));
        }
        if(isset($request->rtnBillId) && $request->rtnBillId != 0){
            $sale->rtn_bill_id = $request->rtnBillId;
        }
        if($request->grandTotal <= $request->paidAmount){
            $sale->payment_status = 1;
        }
        if($sale->save()){ 
            $saledPoints = 0;
            //Add Sales Products
            foreach($request->products as $product){
                $sale_product = new SalesProducts;
                $sale_product->sale_id = $sale->id;
                $sale_product->product_id = $product['product_id'];
                $sale_product->stock_id = $product['stock_id'];
                $sale_product->qty = $product['qty'];
                $sale_product->cost_price = $product['cost_price'];
                $sale_product->sale_price = $product['sale_price'];
                $sale_product->mrp = $product['mrp'];
                $sale_product->vat = $product['vat'];
                $sale_product->reusable = $product['qty']<0 ? 0 : 1;
                $sale_product->company_id = $request->companyId;
                $sale_product->branch_id = $request->branchId;
                $sale_product->created_by = $request->loginId;
                $sale_product->save();
            }
            // Add payments
            if(isset($request->payments) && count($request->payments)>0){
                foreach($request->payments as $payment){
                    $revenuePrefix = json_decode($settings->setting)->revenues;
                    $countRevenue = Revenues::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->withTrashed()->count();

                    $refNoRe = $revenuePrefix.($countRevenue+1);
                    $revenue = new Revenues;
                    $revenue->ref_no = $refNoRe;
                    $revenue->date = date('Y-m-d H:i:s', strtotime($sale->invoice_date));
                    $revenue->payment_type = 1;
                    $revenue->type_id = $sale->id;
                    $revenue->payment_method = $payment['paymentMethod'];
                    $revenue->description = 'Sale '.$sale->invoice_id.' payment.';
                    $revenue->amount = $payment['amount'];
                    $revenue->card_no = isset($payment['card_no'])?$payment['card_no']:null;
                    $revenue->company_id = $request->companyId;
                    $revenue->branch_id = $request->branchId;
                    $revenue->created_by = $request->loginId;
                    $revenue->save();
                    switch($payment['paymentMethod']){
                        case 4:
                            $saledPoints += $payment['amount'];
                            break;
                        case 5:
                            $voucher = Vouchers::find($payment['voucher_id']);
                            $voucher->status = $payment['status'];
                            // $voucher->issue_id = $sale->id;
                            $voucher->save();
                            if($payment['amount']>0){
                                $voucherPayment = new VoucherPayments;
                                $voucherPayment->payment_date = date('Y-m-d H:i:s', strtotime($sale->invoice_date));
                                $voucherPayment->voucher_id = $payment['voucher_id'];
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
            }
            //customer Points update Function
            if(isset($request->customer_id)){
                $customer = Customers::find($request->customer_id);
                $pointDev = 100;
                $balancePoints = $customer->points - $saledPoints;
                $thisBillPoints = $grandTotal/$pointDev;

                $customer->points = $balancePoints + $thisBillPoints;
                $customer->save();
            }

            //Balance payment settled
            $balance = $request->paidAmount - $grandTotal;
            if($balance>0){
                $expenseprefix = json_decode($settings->setting)->expenses;
                $countExpense = Expenses::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->withTrashed()->count();

                $refNoEx = $expenseprefix.($countExpense+1);
                $expense = new Expenses;
                $expense->ref_no = $refNoEx;
                $expense->date = date('Y-m-d H:i:s', strtotime($sale->invoice_date));
                $expense->payment_type = 1;
                $expense->type_id = $sale->id;
                $expense->payment_method = 1;
                $expense->description = 'Sale '.$sale->invoice_id.' balance paid.';
                $expense->amount = $balance;
                $expense->company_id = $request->companyId;
                $expense->branch_id = $request->branchId;
                $expense->created_by = $request->loginId;
                $expense->save();
            }

            $log = '{"title":"Sale Created.", "body":"Sale invoice id:'.$sale->invoice_id.' Created."}';
            $data = [
                'moduleName'=> 'sales',
                'moduleId'=> $sale->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);

            return response()->json(['status' => TRUE, 'msg' => 'Sale successfully added.', 'invoice_id' => $invoice_id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Sale not added.']);
        }
    }

    public function updateSale(Request $request){
        $validator = Validator::make($request->all(), [
            'date' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $sale = Sales::find($request->saleId);
        $prevData = $sale->getOriginal();
        $sale->invoice_date = date('Y-m-d H:i:s', strtotime($request->date));
        $sale->customer_id = $request->customer_name;
        $sale->discount = $request->discount;
        $sale->shipping_cost = $request->cost;
        $sale->sales_status = $request->status;
       $sale->payment_status = $request->paymentStatus;
        $sale->save();
        if($sale->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $sale->getChanges());
            $log = '{"title":"Sale Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'sales',
                'moduleId'=> $sale->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            return response()->json(['status' => TRUE, 'msg' => 'sale details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'sale details not updated.']);
        }
    }

    public function deleteSale(Request $request){
        $sale = Sales::with('salesProducts')->find($request->saleId);

        $salesProducts = $sale->salesProducts;
        $subtotal = 0;
        $discount = 0;
        foreach($salesProducts as $product){
            $vat = $product->vat*$product->sale_price/100;
            $total = $product->qty*($product->sale_price+$vat);
            $dis = $product->qty*($product->mrp-$product->sale_price);
            $subtotal += $total;
            $discount += $dis;
        }
        $grandTotal = $subtotal - $sale->discount + $sale->shipping_cost;
        //customer Points update Function
        if(isset($sale->customer_id)){
            $customer = Customers::find($sale->customer_id);
            $pointDev = 100;
            $balancePoints = $customer->points;
            $thisBillPoints = $grandTotal/$pointDev;

            $customer->points = $balancePoints - $thisBillPoints;
            $customer->save();
        }
                
        SalesProducts::where('sale_id', $request->saleId)->delete();
        $revenues = Revenues::where(['payment_type'=> 1, 'type_id'=>$request->saleId])->get();
        foreach($revenues as $revenue){
            if($revenue->payment_method == 5){
                $voucherPayments = VoucherPayments::where('revenue_id', $revenue->id)->get();
                foreach($voucherPayments as $voucherPayment){
                    $voucher = Vouchers::find($payment['voucher_id']);
                    if($voucher->status == 1){
                        $voucher->status == 0;
                    }
                    $voucher->save();
                }
                $voucherPayments->delete();
            }
        }
        $revenues->delete();
        Expenses::where(['payment_type'=> 1, 'type_id'=>$request->saleId])->delete();
        if($sale->delete()){
            $log = '{"title":"Sale Deleted.", "body":"Sale invoice id: '.$sale->invoice_id.' Deleted."}';
            $data = [
                'moduleName'=> 'sales',
                'moduleId'=> $sale->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Sale is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Sale details not deleted.']);
        }
    }

    public function getMonthTotalSales(Request $request){
        $salesQuery = Sales::with('salesProducts')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId]);

        $salesQuery->whereYear('invoice_date', date('Y', strtotime($request->date)));
        $salesQuery->whereMonth('invoice_date', date('m', strtotime($request->date)));

        $sales = $salesQuery->get();
        $totalSales = 0;
        if(count($sales)>0){
            foreach($sales as $sale){
                $salesProducts = $sale->salesProducts;
                $subtotal = 0;
                foreach($salesProducts as $product){
                    $vat = $product->vat*$product->sale_price/100;
                    $total = $product->qty*($product->sale_price+$vat);
                    $dis = $product->qty*($product->mrp-$product->sale_price);
                    $subtotal += $total;
                }
                $totalSales += $subtotal;
            }
        }
        return response()->json(['status' => TRUE, 'totalSales' => $totalSales]);
    }

    public function getLastSixMonthSales(Request $request){
        $curdate  = date('Y-m-1', strtotime($request->date));
        $salesArr = [];
        $dateArr = [];
        $i = 12;
        while($i > 0){
            $i--;
            $date = date("Y-m-1", strtotime( $curdate." -".$i." months"));

            $salesQuery = Sales::with('salesProducts')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId]);

            $salesQuery->whereYear('invoice_date', date('Y', strtotime($date)));
            $salesQuery->whereMonth('invoice_date', date('m', strtotime($date)));

            $sales = $salesQuery->get();
            $totalSales = 0;
            if(count($sales)>0){
                foreach($sales as $sale){
                    $salesProducts = $sale->salesProducts;
                    $subtotal = 0;
                    foreach($salesProducts as $product){
                        $vat = $product->vat*$product->sale_price/100;
                        $total = $product->qty*($product->sale_price+$vat);
                        $dis = $product->qty*($product->mrp-$product->sale_price);
                        $subtotal += $total;
                    }
                    $totalSales += $subtotal;
                }
            }
            $salesArr[] = $totalSales;
            $dateArr[] = date('F Y', strtotime($date));
        }
        return response()->json(['status' => TRUE, 'totalSales' => $salesArr, 'salesDate'=>$dateArr]);
    }
    
}
