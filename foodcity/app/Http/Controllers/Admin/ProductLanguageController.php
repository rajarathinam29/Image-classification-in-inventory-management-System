<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductLanguage;

class ProductLanguageController extends Controller
{
     //All Language
     public function getProductLanguage(Request $request) {
        $productlanguage = ProductLanguage::with('languages')->where('product_id', $request->productId)->get();
        if(!is_null($productlanguage)){
            $log = '{"title":"View all product languages.", "body":"View all product languages"}';
            $data = [
                'moduleName'=> 'product_languages',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'productlanguageData' => $productlanguage]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'productlanguage not found.']);
    }

     //Add ProductLanguage
     public function addProductLanguage(Request $request) {   
        $validator = Validator::make($request->all(), [
            'language_id' => 'required',
            'product_name' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $productlanguage = new ProductLanguage;
        $productlanguage->product_name = $request->product_name;
        $productlanguage->product_id = $request->product_id;
        $productlanguage->language_id = $request->language_id;
        $productlanguage->company_id = $request->companyId;
        if($productlanguage->save()){ 
            $log = '{"title":"Product language Created.", "body":"Product name: '.$productlanguage->product_name.' created."}';
            $data = [
                'moduleName'=> 'product_languages',
                'moduleId'=> $productlanguage->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Product Language successfully added.', 'insertId' => $productlanguage->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Product Language not added.']);
        }
    }
    //Update ProductLanguage
    public function updateProductLanguage(Request $request) {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'language_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $productlanguage = ProductLanguage::find($request->productlanguageId);
        $prevData = $productlanguage->getOriginal();
        $productlanguage->product_name = $request->product_name;
        $productlanguage->product_id = $request->product_id;
        $productlanguage->language_id = $request->language_id;
        $productlanguage->save();
        if($productlanguage->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $productlanguage->getChanges());
            $log = '{"title":"Product language Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'product_languages',
                'moduleId'=> $productlanguage->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Product Language details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Product Language details not updated.']);
        }
    }
    //Delete ProductLanguage
    public function deleteProductLanguage(Request $request) {
        $productlanguage = ProductLanguage::find($request->productlanguageId);
        if($productlanguage->delete()){
            $log = '{"title":"Product language deleted.", "body":"Product language: '.$productlanguage->product_name.' Deleted."}';
            $data = [
                'moduleName'=> 'product_languages',
                'moduleId'=> $productlanguage->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Product Language is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Product Language details not deleted.']);
        }
    }
}
