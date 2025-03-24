<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\SalesProducts;
use App\Models\PurchaseProducts;
use App\Models\StockCount;
use App\Models\StockCountProducts;
use App\Models\PurchaseReturn;
use App\Models\PurchaseReturnProducts;

use DB;

class StockReportController extends Controller
{
    public function index() {
        return view('admin.reports.stock-report', ['title'=> 'Stock Report']);
    }

    public function stock() {
        return view('admin.stock.stock', ['title'=> 'Stock']);
    }

    public function getStockReport(Request $request){
        $lastStockCount = StockCount::where(['company_id' => $request->companyId, 'branch_id' => $request->branchId, 'status' => 1])->orderBy('start_date', 'DESC')->first();

        $productsQuery = Products::with('type')->where('company_id', $request->companyId);

        //isset category
        if(isset($request->category) && !empty($request->category))
            $productsQuery->where(['productcategory_id'=> $request->category]) ;
        //isset company
        if(isset($request->company) && !empty($request->company))
            $productsQuery->where(['product_company_id'=> $request->company]) ;
        //isset brand
        if(isset($request->brand) && !empty($request->brand))
            $productsQuery->where(['product_brand_id'=> $request->brand]);
        //isset unit type
        if(isset($request->unitType) && !empty($request->unitType))
            $productsQuery->where(['units_type'=> $request->unitType]) ;

        $products = $productsQuery->get();

        if(is_null($products)){
            return response()->json(['status' => FALSE, 'msg' => 'products not found.']);
        }

        foreach($products as $product){
            $counted = 0;
            $avgSalesPrice = 0;
            $avgPurchasePrice = 0;
            $countedDate = '';
            // Get Stock count Data
            if(!is_null($lastStockCount)){
                $stkCntProducts = StockCountProducts::select(
                    DB::raw("(sum(units)) as totalQty"),
                    DB::raw("AVG(cost_price) as cost_price"),
                    DB::raw("AVG(mrp) as mrp"),
                )->where(['stock_count_id'=>$lastStockCount->id, 'product_id'=>$product->id])->get();
                if($stkCntProducts[0]->totalQty){
                    $counted = $stkCntProducts[0]->totalQty;
                    $avgPurchasePrice += $stkCntProducts[0]->cost_price;
                    $avgSalesPrice += $stkCntProducts[0]->mrp;
                }
                $countedDate = $lastStockCount->start_date;
            }
            //get SOLD products Data
            $sold = 0;
            $salesProductsQ = SalesProducts::LeftJoin('sales', ['sales.id'=>'sales_products.sale_id'])->where(['sales_products.company_id' => $request->companyId, 'sales_products.branch_id' => $request->branchId, 'sales_products.product_id'=>$product->id, ['reusable','<',2]]);
            if($countedDate){
                $salesProductsQ->whereDate('sales.invoice_date','>=', date('Y-m-d', strtotime($countedDate)));
            }
            

            $salesProducts = $salesProductsQ->get();
            if(count($salesProducts)){
                foreach($salesProducts as $saleProduct){
                    $sold += $saleProduct->qty;
                    $avgSalesPrice += $saleProduct->sale_price;
                }
                $totalSalesProduct = count($salesProducts);
                if($counted>0){
                    $totalSalesProduct++;
                }
                $avgSalesPrice = $avgSalesPrice/$totalSalesProduct;
            }
            //get Purchaserd products Data
            $purchased=0;
            $purchaseProductsQ = PurchaseProducts::LeftJoin('purchase', ['purchase.id'=>'purchased_products.purchase_id'])->LeftJoin('stock_transfer', ['stock_transfer.id'=>'purchased_products.transfer_id'])->where(['purchased_products.company_id' => $request->companyId, 'purchased_products.branch_id' => $request->branchId, 'purchased_products.product_id'=>$product->id]);
            if($countedDate){
                $purchaseProductsQ->where(function($query) use ($countedDate){
                    $query->whereDate('purchase.date','>=', date('Y-m-d', strtotime($countedDate)))
                    ->orWhereDate('stock_transfer.transfer_date','>=', date('Y-m-d', strtotime($countedDate)));
                });
            }
            $purchaseProducts = $purchaseProductsQ->get();
            if(count($purchaseProducts)){
                foreach($purchaseProducts as $purchaseProduct){
                    $purchased += ($purchaseProduct->units+$purchaseProduct->free);
                    $avgPurchasePrice += $purchaseProduct->cost_price;
                }
                $totalPurchaseProduct = count($purchaseProducts);
                if($counted>0){
                    $totalPurchaseProduct++;
                }
                $avgPurchasePrice = $avgPurchasePrice/$totalPurchaseProduct;
            }

            $return = 0;
            $returnProductsQ = PurchaseReturnProducts::LeftJoin('purchase_return', ['purchase_return.id'=>'purchase_return_products.purchase_return_id'])->where(['purchase_return_products.company_id' => $request->companyId, 'purchase_return_products.branch_id' => $request->branchId, 'purchase_return_products.product_id'=>$product->id]);
            if($countedDate){
                $returnProductsQ->where(function($query) use ($countedDate){
                    $query->whereDate('purchase_return.date','>=', date('Y-m-d', strtotime($countedDate)));
                });
            }
            $returnProducts = $returnProductsQ->get();
            if(count($returnProducts)){
                foreach($returnProducts as $returnProduct){
                    $return += $returnProduct->units;
                }
                
            }

            $product->sold = $sold;
            $product->purchasedQty = $purchased;
            $product->return = $return;
            $product->avgSalesPrice = $avgSalesPrice;
            $product->avgPurchasePrice = $avgPurchasePrice;
            $product->counted = $counted;
            $product->countedDate = $countedDate;
        }

        return response()->json(['status' => TRUE, 'stocksData' => $products]);
    }
}
