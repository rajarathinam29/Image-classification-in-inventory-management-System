<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductCompanies;

class ProductCompaniesController extends Controller
{
    public function index() {
        return view('admin.productcompanies.productcompany-list', ['title'=> 'Product Manufactures']);
    }
    public function create() {
        return view('admin.productcompanies.create', ['title'=> 'Create Product Manufacture']);
    }
    public function edit() {
        return view('admin.productcompanies.edit', ['title'=> 'Edit Product Manufacture']);
    }
    public function view() {
        return view('admin.productcompanies.view', ['title'=> 'View Product Manufacture']);
    }
    //AllProductCompanies
    public function getProductCompanies(Request $request) {
        $productcompanies = ProductCompanies::where('company_id', $request->companyId)->get();
        if(!is_null($productcompanies)){
            $log = '{"title":"View all product manufacture.", "body":"View all product manufacture"}';
            $data = [
                'moduleName'=> 'product_manufactures',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'productcompaniesData' => $productcompanies]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'product manufacture not found.']);
    }
    //Single ProductCompanies
    public function getProductCompany(Request $request) {
        $productcompanies = ProductCompanies::where('id', $request->productcompaniesId)->first();
        if(!is_null($productcompanies)){
            $log = '{"title":"View product manufacture.", "body":"<b>Manufacture Name:</b>'.$productcompanies->company_name.'"}';
            $data = [
                'moduleName'=> 'product_manufactures',
                'moduleId'=> $productcompanies->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'productcompaniesData' => $productcompanies]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'product manufacture not found.']);
    }
    //Add ProductCompanies
    public function addProductCompanies(Request $request) {   
        $validator = Validator::make($request->all(), [
            'company_name' => 'required', 
            'description' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $productcompanies = new ProductCompanies;
        $productcompanies->company_name = $request->company_name;
        $productcompanies->description = $request->description;
        $productcompanies->companies_status = $request->companies_status; 
        $productcompanies->company_id = $request->companyId;
        $productcompanies->created_by = $request->loginId;
        if($productcompanies->save()){ 
            $log = '{"title":"Product company Created.", "body":"Product company: '.$productcompanies->company_name.' created."}';
            $data = [
                'moduleName'=> 'product_manufactures',
                'moduleId'=> $productcompanies->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Product manufacture successfully added.', 'insertId' => $productcompanies->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Product manufacture not added.']);
        }
    }
    //Update ProductCompanies
    public function updateProductCompanies(Request $request) {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required', 
            'description' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $productcompanies = ProductCompanies::find($request->productcompaniesId);
        $prevData = $productcompanies->getOriginal();
        $productcompanies->company_name = $request->company_name;
        $productcompanies->description = $request->description;
        $productcompanies->companies_status = $request->companies_status; 
        $productcompanies->save();
        if($productcompanies->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $productcompanies->getChanges());
            $log = '{"title":"Product manufacture Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'product_manufactures',
                'moduleId'=> $productcompanies->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Product manufacture details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Product manufacture details not updated.']);
        }
    }
    //Delete ProductCompanies
    public function deleteProductCompanies(Request $request) {
        $productcompanies = ProductCompanies::find($request->productcompaniesId);
        if($productcompanies->delete()){
            $log = '{"title":"Product manufacture deleted.", "body":"Product manufacture: '.$productcompanies->company_name.' Deleted."}';
            $data = [
                'moduleName'=> 'product_manufactures',
                'moduleId'=> $productcompanies->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Product manufacture is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Product manufacture details not deleted.']);
        }
    }
}
