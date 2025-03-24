<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules;

class ModuleController extends Controller
{
    public function getModules(Request $request){
        $modules = Modules::with('modulessub')->whereIn('access_by', ['Users', 'All'])->orderBy('module_name', 'ASC')->get();
        if(!is_null($modules)){
            return response()->json(['status' => TRUE, 'modulesData' => $modules]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Module not found.']);
    }

    public function getAdminModules(Request $request){
        $modules = Modules::with('modulessub')->whereIn('access_by', ['Admins', 'All'])->get();
        if(!is_null($modules)){
            return response()->json(['status' => TRUE, 'modulesData' => $modules]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Module not found.']);
    }
}
