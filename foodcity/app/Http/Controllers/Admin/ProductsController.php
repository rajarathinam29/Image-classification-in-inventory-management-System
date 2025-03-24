<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Products;
use App\Models\ProductMakeModel;
use App\Models\ProductUnitTypes;
use App\Models\ProductBrands;
use App\Models\ProductCompanies;
use App\Models\ProductCategories;
use App\Models\ProductMultipleAlliance;
use App\Models\StockCount;
use App\Models\StockCountProducts;
use App\Models\SalesProducts;
use App\Models\PurchaseProducts;
use App\Models\CompanySettings;
use App\Models\PurchaseOrderProducts;
use App\Models\PurchaseReturnProducts;
use App\Models\StockTransferProducts;
use App\Models\WipStock;

use DB;

class ProductsController extends Controller
{
    public function index() {
        return view('admin.products.product-list', ['title'=> 'Products']);
    }
    public function create() {
        return view('admin.products.create', ['title'=> 'Create Products']);
    }
    public function edit() {
        return view('admin.products.edit', ['title'=> 'Edit Products']);
    }
    public function view() {
        return view('admin.products.view', ['title'=> 'View Products']);
    }
    //AllProducts
    public function getProducts(Request $request) {
        $productsQ = Products::with('type')->where(['company_id'=> $request->companyId])->orderBy('id', 'DESC');
        //isset category
        if(isset($request->category) && !empty($request->category))
            $productsQ->where('productcategory_id', $request->category);
        //isset company
        if(isset($request->company) && !empty($request->company))
            $productsQ->where('product_company_id', $request->company);
        //isset brand
        if(isset($request->brand) && !empty($request->brand))
            $productsQ->where('product_brand_id', $request->brand);
        //isset unit type
        if(isset($request->unitType) && !empty($request->unitType))
            $productsQ->where('units_type', $request->unitType);

        $offset = 0;
        if(isset($request->offset) && !empty($request->offset))
            $offset = $request->offset;
        $productsQ->offset($offset)->limit(1000);
        $products =  $productsQ->get();
        if(!is_null($products)){
            $log = '{"title":"View all products.", "body":"View all products"}';
            $data = [
                'moduleName'=> 'products',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'productsData' => $products]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'products not found.']);
    }
    //Single Product
    public function getProduct(Request $request) {
        $lastStockCount = StockCount::where(['company_id' => $request->companyId, 'branch_id' => $request->branchId, 'status' => 1])->orderBy('start_date', 'DESC')->first();
        $products = Products::with('type', 'category','productcompanies','productbrands', 'productMakeModel.makeModel')->where('id', $request->productsId)->first();
        //
        if(!is_null($products)){
            $availableStock = $this->getStock($lastStockCount, $products, $request->companyId, $request->branchId);
            $products->stock = $availableStock;
            $log = '{"title":"View product.", "body":"<b>Product Name:</b>'.$products->product_name.'"}';
            $data = [
                'moduleName'=> 'products',
                'moduleId'=> $products->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'productsData' => $products]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'products not found.']);
    }
    //search Product
    public function searchProduct(Request $request){
        $productList = [];
        // $validator = Validator::make($request->all(), [
        //     'searchword' => 'required|min:3',
            
        // ]);
        // if($validator->fails()){
        //     return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        // } 
        $lastStockCount = StockCount::where(['company_id' => $request->companyId, 'branch_id' => $request->branchId, 'status' => 1])->orderBy('start_date', 'DESC')->first();   
        $searchword = $request->searchword;
        $productsQ = Products::with('type')->where(['company_id' => $request->companyId, 'product_status' => 1]);
        if($searchword){
            // $productsQ->search($searchword);
            $productsQ->where(function ($query) use ($searchword) {
                $query->orWhere('bar_code', 'like', "%{$searchword}%")
                      ->orWhere('product_name', 'like', "%{$searchword}%")
                      ->orWhere('part_no', 'like', "%{$searchword}%");
            });
        }

        $products = $productsQ->get();
        if(count($products)>0){
            foreach($products as $product){
                $availableStock = $this->getStock($lastStockCount, $product, $request->companyId, $request->branchId);
                $data = [
                    'id' => $product->id,
                    'barcode' => $product->bar_code,
                    'product_name' => $product->product_name,
                    'unit_type' => $product->type->type_name,
                    'qty' => 1,
                    'cost_price'=> $product->cost_price,
                    'sale_price'=> $product->sale_price?$product->sale_price:$product->mrp,
                    'mrp'=> $product->mrp,
                    'vat'=> $product->vat,
                    'vat_type'=> $product->vat_type,
                    'price_type' => $product->price_type,
                    'profit_margin' => $product->profit_margin,
                    'available_stock' => $availableStock
                ];
                array_push($productList, $data);
            }
            $log = '{"title":"Searching product.", "body":"<b>Search word:</b>'.$request->searchword.'<br><b>Find product:</b>'.count($products).'"}';
            $data = [
                'moduleName'=> 'products',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
        }else{
            $alliances = ProductMultipleAlliance::with('type')->where(['company_id' => $request->companyId, 'status' => 1])
            ->where(function ($query) use ($searchword) {
                $query->orWhere('barcode', 'like', "%{$searchword}%");
            })->get();
            foreach($alliances as $alliance){
                $product = Products::with('type')->where('id', $alliance->product_id)->first();
                $availableStock = $this->getStock($lastStockCount, $product, $request->companyId, $request->branchId);
                $data = [
                    'id' => $alliance->product->id,
                    'barcode' => $alliance->barcode,
                    'product_name' => $product->product_name,
                    'unit_type' => $alliance->type?$alliance->type->type_name:$product->type->type_name,
                    'qty' => $alliance->qty?$alliance->qty:1,
                    'cost_price'=> $alliance->cost_price?$alliance->cost_price:$alliance->product->cost_price,
                    'sale_price'=> $alliance->sale_price?$alliance->sale_price:$alliance->product->sale_price,
                    'vat'=> $product->vat,
                    'vat_type'=> $product->vat_type,
                    'price_type' => $product->price_type,
                    'profit_margin' => $product->profit_margin,
                    'available_stock' => $availableStock
                ];
                array_push($productList, $data);
            }
            $log = '{"title":"Searching product.", "body":"<b>Search word:</b>'.$request->searchword.'<br><b>Find product:</b>'.count($products).'"}';
            $data = [
                'moduleName'=> 'productMultipleAlliance',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
        }

        if(count($productList)>0){
            return response()->json(['status' => TRUE, 'productsData' => $productList]);
        }

        return response()->json(['status' => FALSE, 'msg' => 'products not found.']);
    }

    private function getStock($lastStockCount, $product, $companyId, $branchId){
        $counted = 0;
        $countedDate = '';
        // Get Stock count Data
        if(!is_null($lastStockCount)){
            $stkCntProducts = StockCountProducts::select(
                DB::raw("(sum(units)) as totalQty"),
            )->where(['stock_count_id'=>$lastStockCount->id, 'product_id'=>$product->id])->get();
            if($stkCntProducts[0]->totalQty){
                $counted = $stkCntProducts[0]->totalQty;
            }
            $countedDate = $lastStockCount->start_date;
        }

        //get SOLD products Data
        $sold = 0;
        $salesProductsQ = SalesProducts::LeftJoin('sales', ['sales.id'=>'sales_products.sale_id'])->where(['sales_products.company_id' => $companyId, 'sales_products.branch_id' => $branchId, 'sales_products.product_id'=>$product->id, ['reusable','<',2]]);
        if($countedDate){
            $salesProductsQ->whereDate('sales.invoice_date','>=', date('Y-m-d', strtotime($countedDate)));
        }
        
        $salesProducts = $salesProductsQ->get();
        if(count($salesProducts)){
            foreach($salesProducts as $saleProduct){
                $sold += $saleProduct->qty;
            }
        }
        //get Purchaserd products Data
        $purchased=0;
        $purchaseProductsQ = PurchaseProducts::LeftJoin('purchase', ['purchase.id'=>'purchased_products.purchase_id'])->where(['purchased_products.company_id' => $companyId, 'purchased_products.branch_id' => $branchId, 'purchased_products.product_id'=>$product->id]);
        if($countedDate){
            $purchaseProductsQ->whereDate('purchase.date','>=', date('Y-m-d', strtotime($countedDate)));
        }
        $purchaseProducts = $purchaseProductsQ->get();
        if(count($purchaseProducts)){
            foreach($purchaseProducts as $purchaseProduct){
                $purchased += ($purchaseProduct->units+$purchaseProduct->free);
            }
        }

        $return = 0;
        $returnProductsQ = PurchaseReturnProducts::LeftJoin('purchase_return', ['purchase_return.id'=>'purchase_return_products.purchase_return_id'])->where(['purchase_return_products.company_id' => $companyId, 'purchase_return_products.branch_id' => $branchId, 'purchase_return_products.product_id'=>$product->id]);
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
        $availableStock = ($counted+$purchased-$return)-$sold;
        return $availableStock;
    }
    //Add Product
    public function addProducts(Request $request) {   
        $validator = Validator::make($request->all(), [
            // 'barcode' => 'required',
            'product_name' => 'required',
            'unit_in_case' => 'required', 
            'product_category' => 'required',
            'company_name' => 'required', 
            'brand_name' => 'required', 
            'units_type' => 'required',
            'cost_price' => 'required',
            'sale_price' => 'nullable|gt:cost_price|lte:mrp', 
            'mrp' => 'required|gt:cost_price', 
            
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        // Barcode generation  
        $barcode = '';
        if(isset($request->barcode) && !empty($request->barcode)){
            $barcode = $request->barcode;
        }else{
            $settings = CompanySettings::where(['company_id'=>$request->companyId, 'branch_id'=> $request->branchId, 'setting_name'=> 'prefix'])->first();
            $prefix = json_decode($settings->setting)->products;
            $countProduct = Products::where(['company_id'=>$request->companyId])->withTrashed()->count();
            $barcode = $prefix.($countProduct+1);
        }
        $products = new Products;
        $products->product_name = $request->product_name;
        $products->bar_code = $barcode;
        $products->units_in_case = $request->unit_in_case;
        $products->units_type = $request->units_type;
        $products->alert_qty = !empty($request->alert_qty)?$request->alert_qty:0;
        $products->description = $request->description;
        $products->part_no = $request->partNo;
        $products->location = $request->location;
        $products->price_type = $request->price_type;
        $products->cost_price = $request->cost_price;
        $products->sale_price = $request->sale_price;
        $products->mrp = $request->mrp;
        $products->vat = $request->price_type == 0?$request->vat:0;
        $products->vat_type = $request->price_type == 0?$request->vat_type:0;
        $products->profit_margin = $request->profit_margin;
        $products->product_status = $request->status;
        $products->company_id = $request->companyId;
        $products->productcategory_id = $request->product_category;
        $products->product_company_id = $request->company_name;
        $products->product_brand_id = $request->brand_name;
        $products->created_by = $request->loginId;
        if($products->save()){ 
            if(isset($request->stock) && !empty($request->stock)){
                $stockcount = StockCount::where(['company_id' => $request->companyId, 'branch_id' => $request->branchId, 'status'=>0])->first();
                if(is_null($stockcount)){
                    $stockcount = new StockCount;
                    $stockcount->start_date = date('Y-m-d');
                    $stockcount->end_date = null;
                    $stockcount->notes = '';
                    $stockcount->status = 0;
                    $stockcount->company_id = $request->companyId;
                    $stockcount->branch_id = $request->branchId;
                    $stockcount->created_by = $request->loginId;
                    $stockcount->save();
                }

                $scProduct = new StockCountProducts;
                $scProduct->stock_count_id =$stockcount->id;
                $scProduct->product_id = $products->id;
                $scProduct->units = $request->stock;
                $scProduct->cost_price = $request->cost_price;
                $scProduct->mrp = $request->mrp;
                $scProduct->expiry_date = isset($request->expiryDate)?date('Y-m-d', strtotime($request->expiryDate)):null;
                $scProduct->expiry_status = 0;
                $scProduct->created_by = $request->loginId;
                $scProduct->company_id = $request->companyId;
                $scProduct->branch_id = $request->branchId;
                $scProduct->save();
            }
            if(isset($request->productMakeModel) && !empty($request->productMakeModel)){
                $productMakeModels = $request->productMakeModel;
                foreach($productMakeModels as $productMakeModel){
                    $model = new ProductMakeModel;
                    $model->product_id = $products->id;
                    $model->make_model_id = $productMakeModel;
                    $model->created_by = $request->loginId;
                    $model->company_id = $request->companyId;
                    $model->branch_id = $request->branchId;
                    $model->save();
                }

            }
            $log = '{"title":"Product Created.", "body":"Product SKU/Barcode:'.$barcode.' Name: '.$request->product_name.' Created."}';
            $data = [
                'moduleName'=> 'products',
                'moduleId'=> $products->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Products successfully added.', 'insertId' => $products->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Products not added.']);
        }
    }
    //Update Products
    public function updateProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'barcode' => 'required',
            'product_name' => 'required',
            'unit_in_case' => 'required', 
            'product_category' => 'required',
            'company_name' => 'required', 
            'brand_name' => 'required', 
            'units_type' => 'required',
            'cost_price' => 'required',
            'sale_price' => 'nullable|gt:cost_price|lte:mrp', 
            'mrp' => 'required|gt:cost_price', 
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 
        $products = Products::find($request->productsId);
        $prevData = $products->getOriginal();
        $products->bar_code = $request->barcode;
        $products->product_name = $request->product_name;
        $products->units_in_case = $request->unit_in_case;
        $products->units_type = $request->units_type;
        $products->alert_qty = !empty($request->alert_qty)?$request->alert_qty:0;
        $products->description = $request->description;
        $products->part_no = $request->partNo;
        $products->location = $request->location;
        $products->price_type = $request->price_type;
        $products->cost_price = $request->cost_price;
        $products->sale_price = $request->sale_price;
        $products->mrp = $request->mrp;
        $products->vat = $request->price_type == 0?$request->vat:0;
        $products->vat_type = $request->price_type == 0?$request->vat_type:0;
        $products->profit_margin = $request->profit_margin;
        $products->product_status = $request->status;
        $products->productcategory_id = $request->product_category;
        $products->product_company_id = $request->company_name;
        $products->product_brand_id = $request->brand_name;
        if($products->save()){
            ProductMakeModel::where('product_id',$products->id)->forcedelete();
            if(isset($request->productMakeModel) && !empty($request->productMakeModel)){
                $productMakeModels = $request->productMakeModel;
                foreach($productMakeModels as $productMakeModel){
                    $model = new ProductMakeModel;
                    $model->product_id = $products->id;
                    $model->make_model_id = $productMakeModel;
                    $model->created_by = $request->loginId;
                    $model->company_id = $request->companyId;
                    $model->branch_id = $request->branchId;
                    $model->save();
                }

            }
            $body = $this->ValidateUpdated($prevData, $products->getChanges());
            $log = '{"title":"Product Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'products',
                'moduleId'=> $products->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Products details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Products details not updated.']);
        }
    }
    //Delete Product
    public function deleteProduct(Request $request) {
        if(PurchaseOrderProducts::where('product_id',$request->productsId)->count()>0){
            return response()->json(['status' => FALSE, 'msg' => 'Product can not delete! Because used in Purchase Order']);
        }
        if(PurchaseProducts::where('product_id',$request->productsId)->count()>0){
            return response()->json(['status' => FALSE, 'msg' => 'Product can not delete! Because used in Purchase']);
        }
        if(PurchaseReturnProducts::where('product_id',$request->productsId)->count()>0){
            return response()->json(['status' => FALSE, 'msg' => 'Product can not delete! Because used in Purchase return']);
        }
        if(SalesProducts::where('product_id',$request->productsId)->count()>0){
            return response()->json(['status' => FALSE, 'msg' => 'Product can not delete! Because used in Purchase return']);
        }
        if(StockCountProducts::where('product_id',$request->productsId)->count()>0){
            return response()->json(['status' => FALSE, 'msg' => 'Product can not delete! Because used in stock count']);
        }
        if(StockTransferProducts::where('product_id',$request->productsId)->count()>0){
            return response()->json(['status' => FALSE, 'msg' => 'Product can not delete! Because used in stock transfer']);
        }
        if(WipStock::where('product_id',$request->productsId)->count()>0){
            return response()->json(['status' => FALSE, 'msg' => 'Product can not delete! Because used in wip stock']);
        }
        
        $products = Products::find($request->productsId);
        if($products->delete()){
            $log = '{"title":"Product Deleted.", "body":"Product SKU/Barcode:'.$products->bar_code.' Name: '.$products->product_name.' Deleted."}';
            $data = [
                'moduleName'=> 'products',
                'moduleId'=> $products->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Products is successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Products details not deleted.']);
        }
    }

    public function importProducts(Request $request) {   
        $validator = Validator::make($request->all(), [
            // 'barcode' => 'required',
            'product_name' => 'required',
            'unit_in_case' => 'required', 
            'product_category' => 'required',
            'company_name' => 'required', 
            'brand_name' => 'required', 
            'units_type' => 'required',
            'cost_price' => 'required',
            'sale_price' => 'nullable|gt:cost_price|lte:mrp', 
            'mrp' => 'required|gt:cost_price', 
            
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }  
        $unitType = ProductUnitTypes::where('type_name', 'like', "$request->units_type")->first();
        // Add Brands
        $productBrand = ProductBrands::where('brand_name', 'like', "$request->brand_name")->where('company_id', $request->companyId)->first();
        if(is_null($productBrand)){
            $productBrand = new ProductBrands;
            $productBrand->brand_name = $request->brand_name;
            $productBrand->description = $request->brand_name;
            $productBrand->brands_status = 1; 
            $productBrand->company_id = $request->companyId;
            $productBrand->created_by = $request->loginId;
            $productBrand->save();
        }
        // Add product company
        $productCompany = ProductCompanies::where('company_name', 'like', "$request->company_name")->where('company_id', $request->companyId)->first();
        if(is_null($productCompany)){
            $productCompany = new ProductCompanies;
            $productCompany->company_name = $request->company_name;
            $productCompany->description = $request->company_name;
            $productCompany->companies_status = 1; 
            $productCompany->company_id = $request->companyId;
            $productCompany->created_by = $request->loginId;
            $productCompany->save();
        }
        // Add product Category
        $productCategory = ProductCategories::where('category_name', 'like', "$request->product_category")->where('company_id', $request->companyId)->first();
        if(is_null($productCategory)){
            $productCategory = new ProductCategories;
            $productCategory->category_name = $request->product_category;
            $productCategory->category_description = $request->product_category;
            $productCategory->category_status = $request->status;
            $productCategory->company_id = $request->companyId;
            $productCategory->created_by = $request->loginId;
            $productCategory->save();
        }

        // Barcode generation  
        $barcode = '';
        if(isset($request->barcode) && !empty($request->barcode)){
            $barcode = $request->barcode;
        }else{
            $settings = CompanySettings::where(['company_id'=>$request->companyId, 'branch_id'=> $request->branchId, 'setting_name'=> 'prefix'])->first();
            $prefix = json_decode($settings->setting)->products;
            $countProduct = Products::where(['company_id'=>$request->companyId])->withTrashed()->count();
            $barcode = $prefix.($countProduct+1);
        }

        $products = new Products;
        $products->product_name = $request->product_name;
        $products->bar_code = $barcode;
        $products->units_in_case = $request->unit_in_case;
        $products->units_type = $unitType->id;
        $products->alert_qty = !empty($request->alert_qty)?$request->alert_qty:0;
        $products->part_no = $request->part_no;
        $products->price_type = $request->price_type;
        $products->cost_price = $request->cost_price;
        $products->sale_price = $request->sale_price;
        $products->mrp = $request->mrp;
        $products->vat = $request->price_type == 0?$request->vat:0;
        $products->vat_type = $request->price_type == 0?$request->vat_type:0;
        $products->profit_margin = isset($request->profit_margin)?$request->profit_margin:0;
        $products->product_status = $request->status;
        $products->company_id = $request->companyId;
        $products->productcategory_id = $productCategory->id;
        $products->product_company_id = $productCompany->id;
        $products->product_brand_id = $productBrand->id;
        $products->created_by = $request->loginId;
        if($products->save()){ 
            if(isset($request->stock)){
                $stockcount = StockCount::where(['company_id' => $request->companyId, 'branch_id' => $request->branchId])->whereDate('start_date', date('Y-m-d', strtotime($request->date)))->first();
                if(is_null($stockcount)){
                    $stockcount = new StockCount;
                    $stockcount->start_date = date('Y-m-d', strtotime($request->date));
                    $stockcount->end_date = $request->date?date('Y-m-d', strtotime($request->date)):null;
                    $stockcount->notes = '';
                    $stockcount->status = 0;
                    $stockcount->company_id = $request->companyId;
                    $stockcount->branch_id = $request->branchId;
                    $stockcount->created_by = $request->loginId;
                    $stockcount->save();
                }

                $scProduct = new StockCountProducts;
                $scProduct->stock_count_id =$stockcount->id;
                $scProduct->product_id = $products->id;
                $scProduct->units = $request->stock;
                $scProduct->cost_price = $request->cost_price;
                $scProduct->mrp = $request->mrp;
                $scProduct->expiry_date = isset($request->expiryDate)?date('Y-m-d', strtotime($request->expiryDate)):null;
                $scProduct->expiry_status = 0;
                $scProduct->created_by = $request->loginId;
                $scProduct->company_id = $request->companyId;
                $scProduct->branch_id = $request->branchId;
                $scProduct->save();
            }
            // $log = '{"title":"Product Created.", "body":"Product SKU/Barcode:'.$request->barcode.' Name: '.$request->product_name.' Created."}';
            // $data = [
            //     'moduleName'=> 'products',
            //     'moduleId'=> $products->id,
            //     'log'=> $log,
            //     'userId'=> $request->loginId,
            //     'companyId'=> $request->companyId,
            //     'branchId'=> $request->branchId,
            // ];
            // $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Products successfully added.', 'insertId' => $products->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Products not added.']);
        }
    }
}
