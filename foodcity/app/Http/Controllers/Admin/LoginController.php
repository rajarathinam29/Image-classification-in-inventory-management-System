<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Models\UserCompanies;

class LoginController extends Controller
{
    //Admin login 
    public function index() {
        return view('admin.settings.users.login');
    }
    //admin lockscreen
    public function lockscreen() {
        return view('users.user-lockscreen');
    }
    // admin choose Company
    public function selectCompany() {
        return view('admin.settings.users.selectcompany');
    }
    // admin choose Branch
    public function selectBranch() {
        return view('admin.settings.users.selectbranch');
    }
    // Get user's active  branches 
    public function userBranches(Request $request){
        $companies = UserCompanies::leftJoin('companies', 'companies.id', '=', 'users_companies.company_id')
        ->where('users_companies.user_id', $request->userId)
        ->where('companies.status', 1)
        ->get(['users_companies.*', 'companies.name as company_name']);
        $companies ? $this->sendData(TRUE, $companies, 'companyData') : $this->sendData(FALSE, 'Companies not found.');
    }
    // login
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
                'userName' => 'required',
                'password' => 'required',
            ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors' => $validator->errors()]);
        }
        $users = Users::with(['role', 'profile'=> function($query){
            $query->orderBy('id', 'DESC');
            $query->limit(1);
        }])->where('user_name', $request->userName)->first();
        if(!is_object($users)){
            return response()->json(['status' => FALSE, 'msg' => 'Credentials is wrong.']);
        }
        if (Hash::check($request->password, $users->password)) {
            if($users->status !== 1){
                return response()->json(['status' => FALSE, 'msg' => 'User Access Terminated.']);
            }
            $token = $this->generateToken();
            $users->token = $token;
            $users->last_login = date('Y-m-d H:i:s');
            $users->save();
            if($users->wasChanged()){
                $sessionAdmin = [
                    'id' => $users->id,
                    'title' => $users->title,
                    'f_name' => $users->first_name,
                    'l_name' => $users->last_name,
                    'email'=> $users->email,
                    'role_id' => $users->role_id,
                    'role_name'=>$users->role->role_name,
                    'token' => $token,
                    'profile' => $users->profile
                ];
                // session(['dailyfoodcity' => $sessionAdmin]);
                // Cookie::queue('DailyFoodCity', $sessionAdmin, 120);
                return response()->json(['status' => TRUE, 'userData' => $sessionAdmin]);
            }else{
                return response()->json(['status' => FALSE, 'msg' => 'User access token uncompleted.']);
            }
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Credentials not matched.']);
        }
    }
    
    private function generateToken(){
        $token = Crypt::encryptString($plainTextToken = Str::random(40));
        return $token;
    }
}
