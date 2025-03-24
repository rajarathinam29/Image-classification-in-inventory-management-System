<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductBrands;

class ProductBrandsController extends Controller
{
    public function index() {
        return view('admin.productbrands.productbrand-list', ['title'=> 'Product Brands']);
    }
    public function create() {
        return view('admin.productbrands.create', ['title'=> 'Create Product Brand']);
    }
    public function edit() {
        return view('admin.productbrands.edit', ['title'=> 'Edit Product Brand']);
    }
    public function view() {
        return view('admin.productbrands.view', ['title'=> 'View Product Brand']);
    }
    //AllProductBrands
    public function getProductBrands(Request $request) {
        $productbrands = ProductBrands::where('company_id', $request->companyId)->get();
        if(!is_null($productbrands)){
            $log = '{"title":"View all product brands.", "body":"View all product brands"}';
            $data = [
                'moduleName'=> 'product_brands',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'productbrandsData' => $productbrands]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'productbrands not found.']);
    }
    //Single ProductBrands
    public function getProductBrand(Request $request) {
        $productbrands = ProductBrands::where('id', $request->productbrandsId)->first();
        if(!is_null($productbrands)){
            $log = '{"title":"View product brand.", "body":"<b>Brand Name:</b>'.$productbrands->brand_name.'"}';
            $data = [
                'moduleName'=> 'product_brands',
                'moduleId'=> $productbrands->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'productbrandsData' => $productbrands]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'productbrands not found.']);
    }
    //Add ProductBrands
    public function addProductBrands(Request $request) {   
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required', 
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $productbrands = new ProductBrands;
        $productbrands->brand_name = $request->brand_name;
        $productbrands->description = $request->description;
        $productbrands->brands_status = $request->brands_status; 
        $productbrands->company_id = $request->companyId;
        $productbrands->created_by = $request->loginId;
        if($productbrands->save()){ 
            $log = '{"title":"Product brand Created.", "body":"Product brand: '.$productbrands->brand_name.' created."}';
            $data = [
                'moduleName'=> 'product_brands',
                'moduleId'=> $productbrands->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'ProductBrands successfully added.', 'insertId' => $productbrands->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'ProductBrands not added.']);
        }
    }
    //Update ProductBrands
    public function updateProductBrands(Request $request) {
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required', 
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $productbrands = ProductBrands::find($request->productbrandsId);
        $prevData = $productbrands->getOriginal();
        $productbrands->brand_name = $request->brand_name;
        $productbrands->description = $request->description;
        $productbrands->brands_status = $request->brands_status; 
        $productbrands->save();
        if($productbrands->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $productbrands->getChanges());
            $log = '{"title":"Product brand Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'product_brands',
                'moduleId'=> $productbrands->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'ProductBrands details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'ProductBrands details not updated.']);
        }
    }
    //Delete ProductBrands
    public function deleteProductBrands(Request $request) {
        $productbrands = ProductBrands::find($request->productbrandsId);
        if($productbrands->delete()){
            $log = '{"title":"Product brand deleted.", "body":"Product brand: '.$productbrands->brand_name.' Deleted."}';
            $data = [
                'moduleName'=> 'product_brands',
                'moduleId'=> $productbrands->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'ProductBrands is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'ProductBrands details not deleted.']);
        }
    }
}
