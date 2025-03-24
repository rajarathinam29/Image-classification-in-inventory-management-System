<?php

namespace App\Http\Controllers\Admin\Stocks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\StockTransfer;
use App\Models\StockTransferProducts;
use App\Models\PurchaseProducts;
use App\Models\Products;
use App\Models\WipPartsReceived;
use App\Models\WipStock;

class StockTransferController extends Controller
{
    public function index() {
        return view('admin.stocktransfer.stocktransfer-list', ['title'=> 'Stock Transfers']);
    }

    public function create() {
        return view('admin.stocktransfer.create', ['title'=> 'Create Stock Transfer']);
    }

    public function edit() {
        return view('admin.stockcount.edit', ['title'=> 'Edit Stock Transfer']);
    }

    public function view() {
        return view('admin.stocktransfer.view', ['title'=> 'View Stock Transfer']);
    }

    public function getTransfersData(Request $request){
        $stockTransfers = StockTransfer::with('transferType')->where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->orderBy('id','DESC')->get();
        if(count($stockTransfers)>0){
            return response()->json(['status' => TRUE, 'stockTransfersData' => $stockTransfers]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Stock transfer not found.']);
    }

    //Get Stock count
    public function getStockTransfer(Request $request){
        $stockTransfer = StockTransfer::with(['user' => function($query) {
            $query->select(['id', 'first_name', 'last_name']);
        },'transferProducts', 'transferType'])->where('id', $request->stockTransferId)->first();
        if(!is_null($stockTransfer)){
            if($stockTransfer->transferProducts){
                foreach($stockTransfer->transferProducts as $transfer_product){
                    $product = Products::find($transfer_product->product_id);
                    $transfer_product->bar_code = $product->bar_code;
                    $transfer_product->product_name = $product->product_name;
                }
            }
            return response()->json(['status' => TRUE, 'stockTransferData' => $stockTransfer]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Stock transfer not found.']);
    }

    public function getWipStockTransfer(Request $request){
        $transferProducts = StockTransferProducts::with('product', 'user')->leftJoin('stock_transfer', 'stock_transfer.id', '=', 'stock_transfer_products.transfer_id')
        ->where([
            // 'product_id'=>$product->product_id,
            // 'wip_stock_id'=>$product->id,
            'stock_transfer.transfer_source' => 2,
            'stock_transfer.from_id' => $request->wipId,
        ])->get();

        if(!is_null($transferProducts)){
            return response()->json(['status' => TRUE, 'stockTransferData' => $transferProducts]);
        }

        return response()->json(['status' => FALSE, 'msg' => 'Stock transfer not found.']);
    }

    public function addStockTransfer(Request $request){
        $validator = Validator::make($request->all(), [
            'transferDate' => 'required',
            'transferType' => 'required',
            'transferFrom' => 'required_if:transferType,2',
            'transferTo' => 'required_if:transferType,3',
            'transferProducts' => 'required',
            'transferProducts.*.product_id' => 'required',
            'transferProducts.*.transfer_units' => 'required|min:1|max:transferProducts.*.stock',
            'transferProducts.*.cost_price' => 'required',
            'transferProducts.*.mrp' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $countTransfer = StockTransfer::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->count();

        $transfer = new StockTransfer;
        $transfer->ref_no = $countTransfer+1;
        $transfer->transfer_date = date('Y-m-d H:i:s', strtotime($request->transferDate));
        $transfer->transfer_source = $request->transferType;
        $transfer->from_id = $request->transferFrom;
        $transfer->to_id = $request->transferTo;
        $transfer->company_id = $request->companyId;
        $transfer->branch_id = $request->branchId;
        $transfer->created_by = $request->loginId;
        if($transfer->save()){
            $transferProducts = $request->transferProducts;
            foreach($transferProducts as $product){
                $transferProduct = new StockTransferProducts;
                $transferProduct->transfer_id = $transfer->id;
                $transferProduct->wip_stock_id = $request->transferType==2?$product['wip_stock_id']:null;
                $transferProduct->product_id = $product['product_id'];
                $transferProduct->units = $product['transfer_units'];
                $transferProduct->cost_price = $product['cost_price'];
                $transferProduct->sale_price = $product['sale_price']?$product['sale_price']:$product['mrp'];
                $transferProduct->mrp = $product['mrp'];
                $transferProduct->company_id = $request->companyId;
                $transferProduct->branch_id = $request->branchId;
                $transferProduct->created_by = $request->loginId;
                $transferProduct->save();

                $purchseTransUnits = 0;
                switch($request->transferType){
                    case '2':
                        $purchseTransUnits = $product['transfer_units'];
                        break;

                    case '3':
                        $purchseTransUnits = -$product['transfer_units'];
                        break;
                }

                $purchaseProduct = new PurchaseProducts;
                $purchaseProduct->transfer_id = $transfer->id;
                $purchaseProduct->product_id = $product['product_id'];
                $purchaseProduct->units = $purchseTransUnits;
                $purchaseProduct->cost_price = $product['cost_price'];
                $purchaseProduct->sale_price = $product['sale_price']?$product['sale_price']:$product['mrp'];
                $purchaseProduct->mrp = $product['mrp'];
                $purchaseProduct->total = $purchseTransUnits*$product['sale_price'];
                $purchaseProduct->company_id = $request->companyId;
                $purchaseProduct->branch_id = $request->branchId;
                $purchaseProduct->created_by = $request->loginId;
                $purchaseProduct->save();
            }
            if($request->transferType == '3'){
                $countPartsReceived = WipPartsReceived::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->withTrashed()->count();
                $partsReceived = new WipPartsReceived;
                // $partsReceived->grn_no = 'GRN-'.$request->companyId.'-'.$request->branchId.'-'.($partsReceiveds+1);
                $partsReceived->grn_no = 'ST'.($countPartsReceived+1);
                $partsReceived->date = date('Y-m-d H:i:s', strtotime($request->transferDate));
                $partsReceived->company_id = $request->companyId;
                $partsReceived->branch_id = $request->branchId;
                $partsReceived->wip_id = $request->transferTo;
                $partsReceived->transfer_id = $transfer->id;
                $partsReceived->received_status = 2;
                $partsReceived->created_by = $request->loginId;
                if($partsReceived->save()){
                    foreach($transferProducts as $product){
                        $purchaseProduct = new WipStock;
                        $purchaseProduct->wip_parts_received_id = $partsReceived->id;
                        $purchaseProduct->product_id = $product['product_id'];
                        $purchaseProduct->units = $product['transfer_units'];
                        $purchaseProduct->free =  0;
                        $purchaseProduct->cost_price = $product['cost_price'];
                        $purchaseProduct->sale_price = $product['sale_price']?$product['sale_price']:$product['mrp'];
                        $purchaseProduct->mrp = $product['mrp'];
                        $purchaseProduct->total = $product['transfer_units']*$product['cost_price'];
                        $purchaseProduct->expiry_date = null;
                        $purchaseProduct->receive_date = date('Y-m-d', strtotime($request->transferDate));
                        $purchaseProduct->note = 'stock transfered';
                        $purchaseProduct->company_id = $request->companyId;
                        $purchaseProduct->branch_id = $request->branchId;
                        $purchaseProduct->created_by = $request->loginId;
                        $purchaseProduct->save();
                    }
                }
            }

            $log = '{"title":"Stock Transfer Created.", "body":"Stock Transfer id:'.$transfer->id.' Created."}';
            $data = [
                'moduleName'=> 'stock_transfer',
                'moduleId'=> $transfer->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);

            return response()->json(['status' => TRUE, 'msg' => 'Stock transfer successfully added.', 'insertId' => $transfer->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Stock transfer not added.']);
        }
    }
}
