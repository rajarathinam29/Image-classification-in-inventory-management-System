<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    
    //AllPaymentMethod
    public function getPaymentMethods(Request $request) {
        $paymentmethod = PaymentMethod::all();
        if(!is_null($paymentmethod)){
            return response()->json(['status' => TRUE, 'paymentmethodData' => $paymentmethod]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'PaymentMethod not found.']);
    }
     //Single PaymentMethod
     public function getPaymentMethod(Request $request) {
        $paymentmethod = PaymentMethod::where('id', $request->paymentmethodId)->first();
        if(!is_null($paymentmethod)){
            return response()->json(['status' => TRUE, 'paymentmethodData' => $paymentmethod]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'PaymentMethod not found.']);
    }
    //Add PaymentMethod
    public function addPaymentMethod(Request $request) {   
        $validator = Validator::make($request->all(), [
            'method_name' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $paymentmethod = new PaymentMethod;
        $paymentmethod->method_name = $request->method_name;
        $paymentmethod->description = $request->description;
        $paymentmethod->company_id=$request->companyId;
        $paymentmethod->created_by=$request->loginId;
        if($paymentmethod->save()){ 
            return response()->json(['status' => TRUE, 'msg' => 'PaymentMethod successfully added.', 'insertId' => $paymentmethod->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'PaymentMethod not added.']);
        }
    }
    //Update PaymentMethod
    public function updatePaymentMethod(Request $request) {
        $validator = Validator::make($request->all(), [
            'method_name' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $paymentmethod = PaymentMethod::find($request->paymentmethodId);
        $prevData = $paymentmethod->getOriginal();
        $paymentmethod->method_name = $request->method_name;
        $paymentmethod->description = $request->description;
        $paymentmethod->save();
        if($paymentmethod->wasChanged()){
            return response()->json(['status' => TRUE, 'msg' => 'PaymentMethod details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'PaymentMethod details not updated.']);
        }
    }
    //Delete PaymentMethod
    public function deletePaymentMethod(Request $request) {
        $paymentmethod = PaymentMethod::find($request->paymentmethodId);
        if($paymentmethod->delete()){
            return response()->json(['status' => TRUE, 'msg' => 'PaymentMethod is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'PaymentMethod details not deleted.']);
        }
    }
}
