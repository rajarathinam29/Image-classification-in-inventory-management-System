<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\SalesProducts;
use App\Models\Sales;
use App\Models\Purchase;
use App\Models\PaymentMethod;
use App\Models\Revenues;
use App\Models\Expenses;
use App\Models\Products;
use App\Models\WipHandOver;
use App\Models\PurchaseOrder;

class SalesReportController extends Controller
{
    public function index() {
        return view('admin.reports.frequentlysales-report', ['title'=> 'Frequently Selling Products Report']);
    }

    public function salesSummary() {
        return view('admin.reports.salessummary-report', ['title'=> 'Sales Summary Report']);
    }

    public function grossProfitReport(){
        return view('admin.reports.profit-report', ['title'=> 'Product Profit Report']);
    }
    // Sales Summary Report
    public function getSalesSummaryReport(Request $request){
        $paymentmethods = PaymentMethod::all();
        $curdate  = date('Y-m-d');
        $startDate = date('Y-m-1', strtotime($curdate));
        $endDate = date('Y-m-t', strtotime($curdate));
        if(isset($request->fromDate) && !empty($request->fromDate)){
            $startDate = date('Y-m-d', strtotime($request->fromDate));
        }
        if(isset($request->toDate) && !empty($request->toDate)){
            $endDate = date('Y-m-d', strtotime($request->toDate));
        }
        $salesArr = [];
        $i = 0;
        $date = $startDate;
        while($date < $endDate){
            $date = date("Y-m-d", strtotime( $startDate." +$i days"));

            $salesQuery = Sales::with('salesProducts')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId]);

            $salesQuery->whereDate('invoice_date', $date);

            $sales = $salesQuery->get();
            $totalSales = 0;
            if(count($sales)>0){
                $salesSummary = [
                    'Date'=> $date
                ];
                $creditSales = 0;
                foreach($sales as $sale){
                    $salesProducts = $sale->salesProducts;
                    $subtotal = 0;
                    foreach($salesProducts as $product){
                        $vat = $product->vat*$product->sale_price/100;
                        $total = $product->qty*($product->sale_price+$vat);
                        $dis = $product->qty*($product->mrp-$product->sale_price);
                        $subtotal += $total;
                    }
                    $totalSales += $subtotal;
                    foreach($paymentmethods as $method){
                        $revenue = Revenues::select(DB::raw("(sum(amount)) as totalAmount"))->where(['payment_type'=> 1, 'type_id'=>$sale->id, 'payment_method'=>$method->id])->whereDate('date', $date)->get();
                        $expense = Expenses::select(DB::raw("(sum(amount)) as totalAmount"))->where(['payment_type'=> 1, 'type_id'=>$sale->id, 'payment_method'=>$method->id])->whereDate('date', $date)->get();
                        $totalAmount = $revenue[0]->totalAmount - $expense[0]->totalAmount;
                        $creditSales += $totalAmount;
                        if(array_key_exists($method->method_name,$salesSummary)){
                            $salesSummary[$method->method_name] += $totalAmount;
                        }else{
                            $salesSummary[$method->method_name] = $totalAmount;
                        }
                        
                    }
                    
                }
                $salesSummary['Credit'] = $totalSales - $creditSales;
                $salesSummary['Total'] = $totalSales;

                
                $salesArr[] = $salesSummary;
            }
            
            

