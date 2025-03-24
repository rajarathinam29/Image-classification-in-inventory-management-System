<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\Admins;

class SuperAdminLoginController extends Controller
{
    //Admin login 
    public function index() {
        return view('superadmin.login');
    }
    //admin lockscreen
    public function lockscreen() {
        return view('users.user-lockscreen');
    }
    // admin choose branches
    public function selectBranch() {
        
        return view('users.selectBranch');
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
        $admin = Admins::where('user_name', $request->userName)->first();
        if(!is_object($admin)){
            return response()->json(['status' => FALSE, 'msg' => 'Credentials is wrong.']);
        }
        if (Hash::check($request->password, $admin->password)) {
            if($admin->status !== 1){
                return response()->json(['status' => FALSE, 'msg' => 'User Access Terminated.']);
            }
            $token = $this->generateToken();
            $admin->token = $token;
            $admin->last_login = date('Y-m-d H:i:s');
            $admin->save();
            if($admin->wasChanged()){
                $sessionAdmin = [
                    'id' => $admin->id,
                    'title' => $admin->title,
                    'f_name' => $admin->first_name,
                    'l_name' => $admin->last_name,
                    'email'=> $admin->email,
                    'token' => $token,
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
