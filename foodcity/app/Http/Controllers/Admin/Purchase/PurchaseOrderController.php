<?php

namespace App\Http\Controllers\Admin\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderProducts;
use App\Models\PurchaseProducts;
use App\Models\PurchaseAttachments;
use App\Models\Expenses;
use App\Models\CompanySettings;
use App\Models\Companies;
use App\Models\Wip;

use Config;
use Mail;
use PDF;

class PurchaseOrderController extends Controller
{
    public function index() {
        return view('admin.purchase.purchase-order', ['title'=> 'Purchase Order']);
    }
    public function create() {
        return view('admin.purchase.purchase-order-create', ['title'=> 'Create Purchase Order']);
    }
    public function edit() {
        return view('admin.purchase.purchase-order-edit', ['title'=> 'Edit Purchase Order']);
    }
    public function view() {
        return view('admin.purchase.purchase-order-view', ['title'=> 'View Purchase Order']);
    }

    public function printBill(Request $request) {
        $purchaseOrder = PurchaseOrder::with('suppliers', 'wip', 'company', 'branch')->where('id', $request->orderId)->first();
        $products = PurchaseOrderProducts::with(['product'])->where(['order_id'=>$request->orderId, 'company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->get();

        $log = '{"title":"Purchase Order printed.", "body":"Purchase order print preview generated.<br><b>GRN Id:</b>'.$purchaseOrder->order_id.'"}';
        $data = [
            'moduleName'=> 'purchase_orders',
            'moduleId'=> $purchaseOrder->id,
            'log'=> $log,
            'userId'=> $request->loginId,
            'companyId'=> $request->companyId,
            'branchId'=> $request->branchId,
        ];
        $this->addActivityLog($data);
        return view('admin.purchase.purchase-order-printBill', ['title'=> 'Print Bill', 'order' => $purchaseOrder, 'products' => $products]);
    }

    public function quickView(Request $request) {
        $purchaseOrder = PurchaseOrder::with('suppliers', 'wip', 'company', 'branch')->where('id', $request->orderId)->first();
        $products = PurchaseOrderProducts::with(['product'])->where(['order_id'=>$request->orderId, 'company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->get();

        $log = '{"title":"Quick view Purchase Order.", "body":"Quick view purchase order .<br><b>GRN Id:</b>'.$purchaseOrder->order_id.'"}';
        $data = [
            'moduleName'=> 'purchase_orders',
            'moduleId'=> $purchaseOrder->id,
            'log'=> $log,
            'userId'=> $request->loginId,
            'companyId'=> $request->companyId,
            'branchId'=> $request->branchId,
        ];
        $this->addActivityLog($data);
        return view('admin.purchase.purchase-order-quickView', ['title'=> 'Quick View', 'order' => $purchaseOrder, 'products' => $products]);
    }

    //AllPurchases
    public function getPurchaseOrders(Request $request) {
        $company = Companies::find($request->companyId);
        $year = date('Y');
        if(date('m')<$company->starting_month){
            $year = date("Y", strtotime("-1 year"));
        }

        $startingDate = date('Y-m-1', strtotime($year.'-'.$company->starting_month.'-1'));
        
        $orderQuery = PurchaseOrder::with(['suppliers', 'wip'])->where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->orderBy('id', 'DESC');
        //isset supplier
        if(isset($request->orderType)){
            if($request->orderType == 0){
                $orderQuery->whereNull('wip_id');
            }else{
                $orderQuery->whereNotNull('wip_id');
            }
        }

           
        //isset supplier
        if(isset($request->sltSupplier) && !empty($request->sltSupplier))
            $orderQuery->where('suppliers_id', $request->sltSupplier);
        // isset status
        if(isset($request->sltStatus) )
            $orderQuery->where('status', $request->sltStatus);

        // isset fromDate
        if(isset($request->fromDate) && !empty($request->fromDate))
            $orderQuery->whereDate('date', '>=', date('Y-m-d', strtotime($request->fromDate)));

        // isset toDate
        if(isset($request->toDate) && !empty($request->toDate))
            $orderQuery->whereDate('date', '<=', date('Y-m-d', strtotime($request->toDate)));

        if(empty($request->fromDate) && empty($request->toDate)){
            $orderQuery->whereDate('date', '>=', $startingDate);
        }
        $orders = $orderQuery->get();
        if(!is_null($orders)){
            $log = '{"title":"View all purchase orders.", "body":"View all purchase orders"}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'purchaseOrdersData' => $orders]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'purchase order not found.']);
    }
    //Single Purchase
    public function getOrder(Request $request) {
        $order = PurchaseOrder::with('suppliers', 'company', 'branch')->where('id', $request->orderId)->first();
        if(!is_null($order)){
            $log = '{"title":"View purchase order.", "body":"View purchase order.<br><b>order Id:</b>'.$order->order_id.'"}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> $order->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'purchaseOrderData' => $order]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'purchase not found.']);
    }
    // Send purchase order
    public function sendMailPurchaseOrder(Request $request) {
        $company = Companies::find($request->companyId);
        $emails = [];
        if($company->mail_host == null || $company->mail_port == null || $company->mail_username == null || $company->mail_password == null || $company->mail_encryption == null || $company->mail_from_address == null || $company->mail_from_name == null){
            return response()->json(['status' => FALSE, 'msg' => 'Mail Config not set yet!']);
        }

        Config::set('mail.mailers.smtp.transport', 'smtp');
        Config::set('mail.mailers.smtp.host', $company->mail_host);
        Config::set('mail.mailers.smtp.port', $company->mail_port);
        Config::set('mail.mailers.smtp.encryption', $company->mail_encryption);
        Config::set('mail.mailers.smtp.username', $company->mail_username);
        Config::set('mail.mailers.smtp.password', $company->mail_password);

        $purchaseOrder = PurchaseOrder::with('suppliers', 'wip', 'company', 'branch')->where('id', $request->orderId)->first();
        $products = PurchaseOrderProducts::with(['product'])->where(['order_id'=>$request->orderId, 'company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->get();

        if(!$purchaseOrder->suppliers->email){
            return response()->json(['status' => FALSE, 'msg' => 'Supplier email address not set yet!']);
        }

        array_push($emails, $purchaseOrder->suppliers->email) ;

        $data = ['company'=>$company, 'purchaseOrder'=>$purchaseOrder , 'emails' =>$emails];

        $pdf = PDF::loadView('admin.purchase.purchase-order-printBill', ['title'=> 'Print Bill', 'order' => $purchaseOrder, 'products' => $products]);

        Mail::send('emails.sales.invoicegen', $data, function ($message) use ($data, $pdf) {
            $message->to($data['emails'])
                ->from($address = $data['company']->mail_from_address, $name = $data['company']->mail_from_name)
                ->subject('Order')
                ->attachData($pdf->output(), $data['purchaseOrder']->order_id.".pdf");
        });

        if (Mail::failures()) {
            return response()->json(['status' => FALSE, 'msg' => 'Sorry! Mail not sended.']);
        }else{
            $log = '{"title":"Purchase Order sended.", "body":"purchase order sended.<br><b>Order Id:</b>'.$purchaseOrder->order_id.'"}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> $purchaseOrder->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Mail successfully sended.', 'email'=> $emails]);
        }


        

        
    }
    //Add Purchase
    public function addOrder(Request $request) {   
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'orderId' => 'required', 
            'suppliers' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }  
        // $prefix = '';
        // $settings = CompanySettings::where(['company_id'=>$request->companyId, 'branch_id'=> $request->branchId, 'setting_name'=> 'prefix'])->first();
        // if(!is_null($settings)){
        //     $prefix = json_decode($settings->setting)->purchase_order;
        // }
        
        // $purchaseCount = PurchaseOrder::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->count();
        $order = new PurchaseOrder;
        // $purchase->grn_no = 'GRN-'.$request->companyId.'-'.$request->branchId.'-'.($purchases+1);
        $order->order_id = $request->orderId;
        $order->date = date('Y-m-d', strtotime($request->date));
        $order->wip_id = isset($request->wipId)&&$request->orderType==1?$request->wipId:null;
        $order->company_id = $request->companyId;
        $order->branch_id = $request->branchId;
        $order->suppliers_id = $request->suppliers;
        $order->created_by = $request->loginId;
        if($order->save()){ 
            if($order->wip_id){
                $wip = Wip::find($order->wip_id);
                $wip->wip_status = 1;
                $wip->save();
            }
            $log = '{"title":"Purchase order Created.", "body":"Purchase order '.$order->order_id.' Created."}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> $order->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase successfully added.', 'insertId' => $order->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase not added.']);
        }
    }
    //Update Purchase
    public function updateOrder(Request $request) {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            // 'orderId' => 'required', 
            'suppliers' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $order = PurchaseOrder::find($request->orderId);
        if($order->status>=2){
            return response()->json(['status' => FALSE, 'msg'=>'Can not Change this order.']);
        }
        $prevData = $order->getOriginal();
        // $order->order_id = $prefix.($purchaseCount+1);
        $order->date = date('Y-m-d', strtotime($request->date));
        $order->wip_id = isset($request->wipId)&&$request->orderType==1?$request->wipId:null;
        $order->suppliers_id = $request->suppliers;
        $order->save();
        if($order->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $order->getChanges());
            $log = '{"title":"Purchase order Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> $order->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase order successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase order not updated.']);
        }
    }

    public function setFinalized(Request $request) {
        $validator = Validator::make($request->all(), [
            'orderId' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $order = PurchaseOrder::find($request->orderId);
        // if($order->status>=2){
        //     return response()->json(['status' => FALSE, 'msg'=>'Can not Change this order.']);
        // }
        $prevData = $order->getOriginal();
        // $order->order_id = $prefix.($purchaseCount+1);
        $order->finalize = 1;
        $order->save();
        if($order->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $order->getChanges());
            $log = '{"title":"Purchase order finalized.", "body":"Purchase order '.$order->order_id.' finalized"}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> $order->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase order successfully finalized.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase order not finalized.']);
        }
    }

    public function setCancelled(Request $request) {
        $validator = Validator::make($request->all(), [
            'orderId' => 'required',
            'reason' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $order = PurchaseOrder::find($request->orderId);
        // if($order->status>=2){
        //     return response()->json(['status' => FALSE, 'msg'=>'Can not Change this order.']);
        // }
        $prevData = $order->getOriginal();
        // $order->order_id = $prefix.($purchaseCount+1);
        $order->status = 4;
        $order->save();
        if($order->wasChanged()){
            $log = '{"title":"Purchase order cancelled.", "body":"Purchase order '.$order->order_id.' cancelled, <br> Reason: '.$request->reason.'"}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> $order->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase order successfully finalized.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase order not finalized.']);
        }
    }
    //Delete Purchase
    public function deleteOrder(Request $request) {
        $order = PurchaseOrder::find($request->orderId);
        if($order->status>0){
            return response()->json(['status' => FALSE, 'msg'=>'Can not delete this order.']);
        }
        if($order->delete()){
            $log = '{"title":"Purchase order Deleted.", "body":"Purchase order Id:'.$order->order_id.' Deleted."}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> $order->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase order '.$order->order_id.' is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase order not deleted.']);
        }
    }
}
