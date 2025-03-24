<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Revenues;
use App\Models\Companies;
use App\Models\CompanySettings;

class RevenueController extends Controller
{
    public function index() {
        return view('admin.revenue.revenue-list', ['title'=> 'Revenue']);
    }
    public function create() {
        return view('admin.revenue.create', ['title'=> 'Create Revenue']);
    }
    public function edit() {
        return view('admin.revenue.edit', ['title'=> 'Edit Revenue']);
    }
    public function view() {
        return view('admin.revenue.view', ['title'=> 'View Revenue']);
    }
    //All Revenue
    public function getRevenues(Request $request) {
        $company = Companies::find($request->companyId);
        $year = date('Y');
        if(date('m')<$company->starting_month){
            $year = date("Y", strtotime("-1 year"));
        }

        $startingDate = date('Y-m-1', strtotime($year.'-'.$company->starting_month.'-1'));

        $revenueQ = Revenues::where(['company_id' => $request->companyId, 'branch_id' => $request->branchId])->orderBy('id', 'DESC');
        // isser From date
        if(isset($request->fromDate) && !empty($request->fromDate)){
            $revenueQ->whereDate('date', '>=', date('Y-m-d', strtotime($request->fromDate)));
        }
        // isset toDate
        if(isset($request->toDate) && !empty($request->toDate)){
            $revenueQ->whereDate('date', '<=', date('Y-m-d', strtotime($request->toDate)));
        }

        if(empty($request->fromDate) && empty($request->toDate)){
            $revenueQ->whereDate('date', '>=', $startingDate);
        }
        $revenue = $revenueQ->get();
        if(!is_null($revenue)){
            $log = '{"title":"View all revenues.", "body":"View all revenues"}';
            $data = [
                'moduleName'=> 'revenues',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'revenueData' => $revenue]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'revenue not found.']);
    }
    //Single Revenue
    public function getRevenue(Request $request) {
        $revenue = Revenues::with('paymentMethod', 'paymentType')->where('id', $request->revenueId)->first();
        if(!is_null($revenue)){
            $log = '{"title":"View Revenue.", "body":"<b>date:</b>'.$revenue->date.'<br><b>Amount:</b>'.$revenue->amount.'"}';
            $data = [
                'moduleName'=> 'revenues',
                'moduleId'=> $revenue->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'revenueData' => $revenue]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'revenue not found.']);
    }
    //Add Revenue
    public function addRevenue(Request $request) {   
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
        //company Setting 
        $settings = CompanySettings::where(['company_id'=>$request->companyId, 'branch_id'=> $request->branchId, 'setting_name'=> 'prefix'])->first();
        $revenuePrefix = json_decode($settings->setting)->revenues;
        $countRevenue = Revenues::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->withTrashed()->count();

        $refNoRe = $revenuePrefix.($countRevenue+1);
        $revenue = new Revenues;
        $revenue->ref_no = $refNoRe;
        $revenue->date = date('Y-m-d H:i:s', strtotime($request->date));
        $revenue->payment_type = $request->type;
        $revenue->payment_method = $request->method;
        $revenue->description = $request->description;
        $revenue->amount = $request->amount;  
        $revenue->company_id = $request->companyId;
        $revenue->branch_id = $request->branchId;
        $revenue->created_by = $request->loginId;
        if($revenue->save()){ 
            $log = '{"title":"Revenue Created.", "body":"Revenue created.<br><b>Date:</b>'.$revenue->date.'<br><b>Amount: </b>'.$revenue->amount.'"}';
            $data = [
                'moduleName'=> 'revenues',
                'moduleId'=> $revenue->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Revenue successfully added.', 'insertId' => $revenue->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Revenue not added.']);
        }
    }
    //Update Revenue
    public function updateRevenue(Request $request) {
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
        $revenue = Revenues::find($request->revenueId);
        $prevData = $revenue->getOriginal();
        $revenue->date = $request->date;
        $revenue->payment_type = $request->type;
        $revenue->payment_method = $request->method;
        $revenue->description = $request->description;
        $revenue->amount = $request->amount;  
        $revenue->save();
        if($revenue->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $revenue->getChanges());
            $log = '{"title":"Revenue Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'revenues',
                'moduleId'=> $revenue->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Revenue details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Revenue details not updated.']);
        }
    }
    //Delete Revenue
    public function deleteRevenue(Request $request) {
        $revenue = Revenues::find($request->revenueId);
        if($revenue->delete()){
            $log = '{"title":"Revenue Deleted.", "body":"Revenue deleted. <br><b>Date:</b>'.$revenue->date.'<br><b>Amount: </b>'.$revenue->amount.'"}';
            $data = [
                'moduleName'=> 'revenues',
                'moduleId'=> $revenue->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Revenue is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Revenue details not deleted.']);
        }
    }
}
