<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\ActivityLog;
use App\Models\ProductCategories;
use App\Models\ProductCompanies;
use App\Models\ProductBrands;
use App\Models\ProductUnitTypes;
use App\Models\Products;
use App\Models\Languages;
use App\Models\PaymentTypes;
use App\Models\PaymentMethod;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ValidateUpdated($data, $changes){
        $body = '';
        foreach ($changes as $key => $value){
            $string = explode('_', $key);
            $title = '';
            for($i=0;$i<count($string);$i++){
                if($i==0){
                    $title .= ucfirst($string[$i]);
                }else{
                    if($string[$i] != 'id')
                        $title .= " ".$string[$i];
                }
            }
            switch($key){
                // Vat Type
                case 'vat_type':
                    $vatType = ["Inclusive", "Exclusive"];
                    $fromData = !is_null($data[$key])?$vatType[$data[$key]]:"Null";
                    $toData = !is_null($value)?$vatType[$value]:"Null";
                    break;
                // Product type
                case 'price_type':
                    $type = ["Non-Mrp", "Mrp"];
                    $fromData = !is_null($data[$key])?$type[$data[$key]]:"Null";
                    $toData = !is_null($value)?$type[$value]:"Null";
                    break;
                // Product status
                case 'product_status':
                case 'brands_status': //product brand status
                case 'category_status': //product Category status
                case 'companies_status': //product company status
                case 'status':
                case 'suppliers_status': // Suppliers status
                    $status = ["Inactive", "Active"];
                    $fromData = !is_null($data[$key])?$status[$data[$key]]:"Null";
                    $toData = !is_null($value)?$status[$value]:"Null";
                    break;
                case 'wip_status':
                    $status = ["Process", "Place Order", "Order Received", "Completed", "Canceled"];
                    $fromData = !is_null($data[$key])?$status[$data[$key]]:"Null";
                    $toData = !is_null($value)?$status[$value]:"Null";
                    break;
                case 'received_status':
                    $status = ["Incompleted", "Received", "Received & Paid"];
                    $fromData = !is_null($data[$key])?$status[$data[$key]]:"Null";
                    $toData = !is_null($value)?$status[$value]:"Null";
                    break;
                // purchase Status
                case 'purchase_status':
                case 'purchase_order_status':
                case 'sales_status': // sales status
                    $status = ["Uncompleted", "Completed"];
                    $fromData = !is_null($data[$key])?$status[$data[$key]]:"Null";
                    $toData = !is_null($value)?$status[$value]:"Null";
                    break;
                case 'vouchers_status': // vouchers status
                    $status = ["Unused", "Used"];
                    $fromData = !is_null($data[$key])?$status[$data[$key]]:"Null";
                    $toData = !is_null($value)?$status[$value]:"Null";
                    break;
                case 'payment_type':
                    $title = "Payment Type";
                    $fromPaymentType = PaymentTypes::find($data[$key]);
                    $fromData = !is_null($fromPaymentType)?$fromPaymentType->type_name:"Null";
                    $toPaymentType = PaymentTypes::find($value);
                    $toData = !is_null($toPaymentType)?$toPaymentType->type_name:"Null";
                    break;
                case 'payment_method':
                    $title = "Payment Method";
                    $fromPaymentMethod = PaymentMethod::find($data[$key]);
                    $fromData = !is_null($fromPaymentMethod)?$fromPaymentMethod->method_name:"Null";
                    $toPaymentMethod = PaymentMethod::find($value);
                    $toData = !is_null($toPaymentMethod)?$toPaymentMethod->method_name:"Null";
                    break;
                //Product category
                case 'productcategory_id':
                    $title = "Product Category";
                    $fromproductcategory = ProductCategories::find($data[$key]);
                    $fromData = !is_null($fromproductcategory)?$fromproductcategory->category_name:"Null";
                    $toproductcategory = ProductCategories::find($value);
                    $toData = !is_null($toproductcategory)?$toproductcategory->category_name:"Null";
                    break;
                //Product company
                case 'product_company_id':
                    $title = "Product Company";
                    $fromproductcompany = ProductCompanies::find($data[$key]);
                    $fromData = !is_null($fromproductcompany)?$fromproductcompany->company_name:"Null";
                    $toproductcompany = ProductCompanies::find($value);
                    $toData = !is_null($toproductcompany)?$toproductcompany->company_name:"Null";
                    break;
                //Product brand
                case 'product_brand_id':
                    $title = "Product Brand";
                    $fromproductbrand = ProductBrands::find($data[$key]);
                    $fromData = !is_null($fromproductbrand)?$fromproductbrand->brand_name:"Null";
                    $toproductbrand = ProductBrands::find($value);
                    $toData = !is_null($toproductbrand)?$toproductbrand->brand_name:"Null";
                    break;
                //Unit Type
                case 'units_type':
                    $title = "Unit Type";
                    $fromUnitType = ProductUnitTypes::find($data[$key]);
                    $fromData = !is_null($fromUnitType)?$fromUnitType->type_name:"Null";
                    $toUnitType = ProductUnitTypes::find($value);
                    $toData = !is_null($toUnitType)?$toUnitType->type_name:"Null";
                    break;
                //product_id
                case 'product_id':
                    $title = "Product";
                    $fromProduct = Products::find($data[$key]);
                    $fromData = !is_null($fromProduct)?$fromProduct->product_name:"Null";
                    $toProduct = Products::find($value);
                    $toData = !is_null($toProduct)?$toProduct->product_name:"Null";
                    break;
                //language_id
                case 'language_id':
                    $title = "Language";
                    $fromLanguage = Languages::find($data[$key]);
                    $fromData = !is_null($fromLanguage)?$fromLanguage->language_name:"Null";
                    $toLanguage = Languages::find($value);
                    $toData = !is_null($toLanguage)?$toLanguage->language_name:"Null";
                    break;

                default:
                    $fromData = !is_null($data[$key])?$data[$key]:"Null";
                    $toData = !is_null($value)?$value:"Null";

            }
            $body .= $title." from <b>".$fromData."</b> to <b>".$toData."</b>.<br>";
        }
        return $body;
    }

    public function addActivityLog($data){
        $log = new ActivityLog;
        $log->date_time = date('Y-m-d H:i:s');
        $log->module = $data['moduleName'];
        $log->module_id = $data['moduleId'];
        $log->logs = $data['log'];
        $log->created_by = $data['userId'];
        $log->company_id = $data['companyId'];
        $log->branch_id = $data['branchId'];
        $log->save();
    }

    
}
