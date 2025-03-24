<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customers;

class CustomersController extends Controller
{
    public function index() {
        return view('admin.customers.customer-list', ['title'=> 'Customers']);
    }
    public function create() {
        return view('admin.customers.create', ['title'=> 'Create Customers']);
    }
    public function edit() {
        return view('admin.customers.edit', ['title'=> 'Edit Customers']);
    }
    public function view() {
        return view('admin.customers.view', ['title'=> 'View Customers']);
    }
    //AllSuppliers
    public function getCustomers(Request $request) {
        $customers = Customers::where('company_id', $request->companyId)->get();
        if(!is_null($customers)){
            $log = '{"title":"View all customers.", "body":"View all customers"}';
            $data = [
                'moduleName'=> 'customers',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'customersData' => $customers]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Customers not found.']);
    }
    //Single Supplier
    public function getCustomer(Request $request) {
        $customer = Customers::where('id', $request->customerId)->first();
        if(!is_null($customer)){
            $log = '{"title":"View customer.", "body":"<b>Customer Name:</b>'.$customer->first_name.' '.$customer->last_name.'"}';
            $data = [
                'moduleName'=> 'customers',
                'moduleId'=> $customer->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'customerData' => $customer]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'customer not found.']);
    }
    //search customer
    public function searchCustomers(Request $request){
        $validator = Validator::make($request->all(), [
            'searchword' => 'required|min:3',
            
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $searchword = $request->searchword;
        $customers = Customers::search($searchword)->where(['company_id' => $request->companyId])->get();

        if(count($customers)>0){
            $log = '{"title":"Searching customer.", "body":"<b>Search word:</b>'.$searchword.'<br><b>Find customer(s):</b>'.count($customers).'"}';
            $data = [
                'moduleName'=> 'customers',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'customersData' => $customers]);
        }

        return response()->json(['status' => FALSE, 'msg' => 'customers not found.']);
    }
    //Add Supplier
    public function addCustomer(Request $request) {   
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'company_name' => 'required',
            'customer_id' => 'required',
            'phone_no' => 'required|min:11',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'companyId' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $customer = new Customers;
        $customer->title = $request->title;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->company_name = $request->company_name;
        $customer->customer_id = $request->customer_id;
        $customer->date_of_birth = !empty($request->date_of_birth)?date('Y-m-d', strtotime($request->date_of_birth)):null;
        $customer->phone_no = $request->phone_no;
        $customer->alt_phone_no = $request->alt_phone_no;
        $customer->email = $request->email;
        $customer->building_no = $request->building_no;
        $customer->street = $request->street;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->country = $request->country;
        $customer->zipcode = $request->zipcode;
        $customer->shipping_building_no = $request->shipping_building_no;
        $customer->shipping_street = $request->shipping_street;
        $customer->shipping_city = $request->shipping_city;
        $customer->shipping_state = $request->shipping_state;
        $customer->shipping_country = $request->shipping_country;
        $customer->shipping_zipcode = $request->shipping_zipcode;
        $customer->tax_no = $request->tax_no;
        $customer->opening_balance = $request->opening_balance;
        $customer->pay_type = $request->pay_period;
        $customer->pay_term = $request->pay_term;
        $customer->credit_limit = !empty($request->credit_limit)?$request->credit_limit:0;
        $customer->company_id = $request->companyId;
        $customer->created_by = $request->loginId;
        if($customer->save()){ 
            $log = '{"title":"Customer Created.", "body":"Customer name'.$customer->first_name.' '.$customer->last_name.' Created."}';
            $data = [
                'moduleName'=> 'customers',
                'moduleId'=> $customer->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Customer successfully added.', 'insertId' => $customer->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Customer not added.']);
        }
    }
    //Update Suppliers
    public function updateCustomer(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'company_name' => 'required',
            'customer_id' => 'required',
            'phone_no' => 'required|min:11',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'companyId' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $customer = Customers::find($request->customerId);
        $prevData = $customer->getOriginal();
        $customer->title = $request->title;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->company_name = $request->company_name;
        $customer->customer_id = $request->customer_id;
        $customer->date_of_birth =  !empty($request->date_of_birth)?date('Y-m-d', strtotime($request->date_of_birth)):null;
        $customer->phone_no = $request->phone_no;
        $customer->alt_phone_no = $request->alt_phone_no;
        $customer->email = $request->email;
        $customer->shipping_building_no = $request->shipping_building_no;
        $customer->shipping_street = $request->shipping_street;
        $customer->shipping_city = $request->shipping_city;
        $customer->shipping_state = $request->shipping_state;
        $customer->shipping_country = $request->shipping_country;
        $customer->shipping_zipcode = $request->shipping_zipcode;
        $customer->building_no = $request->building_no;
        $customer->street = $request->street;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->country = $request->country;
        $customer->zipcode = $request->zipcode;
        $customer->tax_no = $request->tax_no;
        $customer->opening_balance = $request->opening_balance;
        $customer->pay_type = $request->pay_period;
        $customer->pay_term = $request->pay_term;
        $customer->credit_limit = $request->credit_limit;
        $customer->save();
        if($customer->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $customer->getChanges());
            $log = '{"title":"Customer Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'customers',
                'moduleId'=> $customer->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Customer details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'No changes found.']);
        }
    }
    //Delete Suppliers
    public function deleteCustomer(Request $request) {
        $customer = Customers::find($request->customerId);
        if($customer->delete()){
            $log = '{"title":"Customer Deleted.", "body":"Customer name'.$customer->first_name.' '.$customer->last_name.' Deleted."}';
            $data = [
                'moduleName'=> 'customers',
                'moduleId'=> $customer->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Customer is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Customer details not deleted.']);
        }
    }

    public function importCustomers(Request $request) {   
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'company_name' => 'required',
            'customer_id' => 'required',
            'phone_no' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'companyId' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $customerData = $request->customerData;
        
        // foreach($customerData as $row){
            // print_r($customer['title']);
            $customer = new Customers;
            $customer->title = $request->title;
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->company_name = $request->company_name;
            $customer->customer_id = $request->customer_id;
            $customer->date_of_birth =  !empty($request->date_of_birth)?date('Y-m-d', strtotime($request->date_of_birth)):null;
            $customer->phone_no =$request->phone_no;
            $customer->alt_phone_no = $request->alt_phone_no;
            $customer->email = $request->email;
            $customer->building_no = $request->building_no;
            $customer->street = $request->street;
            $customer->city = $request->city;
            $customer->state = $request->state;
            $customer->country = $request->country;
            $customer->zipcode = $request->zipcode;
            $customer->shipping_building_no = isset($request->shipping_building_no)?$request->shipping_building_no:null;
            $customer->shipping_street = isset($request->shipping_street)?$request->shipping_street:null;
            $customer->shipping_city = isset($request->shipping_city)?$request->shipping_city:null;
            $customer->shipping_state = isset($request->shipping_city)?$request->shipping_state:null;
            $customer->shipping_country = isset($request->shipping_country)?$request->shipping_country:null;
            $customer->shipping_zipcode = isset($request->shipping_zipcode)?$request->shipping_zipcode:null;
            $customer->tax_no = isset($request->tax_no)?$request->tax_no:null;
            $customer->opening_balance = $request->opening_balance;
            $customer->pay_type = isset($request->pay_period)?$request->pay_period:null;
            $customer->pay_term = isset($request->pay_term)?$request->pay_term:null;
            $customer->credit_limit = isset($request->credit_limit)?$request->credit_limit:0;
            $customer->company_id = $request->companyId;
            $customer->created_by = $request->loginId;
            $customer->save();
        // }
        
        // $log = '{"title":"Customer imported.", "body":" Customer records imported."}';
        // $data = [
        //     'moduleName'=> 'customers',
        //     'moduleId'=> null,
        //     'log'=> $log,
        //     'userId'=> $request->loginId,
        //     'companyId'=> $request->companyId,
        //     'branchId'=> $request->branchId,
        // ];
        // $this->addActivityLog($data);
        return response()->json(['status' => TRUE, 'msg' => 'Customer successfully added.', 'insertId' => $customer->id]); 
        
    }
}
