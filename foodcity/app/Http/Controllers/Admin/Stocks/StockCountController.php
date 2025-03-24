<?php

namespace App\Http\Controllers\Admin\Stocks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\StockCount;
use App\Models\StockCountProducts;
use App\Models\Products;

class StockCountController extends Controller
{
    public function index() {
        return view('admin.stockcount.stockcount-list', ['title'=> 'Stock Counts']);
    }

    public function create() {
        return view('admin.stockcount.create', ['title'=> 'Create Stock Count']);
    }

    public function edit() {
        return view('admin.stockcount.edit', ['title'=> 'Edit Stock Count']);
    }

    public function view() {
        return view('admin.stockcount.view', ['title'=> 'View Stock Count']);
    }

    //All Stock count
    public function getStockcountData(Request $request) {
        $stockCounts = StockCount::with(['user' => function($query) {
            $query->select(['id', 'first_name', 'last_name']);
        }])->where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->orderBy('start_date','DESC')->get();
        if(!is_null($stockCounts)){
            return response()->json(['status' => TRUE, 'stockcountData' => $stockCounts]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'stockCount not found.']);
    }

    //Get Stock count
    public function getStockCount(Request $request){
        $stockcount = StockCount::with(['user' => function($query) {
            $query->select(['id', 'first_name', 'last_name']);
        },'countProducts.product'])->where('id', $request->stockCountId)->first();
        if(!is_null($stockcount)){
            return response()->json(['status' => TRUE, 'stockCountData' => $stockcount]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Stock count not found.']);
    }

    //Add stock count
    public function addStockCount(Request $request) {   
        $validator = Validator::make($request->all(), [
            'startDate' => 'required',
            'status' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $stockcount = new StockCount;
        $stockcount->start_date = date('Y-m-d', strtotime($request->startDate));
        $stockcount->end_date = $request->endDate?date('Y-m-d', strtotime($request->endDate)):null;
        $stockcount->notes = $request->notes;
        $stockcount->status = $request->status;
        $stockcount->company_id = $request->companyId;
        $stockcount->branch_id = $request->branchId;
        $stockcount->created_by = $request->loginId;
        if($stockcount->save()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Stockcount successfully added.', 'insertId' => $stockcount->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Stockcount not added.']);
        }
    }

    //Update stock count
    public function updateStockCount(Request $request) {
        $validator = Validator::make($request->all(), [
            'startDate' => 'required',
            'status' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $stockcount = stockcount::find($request->stockCountId);
        $prevData = $stockcount->getOriginal();
        $stockcount->start_date = date('Y-m-d H:i:s', strtotime($request->startDate));
        $stockcount->end_date = $request->endDate?date('Y-m-d', strtotime($request->endDate)):null;;
        $stockcount->notes = $request->notes;
        $stockcount->status = $request->status;
        $stockcount->save();
        if($stockcount->wasChanged()){
            return response()->json(['status' => TRUE, 'msg' => 'Stockcount details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Stockcount details not updated.']);
        }
    }

    //Delete stock count 
    public function deleteStockCount(Request $request){
        $stockcount = StockCount::find($request->stockCountId);
        if($stockcount->delete()){
            return response()->json(['status' => TRUE, 'msg' => 'Stock count is successfully deleted.']);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Stock count not deleted.']);
    }

    /*
    |--------------------------------------------------------------------------
    | Stock count product
    |--------------------------------------------------------------------------
    */

    public function addProduct() {
        return view('admin.stockcount.addProduct', ['title'=> 'Add Stock Count Product']);
    }

    //Add stock count Product
    public function addStockCountProducts(Request $request) {   
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'inputMrp' => 'required',
            'cost_price' => 'required', 
            'inputQty' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $products = new StockCountProducts;
        $products->stock_count_id = $request->stockCountId;
        $products->product_id = $request->product_id;
        $products->units = $request->inputQty;
        $products->cost_price = $request->cost_price;
        $products->mrp = $request->inputMrp;
        $products->expiry_date = !empty($request->expiryDate)?date('Y-m-d', strtotime($request->expiryDate)):null;
        $products->expiry_status = 0;
        $products->created_by = $request->loginId;
        $products->company_id = $request->companyId;
        $products->branch_id = $request->branchId;
        
        if($products->save()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Product successfully added.', 'insertId' => $products->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Products not added.']);
        }
    }

    //Update stock count product
    public function updateStockCountProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'inputQty' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $product = StockCountProducts::find($request->stockCountProductId);
        $prevData = $product->getOriginal();
        $product->units = $request->inputQty;
        $product->expiry_date = !empty($request->inputExpiry)?date('Y-m-d', strtotime($request->inputExpiry)):null;
        $product->save();
        if($product->wasChanged()){
            return response()->json(['status' => TRUE, 'msg' => 'Product details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Product details not updated.']);
        }
    }
    //Delete stock count Product
    public function deleteStockCountProduct(Request $request){
        $products = StockCountProducts::find($request->stockCountProductId);
        if($products->delete()){
            return response()->json(['status' => TRUE, 'msg' => 'Product is successfully deleted.']);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Product not deleted.']);
    }
}
