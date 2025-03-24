<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use App\Mail\UserResetPassword;
use App\Mail\UserCreate;
use Illuminate\Support\Facades\Mail;
use App\Models\Users;
use App\Models\UserPasswordReset;

class UsersController extends Controller
{
    public function index() {
        $title='Users';
        return view('admin.settings.users.users-list', compact('title'));
    }
    public function create() {
        $title='Create User';
        return view('admin.settings.users.create', compact('title'));
    }
    public function edit() {
        $title='Edit User';
        return view('admin.settings.users.edit', compact('title'));
    }
    public function view() {
        $title='View User';
        return view('admin.settings.users.view', compact('title'));
    }
    
    // Get Users Infomation
    public function getUsers(Request $request) {
        $users = Users::get(['*'])->makeHidden(['password', 'token']);
        if(is_null($users)){
            return response()->json(['status' => FALSE, 'msg' => 'User not found.']);
        }
        return response()->json(['status' => TRUE, 'usersData' => $users]);
    }
    
    public function getUser(Request $request) {
        $users = Users::with(['role', 'profile'=> function($query){
            $query->orderBy('id', 'DESC');
            $query->limit(1);
        }])->where('id', $request->userId)->first()->makeHidden(['password', 'token', 'permissions']);
        if(is_null($users)){
            return response()->json(['status' => FALSE, 'msg' => 'User not found.']);
        }
        return response()->json(['status' => TRUE, 'userData' => $users]);
    }

    // Get Total Users
    public function getCountUsers(Request $request){
        $inactive = Users::where('status', 0)->get()->count();
        $active = Users::where('status', 1)->get()->count();

        return response()->json(['status' => TRUE, 'usersData' => ['inactive'=>$inactive, 'active'=>$active]]);
    }

    public function addUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'user_role' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $user = new Users;
        $user->title = $request->user_title;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_no = $request->phone_no;
        $user->email = $request->email;
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
    public function updateUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $user = Users::find($request->userId);
        $user->title = $request->user_title;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_no = $request->phone_no;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->status = $request->user_status;
        $user->building_no = $request->building_no;
        $user->street = $request->street;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zipcode = $request->zipcode;
        $user->country = $request->country;
        if(isset($request->user_role)){
            $user->role_id = $request->user_role;
        }
        $user->save();
        if($user->wasChanged()){
            $sendData = ['msg'=>'User Successfully updated.', 'insertId'=>$user->id];
            return response()->json(['status' => TRUE, 'insertData' => $sendData]);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'User not added correctly.']);
        }
    }
    
    public function deleteUser(Request $request) {
        $user = Users::find($request->userId);
    
        if($user->delete()){
            return response()->json(['status' => TRUE, 'msg' => 'User is successfully deleted.']);
        }
        return response()->json(['status' => FALSE, 'msg' => 'User not deleted correctly.']);
    }
    
    Public function sendResetPassword(Request $request){
        $user = Users::find($request->userId);
        $token = Crypt::encryptString($plainTextToken = Str::random(20));
        $userpasswordreset = new UserPasswordReset;
        $userpasswordreset->user_id = $user->id;
        $userpasswordreset->user_token = $token;
        $userpasswordreset->save();
        $url = URL::temporarySignedRoute('users.resetpasswordverify', now()->addMinutes(30), ['user' => $token]);
        $details = [
            'name' => $user->first_name.' '.$user->last_name,
            'url' => $url
        ];
        Mail::to($user->email)->send(new UserResetPassword($details));
 
        if (Mail::failures()) {
            return response()->json(['status' => FALSE, 'msg' => 'Sorry! Please try again latter.']);
        }else{
            return response()->json(['status' => TRUE, 'msg' => 'Reset password request mail successfully sended.']);
        }
    }

    public function resetPasswordVerify(Request $request, $user){
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        $userpasswordreset = UserPasswordReset::where('user_token', $user)->first();
        if($userpasswordreset->is_reset == 0){
            return view('users.resetpassword', ['userId'=> $user]);
        }else{
            return view('users.resetedpassword');
        }
        
    }

    public function resetPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'errorData' => ['msg'=>'fields are required', 'errors'=>$validator->errors()]]);
        }
        $userpasswordreset = UserPasswordReset::where('user_token', $request->userToken)->first();

        $user = Users::find($userpasswordreset->user_id);
        $user->password = Hash::make($request->newPassword);
        $user->email_verified = date('Y-m-d H:i:s');
        $user->status = 1;
        $user->save();
        if($user->wasChanged()){
            $userpasswordreset->is_reset = 1;
            $userpasswordreset->save();
            return response()->json(['status' => TRUE, 'msg' => 'Password changed.']); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Password not changed.']);
        }
    }

    public function accountVerify(Request $request, $user){
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        $users = Users::find($user);
        if($users->email_verified != null){
            return view('users.accountverified');
        }
        $users->email_verified = date('Y-m-d H:i:s');
        $users->status = 1;
        $users->save();
        $token = Crypt::encryptString($plainTextToken = Str::random(20));
        $userpasswordreset = new UserPasswordReset;
        $userpasswordreset->user_id = $users->id;
        $userpasswordreset->user_token = $token;
        $userpasswordreset->save();
        $url = URL::temporarySignedRoute('users.resetpasswordverify', now()->addMinutes(30), ['user' => $token]);
        return view('users.accountverify', ['url'=> $url]);
    }
    
}
