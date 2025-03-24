<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Branches;
use App\Models\Users;

class BranchesController extends Controller
{
    
    public function create() {
        return view('superadmin.branch.create', ['title'=> 'Create Branch']);
    }
    public function edit() {
        return view('superadmin.branch.edit', ['title'=> 'Edit Branch']);
    }
    
    public function getBranches(Request $request) {
        $branches = Branches::where('company_id', $request->companyId)->get();
        if(!is_null($branches)){
            return response()->json(['status' => TRUE, 'branchesData' => $branches]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Branch not found.']);
    }
    
    public function getBranch(Request $request) {
        $branch = Branches::where('id', $request->branchId)->first();
        if(!is_null($branch)){
            return response()->json(['status' => TRUE, 'branchData' => $branch]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Branch not found.']);
    }

    public function getClientBranches(Request $request) {
        $branches = [];
        $user = Users::find($request->loginId);
        if($user->role_id == 1){
            $branches = Branches::where('company_id', $request->companyId)->get();
        }else{
            $branches = Branches::where('id', $request->branchId)->get();
        }
        
        if(!is_null($branches)){
            return response()->json(['status' => TRUE, 'branchesData' => $branches]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Branch not found.']);
    }

    // Get Total Users
    public function getCountBranches(Request $request){
        $inactive = Branches::where(['status'=> 0, 'company_id' => $request->companyId])->get()->count();
        $active = Branches::where(['status'=>1, 'company_id' => $request->companyId])->get()->count();

        return response()->json(['status' => TRUE, 'branchesData' => ['inactive'=>$inactive, 'active'=>$active]]);
    }
    public function addBranch(Request $request) {   
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'branch_name' => 'required',
            'phone_no' => 'required|min:11',
            'email' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $branch = new Branches;
        $branch->company_id = $request->company_id;
        $branch->branch_name = $request->branch_name;
        $branch->phone_no = $request->phone_no;
        $branch->email = $request->email;
        $branch->building_no = $request->building_no;
        $branch->street = $request->street;
        $branch->city = $request->city;
        $branch->state = $request->state;
        $branch->zipcode = $request->zipcode;
        $branch->country = $request->country;
        $branch->description = $request->description;
        $branch->status = $request->status;
        if($branch->save()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Branch successfully added.', 'insertId' => $branch->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Branch not added.']);
        }
    }
    
    public function updateBranch(Request $request) {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'branch_name' => 'required',
            'phone_no' => 'required|min:11',
            'email' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $branch = Branches::find($request->branchId);
        $prevData = $branch->getOriginal();
        $branch->branch_name = $request->branch_name;
        $branch->phone_no = $request->phone_no;
        $branch->email = $request->email;
        $branch->building_no = $request->building_no;
        $branch->street = $request->street;
        $branch->city = $request->city;
        $branch->state = $request->state;
        $branch->zipcode = $request->zipcode;
        $branch->country = $request->country;
        $branch->description = $request->description;
        $branch->status = $request->status;
        $branch->save();
        if($branch->wasChanged()){
            return response()->json(['status' => TRUE, 'msg' => 'Branch details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Branch details not updated.']);
        }
    }
    
    public function deleteBranch(Request $request) {
        $branch = Branches::find($request->branchId);
        if($branch->delete()){
            return response()->json(['status' => TRUE, 'msg' => 'Branch is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Branch details not deleted.']);
        }
    }
}
