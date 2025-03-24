<?php

namespace App\Http\Controllers\Admin\Cheque;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ChequeReceived;
use App\Models\Banks;

class ChequeReceivedController extends Controller
{
    public function index(){
        return view('admin.cheque.received.cheque-list', ['title'=> 'Received Cheques']);
    }

    public function edit(){
        return view('admin.cheque.received.edit', ['title'=> 'Edit Cheque']);
    }

    public function view() {
        return view('admin.cheque.received.view', ['title'=> 'View Cheques']);
    }
    
    public function getCheques(Request $request){
        $cheques = ChequeReceived::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId, 'cheque_status'=>$request->status])->get();

        foreach($cheques as $cheque){
            $bankInfo = Banks::where('id', $cheque->bank_id)->first();
            $cheque->bank_name = $bankInfo->bank_name;
        }

        if(count($cheques)>0){
            return response()->json(['status' => TRUE, 'chequesData' => $cheques]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Cheques not found.']);
    }

    public function getCheque(Request $request) {
        $cheques = ChequeReceived::where('id', $request->chequesId)->first();
        if(!is_null($cheques)){
            return response()->json(['status' => TRUE, 'chequesData' => $cheques]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'cheque not found.']);
    }

    public function addCheque(Request $request){
        $validator = Validator::make($request->all(), [
            'chequeNo' => 'required',
            'issueDate' => 'required', 
            'effectiveDate' => 'required',
            'amount' => 'required',
            'payeeName' => 'required',
            'issueTo' => 'required',
            'bankId' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $cheque = new ChequeReceived;
        $cheque->cheque_no = $request->chequeNo;
        $cheque->issue_date = $request->issueDate;
        $cheque->effective_date = $request->effectiveDate;
        $cheque->amount = $request->amount;
        $cheque->payee_name = $request->payeeName;
        $cheque->refference = $request->refference;
        $cheque->issue_to = $request->issueTo;
        $cheque->issue_id = $request->issueId;
        $cheque->cheque_status = $request->chequeStatus;
        $cheque->bank_id = $request->bankId;
        $cheque->company_id = $request->companyId;
        $cheque->branch_id = $request->branchId;
        $cheque->created_by = $request->loginId;
        
        if($cheque->save()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Cheque successfully added.', 'insertId' => $cheque->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Cheque not added.']);
        }
    }

    public function updateCheque(Request $request){
        $validator = Validator::make($request->all(), [
            'chequeNo' => 'required',
            'issueDate' => 'required', 
            'effectiveDate' => 'required',
            'amount' => 'required',
            'payeeName' => 'required',
            // 'issueTo' => 'required',
            'bankId' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $cheque = ChequeReceived::find($request->chequesId);
        $cheque->cheque_no = $request->chequeNo;
        $cheque->issue_date = $request->issueDate;
        $cheque->effective_date = $request->effectiveDate;
        $cheque->amount = $request->amount;
        $cheque->payee_name = $request->payeeName;
        $cheque->refference = $request->refference;
        // $cheque->issue_to = $request->issueTo;
        // $cheque->issue_id = $request->issueId;
        if(isset($request->chequeStatus))
            $cheque->cheque_status = $request->chequeStatus;
        $cheque->bank_id = $request->bankId;
        $cheque->save();
        if($cheque->wasChanged()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Cheque successfully updated.']); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Cheque not updated.']);
        }
    }

    public function deleteCheque(Request $request){
        $cheque = ChequeReceived::find($request->chequeId);
        if($cheque->delete()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Cheque successfully deleted.']); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Cheque not deleted.']);
        }
    }

    public function changeStatus(Request $request){
        $validator = Validator::make($request->all(), [
            'status' => 'required', 
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $cheque = ChequeReceived::find($request->chequeId);
        $cheque->cheque_status = $request->status;
        $cheque->save();
        if($cheque->wasChanged()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Cheque status successfully changed.']); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Changes not found.']);
        }
    }
}
