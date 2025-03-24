<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Languages;

class LanguagesController extends Controller
{
    //AllLanguages
    public function getLanguages(Request $request) {
        // $languages = Languages::where('company_id', $request->companyId)->get();
        $languages = Languages::all();
        if(count($languages)>0){
            return response()->json(['status' => TRUE, 'languagesData' => $languages]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Languages not found.']);
    }
}
