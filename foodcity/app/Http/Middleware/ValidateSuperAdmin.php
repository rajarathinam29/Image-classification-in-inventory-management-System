<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\Admins;

class ValidateSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $admin = Admins::where(['id' => $request->loginId, 'token' => $request->loginToken])->first();
//        print_r($users);
        if(!is_null($admin)){
            if($admin->status == 1){
                return $next($request); 
            }else{
                return response()->json(array('status' => FALSE, 'msg' => 'Credentials Terminated.'));
            }
        }else{ 
            return response()->json(array('status' => FALSE, 'msg' => 'Access denied.'));
        }
    }
}
