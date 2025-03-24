<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CompanySettings;

class AdminSettingController extends Controller
{
    public function index(){
        $title='Settings';
        return view('admin.settings.index', compact('title'));
    }

    public function personal(){
        $title='Personal Info';
        return view('admin.settings.personal', compact('title'));
    }

    public function companydetails(){
        $title='Company Info';
        return view('admin.settings.company', compact('title'));
    }

    public function prefix(){
        $title='Prefix';
        return view('admin.settings.prefix', compact('title'));
    }

    public function branch(){
        $title='Branch Info';
        return view('admin.settings.branch', compact('title'));
    }

    public function paymentmethod(){
        $title='PaymentMethod Settings';
        return view('admin.paymentmethod.paymentmethod-list', compact('title'));
    }

    public function customers(){
        $title='Import Customers';
        return view('admin.settings.imports.customers', compact('title'));
    }

    public function products(){
        $title='Import Products';
        return view('admin.settings.imports.products', compact('title'));
    }

    public function suppliers(){
        $title='Import Suppliers';
        return view('admin.settings.imports.suppliers', compact('title'));
    }

    public function getPrefixSetting(Request $request){
        $settings = CompanySettings::where(['company_id'=>$request->companyId,'branch_id'=>$request->branchId,'setting_name'=>'prefix'])->first();

        if(!is_null($settings)){
            return response()->json(['status' => TRUE, 'prefixSetting' => $settings]); 
        }
        return response()->json(['status' => FALSE, 'msg' => 'Prefix not found.']);
    }

    public function addPrefixSetting(Request $request){
        $validator = Validator::make($request->all(), [
            'companyId' => 'required',
            'branchId' => 'required',
            'setting' => 'required',            
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 

        $settings = CompanySettings::updateOrCreate(
            ['company_id'=>$request->companyId,'branch_id'=>$request->branchId,'setting_name'=>'prefix'],
            ['setting'=>$request->setting]
        );
        
        if($settings->wasChanged()){
            $log = '{"title":"Prefix settings changed.", "body":"Prefix settings changed."}';
            $data = [
                'moduleName'=> 'settings',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Prefix settings successfully changes.', 'insertId' => $settings->id]); 
        }

        return response()->json(['status' => FALSE, 'msg' => 'Prefix not changed.']);
    } 
}
