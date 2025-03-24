<?php

namespace App\Http\Controllers\Admin\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PurchaseOrder;
use App\Models\Products;
use App\Models\PurchaseOrderProducts;
use App\Models\SalesProducts;
use DB;

class PurchaseOrderProductsController extends Controller
{
    //get all purchase Products
    public function getPurchaseOrderProducts(Request $request) {
        $productList = [];
        $products = PurchaseOrderProducts::with('product')->where(['order_id'=>$request->orderId, 'company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->get();
        $purchaseOrder = PurchaseOrder::find($request->orderId);
        if(!is_null($products)){
            foreach($products as $row){
                $data = [
                    'id' => $row->id,
                    'order_id' => $row->order_id,
                    'product_id' => $row->product_id,
                    'bar_code' => $row->product->bar_code,
                    'product_name' => $row->product->product_name,
                    'price_type' => $row->product->price_type,
                    'profit_margin' => $row->product->profit_margin,
                    'vat_type' => $row->product->vat_type,
                    'vat' => $row->product->vat,
                    'units' => $row->units,
                    'cost_price' => $row->cost_price,
                    'sale_price' => $row->sale_price,
                    'mrp' => $row->mrp,
                    'total' => $row->total,
                ];
                array_push($productList, $data);
            }
            $log = '{"title":"View purchase Products.", "body":"View purchase order products.<br><b>order Id:</b>'.$purchaseOrder->order_id.'"}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> $purchaseOrder->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'orderProductData' => $productList]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Product not found.']);
    }

    
    //Add Purchase
    public function addPurchaseOrderProduct(Request $request) {   
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'order_id' => 'required', 
            'units' => 'required',
            'cost_price' => 'required|lt:mrp',
            'sale_price' => 'nullable|gt:cost_price|lte:mrp',
            'mrp' => 'required|gt:cost_price',
            'total' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }  
        $order = PurchaseOrder::find($request->order_id);
        $order->status = 1;
        $order->save();
          
        $product = Products::find($request->product_id);  
        $orderProducts = new PurchaseOrderProducts;
        $orderProducts->order_id = $request->order_id;
        $orderProducts->product_id = $request->product_id;
        $orderProducts->units = $request->units;
        $orderProducts->cost_price = $request->cost_price;
        $orderProducts->sale_price = $request->sale_price ? $request->sale_price : 0;
        $orderProducts->mrp = $request->mrp;
        $orderProducts->total = $request->total ? $request->total : 0;
        $orderProducts->company_id = $request->companyId;
        $orderProducts->branch_id = $request->branchId;
        $orderProducts->created_by = $request->loginId;
        if($orderProducts->save()){ 
            $log = '{"title":"Purchase order Product added.", "body":"Purchase order product added.<br><b>product name:</b>'.$product->product_name.'"}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> $order->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Order product successfully added.', 'insertId' => $orderProducts->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'product not added.']);
        }
    }
    //Update Purchase
    public function updatePurchaseOrderProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'order_id' => 'required', 
            'units' => 'required',
            'cost_price' => 'required|lt:mrp',
            'sale_price' => 'nullable|gt:cost_price|lte:mrp',
            'mrp' => 'required|gt:cost_price',
            'total' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $order = PurchaseOrder::find($request->order_id);  
        $purchaseProduct = PurchaseOrderProducts::find($request->id);
        $prevData = $purchaseProduct->getOriginal();
        $purchaseProduct->order_id = $request->order_id;
        $purchaseProduct->product_id = $request->product_id;
        $purchaseProduct->units = $request->units;
        $purchaseProduct->cost_price = $request->cost_price;
        $purchaseProduct->sale_price = $request->sale_price ? $request->sale_price : 0;
        $purchaseProduct->mrp = $request->mrp;
        $purchaseProduct->total = $request->total ? $request->total : 0;
        $purchaseProduct->save();
        if($purchaseProduct->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $purchaseProduct->getChanges());
            $log = '{"title":"Purchase order product updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> $order->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Order product successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Order product not updated.']);
        }
    }

    //Delete Purchase
    public function deletePurchaseOrderProduct(Request $request) {
        $orderProducts = PurchaseOrderProducts::find($request->orderProductId);
        $product = Products::find($orderProducts->product_id);
        if($orderProducts->delete()){
            $allOrderProducts = PurchaseOrderProducts::where(['order_id'=>$orderProducts->order_id])->get();
            if(count($allOrderProducts)==0){
                $purchaseOrder = PurchaseOrder::find($orderProducts->order_id);
                $purchaseOrder->status = 0;
                $purchaseOrder->save();
            }
            $log = '{"title":"Purchase order product Deleted.", "body":"Purchase order product Deleted.<br><b>Product name: </b>'.$product->product_name.'"}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> $orderProducts->order_id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase order product successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase order product not deleted.']);
        }
    }

    
}
