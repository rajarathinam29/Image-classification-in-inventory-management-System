<?php

namespace App\Http\Controllers\Admin\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\PurchaseReturnAttachments;
use App\Models\PurchaseReturn;

class PurchaseReturnAttachmentsController extends Controller
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
        $purchaseReurn = PurchaseReturn::find($request->returnId);
        $file = $request->file('file');
        $fileName = time().'_'.$file->getClientOriginalName();
        $fileSize = $file->getSize();
        // $file->move(public_path('uploads/purchase'), $fileName);
        $file->move('uploads/purchase_return/'.$purchaseReurn->return_id.'/', $fileName);
       
        $attachment = new PurchaseReturnAttachments;
        $attachment->purchase_return_id = $request->returnId;
        $attachment->file_name = $file->getClientOriginalName();
        $attachment->file_path = 'uploads/purchase_return/'.$purchaseReurn->return_id.'/'.$fileName;
        $attachment->file_size = $fileSize;
        $attachment->created_by = $request->loginId;
        $attachment->company_id = $request->companyId;
        $attachment->branch_id = $request->branchId;
        if($attachment->save()){
            $log = '{"title":"Purchase return attachment added.", "body":"Purchase return attachment '.$attachment->file_name.' added."}';
            $data = [
                'moduleName'=> 'purchase_return',
                'moduleId'=> $attachment->purchase_return_id,
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
        $attachments = PurchaseReturnAttachments::where(['purchase_return_id'=>$request->returnId])->orderBy('id', 'DESC')->get();
        $return = PurchaseReturn::find($request->returnId);
        if(!is_null($attachments)){
            $log = '{"title":"View purchase return attachments.", "body":"View Purchase return attachments.<br><b>Return Id:</b>'.$return->return_id.'"}';
            $data = [
                'moduleName'=> 'purchase_return',
                'moduleId'=> $return->return_id,
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
        $attachments = PurchaseReturnAttachments::find($request->attachmentId);
        if($attachments->delete()){
            $log = '{"title":"Attachment Deleted.", "body":"Attachment :'.$attachments->file_name.' Deleted."}';
            $data = [
                'moduleName'=> 'purchase_return',
                'moduleId'=> $attachments->purchase_return_id,
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
