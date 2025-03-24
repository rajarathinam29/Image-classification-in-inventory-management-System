<?php

namespace App\Http\Controllers\Admin\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\PurchaseOrderAttachments;
use App\Models\PurchaseOrder;

class PurchaseOrderAttachmentsController extends Controller
{
    public function uploadAttachmentView(Request $request) {
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        return view('admin.purchase.upload-attachments', ['title'=> 'Upload Purchase Order Attachment']);
    }

    public function generateUploadAttachmentUrl(Request $request){
        $url = URL::temporarySignedRoute('purchaseOrder.uploadAttachmentView', now()->addMinutes(5), ['q' => $request->q]);
        return response()->json(['status' => TRUE, 'url' => $url]);
    } 

    public function uploadAttachment(Request $request){
        $file = $request->file('file');
        $fileName = time().'_'.$file->getClientOriginalName();
        $fileSize = $file->getSize();
        // $file->move(public_path('uploads/purchase'), $fileName);
        $file->move('uploads/purchase_order', $fileName);
       
        $attachment = new PurchaseOrderAttachments;
        $attachment->order_id = $request->orderId;
        $attachment->file_name = $file->getClientOriginalName();
        $attachment->file_path = 'uploads/purchase_order/'.$fileName;
        $attachment->file_size = $fileSize;
        $attachment->created_by = $request->loginId;
        $attachment->company_id = $request->companyId;
        if($attachment->save()){
            $log = '{"title":"Purchase order attachment added.", "body":"Purchase order attachment '.$attachment->file_name.' added."}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> $attachment->order_id,
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
        $attachments = PurchaseOrderAttachments::where(['order_id'=>$request->orderId])->orderBy('id', 'DESC')->get();
        $order = PurchaseOrder::find($request->orderId);
        if(!is_null($attachments)){
            $log = '{"title":"View purchase attachments.", "body":"View Purchase attachments.<br><b>Order Id:</b>'.$order->order_id.'"}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> $order->order_id,
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

    public function deleteAttachment(Request $request){
        $attachments = PurchaseOrderAttachments::find($request->attachmentId);
        if($attachments->delete()){
            $log = '{"title":"Attachment Deleted.", "body":"Attachment :'.$attachments->file_name.' Deleted."}';
            $data = [
                'moduleName'=> 'purchase_orders',
                'moduleId'=> $attachments->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Attachment successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Attachment not deleted.']);
        }
    }
}
