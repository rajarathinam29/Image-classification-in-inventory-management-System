<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Purchase;
use App\Models\Products;
use App\Models\PurchaseProducts;
use App\Models\SalesProducts;
use DB;

class PurchasedProductsController extends Controller
{
    //get all purchase Products
    public function getPurchasedProducts(Request $request) {
        $productList = [];
        $products = PurchaseProducts::with('product')->where(['purchase_id'=>$request->purchaseId, 'company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->get();
        $purchase = Purchase::find($request->purchaseId);
        if(!is_null($products)){
            foreach($products as $row){
                $data = [
                    'id' => $row->id,
                    'purchase_id' => $row->purchase_id,
                    'product_id' => $row->product_id,
                    'bar_code' => $row->product->bar_code,
                    'product_name' => $row->product->product_name,
                    'price_type' => $row->product->price_type,
                    'profit_margin' => $row->product->profit_margin,
                    'vat_type' => $row->product->vat_type,
                    'vat' => $row->product->vat,
                    'units' => $row->units,
                    'free' => $row->free,
                    'cost_price' => $row->cost_price,
                    'sale_price' => $row->sale_price,
                    'mrp' => $row->mrp,
                    'total' => $row->total,
                    'expiry_date' => $row->expiry_date,
                ];
                array_push($productList, $data);
            }
            $log = '{"title":"View purchase Products.", "body":"View purchase products.<br><b>GRN Id:</b>'.$purchase->grn_no.'"}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> $purchase->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'purchaseProductData' => $productList]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Product not found.']);
    }

    // get Purchase Products By product id
    public function getPurchasedProductsByProuctId(Request $request){
        $validator = Validator::make($request->all(), [
            'productId' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $query = PurchaseProducts::select(
            'purchased_products.*',
            DB::raw('purchase.date, purchase.grn_no')
        )->LeftJoin('purchase', ['purchase.id'=>'purchased_products.purchase_id']);
        $query->where([
            'purchase.company_id' => $request->companyId, 
            'purchase.branch_id' => $request->branchId,
            'product_id' => $request->productId,
            // 'price_status'=>0
        ]);
        $query->orderBy('purchase.date', 'DESC');
        $purchaseProducts = $query->get();
        
        if(!is_null($purchaseProducts)){
            return response()->json(['status' => TRUE, 'purchaseProductsData' => $purchaseProducts]);
        }

        return response()->json(['status' => FALSE, 'msg' => 'Purchase product not found.']);
    }

    //get all purchase Products
    public function getProductPrices(Request $request) {
        $validator = Validator::make($request->all(), [
            'productId' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }  
        $product = Products::find($request->productId);
        $priceList = [];
        $prices = PurchaseProducts::where(['product_id'=>$request->productId, 'price_status' => 1, 'company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->orderBy('mrp', 'DESC')->get();
        if(!is_null($prices)){
            foreach($prices as $row){
                $soldProducts = SalesProducts::select(
                    DB::raw("sum(qty) as totalQty"),
                )->where('stock_id', $row->id)->where('reusable','<',2)->get();
                $availableStock = ($row->units+$row->free) - $soldProducts[0]->totalQty;
                if($availableStock>0){
                    $data = [
                        'id' => $row->id,
                        'product_id' => $row->product_id,
                        'cost_price' => $row->cost_price,
                        'sale_price' => $row->sale_price,
                        'mrp' => $row->mrp,
                        'expiry_date' => $row->expiry_date,
                        'available' => $availableStock
                    ];
                    array_push($priceList, $data);
                }
            }
        }
        if(count($priceList)>0){
            $log = '{"title":"View purchase product prices.", "body":"View purchase products prices.<br><b>Product name:</b>'.$product->product_name.'"}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'productPriceData' => $priceList]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Product out of Stock! please check stock.']);
    }
    //Single Purchase
    public function getPurchase(Request $request) {
        $purchase = Purchase::with('suppliers', 'company', 'branch')->where('id', $request->purchaseId)->first();
        if(!is_null($purchase)){
            return response()->json(['status' => TRUE, 'purchaseData' => $purchase]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'purchase not found.']);
    }
    //Add Purchase
    public function addPurchasedProduct(Request $request) {   
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'purchase_id' => 'required', 
            'units' => 'required',
            'cost_price' => 'required|lt:mrp',
            'sale_price' => 'nullable|gt:cost_price|lte:mrp',
            'mrp' => 'required|gt:cost_price',
            'total' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }  
        $purchase = Purchase::find($request->purchase_id);  
        $product = Products::find($request->product_id);  
        $purchaseProduct = new PurchaseProducts;
        $purchaseProduct->purchase_id = $request->purchase_id;
        $purchaseProduct->product_id = $request->product_id;
        $purchaseProduct->units = $request->units;
        $purchaseProduct->free = $request->free ? $request->free : 0;
        $purchaseProduct->cost_price = $request->cost_price;
        $purchaseProduct->sale_price = $request->sale_price ? $request->sale_price : 0;
        $purchaseProduct->mrp = $request->mrp;
        $purchaseProduct->total = $request->total ? $request->total : 0;
        $purchaseProduct->expiry_date = $request->expiry_date ? date('Y-m-d', strtotime($request->expiry_date)) : null;
        $purchaseProduct->note = isset($request->note) ?$request->note : null;
        $purchaseProduct->receive_date = isset($request->receive_date) ? date('Y-m-d', strtotime($request->receive_date)) : null;
        $purchaseProduct->company_id = $request->companyId;
        $purchaseProduct->branch_id = $request->branchId;
        $purchaseProduct->created_by = $request->loginId;
        if($purchaseProduct->save()){ 
            $log = '{"title":"Purchase Product added.", "body":"Purchase product added.<br><b>product name:</b>'.$product->product_name.'"}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> $purchase->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'purchaseProduct successfully added.', 'insertId' => $purchaseProduct->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase not added.']);
        }
    }
    //Update Purchase
    public function updatePurchasedProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'purchase_id' => 'required', 
            'units' => 'required',
            'cost_price' => 'required|lt:mrp',
            'sale_price' => 'nullable|gt:cost_price|lte:mrp',
            'mrp' => 'required|gt:cost_price',
            'total' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $purchase = Purchase::find($request->purchase_id);
        $purchaseProduct = PurchaseProducts::find($request->id);
        $prevData = $purchaseProduct->getOriginal();
        $purchaseProduct->purchase_id = $request->purchase_id;
        $purchaseProduct->product_id = $request->product_id;
        $purchaseProduct->units = $request->units;
        $purchaseProduct->free = $request->free ? $request->free : 0;
        $purchaseProduct->cost_price = $request->cost_price;
        $purchaseProduct->sale_price = $request->sale_price ? $request->sale_price : 0;
        $purchaseProduct->mrp = $request->mrp;
        $purchaseProduct->total = $request->total ? $request->total : 0;
        $purchaseProduct->expiry_date = $request->expiry_date ? date('Y-m-d', strtotime($request->expiry_date)) : null;
        $purchaseProduct->save();
        if($purchaseProduct->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $purchaseProduct->getChanges());
            $log = '{"title":"Purchase product updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> $purchase->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Product details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Product details not updated.']);
        }
    }

    public function setPriceSatus(Request $request){
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $purchaseProduct = PurchaseProducts::find($request->id);
        $prevData = $purchaseProduct->getOriginal();
        $purchaseProduct->price_status = $request->status;
        $purchaseProduct->save();
        if($purchaseProduct->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $purchaseProduct->getChanges());
            $log = '{"title":"Purchase product updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> $purchaseProduct->purchase_id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Product details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Product details not updated.']);
        }
    }
    //Delete Purchase
    public function deletePurchasedProduct(Request $request) {
        $purchasedProduct = PurchaseProducts::find($request->purchaseProductId);
        $product = Products::find($purchasedProduct->product_id);
        if($purchasedProduct->delete()){
            $log = '{"title":"Purchase Product Deleted.", "body":"Purchase product Deleted.<br><b>Product name: </b>'.$product->product_name.'"}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> $purchasedProduct->purchase_id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Product is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Product details not deleted.']);
        }
    }

    //Update Products
    public function updateDefaultPrice(Request $request) {
        $validator = Validator::make($request->all(), [
            'productId' => 'required',
            'cost_price' => 'required',
            'sale_price' => 'nullable|gt:cost_price|lte:mrp', 
            'mrp' => 'required|gt:cost_price', 
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $products = Products::find($request->productId);
        $prevData = $products->getOriginal();
        $products->cost_price = $request->cost_price;
        $products->sale_price = $request->sale_price;
        $products->mrp = $request->mrp;
        $products->save();
        if($products->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $products->getChanges());
            $log = '{"title":"Product Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'products',
                'moduleId'=> $products->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Product default price successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Products default price not updated.']);
        }
    }
}
