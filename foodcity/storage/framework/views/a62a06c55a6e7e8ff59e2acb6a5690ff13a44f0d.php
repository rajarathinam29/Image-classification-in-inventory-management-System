

<?php $__env->startSection('styles'); ?>
<!-- INTERNAL Select2 css -->
<link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />
<!-- INTERNAL Prism Css -->
<link href="<?php echo e(asset('assets/plugins/prism/prism.css')); ?>" rel="stylesheet">
<!-- dropzone css -->
<link href="<?php echo e(asset('assets/plugins/dropzone/min/dropzone.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary"><?php echo e($title); ?></h4>
    </div>
    <div class="page-rightheader">
        <div class="btn-list">
            <a href="javascript:void(0);" class="btn btn-outline-primary btnBack"><i class="fe fe-skip-back"></i> Back</a>
        </div>
    </div>
</div>
<!--End Page header-->

    <!-- Row-->
<div class="row">
    <div class="col-md-12">
        <div class="card overflow-hidden" >
            <div class="card-body">
                <h2 class="font-weight-bold text-primary" id="invoiceId">Order Form</h2>
                <div class="">
                    <h5 class="mb-1" id="invoiceDate">2023-01-01</h5>
                    <h6 class="mb-1" id="invoiceNo">2023-01-01</h6>
                </div>

                <div class="dropdown-divider"></div>
                <div class="row pt-4">
                    <div class="col-lg-6 ">
                        <p class="h5 font-weight-bold">Order To</p>
                        <address id="billTo">
                            Street Address<br>
                            State, City<br>
                            Region, Postal Code<br>
                            ltd@example.com
                        </address>
                    </div>
                    <div class="col-lg-6 text-end">
                        <p class="h5 font-weight-bold">Order From</p>
                        <address id="billFrom">
                            Street Address<br>
                            State, City<br>
                            Region, Postal Code<br>
                            ctr@example.com
                        </address>
                    </div>
                </div>
                <div class="table-responsive push">
                    <table class="table table-bordered table-hover text-nowrap">
                        <tbody>
                            <tr class=" ">
                                <th class="text-center " style="width: 1%"></th>
                                <th style="width: 15%">Product</th>
                                <th class="text-center" >Units</th>
                                <th class="text-end" >Cost Price</th>
                                <th class="text-end" >Profit Margin (%)</th>
                                <th class="text-end" >Discount price</th>
                                <th class="text-end" >Sale price</th>
                                <th class="text-end" colspan="2">Total
                                    <!-- <div class="text-muted ">Press enter to save,update </div>
                                    <div class="text-muted ">Press delete to delete </div> -->
                                </th>
                            </tr>
                            <tr id="trAddProduct">
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm bg-primary-transparent btnResetProduct"><i class="fe fe-refresh-cw"></i></button>
                                    <button type="button" class="btn btn-sm bg-success-transparent btnNewProduct">New</button>
                                </td>
                                <td>    
                                    <input type="hidden" name="product_id">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" name="searchword" id="searchword" placeholder="Search Product" autocomplete="off">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-sm bg-info-transparent btnViewProduct"><i class="fe fe-file"></i></button>
                                        </span>
                                    </div>
                                    <div class="text-muted product_name"></div>
                                </td>
                                <td class="text-center">
                                    <input type="number" class="form-control form-control-sm" step="any" name="product_unit" id="product_unit" placeholder="Units" autocomplete="off">
                                </td>
                                <td class="text-end">
                                    <input type="number" class="form-control form-control-sm" step="any" name="product_cost_price" id="product_cost_price" placeholder="Cost price" autocomplete="off" >
                                </td>
                                <td class="text-end">
                                    <input type="number" class="form-control form-control-sm" step="any" name="product_profit_margin" id="product_profit_margin" placeholder="Profit Margin" autocomplete="off" >
                                </td>
                                <td class="text-end">
                                    <input type="number" class="form-control form-control-sm" step="any" name="product_sale_price" id="product_sale_price" placeholder="Discounted price" autocomplete="off" >
                                </td>
                                <td class="text-end">
                                    <input type="number" class="form-control form-control-sm" step="any" name="product_mrp" id="product_mrp" placeholder="Mrp" autocomplete="off" >
                                </td>
                                <td class="text-end">
                                    <input type="number" class="form-control form-control-sm" name="product_total" id="product_total" placeholder="Total" autocomplete="off" data-bs-placement="bottom" data-bs-toggle="tooltip-secondary" title="Press enter to save or update, Press delete to delete" >
                                </td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm bg-success-transparent btnAddProduct"><i class="fe fe-plus"></i></button>
                                </td>
                            </tr>
                        </tbody>
                        <tbody id="productContent">
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="font-weight-semibold text-end">Subtotal</td>
                                <td class="text-end" id="purchaseSubTotal" colspan="2">0.00</td>
                            </tr>
                            <tr class="text-danger">
                                <td colspan="7" class="font-weight-bold text-uppercase text-end h4 mb-0">Total Due
                                    <!-- <br><small class="text-muted">Bill Net Total: <span id="billTotal"></span></small> -->
                                </td>
                                <td class="font-weight-bold text-end h4 mb-0" id="purchaseTotal" colspan="2">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="9" class="text-end">
                                    <button type="button" class="btn btn-primary" id="btnQrAttachment"><i class="fe fe-plus"></i> Scan QR Code</button>
                                    <button type="button" class="btn btn-info" id="btnAttachmentUpload"><i class="fe fe-upload"></i> Upload Attachments</button>
                                    <button type="button" class="btn btn-info" id="btnViewAttachments"><i class="fe fe-image"></i> Attachments</button>
                                    <button type="button" class="btn btn-success" id="btnFinalize"><i class="fe fe-check-circle"></i> Finalize</button>
                                    <button type="button" class="btn btn-success" id="btnSendMail"><i class="si si-paper-plane"></i> Send Order</button>
                                    <button type="button" class="btn btn-secondary" id="btnPrintInvoice"><i class="si si-printer"></i> Print Order</button>
                                    <button type="button" class="btn btn-danger" id="btnCancelled"><i class="fe fe-x-circle"></i> Cancel</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p>
            </div>
        </div>
    </div>
    
