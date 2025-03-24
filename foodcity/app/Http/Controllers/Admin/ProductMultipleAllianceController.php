<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductMultipleAlliance;

class ProductMultipleAllianceController extends Controller
{
    //All Alliance
    public function getMultipleAlliance(Request $request) {
        $productMultipleAlliance = ProductMultipleAlliance::with('type')->where('product_id', $request->productId)->get();
        if($productMultipleAlliance){
            $log = '{"title":"View all product multiple alliance.", "body":"View all product multiple alliance"}';
            $data = [
                'moduleName'=> 'product_multiple_alliance',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'productMultipleAllianceData' => $productMultipleAlliance]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Alliance not found.']);
    }

     //Add Product
     public function addAlliance(Request $request) {   
        $validator = Validator::make($request->all(), [
            'barcode' => 'required',
            'status' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $alliance = new ProductMultipleAlliance;
        $alliance->barcode = $request->barcode;
        $alliance->qty = $request->qty;
        $alliance->units_type = $request->units_type;
        $alliance->cost_price = $request->cost_price;
        $alliance->sale_price = $request->sell_price;
        $alliance->status = $request->status;
        $alliance->product_id = $request->product_id;
        $alliance->company_id = $request->companyId;
        if($alliance->save()){ 
            $log = '{"title":"Product Alliance Created.", "body":"Product barcode: '.$alliance->barcode.' created."}';
            $data = [
                'moduleName'=> 'product_multiple_alliance',
                'moduleId'=> $alliance->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Product alliance successfully added.', 'insertId' => $alliance->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Product alliance not added.']);
        }
    }
    //Update Products
    public function updateAlliance(Request $request) {
        $validator = Validator::make($request->all(), [
            'barcode' => 'required',
            'status' => 'required' 
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $alliance = ProductMultipleAlliance::find($request->allianceId);
        $prevData = $alliance->getOriginal();
        $alliance->barcode = $request->barcode;
        $alliance->qty = $request->qty;
        $alliance->units_type = $request->units_type;
        $alliance->cost_price = $request->cost_price;
        $alliance->sale_price = $request->sell_price;
        $alliance->status = $request->status;
        $alliance->product_id = $request->product_id;
        $alliance->save();
        if($alliance->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $alliance->getChanges());
            $log = '{"title":"Product alliance Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'product_multiple_alliance',
                'moduleId'=> $alliance->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'alliance details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'alliance details not updated.']);
        }
    }
    //Delete Product
    public function deleteAlliance(Request $request) {
        $alliance = ProductMultipleAlliance::find($request->allianceId);
        if($alliance->delete()){
            $log = '{"title":"Product alliance deleted.", "body":"Product alliance: '.$alliance->barcode.' Deleted."}';
            $data = [
                'moduleName'=> 'product_multiple_alliance',
                'moduleId'=> $alliance->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Alliance is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Alliance details not deleted.']);
        }
    }
}
