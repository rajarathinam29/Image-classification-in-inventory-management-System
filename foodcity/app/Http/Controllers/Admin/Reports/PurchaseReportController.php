<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\PurchaseProducts;

class PurchaseReportController extends Controller
{
    public function index() {
        return view('admin.reports.frequentlypurchase-report', ['title'=> 'Frequently Purchased Products Report']);
    }

    public function getPurchaseQtyProductId(Request $request){
        $purchaseProducts = PurchaseProducts::select(
            'product_id',
            DB::raw("(sum(units+free)) as totalQty"),
            DB::raw("DATE_FORMAT(purchase.date, '%m-%Y') date"),
            DB::raw('YEAR(purchase.date) year, MONTH(purchase.date) month')
        )
        ->LeftJoin('purchase', ['purchase.id'=>'purchased_products.purchase_id'])
        ->where([
            'purchase.company_id' => $request->companyId, 
            'purchase.branch_id' => $request->branchId,
            'product_id' => $request->productId]
        )->whereYear('purchase.date', '=', date('Y', strtotime($request->dateTime)))
        ->orderBy('purchase.date')
        ->groupBy(DB::raw("DATE_FORMAT(purchase.date, '%m-%Y')"))
        ->get();

        if(is_null($purchaseProducts)){
            return response()->json(['status' => FALSE, 'msg' => 'Purchase not found.']);
        }

        return response()->json(['status' => TRUE, 'purchaseChartData' => $purchaseProducts]);
    }

    public function getFrequentPurchaseProducts(Request $request){
        $purchaseProductsQ = PurchaseProducts::select(
            'product_id',
            DB::raw("SUM(units+free) as totalQty"),
            DB::raw("AVG(cost_price) as cost_price")
        )
        ->with('product')
        ->LeftJoin('purchase', ['purchase.id'=>'purchased_products.purchase_id'])
        ->where([
            'purchase.company_id' => $request->companyId, 
            'purchase.branch_id' => $request->branchId,
        ]);
        if(isset($request->fromDate) && !empty($request->fromDate)){
            $purchaseProductsQ->whereDate('purchase.date', '>=', date('Y-m-d', strtotime($request->fromDate)));
        }else{
            $purchaseProductsQ->whereDate('purchase.date', '>=', date('Y-m-01'));
        }
        if(isset($request->toDate) && !empty($request->toDate)){
            $purchaseProductsQ->whereDate('purchase.date', '<=', date('Y-m-d', strtotime($request->toDate)));
        }else{
            $purchaseProductsQ->whereDate('purchase.date', '<=', date('Y-m-t'));
        }
        $purchaseProductsQ->orderBy('totalQty', 'DESC');
        $purchaseProductsQ->orderBy('cost_price', 'DESC');
       
        $purchaseProductsQ->groupBy('product_id');
        if(isset($request->limit) && !empty($request->limit)){
            $purchaseProductsQ->limit($request->limit);
        }
        
        
        $purchaseProducts = $purchaseProductsQ->get();

        return response()->json(['status' => TRUE, 'frqPurchaseData' => $purchaseProducts]);
    }
}