</div>
<!-- End row-->
<!-- barcode -->
<div id="generatedBarcode" style="display:none;">
    <div id="barcodeTarget" class="barcodeTarget" style="padding: 0px;overflow: auto;width: 90px; text-align:center;"></div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<div class="modal  fade" id="priceConfirmationModal" tabindex="-1" role="dialog"  aria-hidden="true"  >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
            </div>
            <div class="modal-body">
                <h5 class="font-weight-semibold">Default Price Changed, Are you sure update default price in product?</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <h6>Default Price</h6>
                        <p>Purchase Price: <span class="font-weight-semibold" id="defPurchasePrice"></span></p>
                        <p>Discount Price: <span class="font-weight-semibold" id="defDiscountPrice"></span></p>
                        <p>Mrp/Sale Price: <span class="font-weight-semibold" id="defMrpPrice"></span></p>
                    </div>
                    <div class="col-lg-6">
                        <h6>Changed Price</h6>
                        <p>Purchase Price: <span class="font-weight-semibold" id="changePurchasePrice"></span></p>
                        <p>Discount Price: <span class="font-weight-semibold" id="changeDiscountPrice"></span></p>
                        <p>Mrp/Sale Price: <span class="font-weight-semibold" id="changeMrpPrice"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnChangeDefPrice">Yes, Change default price</button>
                <button type="button" class="btn btn-secondary" id="btnNoChangeDefPrice">No, Change Manual</button>
                <button type="button" class="btn btn-primary" id="btnRestoreDefPrice">Restore default price</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="uploadAttachmentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="viewAttachmentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="row" id="viewAttachmentContent">
					
				</div>
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="productListModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Select Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group ">
                        <div class="custom-controls-stacked">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddProduct"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group ">
                        <label class="form-label">Reason</label>
                        <input type="text" class="form-control" name="reason" id="reason"  placeholder="Reason">
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnOrderCancel"> Proceed</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="barcodeModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Print Barcode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered card-table table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                    <th>Barcode - Product Name</th>
                                    <th>Prints</th>
                                </tr>
                            </thead>
                            <tbody id="barcodeContent">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnPrintBarcode"><i class="si si-printer"></i> Print</button>
            </div>
        </div>
    </div>
