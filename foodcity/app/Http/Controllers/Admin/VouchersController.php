<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Vouchers;
use App\Models\VoucherPayments;


class VouchersController extends Controller
{
    public function index() {
        return view('admin.vouchers.voucher-list', ['title'=> 'Vouchers']);
    }
    public function create() {
        return view('admin.vouchers.create', ['title'=> 'Create Vouchers']);
    }
    public function edit() {
        return view('admin.vouchers.edit', ['title'=> 'Edit Vouchers']);
    }
    public function view() {
        return view('admin.vouchers.view', ['title'=> 'View Vouchers']);
    }
    //AllVouchers
    public function getVouchers(Request $request) {
        $vouchers = Vouchers::where(['company_id' => $request->companyId, 'branch_id' => $request->branchId])->get();
        if(!is_null($vouchers)){
            $log = '{"title":"View all vouchers.", "body":"View all vouchers"}';
            $data = [
                'moduleName'=> 'vouchers',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'vouchersData' => $vouchers]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'vouchers not found.']);
    }
    //Used Vouchers
    public function getUsedVouchers(Request $request) {
        $vouchers = Vouchers::where(['company_id' => $request->companyId, 'branch_id' => $request->branchId, 'status' => 1])->get();
        if(!is_null($vouchers)){
            $log = '{"title":"View used vouchers.", "body":"View used vouchers"}';
            $data = [
                'moduleName'=> 'vouchers',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'vouchersData' => $vouchers]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'vouchers not found.']);
    }

    //Used Vouchers
    public function getUnusedVouchers(Request $request) {
        $vouchers = Vouchers::where(['company_id' => $request->companyId, 'branch_id' => $request->branchId, 'status' => 0])->get();
        if(!is_null($vouchers)){
            $log = '{"title":"View unused vouchers.", "body":"View unused vouchers"}';
            $data = [
                'moduleName'=> 'vouchers',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'vouchersData' => $vouchers]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'vouchers not found.']);
    }
    // Validate Voucher
    public function validateVoucher(Request $request){
        $voucher = Vouchers::where(['serial_no' => $request->VoucherNo, 'company_id' => $request->companyId, 'branch_id' => $request->branchId])->first();

        if(is_null($voucher)){
            return response()->json(['status' => FALSE, 'msg' => 'voucher not found. Invalid Serial Number']);
        }

        if(strtotime($voucher->expiry_on) < strtotime(date('Y-m-d'))){
            return response()->json(['status' => FALSE, 'msg' => 'Expired Voucher.']);
        }
        
        $used = VoucherPayments::where('voucher_id', $voucher->id)->get();
        $usedAmount = 0;
        if(count($used)>0){
            foreach($used as $row){
                $usedAmount += $row->amount;
            }
        }
        $balance = $voucher->amount - $usedAmount;
        if($balance <= 0){
            return response()->json(['status' => FALSE, 'msg' => 'Already used.']);
        }
        $voucher->used_amount = $usedAmount;
        $voucher->balance_amount = $balance;

        $log = '{"title":"Validate voucher.", "body":"Validate voucher<br><b>Voucher serial:</b> '.$voucher->serial_no.'"}';
        $data = [
            'moduleName'=> 'vouchers',
            'moduleId'=> $voucher->id,
            'log'=> $log,
            'userId'=> $request->loginId,
            'companyId'=> $request->companyId,
            'branchId'=> $request->branchId,
        ];
        $this->addActivityLog($data);

        return response()->json(['status' => TRUE, 'voucherData' => $voucher]);
    }
    //Single Voucher
    public function getVoucher(Request $request) {
        $voucher = Vouchers::where('id', $request->vouchersId)->first();
        if(is_null($voucher)){
            return response()->json(['status' => FALSE, 'msg' => 'vouchers not found.']);
        }
        
        $used = VoucherPayments::with('revenue')->where('voucher_id', $voucher->id)->get();
        $usedAmount = 0;
        if(count($used)>0){
            foreach($used as $row){
                $usedAmount += $row->amount;
            }
        }
        $balance = $voucher->amount - $usedAmount;
        
        $voucher->used_amount = $usedAmount;
        $voucher->balance_amount = $balance;
        $voucher->payments = $used;

        $log = '{"title":"View voucher.", "body":"View voucher details<br><b>Voucher serial:</b> '.$voucher->serial_no.'"}';
        $data = [
            'moduleName'=> 'vouchers',
            'moduleId'=> $voucher->id,
            'log'=> $log,
            'userId'=> $request->loginId,
            'companyId'=> $request->companyId,
            'branchId'=> $request->branchId,
        ];
        $this->addActivityLog($data);

        return response()->json(['status' => TRUE, 'vouchersData' => $voucher]);
    }
    //Add Vouchers
    public function addVouchers(Request $request) {   
        $validator = Validator::make($request->all(), [
            'amount' => 'required', 
            'expiry_date' => 'required',
            'issue_date' => 'required',
            'issue_to' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $voucher = new Vouchers;
        $voucher->serial_no = $this->generateUniqueCode();
        $voucher->amount = abs($request->amount);
        $voucher->expiry_on = date('Y-m-d', strtotime($request->expiry_date));
        $voucher->status = 0;
        $voucher->issue_date = date('Y-m-d', strtotime($request->issue_date));
        $voucher->issue_to = $request->issue_to;
        $voucher->issue_id = $request->issue_id ? $request->issue_id: null;
        $voucher->company_id = $request->companyId;
        $voucher->branch_id = $request->branchId;
        $voucher->created_by = $request->loginId;
        if($voucher->save()){ 
            $log = '{"title":"Voucher Created.", "body":"Voucher serial No:'.$voucher->serial_no.' Created."}';
            $data = [
                'moduleName'=> 'vouchers',
                'moduleId'=> $voucher->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Vouchers successfully added.', 'voucher' => $voucher]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Vouchers not added.']);
        }
    }
    //Update Vouchers
    public function updateVouchers(Request $request) {
        $validator = Validator::make($request->all(), [
            'amount' => 'required', 
            'expirydate' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $vouchers = Vouchers::find($request->vouchersId);
        $prevData = $vouchers->getOriginal();
        $vouchers->amount = $request->amount;
        $vouchers->expirydate = $request->expirydate;
        $vouchers->vouchers_status = $request->vouchers_status;
        $vouchers->save();
        if($vouchers->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $vouchers->getChanges());
            $log = '{"title":"Voucher Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'vouchers',
                'moduleId'=> $vouchers->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Vouchers details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Vouchers details not updated.']);
        }
    }
    //Delete Vouchers
    public function deleteVouchers(Request $request) {
        $vouchers = Vouchers::find($request->vouchersId);
        if($vouchers->delete()){
            $log = '{"title":"Voucher Deleted.", "body":"Voucher serial:'.$vouchers->serial_no.' Deleted."}';
            $data = [
                'moduleName'=> 'vouchers',
                'moduleId'=> $vouchers->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Vouchers is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Vouchers details not deleted.']);
        }
    }

    public function generateUniqueCode()
    {
        do {
            // $code = Str::random(6);
            $code = random_int(1000, 999999); 
        } while (Vouchers::where("serial_no", "=", $code)->first());
  
        return $code;
    }
}
