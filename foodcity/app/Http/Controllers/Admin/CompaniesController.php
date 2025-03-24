<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Companies;

class CompaniesController extends Controller
{
    public function superAdminIndex() {
        return view('superadmin.company.companies-list', ['title'=> 'Companies']);
    }
    public function superAdminCreate() {
        return view('superadmin.company.create', ['title'=> 'Create Company']);
    }
    public function superAdminEdit() {
        return view('superadmin.company.edit', ['title'=> 'Edit Company']);
    }
    public function superAdminView() {
        return view('superadmin.company.view', ['title'=> 'View Company']);
    }

    public function index() {
        return view('admin.company.companies-list', ['title'=> 'Companies']);
    }
    public function create() {
        return view('admin.company.create', ['title'=> 'Create Company']);
    }
    public function edit() {
        return view('admin.company.edit', ['title'=> 'Edit Company']);
    }
    public function view() {
        return view('admin.company.view', ['title'=> 'View Company']);
    }
    
    public function getCompanies(Request $request) {
        $companies = Companies::all();
        if(!is_null($companies)){
            return response()->json(['status' => TRUE, 'companiesData' => $companies]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Company not found.']);
    }
    
    public function getCompany(Request $request) {
        $companies = Companies::with('currency')->where('id', $request->companyId)->first();
        if(!is_null($companies)){
            return response()->json(['status' => TRUE, 'companyData' => $companies]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Company not found.']);
    }

    // Get Total Users
    public function getCountCompanies(Request $request){
        $inactive = Companies::where('status', 0)->get()->count();
        $active = Companies::where('status', 1)->get()->count();

        return response()->json(['status' => TRUE, 'companiesData' => ['inactive'=>$inactive, 'active'=>$active]]);
    }
    public function addcompany(Request $request) {   
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'registered_no' => 'required',
            'start_date' => 'required',
            'email' => 'required',
            'phone_no' => 'required|min:11',
            'user_limit' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $company = new Companies;
        $company->name = $request->company_name;
        $company->registerd_no = $request->registered_no;
        $company->start_date = date('Y-m-d', strtotime($request->start_date));
        $company->phone_no = $request->phone_no;
        $company->email = $request->email;
        $company->proprietor_name = $request->proprietor_name;
        $company->user_limit = $request->user_limit;
        $company->status = $request->status;
        $company->building_no = $request->building_no;
        $company->street = $request->street;
        $company->city = $request->city;
        $company->state = $request->state;
        $company->zipcode = $request->zipcode;
        $company->country = $request->country;
        $company->starting_month = $request->starting_month;
        $company->currency_id = $request->currency;
        $company->currency_placement = $request->currency_placement;
        $company->date_format = $request->date_format;
        if($company->save()){ 
            return response()->json(['status' => TRUE, 'msg' => 'Company successfully added.', 'insertId' => $company->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Company not added.']);
        }
    }
    
    public function updateCompany(Request $request) {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'registered_no' => 'required',
            'start_date' => 'required',
            'email' => 'required',
            'phone_no' => 'required|min:11',
            'user_limit' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $company = Companies::find($request->companyId);
        $prevData = $company->getOriginal();
        $company->name = $request->company_name;
        $company->registerd_no = $request->registered_no;
        $company->start_date = date('Y-m-d', strtotime($request->start_date));
        $company->phone_no = $request->phone_no;
        $company->email = $request->email;
        $company->proprietor_name = $request->proprietor_name;
        $company->user_limit = $request->user_limit;
        $company->status = $request->status;
        $company->building_no = $request->building_no;
        $company->street = $request->street;
        $company->city = $request->city;
        $company->state = $request->state;
        $company->zipcode = $request->zipcode;
        $company->country = $request->country;
        $company->starting_month = $request->starting_month;
        $company->currency_id = $request->currency;
        $company->currency_placement = $request->currency_placement;
        $company->date_format = $request->date_format;
        $company->save();
        if($company->wasChanged()){
            return response()->json(['status' => TRUE, 'msg' => 'Company details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Company details not updated.']);
        }
    }
    
    public function deleteCompany(Request $request) {
        $company = Companies::find($request->companyId);
        if($company->delete()){
            return response()->json(['status' => TRUE, 'msg' => 'Company is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Company details not deleted.']);
        }
    }

    public function uploadLogo(Request $request){
        $file = $request->file('file');
        $fileName = time().'_OwnMake_'.$file->getClientOriginalName();
        $file->move('uploads/companies', $fileName);
        // $file->move(public_path('uploads/companies'), $fileName);
        $company = Companies::find($request->company_id);
        // $attachment->lead_id = $request->leadId;
        // $attachment->file_name = $file->getClientOriginalName();
        $company->logo = 'uploads/companies/'.$fileName;
        // $attachment->file_size = $file->getSize();
        // $attachment->creator_id = $request->loginId;
        $company->save();
        if($company->wasChanged()){
            return response()->json(['status' => TRUE, 'msg' => 'Logo successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Logo not updated.']);
        }
    }
}
