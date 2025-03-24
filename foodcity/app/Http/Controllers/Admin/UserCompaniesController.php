<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\UserCompanies;
use App\Models\Companies;
use App\Models\Users;
use App\Models\Currency;

class UserCompaniesController extends Controller
{
    public function create() {
        return view('admin.usercompanies.create', ['title'=> 'Assign Company']);
    }
    public function setpermissionview() {
        return view('admin.usercompanies.setpermission', ['title'=> 'Set Permission']);
    }
    public function superAdminsetpermissionview() {
        return view('superadmin.usercompanies.setpermission', ['title'=> 'Set Permission']);
    }

    // Get companies only
    public function getCompaniesOnly(Request $request){
        $companies = [];
        $query = UserCompanies::with('company');

        if(isset($request->userId) && !empty($request->userId))
            $query->where('user_id', $request->userId);
        
        // if(isset($request->companyId) && !empty($request->companyId))
        //     $query->where('company_id', $request->companyId);

        $userCompanies = $query->get();
        $userCompanies = $userCompanies->unique('company_id');
        foreach($userCompanies as $row){
            $company =  $row->company;
            $company->currency = Currency::find($company->currency_id);
            array_push($companies, $company);
        }
        if(!is_null($companies)){
            return response()->json(['status' => TRUE, 'companiesData' => $companies]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Company not assigned.']);
    }

    // Get all companies for user
    public function getCompanies(Request $request){
        $query = UserCompanies::with('company','branch');

        if(isset($request->userId) && !empty($request->userId))
            $query->where('user_id', $request->userId);
        if(isset($request->companyId) && !empty($request->companyId))
            $query->where('company_id', $request->companyId);

        $companies = $query->get();
        if(!is_null($companies)){
            return response()->json(['status' => TRUE, 'companiesData' => $companies]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Company not assigned.']);
    }

    // Get all company branches for user
    public function getBranch(Request $request){
        $companies = UserCompanies::with('company','branch')->where(['user_id'=>$request->userId, 'company_id'=>$request->companyId])->get();
        if(!is_null($companies)){
            return response()->json(['status' => TRUE, 'branchesData' => $companies]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Branch not assigned.']);
    }

    // Get all branch user
    public function getBranchUsers(Request $request){
        $users = UserCompanies::with('user')->where(['branch_id'=>$request->branchId, 'company_id'=>$request->companyId])->get();
        if(!is_null($users)){
            return response()->json(['status' => TRUE, 'usersData' => $users]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'users not assigned to this branch.']);
    }

    // Get all users for company
    public function getUsers(Request $request){
        $users = UserCompanies::with('user','branch')->where('company_id', $request->companyId)->get();
        if(!is_null($users)){
            return response()->json(['status' => TRUE, 'usersData' => $users]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Company not assigned.']);
    }

    // Get user company 
    public function getUserCompany(Request $request){
        $usercompany = UserCompanies::with('user','branch', 'company')->find($request->userCompanyId);
        if(!is_null($usercompany)){
            return response()->json(['status' => TRUE, 'userCompanyData' => $usercompany]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Company not assigned.']);
    }

    public function addUser(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'user_role' => 'required',
            'companyId' => 'required',
            'branchId' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $company = Companies::find($request->companyId);
        $usersCount = UserCompanies::where(['company_id'=>$request->companyId])->get()->unique('user_id');
        if($company->user_limit<=count($usersCount)){
            return response()->json(['status' => FALSE, 'msg'=>'User Limit Reached.']);
        }
        $user = new Users;
        $user->title = $request->user_title;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_no = $request->phone_no;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->password = Hash::make('123456');
        $user->status = $request->user_status;
        $user->building_no = $request->building_no;
        $user->street = $request->street;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zipcode = $request->zipcode;
        $user->country = $request->country;
        $user->role_id = $request->user_role;
        $user->status = $request->user_status;
    
        if($user->save()){
            $usercompanies = new UserCompanies;
            $usercompanies->user_id = $user->id;
            $usercompanies->company_id = $request->companyId;
            $usercompanies->branch_id = $request->branchId;
            $usercompanies->status = $request->user_status;
            $usercompanies->save();
            // $url = URL::temporarySignedRoute('users.accountverify', now()->addMinutes(24*60), ['user' => $user->id]);
            // $details = [
            //     'name' => $user->first_name.' '.$user->last_name,
            //     'url' => $url
            // ];
            // Mail::to($user->email)->send(new UserCreate($details));
            $msg = 'User Successfully added.';
            // if (Mail::failures()) {
            //     $msg = 'User Successfully added. but Mail not send';
            // }
            $sendData = ['msg'=>$msg, 'insertId'=>$user->id];
            return response()->json(['status' => TRUE, 'insertData' => $sendData]);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'User not added correctly.']);
        }
    }

    public function addUserCompanies(Request $request) {   
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'user_id' => 'required',
            'branch_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 

        $existComapany = UserCompanies::where(['user_id'=>$request->user_id, 'company_id'=>$request->company_id, 'branch_id'=>$request->branch_id])->exists();
        if($existComapany){
            return response()->json(['status' => FALSE, 'msg' => 'Company or branch already assigned.']);
        }
        $usercompanies = new UserCompanies;
        $usercompanies->user_id = $request->user_id;
        $usercompanies->company_id = $request->company_id;
        $usercompanies->branch_id = $request->branch_id;
        $usercompanies->status = $request->status;
        if($usercompanies->save()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Company successfully assigned.', 'insertId' => $usercompanies->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Company not assigned.']);
        }
    }
    
    public function setPermission(Request $request) {
        $validator = Validator::make($request->all(), [
            'permissions' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg' => 'fields are required', 'errors' => $validator->errors()]);
        } 
        $userCompanies = UserCompanies::find($request->userCompanyId);
        $prevData = $userCompanies->getOriginal();
        $userCompanies->permissions = $request->permissions;
        $userCompanies->save();
        if($userCompanies->wasChanged()){
            return response()->json(['status' => TRUE, 'msg' => 'Company permission successfully set.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'permission not change.']);
        }
    }

    public function setDefault(Request $request) {
        UserCompanies::where('user_id', $request->userId)->update(['default_company' => 0]);
        
        $userCompanies = UserCompanies::find($request->userCompanyId);
        $prevData = $userCompanies->getOriginal();
        $userCompanies->default_company = 1;
        $userCompanies->save();
        if($userCompanies->wasChanged()){
            return response()->json(['status' => TRUE, 'msg' => 'Successfully set as default.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Not set as default.']);
        }
    }
    
    public function deleteUserCompany(Request $request) {
        $userCompany = UserCompanies::find($request->userCompanyId);
        if($userCompany->delete()){
            return response()->json(['status' => TRUE, 'msg' => 'Company is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Company details not deleted.']);
        }
    }
}
