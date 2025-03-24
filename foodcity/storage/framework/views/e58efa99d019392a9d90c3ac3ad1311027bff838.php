

<?php $__env->startSection('styles'); ?>
    <!-- Slect2 css -->
    <link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />
    <!-- INTERNAL telephoneinput css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/telephoneinput/telephoneinput.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title mb-0 text-primary"><?php echo e($title); ?></h4>
	</div>
    <!-- <div class="page-rightheader">
        <div class="btn-list">
            <a href="javascript:void(0);" class="btn btn-outline-primary btnBack"><i class="fe fe-skip-back"></i> Back</a>
        </div>
    </div> -->
</div>
<!--End Page header-->

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <form id="productForm">
                <div class="card-body">
                    <div class="card-title font-weight-bold">Basic info:</div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Barcode<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode" autocomplete="off">  
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
                                <select class="form-control custom-select select2" name="product_category" id="product_category">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Product Manufacture<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="company_name" id="company_name">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Product Brand<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="brand_name" id="brand_name">
                                </select>
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
                                    <option value="1">Active</option>
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
                                <input type="number" class="form-control" name="profit_margin" id="profit_margin" placeholder="Margin" autocomplete="off">  
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
                                <label class="form-label">VAT/Tax (%)</label>
                                <input type="number" class="form-control" name="vat" id="vat" placeholder="Vat" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Cost Price<span class="text-red">*</span></label>
                                <input type="number" class="form-control" name="cost_price" id="cost_price" placeholder="Cost Price" step="any" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">MRP/Selling Price<span class="text-red">*</span></label>
                                <input type="number" class="form-control" name="mrp" id="mrp" placeholder="Mrp" step="any" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Discount Price (leave as blank for no discount)</label>
                                <input type="number" class="form-control" name="sale_price" id="sale_price" placeholder="Discount Price" step="any" autocomplete="off">  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="javascript:void(0);" class="btn btn-info btnBack"><i class="fe fe-skip-back"></i> Back</a>
                    <button type="submit" class="btn  btn-success" id="btnSubmit">Save <i class="fe fe-skip-forward"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Select2 js -->
<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script> -->

<script src="<?php echo e(asset('assets/js/products/edit.js?v=1.0.2')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>