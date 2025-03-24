

<?php $__env->startSection('styles'); ?>
    <!-- Slect2 css -->
    <link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />
    
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
            <form id="wipForm">
                <div class="card-body">
                    <!-- <div class="card-title font-weight-bold">Basic info:</div> -->
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Date<span class="text-red">*</span></label>
                                <input type="date" class="form-control" name="wipDate" id="wipDate" placeholder="Date">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Wip No<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="wipNo" id="wipNo" placeholder="Wip No" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Customer<span class="text-red">*</span></label>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control custom-select select2" name="sltCustomer" id="sltCustomer">
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                    <button class="btn btn-primary" type="button" id="btnNewCustomer"><i class="fe fe-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Vehicle Reg No<span class="text-red">*</span></label>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control custom-select select2" name="vehicleRegId" id="vehicleRegId"></select>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-primary" type="button" id="btnNewVegeNo"><i class="fe fe-plus"></i></button>
                                    </div>
                                </div>
                                  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">WIP Start Date<span class="text-red">*</span></label>
                                <input type="date" class="form-control" name="startDate" id="startDate" placeholder="Date">
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

<?php $__env->startSection('modal'); ?>
<div class="modal fade" id="newCustomerModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">New Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="customerForm">
                    <div class="card-body">
                        <div class="card-title font-weight-bold">Basic info:</div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Company name/ Customer name<span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company name/ Customer name"  autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Customer Id<span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="customer_id" id="customer_id" placeholder="Customer Id"  autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">First Name/ Short Name<span class="text-red">*</span></label>
                                    <div class="row g-xs">
                                        <div class="col-3">
                                            <select class="form-control custom-select select2" name="title"  id="title">
                                                <option value="">--</option>
                                                <option value="Mr">Mr.</option>
                                                <option value="Mrs">Mrs.</option>
                                                <option value="Miss">Miss.</option>
                                                <option value="Dr">Dr.</option>
                                            </select>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name/ Short Name"  autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"  autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phone Number<span class="text-red">*</span></label>
                                    <div class="input-group ">
                                        <input type="tel" class="form-control" name="phone_no" id="phone_no"  placeholder="e.g. +94 112233444">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"  placeholder="Email">
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-title font-weight-bold">Address info:</div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Building Number</label>
                                    <input type="text" class="form-control" name="building_no" id="building_no" placeholder="Building Number">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Street</label>
                                    <input type="text" class="form-control" name="street" id="street" placeholder="Street">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">County</label>
                                    <input type="text" class="form-control" name="state" id="state" placeholder="County">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select class="form-control custom-select " name="country" id="country">
                                        <!-- <option value="Sri Lanka">Sri Lanka</option> -->
                                        <option value="United Kingdom">United Kingdom</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Post code</label>
                                    <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Post code">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddCustomer"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newVehicleRegModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">New Vehicle Reg</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="vehicleRegForm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Vehicle Reg No<span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="regNo" id="regNo" placeholder="Vehicle Reg No"  autocomplete="off">
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddVehicleReg"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Select2 js -->
<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>
<!-- Mask js -->
<script src="<?php echo e(asset('assets/plugins/input-mask/jquery.mask.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/wip/create.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/wip/create.blade.php ENDPATH**/ ?>