<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductUnitTypes;

class ProductUnitTypesController extends Controller
{
    //AllUnitTypes
    public function getUnitsTypes(Request $request) {
        $units = ProductUnitTypes::all();
        if(!is_null($units)){
            return response()->json(['status' => TRUE, 'unitsData' => $units]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Units not found.']);
    }
}
