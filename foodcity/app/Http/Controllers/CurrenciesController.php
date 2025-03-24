<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Currency;

class CurrenciesController extends Controller
{
    public function getCurrencies(){
        $currencies = Currency::orderBy('country', 'ASC')->get();

        return response()->json(['status' => TRUE, 'currencyData' => $currencies]); 
    }
}
