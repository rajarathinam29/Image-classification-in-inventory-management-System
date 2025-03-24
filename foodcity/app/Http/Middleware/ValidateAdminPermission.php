<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserCompanies;

class ValidateAdminPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$permission)
    {
        $companies = UserCompanies::where(['user_id' => $request->loginId, 'company_id' => $request->companyId ,'branch_id'=>$request->branchId,])->first();
        $permissions = json_decode($companies->permissions);
        
        if(is_null($permissions)){
            return response()->json(array('status' => FALSE, 'msg' => 'Permission declined.'));
        }
        foreach($permission as $per){
            if(isset($permissions->$per) && $permissions->$per == 'on' && $companies->status == 1){
                return $next($request);
            }
        }
        
        // if($permission == 'admin'){
        //     if($companies->user_role == 1){
        //         return $next($request);
        //     }
        // }
        return response()->json(array('status' => FALSE, 'msg' => 'User access denied.'));
    }
}
