<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserRole;

class UserRoleController extends Controller
{
    public function getUserRole(){
        $role = UserRole::all();
        if(is_null($role)){
            return response()->json(['status' => FALSE, 'msg' => 'Role not found.']);
        }
        return response()->json(['status' => TRUE, 'roleData' => $role]);
    }
}
