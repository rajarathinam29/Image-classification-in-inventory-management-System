

<?php $__env->startSection('styles'); ?>

<!-- INTERNAL Prism Css -->
<link href="<?php echo e(asset('assets/plugins/prism/prism.css')); ?>" rel="stylesheet">
<!-- dropzone css -->
<link href="<?php echo e(asset('assets/plugins/dropzone/min/dropzone.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!--Page header-->
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

<div class="main-proifle">
    <div class="row">
        <div class="col-lg-12 col-xl-8">
            <div class="box-widget widget-user">
                <div class="widget-user-image1 d-xl-flex d-block">
                    <img alt="User Avatar" class="avatar brround p-0" src="<?php echo e(asset('assets/images/users/2.jpg')); ?>" id="userAvatar">
                    <div class="mt-1 ms-xl-5">
                        <h4 class="pro-user-username mb-3 font-weight-bold">Patrenna <i class="fa fa-check-circle text-success"></i></h4>
                        <small class="text-muted"><span class="userRole">Admin</span> at <span class="userCompanyName">Daily Food city</span></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-auto col-xl-4">
            <div class="text-xl-right text-left btn-list mt-4 mt-lg-0">
                <a href="javascript:void(0);" class="btn btn-primary btnEdit">Edit Profile</a>
            </div>
        </div>
    </div>
    <div class="profile-cover">
        <div class="wideget-user-tab">
            <div class="tab-menu-heading p-0">
                <div class="tabs-menu1 px-3">
                    <ul class="nav">
                        <li><a href="#tab-7" class="active fs-14" data-bs-toggle="tab">About</a></li>
                        <li><a href="#tab-uploadphoto" class=" fs-14" data-bs-toggle="tab">Upload photo</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- /.profile-cover -->
</div>
<!-- Row -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="border-0">
            <div class="tab-content">
                <div class="tab-pane active" id="tab-7">
                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title">User Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                <tbody>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">User Name</span>
                                            </td>
                                            <td id="userUserName"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Name </span>
                                            </td>
                                            <td id="userName"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Role Name </span>
                                            </td>
                                            <td id="roleName"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Email</span>
                                            </td>
                                            <td id="userEmail"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">User Status</span>
                                            </td>
                                            <td id="userStatus"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Phone No.</span>
                                            </td>
                                            <td id="userPhone"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-header ">
                            <h3 class="card-title">Address Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Building Number</span>
                                            </td>
                                            <td id="userBuildingNo"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Street </span>
                                            </td>
                                            <td id="userStreet"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">City </span>
                                            </td>
                                            <td id="userCity"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">State</span>
                                            </td>
                                            <td id="userState"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Country</span>
                                            </td>
                                            <td id="userCountry"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Zipcode</span>
                                            </td>
                                            <td id="userZipcode"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-uploadphoto">
                    <div class="card">
                        <div class="card-body">
                            <form class="dropzone" id="upload-form">
                                <div class="fallback"><input name="file" type="file" ></div>
                                <div class="dz-message needsclick"><div class="mb-3"><i class="display-4 text-muted bx bx-cloud-upload"></i></div><h5>Drop files here or click to upload.</h5></div>
                                <input type="hidden" name="userId" value="">
                                <input type="hidden" name="companyId" value="">
                                <input type="hidden" name="branchId" value="">
                                <input type="hidden" name="loginId" value="">
                                <input type="hidden" name="loginToken" value="">
                                <input type="hidden" name="_token" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Clipboard js -->
<script src="<?php echo e(asset('assets/plugins/clipboard/clipboard.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/clipboard/clipboard.js')); ?>"></script>

<!-- INTERNAL Prism js -->
<script src="<?php echo e(asset('assets/plugins/prism/prism.js')); ?>"></script>

<!-- INTERNAL tooltip js-->
<script src="<?php echo e(asset('assets/js/tooltip.js')); ?>"></script>


<!-- dropzone js -->
<script src="<?php echo e(asset('assets/plugins/dropzone/min/dropzone.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/settings/general/personal.js')); ?>"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/settings/personal.blade.php ENDPATH**/ ?>