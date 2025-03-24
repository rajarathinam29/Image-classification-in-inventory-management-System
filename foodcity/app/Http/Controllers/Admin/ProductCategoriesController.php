<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductCategories;

class ProductCategoriesController extends Controller
{
    public function index() {
        return view('admin.productcategories.category-list', ['title'=> 'Product Categories']);
    }
    public function create() {
        return view('admin.productcategories.create', ['title'=> 'Create Category']);
    }
    public function edit() {
        return view('admin.productcategories.edit', ['title'=> 'Edit Category']);
    }
    public function view() {
        return view('admin.productcategories.view', ['title'=> 'View Category']);
    }
    //AllCategory
    public function getProductCategories(Request $request) {
        $productcategories = ProductCategories::where('company_id', $request->companyId)->get();
        if(!is_null($productcategories)){
            $log = '{"title":"View all product category.", "body":"View all product category"}';
            $data = [
                'moduleName'=> 'product_categories',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'productcategoriesData' => $productcategories]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Category not found.']);
    }
    // get Active Categories
    public function getCategoriesActive(Request $request) {
        $productcategories = ProductCategories::where(['category_status'=>1, 'company_id'=>$request->companyId])->get();
        if(!is_null($productcategories)){
            $log = '{"title":"View product category.", "body":"View all active product category"}';
            $data = [
                'moduleName'=> 'product_categories',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'productcategoriesData' => $productcategories]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Category not found.']);
    }
    //Single Category
    public function getProductCategory(Request $request) {
        $productcategories = ProductCategories::where('id', $request->productcategoryId)->first();
        if(!is_null($productcategories)){
            $log = '{"title":"View product category.", "body":"<b>Category Name:</b>'.$productcategories->category_name.'"}';
            $data = [
                'moduleName'=> 'product_categories',
                'moduleId'=> $productcategories->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'productcategoryData' => $productcategories]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Category not found.']);
    }
    //Add Category
    public function addProductCategory(Request $request) {   
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $productcategories = new ProductCategories;
        $productcategories->category_name = $request->category_name;
        $productcategories->category_description = $request->description;
        $productcategories->category_status = $request->status;
        $productcategories->company_id=$request->companyId;
        $productcategories->created_by=$request->loginId;
        if($productcategories->save()){ 
            $log = '{"title":"Product category Created.", "body":"Product category: '.$productcategories->category_name.' created."}';
            $data = [
                'moduleName'=> 'product_categories',
                'moduleId'=> $productcategories->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Category successfully added.', 'insertId' => $productcategories->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Category not added.']);
        }
    }
    //Update Category
    public function updateProductCategory(Request $request) {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $productcategory = ProductCategories::find($request->productcategoryId);
        $prevData = $productcategory->getOriginal();
        $productcategory->category_name = $request->category_name;
        $productcategory->category_description = $request->description;
        $productcategory->category_status = $request->status;
        $productcategory->save();
        if($productcategory->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $productcategory->getChanges());
            $log = '{"title":"Product category Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'product_categories',
                'moduleId'=> $productcategory->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Category details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Category details not updated.']);
        }
    }
    //Delete Category
    public function deleteProductCategory(Request $request) {
        $productcategories = ProductCategories::find($request->productcategoryId);
        if($productcategories->delete()){
            $log = '{"title":"Product category deleted.", "body":"Product category: '.$productcategories->category_name.' Deleted."}';
            $data = [
                'moduleName'=> 'product_categories',
                'moduleId'=> $productcategories->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Category is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Category details not deleted.']);
        }
    }
}
