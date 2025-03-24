<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Banks;
use App\Models\BankBranches;

class BanksController extends Controller
{
    public function index() {
        return view('superadmin.banks.banks-list', ['title'=> 'Banks']);
    }
    public function create() {
        return view('superadmin.banks.create', ['title'=> 'Create Banks']);
    }
    public function edit() {
        return view('superadmin.banks.edit', ['title'=> 'Edit Banks']);
    }
    public function view() {
        return view('superadmin.banks.view', ['title'=> 'View Banks']);
    }

    public function getBanks(Request $request){
        $banks = Banks::orderBy('bank_name', 'ASC')->get();

        if(count($banks)>0){
            return response()->json(['status' => TRUE, 'banksData' => $banks]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Banks not found.']);
    }

    public function getBank(Request $request){
        $bank = Banks::find($request->bankId);

        if(!is_null($bank)){
            return response()->json(['status' => TRUE, 'bankData' => $bank]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Bank not found.']);
    }

    public function addBank(Request $request){
        $validator = Validator::make($request->all(), [
            'bankCode' => 'required',
            'bankName' => 'required', 
            'country' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $bank = new Banks;
        $bank->bank_code = $request->bankCode;
        $bank->bank_name = $request->bankName;
        $bank->short_name = $request->shortName;
        $bank->country = $request->country;
        $bank->cheque_templete = $request->template?$request->template:null;
        
        if($bank->save()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Bank successfully added.', 'insertId' => $bank->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Bank not added.']);
        }
    }

    public function updateBank(Request $request){
        $validator = Validator::make($request->all(), [
            'bankCode' => 'required',
            'bankName' => 'required', 
            'country' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $bank = Banks::find($request->bankId);
        $bank->bank_code = $request->bankCode;
        $bank->bank_name = $request->bankName;
        $bank->short_name = $request->shortName;
        $bank->country = $request->country;
        $bank->cheque_templete = $request->template?$request->template:null;
        $bank->save();
        if($bank->wasChanged()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Bank successfully updated.']); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Bank not updated.']);
        }
    }

    public function deleteBank(Request $request){
        
        $bank = Banks::find($request->bankId);
        if($bank->delete()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Bank successfully deleted.']); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Bank not deleted.']);
        }
    }

    // Bank Branches
    public function getBankBranches(Request $request){
        $bankBranches = BankBranches::where('bank_id', $request->bankId)->orderBy('branch_name', 'ASC')->get();

        if(count($bankBranches)>0){
            return response()->json(['status' => TRUE, 'bankBranchesData' => $bankBranches]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Bank Branches not found.']);
    }

    public function getBankBranch(Request $request){
        $bankBranches = BankBranches::where('bank_id', $request->bankId)->orderBy('branch_name', 'ASC')->get();

        if(count($bankBranches)>0){
            return response()->json(['status' => TRUE, 'bankBranchesData' => $bankBranches]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Bank Branches not found.']);
    }

    public function addBranch(Request $request){
        $validator = Validator::make($request->all(), [
            'bankId' => 'required',
            'branchCode' => 'required',
            'branchName' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $branch = new BankBranches;
        $branch->bank_id = $request->bankId;
        $branch->branch_code = $request->branchCode;
        $branch->branch_name = $request->branchName;
        
        if($branch->save()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Branch successfully added.', 'insertId' => $branch->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Branch not added.']);
        }
    }

    public function updateBranch(Request $request){
        $validator = Validator::make($request->all(), [
            'bankId' => 'required',
            'branchCode' => 'required',
            'branchName' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $branch = BankBranches::find($request->branchId);
        $branch->bank_id = $request->bankId;
        $branch->branch_code = $request->branchCode;
        $branch->branch_name = $request->branchName;
        $branch->save();
        if($branch->wasChanged()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Branch successfully updated.']); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Branch not updated.']);
        }
    }

    public function deleteBranch(Request $request){
        $branch = BankBranches::find($request->bankId);
        if($branch->delete()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Bank successfully deleted.']); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Bank not deleted.']);
        }
    }
}
