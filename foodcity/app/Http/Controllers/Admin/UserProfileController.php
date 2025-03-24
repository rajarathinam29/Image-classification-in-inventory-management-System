<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserProfile;

class UserProfileController extends Controller
{
    public function uploadProfile(Request $request){
        $file = $request->file('file');
        $fileName = time().'_OwnMake_'.$file->getClientOriginalName();
        //on Server
        // $file->move('uploads/users', $fileName);
        //on Local
        $file->move(public_path('uploads/users'), $fileName);

        $userProfile = new UserProfile;
        $userProfile->user_id = $request->userId;
        $userProfile->name = $file->getClientOriginalName();
        $userProfile->path = 'uploads/users/'.$fileName;
        // $attachment->file_size = $file->getSize();
        // $attachment->creator_id = $request->loginId;
        
        if($userProfile->save()){
            return response()->json(['status' => TRUE, 'msg' => 'Logo successfully added.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Logo not added.']);
        }
    }
}
