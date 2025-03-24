<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SalesPayments;
use App\Models\Revenues;
use App\Models\Sales;
use App\Models\ChequeReceived;

class SalesPaymentsController extends Controller
{
    public function index(){
        return view('admin.salespayment.payment-list', ['title'=> 'Sales Payments']);
    }
    public function view() {
        return view('admin.salespayment.view', ['title'=> 'View SalesPayments']);
    }
    //Get All Sales Payments
    public function getSalesPayments(Request $request){
        $salesPaymentQuery = SalesPayments::with('customer', 'paymentMethod')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId])->orderBy('id', 'DESC');
        //isset customer
        if(isset($request->sltCustomer) && !empty($request->sltCustomer))
            $salesPaymentQuery->where('customer_id', $request->sltCustomer);
        
        // isset fromDate
        if(isset($request->fromDate) && !empty($request->fromDate))
            $salesPaymentQuery->whereDate('date', '>=', date('Y-m-d', strtotime($request->fromDate)));

        // isset toDate
        if(isset($request->toDate) && !empty($request->toDate))
            $salesPaymentQuery->whereDate('date', '<=', date('Y-m-d', strtotime($request->toDate)));


        $salesPayments = $salesPaymentQuery->get();
        if(count($salesPayments)>0){
            $log = '{"title":"View sales payments.", "body":"View sales payments."}';
            $data = [
                'moduleName'=> 'sales_payments',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'paymentsData' => $salesPayments]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Payment not found.']);
    }
    //Get Single Purchase payment
    public function getSalesPayment(Request $request){
        $salesPayment = SalesPayments::with('customer', 'paymentMethod', 'revenue')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId, 'id'=> $request->salesPaymentId])->first();
        foreach($salesPayment->revenue as $revenue){
            if($revenue->payment_type == 1){
                $sale = Sales::find($revenue->type_id);
                $revenue->invoice_id = $sale->invoice_id;
            }
        }       

        if(!is_null($salesPayment)){
            $log = '{"title":"View sales payment.", "body":"View sales payment."}';
            $data = [
                'moduleName'=> 'sales_payments',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'paymentData' => $salesPayment]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Payment not found.']);
    }

    public function deleteSalesPayment(Request $request){
        ChequeReceived::where(['issue_to'=>'sales_payments', 'issue_id'=>$request->salesPaymentId])->delete();
        Revenues::where(['sales_payment_id'=>$request->salesPaymentId])->delete();
        $salesPayment = SalesPayments::find($request->salesPaymentId);
        if($salesPayment->delete()){
            $log = '{"title":"Sales payment Deleted.", "body":"Sales payment Id:'.$salesPayment->id.' Deleted.<br>Related Cheques and Expenses records also deleted"}';
            $data = [
                'moduleName'=> 'sales_payments',
                'moduleId'=> $salesPayment->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Sales payment is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Sales payment details not deleted.']);
        }
    }
}
