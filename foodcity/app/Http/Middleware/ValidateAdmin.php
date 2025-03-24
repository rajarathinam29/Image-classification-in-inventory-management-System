<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\Users;

class ValidateAdmin
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
        $users = Users::where(['id' => $request->loginId, 'token' => $request->loginToken])->first();
//        print_r($users);
        if(!is_null($users)){
            if($users->status == 1){
                return $next($request); 
            }else{
                return response()->json(array('status' => FALSE, 'msg' => 'User account Terminated.'));
            }
        }else{ 
            return response()->json(array('status' => FALSE, 'msg' => 'Token Expired.'));
        }
    }
}
