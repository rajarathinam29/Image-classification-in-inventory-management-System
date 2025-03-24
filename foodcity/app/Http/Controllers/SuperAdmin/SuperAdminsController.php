<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Admins;

class SuperAdminsController extends Controller
{
    public function index() {
        $title='Admins';
        return view('superadmin.admins.users-list', compact('title'));
    }
    public function create() {
        $title='Create Admin';
        return view('superadmin.admins.create', compact('title'));
    }
    public function edit() {
        $title='Edit Admin';
        return view('superadmin.admins.edit', compact('title'));
    }
    public function view() {
        $title='View Admin';
        return view('superadmin.admins.view', compact('title'));
    }
    public function setPermission(Request $request) {
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'permissions' => 'required',
            ]);
            if($validator->fails()){
                return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
            }
            $user = Admins::find($request->adminId);
            $user->permissions = $request->permissions;
            $user->save();
            if($user->wasChanged()){
                $sendData = ['msg'=>'User Successfully updated.', 'insertId'=>$user->id];
                return response()->json(['status' => TRUE, 'msg'=>'Permission Successfully Seted.']);
            }else{
                return response()->json(['status' => FALSE, 'msg' => 'Changes not found.']);
            }
        }else{
            $title='Set Admin Permission';
            return view('superadmin.admins.setpermission', compact('title'));
        }
    }

    // Get Users Infomation
    public function getUsers(Request $request) {
        $admins = Admins::get(['*'])->makeHidden(['password', 'token']);
        if(is_null($admins)){
            return response()->json(['status' => FALSE, 'msg' => 'Admin not found.']);
        }
        return response()->json(['status' => TRUE, 'adminsData' => $admins]);
    }
    
    public function getUser(Request $request) {
        $admins = Admins::where('id', $request->adminId)->first();
        if(is_null($admins)){
            return response()->json(['status' => FALSE, 'msg' => 'Admin not found.']);
        }
        return response()->json(['status' => TRUE, 'adminData' => $admins]);
    }

    public function getPermission(Request $request) {
        $admins = Admins::where('id', $request->adminId)->select('first_name','Permissions')->first();
        if(is_null($admins)){
            return response()->json(['status' => FALSE, 'msg' => 'Admin not found.']);
        }
        return response()->json(['status' => TRUE, 'adminData' => $admins]);
    }

    public function addUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'user_name' => 'required|unique:admins,user_name',
            'phone_no' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $user = new Admins;
        $user->title = $request->user_title;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_no = $request->phone_no;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->building_no = $request->building_no;
        $user->street = $request->street;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zipcode = $request->zipcode;
        $user->country = $request->country;
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
            return response()->json(['status' => TRUE, 'msg'=>$msg, 'insertId'=>$user->id]);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'User not added correctly.']);
        }
    }
    public function updateUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$request->adminId,
            'user_name' => 'required|unique:admins,user_name,'.$request->adminId,
            'phone_no' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }
        $user = Admins::find($request->adminId);
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
        $user->save();
        if($user->wasChanged()){
            $sendData = ['msg'=>'User Successfully updated.', 'insertId'=>$user->id];
            return response()->json(['status' => TRUE, 'insertData' => $sendData]);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Changes not found.']);
        }
    }

    public function deleteUser(Request $request) {
        $user = Users::find($request->userId);
    
        if($user->delete()){
            return response()->json(['status' => TRUE, 'msg' => 'User is successfully deleted.']);
        }
        return response()->json(['status' => FALSE, 'msg' => 'User not deleted correctly.']);
    }

}
