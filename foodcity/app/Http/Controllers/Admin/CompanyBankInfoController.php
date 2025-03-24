<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CompanyBankInfo;

class CompanyBankInfoController extends Controller
{
    public function getCompanyBankInfo(Request $request){
        $companyBank = CompanyBankInfo::with('bank', 'bankBranch')->where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->get();

        if(count($companyBank)>0){
            return response()->json(['status' => TRUE, 'companyBanksData' => $companyBank]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Banks not found.']);
    }

    public function addCompanyBank(Request $request){
        $validator = Validator::make($request->all(), [
            'bankId' => 'required',
            'bankBranchId' => 'required', 
            'bankAccountNo' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $companyBank = new CompanyBankInfo;
        $companyBank->bank_id = $request->bankId;
        $companyBank->bank_branch_id = $request->bankBranchId;
        $companyBank->bank_account_no = $request->bankAccountNo;
        $companyBank->company_id = $request->companyId;
        $companyBank->branch_id = $request->branchId;
        $companyBank->created_by = $request->loginId;
        
        if($companyBank->save()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Bank info successfully added.', 'insertId' => $companyBank->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Bank info not added.']);
        }
    }

    public function updateCompanyBank(Request $request){
        $validator = Validator::make($request->all(), [
            'bankId' => 'required',
            'bankBranchId' => 'required', 
            'bankAccountNo' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $companyBank = CompanyBankInfo::find($request->companyBankId);
        $companyBank->bank_id = $request->bankId;
        $companyBank->bank_branch_id = $request->bankBranchId;
        $companyBank->bank_account_no = $request->bankAccountNo;
        $companyBank->save();
        if($companyBank->wasChanged()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Bank info successfully updated.']); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Bank info not updated.']);
        }
    }

    public function deleteCompanyBank(Request $request){
        $companyBank = CompanyBankInfo::find($request->companyBankId);
        if($companyBank->delete()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Bank info successfully deleted.']); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Bank info not deleted.']);
        }
    }
}
