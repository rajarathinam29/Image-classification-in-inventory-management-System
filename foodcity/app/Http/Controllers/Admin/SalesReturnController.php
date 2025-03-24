<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SalesProducts;
use App\Models\Sales;

class SalesReturnController extends Controller
{
    public function returns() {
        return view('admin.sales.returns', ['title'=> 'Sales Return Products']);
    }

    public function rtnAccept(Request $request){
        $sale = Sales::with('customer')->where(['invoice_id' => $request->invoiceId, 'company_id' => $request->companyId, 'branch_id' => $request->branchId])->first();

        if(is_null($sale)){
            return response()->json(['status' => FALSE, 'msg' => 'Invoice not found.']);
        }
        if($sale->rtn_bill_id != null){
            return response()->json(['status' => FALSE, 'msg' => 'This invoice already have a return products.']);
        }

        $sale->salesProducts = SalesProducts::with('product')->where('sale_id', $sale->id)->get();
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
        if($grandTotal < 0){
            return response()->json(['status' => FALSE, 'msg' => 'Return bill not allowed.']);
        }

        $datediff = strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($sale->invoice_date)));
        $days = round($datediff / (60 * 60 * 24));
        $sale->acceptable = 1;
        if($days > 28){
            $sale->acceptable = 0;
        }
        $sale->days = $days;
        $log = '{"title":"Verify Invoice.", "body":"Verify invoice id'.$sale->invoice_id.' is it acceptable or not."}';
            $data = [
                'moduleName'=> 'sales_return',
                'moduleId'=> $sale->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
        return response()->json(['status' => TRUE, 'saleData' => $sale]);
    }

    //Return products
    public function getReturnProducts(Request $request){
        $salesProducts = SalesProducts::with('product', 'sale')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId])->where('qty', '<', 0)->orderBy('id', 'DESC')->get();
        
        if(count($salesProducts)>0){
            $log = '{"title":"View all return products.", "body":"View all return products."}';
            $data = [
                'moduleName'=> 'sales_return',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'productsData' => $salesProducts]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'sales not found.']);
    }

    //Return products
    public function getPendingReturnProducts(Request $request){
        $salesProducts = SalesProducts::with('product', 'sale')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId, 'reusable'=> 0])->where('qty', '<', 0)->orderBy('id', 'DESC')->get();
        
        if(count($salesProducts)>0){
            $log = '{"title":"View pending return products.", "body":"View pending return products."}';
            $data = [
                'moduleName'=> 'sales_return',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'productsData' => $salesProducts]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'sales not found.']);
    }

    public function reuseProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'saleProductsId' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $product = SalesProducts::with('product')->find($request->saleProductsId);
        $prevData = $product->getOriginal();
        $product->reusable = 1;
        $product->save();
        if($product->wasChanged()){
            $log = '{"title":"Set reusable product.", "body":"Product '.$product->product->product_name.' chaged to reusable"}';
            $data = [
                'moduleName'=> 'sales_return',
                'moduleId'=> $product->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Product successfully changed to reusable.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Product not set to reusable.']);
        }
    }

    public function damageProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'saleProductsId' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $product = SalesProducts::with('product')->find($request->saleProductsId);
        $prevData = $product->getOriginal();
        $product->reusable = 2;
        $product->reason = $request->damageNote;
        $product->save();
        if($product->wasChanged()){
            $log = '{"title":"Set damage product.", "body":"Product '.$product->product->product_name.' changed to damaged."}';
            $data = [
                'moduleName'=> 'sales_return',
                'moduleId'=> $product->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Product successfully changed to damaged.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Product not set to damage.']);
        }
    }
}
