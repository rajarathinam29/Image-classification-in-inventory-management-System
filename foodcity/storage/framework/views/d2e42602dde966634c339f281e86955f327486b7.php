

<?php $__env->startSection('styles'); ?>
    <!-- Slect2 css -->
    <link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />
    <!-- INTERNAL telephoneinput css-->
   <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/telephoneinput/telephoneinput.css')); ?>">

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
            <form id="employeeForm">
            <div class="card-body">
                    <div class="card-title font-weight-bold">Basic info:</div>
                    <div class="row">
                    <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">First Name<span class="text-red">*</span></label>
                                <div class="row g-xs">
                                    <div class="col-2">
                                        <select class="form-control custom-select select2 is-invalid" name="title"  id="title">
                                            <option value="Mr">Mr.</option>
                                            <option value="Mrs">Mrs.</option>
                                            <option value="Miss">Miss.</option>
                                            <option value="Dr">Dr.</option>
                                        </select>
                                    </div>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name"  autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Last Name<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"  autocomplete="off">
                            </div>
                        </div>
                        <!-- <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Date of Birth<span class="text-red"></span></label>
                                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth">
                            </div>
                        </div> -->
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Phone Number<span class="text-red">*</span></label>
                                <div class="input-group ">
                                    <input type="tel" class="form-control" name="phone_no" id="phone_no"  placeholder="e.g. +94 112233444">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label"> Alternative Phone Number<span class="text-red">*</span></label>
                                <div class="input-group ">
                                        <input type="tel" class="form-control" name="alt_phone_no" id="alt_phone_no"  placeholder="e.g. +94 112233444">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
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
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" name="state" id="state" placeholder="State">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <select class="form-control custom-select select2" name="country" id="country">
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Zipcode</label>
                                <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Zipcode">
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
<script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>

<!-- mask -->
<script src="<?php echo e(asset('assets/plugins/input-mask/jquery.mask.min.js')); ?>"></script>

<!--INTERNAL telephoneinput js-->
<script src="<?php echo e(asset('assets/plugins/telephoneinput/telephoneinput.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/employees/edit.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/employees/edit.blade.php ENDPATH**/ ?>