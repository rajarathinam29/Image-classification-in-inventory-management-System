<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expenses;

use DB;

class ExpenseReportController extends Controller
{
    public function getTotalExpenses(Request $request){
        $fromDate = date('Y-m-01', strtotime($request->fromDate));
        // $lastDate = '';
        $lastDate = date('Y-m-t', strtotime($fromDate." +11 months"));

        $expenseQ = Expenses::where(['company_id' => $request->companyId, 'branch_id' => $request->branchId]);
        $expenseQ->select(
            DB::raw('SUM(amount) as totalExpense')
        );
        if(isset($fromDate) && !empty($fromDate)){
            $expenseQ->whereDate('date', '>=', date('Y-m-d', strtotime($fromDate)));
        }
        if(isset($lastDate) && !empty($lastDate)){
            $expenseQ->whereDate('date', '<=', date('Y-m-d', strtotime($lastDate)));
        }
        
        
        $expenses = $expenseQ->get();

        return response()->json(['status' => TRUE, 'expenseData' => $expenses, 'startDate'=>date('M,Y', strtotime($fromDate)), 'endDate'=>date('M,Y', strtotime($lastDate))]);
    }
}
