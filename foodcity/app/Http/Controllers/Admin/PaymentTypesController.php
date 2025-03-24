<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentTypes;

class PaymentTypesController extends Controller
{
    //AllPaymentTypes
    public function getPaymentTypes(Request $request) {
        $paymentType = PaymentTypes::all();
        if(!is_null($paymentType)){
            return response()->json(['status' => TRUE, 'paymentTypeData' => $paymentType]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Payment Type not found.']);
    }
}
