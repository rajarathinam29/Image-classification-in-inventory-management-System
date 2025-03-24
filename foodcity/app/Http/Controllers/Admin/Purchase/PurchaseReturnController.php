<?php

namespace App\Http\Controllers\Admin\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PurchaseReturn;
use App\Models\PurchaseReturnProducts;
use App\Models\Products;

class PurchaseReturnController extends Controller
{
    public function index() {
        return view('admin.purchase-return.return-list', ['title'=> 'Purchase Return']);
    }
    public function create() {
        return view('admin.purchase-return.purchase-return-create', ['title'=> 'Create Purchase Return']);
    }
    public function edit() {
        return view('admin.purchase-return.purchase-return-edit', ['title'=> 'Edit Purchase Return']);
    }
    public function view() {
        return view('admin.purchase-return.purchase-return-view', ['title'=> 'View Purchase Return']);
    }
    // 
    public function getPurchaseReturns(Request $request) {
        
        $returnQuery = PurchaseReturn::with(['suppliers'])->where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->orderBy('id', 'DESC');
         
        //isset supplier
        if(isset($request->sltSupplier) && !empty($request->sltSupplier))
            $returnQuery->where('suppliers_id', $request->sltSupplier);
        
        $returns = $returnQuery->get();
        if(!is_null($returns)){
            $log = '{"title":"View all purchase returns.", "body":"View all purchase returns"}';
            $data = [
                'moduleName'=> 'purchase_return',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'purchaseReturnData' => $returns]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'purchase return not found.']);
    }
    // Purchase Return
    public function getPurchaseReturn(Request $request){
        $return = PurchaseReturn::with('suppliers')->where('id', $request->returnId)->first();
        if(!is_null($return)){
            $log = '{"title":"View purchase return.", "body":"View purchase return.<br><b>return Id:</b>'.$return->return_id.'"}';
            $data = [
                'moduleName'=> 'purchase_return',
                'moduleId'=> $return->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'purchaseReturnData' => $return]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'purchase not found.']);
    }
    // Add Return
    public function addReturn(Request $request) {   
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            // 'orderId' => 'required', 
            'suppliers' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }  
        $prefix = '';
        
        $returnCount = PurchaseReturn::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->withTrashed()->count();
        $return = new PurchaseReturn;
        $return->return_id = $prefix.($returnCount+1);
        $return->date = date('Y-m-d H:i:s', strtotime($request->date));
        $return->status = 0;
        $return->company_id = $request->companyId;
        $return->branch_id = $request->branchId;
        $return->suppliers_id = $request->suppliers;
        $return->created_by = $request->loginId;
        if($return->save()){ 
            $log = '{"title":"Purchase return created.", "body":"Purchase return '.$return->return_id.' Created."}';
            $data = [
                'moduleName'=> 'purchase_return',
                'moduleId'=> $return->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase return successfully added.', 'insertId' => $return->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase return not added.']);
        }
    }
    // update Return
    public function updateReturn(Request $request) {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            // 'orderId' => 'required', 
            'suppliers' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $return = PurchaseReturn::find($request->returnId);
        if($return->status>=2){
            return response()->json(['status' => FALSE, 'msg'=>'Can not Change this return.']);
        }
        $prevData = $return->getOriginal();
        // $return->return_id = $prefix.($purchaseCount+1);
        $return->date = date('Y-m-d H:i:s', strtotime($request->date));
        $return->suppliers_id = $request->suppliers;
        $return->status = $request->status;
        $return->save();
        if($return->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $return->getChanges());
            $log = '{"title":"Purchase return Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'purchase_return',
                'moduleId'=> $return->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase return successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase return not updated.']);
        }
    }
    // Delete Return
    public function deleteReturn(Request $request) {
        $return = PurchaseReturn::find($request->returnId);
        // if($return->status>0){
        //     return response()->json(['status' => FALSE, 'msg'=>'Can not delete this return.']);
        // }
        PurchaseReturnProducts::where('return_id',$request->returnId)->delete();
        if($return->delete()){
            $log = '{"title":"Purchase return Deleted.", "body":"Purchase return Id:'.$return->return_id.' Deleted."}';
            $data = [
                'moduleName'=> 'purchase_return',
                'moduleId'=> $return->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase return '.$return->return_id.' successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase return not deleted.']);
        }
    }
    // Set Completed
    public function setCompleted(Request $request) {
        $validator = Validator::make($request->all(), [
            'returnId' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $return = PurchaseReturn::find($request->returnId);
        // if($order->status>=2){
        //     return response()->json(['status' => FALSE, 'msg'=>'Can not Change this order.']);
        // }
        $prevData = $return->getOriginal();
        // $return->return_id = $prefix.($purchaseCount+1);
        $return->status = 1;
        $return->save();
        if($return->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $return->getChanges());
            $log = '{"title":"Purchase return completed.", "body":"Purchase return '.$return->return_id.' completed"}';
            $data = [
                'moduleName'=> 'purchase_return',
                'moduleId'=> $return->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase return successfully completed.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase return not completed.']);
        }
    }

    //get all purchase Products
    public function getPurchaseReturnProducts(Request $request) {
        $productList = [];
        $products = PurchaseReturnProducts::with('product')->where(['purchase_return_id'=>$request->returnId, 'company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->get();
        $purchaseReturn = PurchaseReturn::find($request->returnId);
        if(!is_null($products)){
            foreach($products as $row){
                $data = [
                    'id' => $row->id,
                    'purchase_return_id' => $row->return_id,
                    'product_id' => $row->product_id,
                    'bar_code' => $row->product->bar_code,
                    'product_name' => $row->product->product_name,
                    'price_type' => $row->product->price_type,
                    'profit_margin' => $row->product->profit_margin,
                    'vat_type' => $row->product->vat_type,
                    'vat' => $row->product->vat,
                    'units' => $row->units,
                    'cost_price' => $row->cost_price,
                    'sale_price' => $row->sale_price,
                    'mrp' => $row->mrp,
                    'note' => $row->note,
                ];
                array_push($productList, $data);
            }
            $log = '{"title":"View purchase return products.", "body":"View purchase return products.<br><b>return Id:</b>'.$purchaseReturn->return_id.'"}';
            $data = [
                'moduleName'=> 'purchase_return',
                'moduleId'=> $purchaseReturn->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'returnProductData' => $productList]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Return product not found.']);
    }

    
    //Add Purchase
    public function addPurchaseReturnProduct(Request $request) {   
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'return_id' => 'required', 
            'units' => 'required',
            'cost_price' => 'required|lt:mrp',
            'sale_price' => 'nullable|gt:cost_price|lte:mrp',
            'mrp' => 'required|gt:cost_price',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }  
          
        $product = Products::find($request->product_id);  
        $returnProducts = new PurchaseReturnProducts;
        $returnProducts->purchase_return_id = $request->return_id;
        $returnProducts->product_id = $request->product_id;
        $returnProducts->units = $request->units;
        $returnProducts->cost_price = $request->cost_price;
        $returnProducts->sale_price = $request->sale_price ? $request->sale_price : 0;
        $returnProducts->mrp = $request->mrp;
        $returnProducts->note = $request->note;
        $returnProducts->company_id = $request->companyId;
        $returnProducts->branch_id = $request->branchId;
        $returnProducts->created_by = $request->loginId;
        if($returnProducts->save()){ 
            $log = '{"title":"Purchase return Product added.", "body":"Purchase return product added.<br><b>product name:</b>'.$product->product_name.'"}';
            $data = [
                'moduleName'=> 'purchase_return',
                'moduleId'=> $returnProducts->return_id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'return product successfully added.', 'insertId' => $returnProducts->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'product not added.']);
        }
    }
    //Update Purchase
    public function updatePurchaseReturnProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'return_id' => 'required', 
            'units' => 'required',
            'cost_price' => 'required|lt:mrp',
            'sale_price' => 'nullable|gt:cost_price|lte:mrp',
            'mrp' => 'required|gt:cost_price',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $return = PurchaseReturn::find($request->return_id);  
        $returnProduct = PurchaseReturnProducts::find($request->id);
        $prevData = $returnProduct->getOriginal();
        $returnProduct->purchase_return_id = $request->return_id;
        $returnProduct->product_id = $request->product_id;
        $returnProduct->units = $request->units;
        $returnProduct->cost_price = $request->cost_price;
        $returnProduct->sale_price = $request->sale_price ? $request->sale_price : 0;
        $returnProduct->mrp = $request->mrp;
        $returnProduct->note = $request->note;
        $returnProduct->save();
        if($returnProduct->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $returnProduct->getChanges());
            $log = '{"title":"Purchase return product updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'purchase_return',
                'moduleId'=> $returnProduct->return_id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'return product successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'return product not updated.']);
        }
    }

    //Delete Return product
    public function deletePurchaseReturnProduct(Request $request) {
        $returnProducts = PurchaseReturnProducts::find($request->returnProductId);
        $product = Products::find($returnProducts->product_id);
        if($returnProducts->delete()){
            
            $log = '{"title":"Purchase return product Deleted.", "body":"Purchase return product Deleted.<br><b>Product name: </b>'.$product->product_name.'"}';
            $data = [
                'moduleName'=> 'purchase_return',
                'moduleId'=> $returnProducts->return_id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Purchase return product successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Purchase return product not deleted.']);
        }
    }
}
