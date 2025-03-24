

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('class'); ?>

        <div class="register1">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <div class="page">
            <div class="page-single">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center mb-5">
                                                <img src="<?php echo e(asset('assets/images/brand/foodcitylogo.png')); ?>" class="header-brand-img desktop-lgo" alt="Azea logo">
                                            </div>
                                            <div class="text-center mb-3">
                                                <h1 class="mb-2">Select Company</h1>
                                                <a href="javascript:void(0);" class="">Welcome Back !</a>
                                            </div>
                                            <form class="mt-5" id="loginForm">
                                                <div class="form-group ">
													<div class="custom-controls-stacked" id="listCompanies">
														<label class="custom-control custom-radio">
															<input type="radio" class="custom-control-input" name="example-radios" value="option1" checked>
															<span class="custom-control-label">Option 1</span>
														</label>
														<label class="custom-control custom-radio">
															<input type="radio" class="custom-control-input" name="example-radios" value="option2">
															<span class="custom-control-label">Option 2</span>
														</label>
													</div>
												</div>
                                                <div class="form-group text-center mb-3" >
                                                    <button type="submit" class="btn btn-primary btn-lg w-100 br-7" id="btnSubmit">Next</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/config/common.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/settings/users/selectCompany.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.custom-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/settings/users/selectCompany.blade.php ENDPATH**/ ?>