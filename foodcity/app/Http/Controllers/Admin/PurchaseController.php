<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\PurchaseProducts;
use App\Models\PurchaseOrder;
use App\Models\PurchaseAttachments;
use App\Models\Expenses;
use App\Models\CompanySettings;
use App\Models\Companies;

class PurchaseController extends Controller
{
    public function index() {
        return view('admin.purchase.purchase-list', ['title'=> 'Purchase']);
    }
    public function create() {
        return view('admin.purchase.create', ['title'=> 'Create Purchase']);
    }
    public function edit() {
        return view('admin.purchase.edit', ['title'=> 'Edit Purchase']);
    }
    public function view() {
        return view('admin.purchase.view', ['title'=> 'View Purchase']);
    }
    public function purchaseOrder() {
        return view('admin.purchase.purchase-order', ['title'=> 'Purchase Order']);
    }
    public function purchaseOrderCreate() {
        return view('admin.purchase.purchase-order-create', ['title'=> 'Create Purchase Order']);
    }
    public function printBill(Request $request) {
        $purchase = Purchase::with('suppliers', 'company', 'branch')->where('id', $request->purchaseId)->first();
        $products = PurchaseProducts::with('product')->where(['purchase_id'=>$request->purchaseId, 'company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->get();

        $log = '{"title":"Purchase bill printed.", "body":"Purchase bill print preview generated.<br><b>GRN Id:</b>'.$purchase->grn_no.'"}';
        $data = [
            'moduleName'=> 'purchase',
            'moduleId'=> $purchase->id,
            'log'=> $log,
            'userId'=> $request->loginId,
            'companyId'=> $request->companyId,
            'branchId'=> $request->branchId,
        ];
        $this->addActivityLog($data);
        return view('admin.purchase.printBill', ['title'=> 'Print Bill', 'purchase' => $purchase, 'products' => $products]);
    }
    public function requestPurchase(Request $request){
        $validator = Validator::make($request->all(), [
            'orderId' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 

        $purchaseOrder = PurchaseOrder::with('purchaseProducts')->find($request->orderId);

        $purchase = Purchase::where(['order_id'=>$purchaseOrder->id])->first();
        if(!is_null($purchase)){
            return response()->json(['status' => TRUE, 'purchaseId' => $purchase->id]);
        }

        $total =0;
        foreach($purchaseOrder->purchaseProducts as $product){
            $total += ($product->units*$product->cost_price);
        }
        $prefix = '';

        $settings = CompanySettings::where(['company_id'=>$request->companyId, 'branch_id'=> $request->branchId, 'setting_name'=> 'prefix'])->first();
        $prefix = json_decode($settings->setting)->purchase;
        $purchases = Purchase::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->count();
        $purchase = new Purchase;
        // $purchase->grn_no = 'GRN-'.$request->companyId.'-'.$request->branchId.'-'.($purchases+1);
        $purchase->grn_no = $prefix.($purchases+1);
        $purchase->date = date('Y-m-d H:i');
        $purchase->order_id = $purchaseOrder->id;
        $purchase->invoice_no = null;
        $purchase->total_amount = $total;
        $purchase->discount = 0;
        $purchase->cost = 0;
        $purchase->company_id = $request->companyId;
        $purchase->branch_id = $request->branchId;
        $purchase->suppliers_id = $purchaseOrder->suppliers_id;
        $purchase->created_by = $request->loginId;
        if($purchase->save()){ 
            $order = PurchaseOrder::find($purchase->order_id);
            $order->status = 1;
            $order->save();
            return response()->json(['status' => TRUE, 'purchaseId' => $purchase->id]);
        }
    }
    //AllPurchases
    public function getPurchases(Request $request) {
        $company = Companies::find($request->companyId);
        $year = date('Y');
        if(date('m')<$company->starting_month){
            $year = date("Y", strtotime("-1 year"));
        }

        $startingDate = date('Y-m-1', strtotime($year.'-'.$company->starting_month.'-1'));
        
        $purchaseQuery = Purchase::with('suppliers')->where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->orderBy('id', 'DESC');
        //isset supplier
        if(isset($request->sltSupplier) && !empty($request->sltSupplier))
            $purchaseQuery->where('suppliers_id', $request->sltSupplier);
        // isset status
        if(isset($request->sltStatus) && !empty($request->sltStatus)){
            if($request->sltStatus == 0){
                $purchaseQuery->whereNull('order_id');
            }
            $purchaseQuery->where('purchase_status', $request->sltStatus);
        }else{
            $purchaseQuery->where(function($query) {
                $query->whereNull('order_id')->orWhere('purchase_status','>', 0);
            });
        }
            

        // isset fromDate
        if(isset($request->fromDate) && !empty($request->fromDate))
            $purchaseQuery->whereDate('date', '>=', date('Y-m-d', strtotime($request->fromDate)));

        // isset toDate
        if(isset($request->toDate) && !empty($request->toDate))
            $purchaseQuery->whereDate('date', '<=', date('Y-m-d', strtotime($request->toDate)));

        if(empty($request->fromDate) && empty($request->toDate)){
            $purchaseQuery->whereDate('date', '>=', $startingDate);
        }
        $purchase = $purchaseQuery->get();
        if(!is_null($purchase)){
            $log = '{"title":"View all purchase bills.", "body":"View all purchase bills"}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'purchasesData' => $purchase]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'purchase not found.']);
    }
    //Single Purchase
    public function getPurchase(Request $request) {
        $purchase = Purchase::with('suppliers', 'company', 'branch')->where('id', $request->purchaseId)->first();
        if(!is_null($purchase)){
            $log = '{"title":"View purchase.", "body":"View purchase.<br><b>GRN Id:</b>'.$purchase->grn_no.'"}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> $purchase->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'purchaseData' => $purchase]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'purchase not found.']);
    }
    //Add Purchase
    public function addPurchase(Request $request) {   
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'invoice_no' => 'required', 
            'total_amount' => 'required',
            'suppliers' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }    
        $settings = CompanySettings::where(['company_id'=>$request->companyId, 'branch_id'=> $request->branchId, 'setting_name'=> 'prefix'])->first();
        $prefix = json_decode($settings->setting)->purchase;
        $purchases = Purchase::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->count();
        $purchase = new Purchase;
        // $purchase->grn_no = 'GRN-'.$request->companyId.'-'.$request->branchId.'-'.($purchases+1);
        $purchase->grn_no = $prefix.($purchases+1);
        $purchase->date = date('Y-m-d H:i:s', strtotime($request->date));
        $purchase->invoice_no = $request->invoice_no;
        $purchase->total_amount = $request->total_amount;
        $purchase->discount = $request->discount?$request->discount:0;
        $purchase->cost = $request->cost?$request->cost:0;
        $purchase->company_id = $request->companyId;
        $purchase->branch_id = $request->branchId;
        $purchase->suppliers_id = $request->suppliers;
        $purchase->created_by = $request->loginId;
        if($purchase->save()){ 
            $log = '{"title":"Purchase Created.", "body":"Purchase GRN '.$purchase->grn_no.' Created."}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> $purchase->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase successfully added.', 'insertId' => $purchase->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase not added.']);
        }
    }
    //Update Purchase
    public function updatePurchase(Request $request) {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'invoice_no' => 'required', 
            'total_amount' => 'required',
            'suppliers' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $purchase = Purchase::find($request->purchaseId);
        $prevData = $purchase->getOriginal();
        $purchase->date = date('Y-m-d H:i:s', strtotime($request->date));
        $purchase->invoice_no = $request->invoice_no;
        $purchase->total_amount = $request->total_amount;
        $purchase->discount = $request->discount;
        $purchase->purchase_status = $request->status;
        $purchase->suppliers_id = $request->suppliers;
        $purchase->save();
        if($purchase->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $purchase->getChanges());
            $log = '{"title":"Purchase Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> $purchase->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase details not updated.']);
        }
    }
    public function setComplete(Request $request) {
        $validator = Validator::make($request->all(), [
            'purchaseId' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $purchase = Purchase::find($request->purchaseId);
        $prevData = $purchase->getOriginal();
        $purchase->purchase_status = 1;
        $purchase->save();
        if($purchase->wasChanged()){
            if($purchase->order_id != null){
                $order = PurchaseOrder::find($purchase->order_id);
                $order->status = 3;
                $order->save();
            }
            $body = $this->ValidateUpdated($prevData, $purchase->getChanges());
            $log = '{"title":"Purchase Completed.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> $purchase->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase completed.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase not completed.']);
        }
    }
    //Delete Purchase
    public function deletePurchase(Request $request) {
        $purchase = Purchase::find($request->purchaseId);
        if($purchase->delete()){
            $log = '{"title":"Purchase Deleted.", "body":"Purchase GRN Id:'.$purchase->grn_no.' Deleted."}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> $purchase->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase details not deleted.']);
        }
    }