</div>
<!-- payment History -->
<div class="modal fade" id="paymentHistoryModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Payment History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered card-table table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Description/ Reff.</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody id="PaymentHistoryContent">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary" id="btnAddPayment"><i class="si si-plus"></i> Add Payment</button> -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="QrAttachmentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Scan to upload attachments</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="attachmentEditForm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="text-center">
                                    <div id="qrcode"></div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary" id="btnUpdateAttachment"><i class="fe fe-save"></i> Save</button> -->
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="newProductModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productForm">
                    <div class="card-body">
                        <div class="card-title font-weight-bold">Basic info:</div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Barcode (Leave as blank for no barcode)</label>
                                    <input type="text" class="form-control" name="barcode" id="barcode" placeholder="barcode" autocomplete="off">  
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Product Name<span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" autocomplete="off">  
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Product Category<span class="text-red">*</span></label>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control custom-select select2" name="product_category" id="product_category">
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                        <button class="btn btn-primary" type="button" id="btnAddCategory"><i class="fe fe-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Product Manufacture<span class="text-red">*</span></label>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control custom-select select2" name="company_name" id="company_name">
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                        <button class="btn btn-primary" type="button" id="btnAddCompany"><i class="fe fe-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Product Brand<span class="text-red">*</span></label>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control custom-select select2" name="brand_name" id="brand_name">
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                        <button class="btn btn-primary" type="button" id="btnAddBrand"><i class="fe fe-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Unit in Case<span class="text-red">*</span></label>
                                    <input type="number" class="form-control" name="unit_in_case" id="unit_in_case" placeholder="Unit in Case" autocomplete="off">  
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Units Type<span class="text-red">*</span></label>
                                    <select class="form-control custom-select select2" name="units_type" id="units_type">
                                        <option value="0">Kg</option>
                                        <option value="1">g</option>
                                        <option value="2">m</option>
                                        <option value="3">cm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Alert Quantity</label>
                                    <input type="number" class="form-control" name="alert_qty" id="alert_qty" placeholder="set minimum stock level" autocomplete="off">  
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Product Status<span class="text-red">*</span></label>
                                    <select class="form-control custom-select select2" name="status" id="status">
                                        <option value="0">Inactive</option>
                                        <option value="1" selected>Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Part No</label>
                                    <input type="text" class="form-control" name="partNo" id="partNo" placeholder="Part No" autocomplete="off">  
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-label">Compatibility Make & Models</label>
                                    <select class="form-control select2" name="productMakeModel" id="productMakeModel" multiple></select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea  class="form-control" name="description" id="description" row="30" autocomplete="off"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-title font-weight-bold">Stock info:</div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Stock (Leave as blank for no stock)</label>
                                    <input type="number" step="any" class="form-control" name="stock" id="stock" placeholder="Stock" autocomplete="off">  
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Location</label>
                                    <input type="text"  class="form-control" name="location" id="location" placeholder="Location" autocomplete="off">  
                                </div>
                            </div>
                        </div>
                        <div class="card-title font-weight-bold">Price info:</div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Price Type</label>
                                    <select class="form-control custom-select select2" name="price_type" id="price_type">
                                        <option value="0">Non-Mrp</option>
                                        <option value="1" selected>Mrp</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Profit Margin (%)</label>
                                    <input type="number" class="form-control" step="any" name="profit_margin" id="profit_margin" placeholder="Margin" autocomplete="off">  
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">VAT/Tax Type</label>
                                    <select class="form-control custom-select select2" name="vat_type" id="vat_type">
                                        <option value="0" selected>Inclusive</option>
                                        <option value="1" >Exclusive</option>
                                    </select>  
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">VAT/Tax (%) </label>
                                    <input type="number" class="form-control" step="any" name="vat" id="vat" placeholder="Vat" value="0" autocomplete="off">  
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Cost Price<span class="text-red">*</span></label>
                                    <input type="number" class="form-control" step="any" name="cost_price" id="cost_price" placeholder="Cost Price" autocomplete="off">  
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">MRP/Selling Price<span class="text-red">*</span></label>
                                    <input type="number" class="form-control" step="any" name="mrp" id="mrp" placeholder="MRP/Selling Price" autocomplete="off">  
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Discount Price (Leave as blank for no discount)</label>
                                    <input type="number" class="form-control" step="any" name="sale_price" id="sale_price" placeholder="Discount Price" autocomplete="off">  
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div class="card-title font-weight-bold wipContent">WIP info:</div>
                        <div class="row wipContent">
                            
                        </div> -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSaveProduct"><i class="fe fe-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addCategoryModal" tabindex="1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm">
                <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Category Name<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Descripton</label>
                                    <textarea class="form-control mb-4" name="description" id="description" placeholder="Textarea" rows="3"></textarea>
                                </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Category Status<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="status" id="status">
                                    <option value="0">Inactive</option>
                                    <option value="1" selected>Active</option>
                                </select>
                            </div>
                        </div>
                           
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSaveCategory"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addCompanyModal" tabindex="1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">New Manufacture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productcompaniesForm">
                <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Manufacture Name<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Manufacture Name" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Descripton</label>
                                    <textarea class="form-control mb-4" name="description" id="description" placeholder="Textarea" rows="3"></textarea>
                                </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Company Status<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="companies_status" id="companies_status">
                                    <option value="0">Inactive</option>
                                    <option value="1" selected>Active</option>
                                </select>
                            </div>
                        </div>
                           
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSaveCompany"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addBrandModal" tabindex="1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">New Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productbrandsForm">
                <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Brand Name<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Brand Name" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Descripton</label>
                                    <textarea class="form-control mb-4" name="description" id="description" placeholder="Textarea" rows="3"></textarea>
                                </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Brand Status<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="brands_status" id="brands_status">
                                    <option value="0">Inactive</option>
                                    <option value="1" selected>Active</option>
                                </select>
                            </div>
                        </div>
                           
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSaveBrand"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Select2 js -->
<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
<!-- dropzone js -->
<script src="<?php echo e(asset('assets/plugins/dropzone/min/dropzone.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/plugins/jquery-barcode/jquery-barcode.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-barcode/jquery-barcode.min.js')); ?>"></script>

<!-- INTERNAL Clipboard js -->
<script src="<?php echo e(asset('assets/plugins/clipboard/clipboard.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/clipboard/clipboard.js')); ?>"></script>

<!-- INTERNAL Prism js -->
<script src="<?php echo e(asset('assets/plugins/prism/prism.js')); ?>"></script>
<!-- QR Code  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>

<script src="<?php echo e(asset('assets/js/purchase/purchaseOrderView.js?v=1.0.3')); ?>"></script>
<script src="<?php echo e(asset('assets/js/purchase/newProduct.js?v=1.0.0')); ?>"></script>

<!-- INTERNAL tooltip js-->
<!-- <script src="<?php echo e(asset('assets/js/tooltip.js')); ?>"></script> -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/purchase/purchase-order-view.blade.php ENDPATH**/ ?>