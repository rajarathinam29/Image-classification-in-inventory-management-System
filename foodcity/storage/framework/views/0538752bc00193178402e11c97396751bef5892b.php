

<?php $__env->startSection('styles'); ?>
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
            <a href="javascript:void(0);"  class="btn btn-primary btn-pill btnEdit"><i class="fe fe-edit-3 me-2 fs-14"></i> Edit</a>
        </div>
    </div>
</div>
<!--End Page header-->

<div class="row">
	<div class="col-12">
		<div class="card">
			<!-- <div class="card-header">
				<a href="<?php echo e(route('adminUsers.create')); ?>" class="btn btn-md btn-green"><i class="fa fa-user-plus"></i></a>
			</div> -->
            
			<div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <div class="d-flex align-items-center p-4">
                                        <div class="avatar avatar-xxl brround d-block cover-image"  id="companyLogo">
                                        </div>
                                        <div class="wrapper ms-3">
                                            <button type="button" class="btn btn-success btn-sm mb-1" id="btnAttachmentUpload"><i class="fe fe-upload me-2"></i>Upload</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Company Name </span>
                                </td>
                                <td id="companyName"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Registered No. </span>
                                </td>
                                <td id="registeredNo"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Start Date </span>
                                </td>
                                <td id="startDate"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Proprietor Name</span>
                                </td>
                                <td id="proprietorName"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Email</span>
                                </td>
                                <td id="companyEmail"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Company Status</span>
                                </td>
                                <td id="companyStatus"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Phone No.</span>
                                </td>
                                <td id="companyPhone"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Address</span>
                                </td>
                                <td id="companyAddress"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">User Limit</span>
                                </td>
                                <td id="userLimit"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Finiancial Year Start Month</span>
                                </td>
                                <td id="startingMonth"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Currency</span>
                                </td>
                                <td id="currency"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Currency Symbol Placement</span>
                                </td>
                                <td id="currencyPlacement"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Date Format</span>
                                </td>
                                <td id="dateFormat"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
	</div>
    <div class="col-12">
        <div class="row flex-lg-nowrap">
            <div class="col-12 mb-3">
                <div class="e-panel card">
                    <div class="card-body pb-2">
                        <div class="row">
                            <div class="col-md-7 ">
                                <div class="card-title font-weight-bold">Branches</div>
                            </div>
                            <div class="col-md-5 col-auto text-right mb-2">
                                <a href="javascript:void(0);" class="btn btn-primary" id="btnBranchAdd"><i class="fe fe-plus"></i> Add New Branch</a>
                            </div>
                        </div>
                        <div class="row" id="branchesContent">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<div class="modal fade" id="uploadAvatarModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Assign Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- dropzone js -->
<script src="<?php echo e(asset('assets/plugins/dropzone/min/dropzone.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/superadmin/js/companies/view.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.superadmin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/superadmin/company/view.blade.php ENDPATH**/ ?>