    public function uploadAttachment(Request $request){
        $file = $request->file('file');
        $fileName = time().'_OwnMake_'.$file->getClientOriginalName();
        $fileSize = $file->getSize();
        // $file->move(public_path('uploads/purchase'), $fileName);
        $file->move('uploads/purchase', $fileName);
       
        $attachment = new PurchaseAttachments;
        $attachment->purchase_id = $request->purchaseId;
        $attachment->file_name = $file->getClientOriginalName();
        $attachment->file_path = url('uploads/purchase/'.$fileName);
        $attachment->file_size = $fileSize;
        $attachment->created_by = $request->loginId;
        $attachment->company_id = $request->companyId;
        if($attachment->save()){
            $log = '{"title":"Purchase attachment added.", "body":"Purchase attachment '.$attachment->file_name.' added."}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> $attachment->purchase_id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Attachment successfully uploaded.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Attachment not uploaded.']);
        }
    }

    //AllAttachments
    public function getAttachments(Request $request) {
        $attachments = PurchaseAttachments::where(['purchase_id'=>$request->purchaseId])->orderBy('id', 'DESC')->get();
        $purchase = Purchase::find($request->purchaseId);
        if(!is_null($attachments)){
            $log = '{"title":"View purchase attachments.", "body":"View Purchase attachments.<br><b>GRN Id:</b>'.$purchase->grn_no.'"}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> $purchase->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'attachmentsData' => $attachments]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Attachment not found.']);
    }

    // Get Payment
    public function getPayments(Request $request){
        $payments = Expenses::with('paymentMethod', 'paymentType')->where(['payment_type' => 2, 'type_id' => $request->invoiceId, 'company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->get();
        $purchase = Purchase::find($request->invoiceId);
        if(count($payments)>0){
            $log = '{"title":"View purchase Payments.", "body":"View Purchase payments.<br><b>GRN Id:</b>'.$purchase->grn_no.'"}';
            $data = [
                'moduleName'=> 'purchase',
                'moduleId'=> $purchase->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'paymentsData' => $payments]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Attachment not found.']);
    }

    public function getMonthTotalPurchase(Request $request){
        $purchaseQuery = Purchase::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId]);

        $purchaseQuery->whereYear('date', date('Y', strtotime($request->date)));
        $purchaseQuery->whereMonth('date', date('m', strtotime($request->date)));

        $purchase = $purchaseQuery->get();
        $totalPurchase = 0;
        if(count($purchase)>0){
            foreach($purchase as $row){
                $subtotal = $row->total_amount - $row->discount + $row->cost;
                $totalPurchase += $subtotal;
            }
        }
        return response()->json(['status' => TRUE, 'totalPurchase' => $totalPurchase]);
    }

    public function getLastSixMonthPurchase(Request $request){
        $curdate  = date('Y-m-1', strtotime($request->date));
        $purchaseArr = [];
        $dateArr = [];
        $i = 12;
        while($i > 0){
            $i--;
            $date = date("Y-m-1", strtotime( $curdate." -".$i." months"));
            $purchaseQuery = Purchase::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId]);

            $purchaseQuery->whereYear('date', date('Y', strtotime($date)));
            $purchaseQuery->whereMonth('date', date('m', strtotime($date)));

            $purchase = $purchaseQuery->get();
            $totalPurchase = 0;
            if(count($purchase)>0){
                foreach($purchase as $row){
                    $subtotal = $row->total_amount - $row->discount + $row->cost;
                    $totalPurchase += $subtotal;
                }
            }
            $purchaseArr[] = $totalPurchase;
            $dateArr[] = date('F Y', strtotime($date));
        }
        return response()->json(['status' => TRUE, 'totalPurchase' => $purchaseArr, 'purchaseDates'=> $dateArr]);
    }
}