            $i++;
        }
        return response()->json(['status' => TRUE, 'salesSummary'=>$salesArr]);
    }

    public function getSalesQtyProductId(Request $request){
        $salesProducts = SalesProducts::select(
            'product_id',
            DB::raw("(sum(qty)) as totalQty"),
            DB::raw("DATE_FORMAT(sales.invoice_date, '%m-%Y') date"),
            DB::raw('YEAR(sales.invoice_date) year, MONTH(sales.invoice_date) month')
        )
        ->LeftJoin('sales', ['sales.id'=>'sales_products.sale_id'])
        ->where([
            'sales.company_id' => $request->companyId, 
            'sales.branch_id' => $request->branchId,
            'product_id' => $request->productId]
        )->whereYear('sales.invoice_date', '=', date('Y', strtotime($request->dateTime)))
        ->orderBy('sales.invoice_date')
        ->groupBy(DB::raw("DATE_FORMAT(sales.invoice_date, '%m-%Y')"))
        ->get();

        if(is_null($salesProducts)){
            return response()->json(['status' => FALSE, 'msg' => 'Sales not found.']);
        }

        return response()->json(['status' => TRUE, 'salesChartData' => $salesProducts]);
    }

    public function getSalesPurchase12Months(Request $request){
        $curdate  = date('Y-m-1', strtotime($request->date));
        $salesArr = [];
        $salesWipArr = [];
        $purchaseArr = [];
        $purchaseWipArr = [];
        $dateArr = [];
        $i =12;
        while($i > 0){
            $i--;
            $dateArr[] = date('M Y', strtotime($curdate." -".$i." months"));
            $date = date("Y-m-1", strtotime($curdate." -$i months"));

            $salesQuery = Sales::with('salesProducts')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId]);

            $salesQuery->whereYear('invoice_date', date('Y', strtotime($date)));
            $salesQuery->whereMonth('invoice_date', date('m', strtotime($date)));

            $sales = $salesQuery->get();
            $totalSales = 0;
            if(count($sales)>0){
                foreach($sales as $sale){
                    $salesProducts = $sale->salesProducts;
                    $subtotal = 0;
                    foreach($salesProducts as $product){
                        $vat = $product->vat*$product->sale_price/100;
                        $total = $product->qty*($product->sale_price+$vat);
                        $dis = $product->qty*($product->mrp-$product->sale_price);
                        $subtotal += $total;
                    }
                    $totalSales += $subtotal;
                }
            }
            $salesArr[] = number_format((float)$totalSales, 2, '.', '');
            

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
            $purchaseArr[] = number_format((float)$totalPurchase, 2, '.', '');
            //Wip Sales
            $wipSalesQ = WipHandOver::with('stock')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId]);
            $wipSalesQ->whereYear('handover_date', date('Y', strtotime($date)));
            $wipSalesQ->whereMonth('handover_date', date('m', strtotime($date)));

            $wipSales = $wipSalesQ->get();
            $totalWipSales = 0;
            if(count($wipSales)>0){
                foreach($wipSales as $sale){
                    $qty = $sale->units;
                    $salePrice = $sale->stock->sale_price;
                    $total = $qty*$salePrice;
                    $totalWipSales += $total;
                }
            }
            $salesWipArr[] = number_format((float)$totalWipSales, 2, '.', '');
            //Wip Purchase
            $wipPurchaseQ = PurchaseOrder::with('purchaseProducts')->where(['company_id' => $request->companyId, 'branch_id' => $request->branchId]);
            $wipPurchaseQ->whereYear('date', date('Y', strtotime($date)));
            $wipPurchaseQ->whereMonth('date', date('m', strtotime($date)));

            $wipPurchases = $wipPurchaseQ->get();
            $totalWipPuchases = 0;
            if(count($wipPurchases)>0){
                foreach($wipPurchases as $order){
                    $orderProducts = $order->purchaseProducts;
                    $subTotal = 0;
                    foreach($orderProducts as $product){
                        // $vat = $product->vat*$product->sale_price/100;
                        $total = $product->units*$product->cost_price;
                        // $dis = $product->qty*($product->mrp-$product->sale_price);
                        $subTotal += $total;
                    }
                    $totalWipPuchases += $subTotal;
                }
            }
            $purchaseWipArr[] = number_format((float)$totalWipPuchases, 2, '.', '');
        }
        return response()->json(['status' => TRUE, 'purchase' => $purchaseArr, 'dates'=> $dateArr, 'sales'=>$salesArr, 'wipSales'=>$salesWipArr, 'wipPurchase'=>$purchaseWipArr]);
    }

    public function getFrequentSaleProducts(Request $request){
        $salesProductsQ = SalesProducts::select(
            'product_id',
            DB::raw("SUM(qty) as salesQty"),
            DB::raw("AVG(sale_price) as selling_price")
        )
        ->with('product')
        ->LeftJoin('sales', ['sales.id'=>'sales_products.sale_id'])
        ->where([
            'sales.company_id' => $request->companyId, 
            'sales.branch_id' => $request->branchId,
        ]);
        if(isset($request->fromDate) && !empty($request->fromDate)){
            $salesProductsQ->whereDate('sales.invoice_date', '>=', date('Y-m-d', strtotime($request->fromDate)));
        }else{
            $salesProductsQ->whereDate('sales.invoice_date', '>=', date('Y-m-01'));
        }
        if(isset($request->toDate) && !empty($request->toDate)){
            $salesProductsQ->whereDate('sales.invoice_date', '<=', date('Y-m-d', strtotime($request->toDate)));
        }else{
            $salesProductsQ->whereDate('sales.invoice_date', '<=', date('Y-m-t'));
        }
        $salesProductsQ->orderBy('salesQty', 'DESC');
        $salesProductsQ->orderBy('selling_price', 'DESC');
       
        $salesProductsQ->groupBy('product_id');
        if(isset($request->limit) && !empty($request->limit)){
            $salesProductsQ->limit($request->limit);
        }
        
        $salesProducts = $salesProductsQ->get();

        return response()->json(['status' => TRUE, 'frqSalesData' => $salesProducts]);
    }

    public function getGrossProfit(Request $request){
        $curdate  = date('Y-m-d');

        if(isset($request->date) && !empty($request->date)){
            $curdate = date('Y-m-d', strtotime($request->date));
        }

        $salesQuery = SalesProducts::select(
            'product_id',
            DB::raw("SUM(qty) as Qty"),
            'cost_price',
            'sale_price'
        )->with('product')
        ->LeftJoin('sales', ['sales.id'=>'sales_products.sale_id'])
        ->where(['sales.company_id' => $request->companyId, 'sales.branch_id' => $request->branchId]);
        $salesQuery->whereDate('sales.invoice_date', $curdate);
        $salesQuery->groupBy('sale_price');
        $salesQuery->groupBy('product_id');
        $salesProducts = $salesQuery->get();

        $profitArr = [];

        // if(count($sales)>0){
        //     foreach($sales as $sale){
        //         $salesProducts = $sale->salesProducts;
                foreach($salesProducts as $salesProduct){
                    // $product = Products::find($salesProduct->product_id);
                    $total_sales = $salesProduct->sale_price*$salesProduct->Qty;
                    $total_profit = ($salesProduct->sale_price-$salesProduct->cost_price)*$salesProduct->Qty;
                    $margin = (($salesProduct->sale_price-$salesProduct->cost_price)/$salesProduct->cost_price)*100;
                    $proArr = [
                        'product_id' => $salesProduct->product_id,
                        'product_name' => $salesProduct->product->product_name,
                        'qty' => $salesProduct->Qty,
                        'total_sales_price' => $total_sales,
                        'total_profit' => $total_profit,
                        'margin' => $margin
                    ];
                    $profitArr[] = $proArr;
                }
        //     }
        // }
        return response()->json(['status' => TRUE, 'productProfit'=>$profitArr]);
    }
}
