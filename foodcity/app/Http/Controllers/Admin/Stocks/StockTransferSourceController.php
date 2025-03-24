<?php

namespace App\Http\Controllers\Admin\Stocks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockTransferSource;

class StockTransferSourceController extends Controller
{
    public function getTransferSourcesData(Request $request){
        $sources = StockTransferSource::where('status', 1)->get();
        if(count($sources)>0){
            return response()->json(['status' => TRUE, 'sourceData' => $sources]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Stock transfer source not found.']);
    }
}
