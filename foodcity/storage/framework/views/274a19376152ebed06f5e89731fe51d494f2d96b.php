

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
                                                <h1 class="mb-2">Log In</h1>
                                                <a href="javascript:void(0);" class="">Welcome Back !</a>
                                            </div>
                                            <form class="mt-5" id="loginForm">
                                                <div class="input-group mb-4">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-user"></i>
                                                        </div>
                                                    <input type="text" class="form-control" id="inputUname" placeholder="Username">
                                                </div>
                                                <div class="input-group mb-4">
                                                    <div class="input-group" id="Password-toggle1">
                                                        <a href="" class="input-group-text">
                                                        <i class="fe fe-eye" aria-hidden="true"></i>
                                                        </a>
                                                        <input class="form-control" type="password" id="inputPassword" placeholder="Confirm Password">
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" />
                                                        <span class="custom-control-label">Remember me</span>
                                                    </label>
                                                </div> -->
                                                <div class="form-group text-center mb-3" >
                                                    <button type="submit" class="btn btn-primary btn-lg w-100 br-7" id="btnSubmit">Log In</button>
                                                </div>
                                                <div class="form-group fs-13 text-center">
                                                    <a href="<?php echo e(url('forgot-password2')); ?>">Forget Password ?</a> 
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
    <script src="<?php echo e(asset('assets/js/users/login.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.custom-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/users/login.blade.php ENDPATH**/ ?>