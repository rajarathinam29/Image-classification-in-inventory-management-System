<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Suppliers;

class SuppliersController extends Controller
{
    public function index() {
        return view('admin.suppliers.supplier-list', ['title'=> 'Suppliers']);
    }
    public function create() {
        return view('admin.suppliers.create', ['title'=> 'Create Suppliers']);
    }
    public function edit() {
        return view('admin.suppliers.edit', ['title'=> 'Edit Suppliers']);
    }
    public function view() {
        return view('admin.suppliers.view', ['title'=> 'View Suppliers']);
    }
    //AllSuppliers
    public function getSuppliers(Request $request) {
        $suppliers = Suppliers::where('company_id', $request->companyId)->get();
        if(!is_null($suppliers)){
            $log = '{"title":"View All suppliers.", "body":"View all suppliers"}';
            $data = [
                'moduleName'=> 'suppliers',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'suppliersData' => $suppliers]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'suppliers not found.']);
    }
    //Single Supplier
    public function getSupplier(Request $request) {
        $suppliers = Suppliers::where('id', $request->suppliersId)->first();
        if(!is_null($suppliers)){
            $log = '{"title":"View supplier.", "body":"<b>Supplier Name:</b>'.$suppliers->company_name.'"}';
            $data = [
                'moduleName'=> 'suppliers',
                'moduleId'=> $suppliers->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'suppliersData' => $suppliers]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'suppliers not found.']);
    }
    //Add Supplier
    public function addSuppliers(Request $request) {   
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'dealer_name' => 'required', 
            'phone_no' => 'required|min:11|max:15',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $suppliers = new Suppliers;
        $suppliers->company_name = $request->company_name;
        $suppliers->dealer_name = $request->dealer_name;
        $suppliers->account_no = $request->account_no;
        $suppliers->phone_no = $request->phone_no;
        $suppliers->alt_phone_no = $request->alt_phone_no;
        $suppliers->email = $request->email;
        $suppliers->building_no = $request->building_no;
        $suppliers->street = $request->street;
        $suppliers->city = $request->city;
        $suppliers->state = $request->state;
        $suppliers->country = $request->country;
        $suppliers->zipcode = $request->zipcode;
        $suppliers->tax_no = $request->tax_no;
        //$suppliers->opening_balance = $request->opening_balance;
        $suppliers->pay_type = $request->pay_period;
        $suppliers->pay_term = $request->pay_term;
        $suppliers->credit_limit = !empty($request->credit_limit)?$request->credit_limit:0;
        $suppliers->suppliers_status = $request->status;
        $suppliers->company_id = $request->companyId;
        $suppliers->created_by = $request->loginId;
        if($suppliers->save()){ 
            $log = '{"title":"Supplier Created.", "body":"Supplier name'.$suppliers->company_name.' Created."}';
            $data = [
                'moduleName'=> 'suppliers',
                'moduleId'=> $suppliers->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Suppliers successfully added.', 'insertId' => $suppliers->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Suppliers not added.']);
        }
    }
    //Update Suppliers
    public function updateSuppliers(Request $request) {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'dealer_name' => 'required', 
            'phone_no' => 'required|min:11|max:15',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $suppliers = Suppliers::find($request->suppliersId);
        $prevData = $suppliers->getOriginal();
        $suppliers->company_name = $request->company_name;
        $suppliers->dealer_name = $request->dealer_name;
        $suppliers->account_no = $request->account_no;
        $suppliers->phone_no = $request->phone_no;
        $suppliers->alt_phone_no = $request->alt_phone_no;
        $suppliers->email = $request->email;
        $suppliers->building_no = $request->building_no;
        $suppliers->street = $request->street;
        $suppliers->city = $request->city;
        $suppliers->state = $request->state;
        $suppliers->country = $request->country;
        $suppliers->zipcode = $request->zipcode;
        $suppliers->tax_no = $request->tax_no;
        //$suppliers->opening_balance = $request->opening_balance;
        $suppliers->pay_type = $request->pay_period;
        $suppliers->pay_term = $request->pay_term;
        $suppliers->credit_limit = $request->credit_limit;
        $suppliers->suppliers_status = $request->status;
        $suppliers->save();
        if($suppliers->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $suppliers->getChanges());
            $log = '{"title":"Supplier Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'suppliers',
                'moduleId'=> $suppliers->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Suppliers details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Suppliers details not updated.']);
        }
    }
    //Delete Suppliers
    public function deleteSuppliers(Request $request) {
        $suppliers = Suppliers::find($request->suppliersId);
        if($suppliers->delete()){
            $log = '{"title":"Supplier Deleted.", "body":"Supplier name:'.$suppliers->company_name.' Deleted."}';
            $data = [
                'moduleName'=> 'suppliers',
                'moduleId'=> $suppliers->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Suppliers is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Suppliers details not deleted.']);
        }
    }

    //import Supplier
    public function importSuppliers(Request $request) {   
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'dealer_name' => 'required', 
            'phone_no' => 'required|numeric|min:11',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $suppliers = new Suppliers;
        $suppliers->company_name = $request->company_name;
        $suppliers->dealer_name = $request->dealer_name;
        $suppliers->account_no = isset($request->account_no)?$request->account_no:null;
        $suppliers->phone_no = $request->phone_no;
        $suppliers->alt_phone_no = $request->alt_phone_no;
        $suppliers->email = $request->email;
        $suppliers->building_no = isset($request->building_no)?$request->building_no:null;
        $suppliers->street = isset($request->street)?$request->street:null;
        $suppliers->city = isset($request->city)?$request->city:null;
        $suppliers->state = isset($request->state)?$request->state:null;
        $suppliers->country = isset($request->country)?$request->country:null;
        $suppliers->zipcode = isset($request->zipcode)?$request->zipcode:null;
        $suppliers->tax_no = isset($request->tax_no)?$request->tax_no:null;
        //$suppliers->opening_balance = $request->opening_balance;
        $suppliers->pay_type = isset($request->pay_period)?$request->pay_period:null;
        $suppliers->pay_term = isset($request->pay_term)?$request->pay_term:null;
        $suppliers->credit_limit = !empty($request->credit_limit)?$request->credit_limit:0;
        $suppliers->suppliers_status = $request->status;
        $suppliers->company_id = $request->companyId;
        $suppliers->created_by = $request->loginId;
        if($suppliers->save()){
            return response()->json(['status' => TRUE, 'msg' => 'Supplier successfully imported.', 'insertId' => $suppliers->id]); 
        }
        return response()->json(['status' => FALSE, 'msg' => 'Supplier not imported.']);
        // $log = '{"title":"Supplier Created.", "body":"Supplier name'.$suppliers->company_name.' Created."}';
        // $data = [
        //     'moduleName'=> 'suppliers',
        //     'moduleId'=> $suppliers->id,
        //     'log'=> $log,
        //     'userId'=> $request->loginId,
        //     'companyId'=> $request->companyId,
        //     'branchId'=> $request->branchId,
        // ];
        // $this->addActivityLog($data);

        
    }
}
