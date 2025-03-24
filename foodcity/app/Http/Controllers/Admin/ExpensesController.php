<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Expenses;
use App\Models\CompanySettings;
use App\Models\Companies;

class ExpensesController extends Controller
{
    public function index() {
        return view('admin.expenses.expense-list', ['title'=> 'Expenses']);
    }
    public function create() {
        return view('admin.expenses.create', ['title'=> 'Create Expenses']);
    }
    public function edit() {
        return view('admin.expenses.edit', ['title'=> 'Edit Expenses']);
    }
    public function view() {
        return view('admin.expenses.view', ['title'=> 'View Expenses']);
    }
    //AllExpenses
    public function getExpenses(Request $request) {
        $company = Companies::find($request->companyId);
        $year = date('Y');
        if(date('m')<$company->starting_month){
            $year = date("Y", strtotime("-1 year"));
        }

        $startingDate = date('Y-m-1', strtotime($year.'-'.$company->starting_month.'-1'));
        
        $expensesQ = Expenses::with('paymentMethod', 'paymentType')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId])->orderBy('id', 'DESC');
        if(isset($request->fromDate) && !empty($request->fromDate)){
            $expensesQ->whereDate('date', '>=', date('Y-m-d', strtotime($request->fromDate)));
        }
        // isset toDate
        if(isset($request->toDate) && !empty($request->toDate)){
            $expensesQ->whereDate('date', '<=', date('Y-m-d', strtotime($request->toDate)));
        }
        if(empty($request->fromDate) && empty($request->toDate)){
            $expensesQ->whereDate('date', '>=', $startingDate);
        }
        $expenses = $expensesQ->get();
        if(!is_null($expenses)){
            $log = '{"title":"View all expenses.", "body":"View all expenses"}';
            $data = [
                'moduleName'=> 'expenses',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'expensesData' => $expenses]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'expenses not found.']);
    }
    //Single Expense
    public function getExpense(Request $request) {
        $expenses = Expenses::with('paymentMethod', 'paymentType')->where('id', $request->expensesId)->first();
        if(!is_null($expenses)){
            $log = '{"title":"View Expense.", "body":"<b>Date:</b>'.$expenses->date.'<br><b>Amount:</b>'.$expenses->amount.'"}';
            $data = [
                'moduleName'=> 'expenses',
                'moduleId'=> $expenses->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'expensesData' => $expenses]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'expenses not found.']);
    }
    //Add Expenses
    public function addExpenses(Request $request) {   
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'type' => 'required', 
            'method' => 'required',
            'description' => 'required',
            'amount' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        
        $settings = CompanySettings::where(['company_id'=>$request->companyId, 'branch_id'=> $request->branchId, 'setting_name'=> 'prefix'])->first();
        $prefix = json_decode($settings->setting)->purchase_payment;
        $countExpense = Expenses::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->withTrashed()->count();

        $refNo = $prefix.($countExpense+1);

        $expenses = new Expenses;
        $expenses->ref_no = $refNo;
        $expenses->date = date('Y-m-d H:i:s', strtotime($request->date));
        $expenses->payment_type = $request->type;
        $expenses->payment_method = $request->method;
        $expenses->description = $request->description;
        $expenses->amount = $request->amount;  
        $expenses->company_id = $request->companyId;
        $expenses->branch_id = $request->branchId;
        $expenses->created_by = $request->loginId;
        if($expenses->save()){ 
            $log = '{"title":"Expense Created.", "body":"Expense created.<br><b>Date:</b>'.$expenses->date.'<br><b>Amount: </b>'.$expenses->amount.'"}';
            $data = [
                'moduleName'=> 'expenses',
                'moduleId'=> $expenses->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Expenses successfully added.', 'insertId' => $expenses->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Expenses not added.']);
        }
    }
    //Update Expenses
    public function updateExpenses(Request $request) {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'type' => 'required', 
            'method' => 'required',
            'description' => 'required',
            'amount' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $expenses = Expenses::find($request->expensesId);
        $prevData = $expenses->getOriginal();
        $expenses->date = date('Y-m-d H:i:s', strtotime($request->date));
        $expenses->payment_type = $request->type;
        $expenses->payment_method = $request->method;
        $expenses->description = $request->description;
        $expenses->amount = $request->amount;  
        $expenses->save();
        if($expenses->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $expenses->getChanges());
            $log = '{"title":"Expense Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'expenses',
                'moduleId'=> $expenses->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Expenses details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Expenses details not updated.']);
        }
    }
    //Delete Expenses
    public function deleteExpenses(Request $request) {
        $expenses = Expenses::find($request->expensesId);
        if($expenses->delete()){
            $log = '{"title":"Expense Deleted.", "body":"Expense deleted. <br><b>Ref No.:</b>'.$expenses->ref_no.'<br><b>Date:</b>'.$expenses->date.'<br><b>Amount: </b>'.$expenses->amount.'"}';
            $data = [
                'moduleName'=> 'expenses',
                'moduleId'=> $expenses->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Expenses is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Expenses details not deleted.']);
        }
    }
}
