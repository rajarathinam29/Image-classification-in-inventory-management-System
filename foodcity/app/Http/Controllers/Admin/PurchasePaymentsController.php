<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PurchasePayments;
use App\Models\Purchase;
use App\Models\Expenses;
use App\Models\ChequeIssued;

class PurchasePaymentsController extends Controller
{
    public function index(){
        return view('admin.purchasepayment.payment-list', ['title'=> 'Purchase Payments']);
    }
    public function view() {
        return view('admin.purchasepayment.view', ['title'=> 'View PurchasePayments']);
    }
    //Get All Purchase Payments
    public function getPurchasePayments(Request $request){
        $purchasePaymentQuery = PurchasePayments::with('supplier', 'paymentMethod')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId])->orderBy('id', 'DESC');
        //isset supplier
        if(isset($request->sltSupplier) && !empty($request->sltSupplier))
            $purchasePaymentQuery->where('supplier_id', $request->sltSupplier);
        
        // isset fromDate
        if(isset($request->fromDate) && !empty($request->fromDate))
            $purchasePaymentQuery->whereDate('date', '>=', date('Y-m-d', strtotime($request->fromDate)));

        // isset toDate
        if(isset($request->toDate) && !empty($request->toDate))
            $purchasePaymentQuery->whereDate('date', '<=', date('Y-m-d', strtotime($request->toDate)));


        $purchasePayments = $purchasePaymentQuery->get();
        if(count($purchasePayments)>0){
            $log = '{"title":"View purchase payments.", "body":"View purchase payments."}';
            $data = [
                'moduleName'=> 'purchase_payments',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'paymentsData' => $purchasePayments]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Payment not found.']);
    }
    //Get Single Purchase payment
    public function getPurchasePayment(Request $request){
        $purchasePayment = PurchasePayments::with('supplier', 'paymentMethod', 'expenses')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId, 'id'=> $request->purchasePaymentId])->first();
        foreach($purchasePayment->expenses as $expense){
            if($expense->payment_type == 2){
                $purchase = Purchase::find($expense->type_id);
                $expense->grn_no = $purchase->grn_no;
            }
        }       

        if(!is_null($purchasePayment)){
            $log = '{"title":"View purchase payment.", "body":"View purchase payment."}';
            $data = [
                'moduleName'=> 'purchase_payments',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'paymentData' => $purchasePayment]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Payment not found.']);
    }

    public function deletePurchasePayment(Request $request){
        ChequeIssued::where(['issue_to'=>'purchase_payments', 'issue_id'=>$request->purchasePaymentId])->delete();
        Expenses::where(['purchase_payment_id'=>$request->purchasePaymentId])->delete();
        $purchasePayment = PurchasePayments::find($request->purchasePaymentId);
        if($purchasePayment->delete()){
            $log = '{"title":"Purchase payment Deleted.", "body":"Purchase payment Id:'.$purchasePayment->id.' Deleted.<br>Related Cheques and Expenses records also deleted"}';
            $data = [
                'moduleName'=> 'purchase_payments',
                'moduleId'=> $purchasePayment->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase payment is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase payment details not deleted.']);
        }
    }
}
