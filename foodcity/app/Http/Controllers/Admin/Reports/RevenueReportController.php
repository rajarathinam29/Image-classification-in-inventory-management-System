<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Revenues;

use DB;

class RevenueReportController extends Controller
{
    public function getTotalRevenue(Request $request){
        $fromDate = date('Y-m-01', strtotime($request->fromDate));
        // $lastDate = '';
        $lastDate = date('Y-m-t', strtotime($fromDate." +11 months"));

        $revenueQ = Revenues::where(['company_id' => $request->companyId, 'branch_id' => $request->branchId]);
        $revenueQ->select(
            DB::raw('SUM(amount) as totalRevenue')
        );
        if(isset($fromDate) && !empty($fromDate)){
            $revenueQ->whereDate('date', '>=', date('Y-m-d', strtotime($fromDate)));
        }
        if(isset($lastDate) && !empty($lastDate)){
            $revenueQ->whereDate('date', '<=', date('Y-m-d', strtotime($lastDate)));
        }
        
        
        $revenues = $revenueQ->get();

        return response()->json(['status' => TRUE, 'revenueData' => $revenues, 'startDate'=>date('M,Y', strtotime($fromDate)), 'endDate'=>date('M,Y', strtotime($lastDate))]);
    }
}
