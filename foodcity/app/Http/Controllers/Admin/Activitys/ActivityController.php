<?php

namespace App\Http\Controllers\Admin\Activitys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

class ActivityController extends Controller
{
    public function index() {
        return view('admin.activity.activity-list', ['title'=> 'Activity Logs']);
    }

    public function getLogsData(Request $request){
        $limit = 100;
        $offset = isset($request->totalLogs) ? $request->totalLogs : 0;
        $where =['company_id'=> $request->companyId, 'branch_id'=>$request->branchId];

        //if isset user
        if(isset($request->sltUser) && !empty($request->sltUser)){
            $where['created_by'] = $request->sltUser;
        }

        //if isset module
        if(isset($request->sltModule) && !empty($request->sltModule)){
            $where['module'] = $request->sltModule;
        }

        //if isset from date
        if(isset($request->fromDate) && !empty($request->fromDate)){
            $where[] = ['date_time','>=', date('Y-m-d H:i:s', strtotime($request->fromDate))];
        }

        //if isset to date
        if(isset($request->toDate) && !empty($request->toDate)){
            $where[] = ['date_time','<=', date('Y-m-d H:i:s', strtotime($request->toDate))];
        }
        
        if(isset($request->limit) && !empty($request->limit)){
            $limit = $request->limit;
        }
        $countLogs = ActivityLog::where($where)->count();

        $logs = ActivityLog::with(['user' => function($query){
            $query->select(['id', 'first_name', 'last_name']);
        }])->where($where)->offset($offset)->limit($limit)->orderBy('date_time', 'desc')->get();

        if(is_null($logs)){
            return response()->json(['status' => FALSE, 'msg' =>'Logs not found']);
        }
        // $logs = array_reverse($logs);
        return response()->json(['status' => TRUE, 'logData' =>$logs, 'countLogs'=>$countLogs]);
    }

    public function getModules(Request $request){
        $modules = ActivityLog::select('module')->where(['company_id'=> $request->companyId, 'branch_id'=>$request->branchId])->distinct()->orderBy('module')->get();
        if(is_null($modules)){
            return response()->json(['status' => FALSE, 'msg' =>'Module not found']);
        }
        return response()->json(['status' => TRUE, 'modulesData' =>$modules]);
    }
}
