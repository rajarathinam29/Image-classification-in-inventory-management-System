

<?php $__env->startSection('styles'); ?>
<!-- Data table css -->
<link href="<?php echo e(asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css')); ?>" rel="stylesheet" />
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
                                <td class="">
                                    <span class="font-weight-semibold w-50">Bank Code  </span>
                                </td>
                                <td id="bankCode"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Bank Name </span>
                                </td>
                                <td id="bankName"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Short Name </span>
                                </td>
                                <td id="shortName"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Country</span>
                                </td>
                                <td id="country"></td>
                            </tr>   
                            
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
	</div> 
    <div class="col-12">
		<div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Bank Branches
                </h3>
                <div class="card-options">
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" id="btnAddBranch"><i class="fe fe-plus"></i> Add New</a>
                </div>
            </div>
			<div class="card-body">
				<div class="">
					<div class="table-responsive">
						<table id="bankbranchTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">Branch Code</th>
                                    <th class="border-bottom-0">Branch Name</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
							</thead>
							<tbody id="bankbranchContent">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>

<div class="modal fade" id="addBankBranchModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bankbranch-modal-title">Add new branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addBankBranchForm">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Branch Code</label>
                                <input type="text" class="form-control" name="branchCode" id="branchCode" placeholder="Branch Code" autocomplete="off">  
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Branch Name</label>
                                <input type="text" class="form-control" name="branchName" id="branchName" placeholder="Branch Name" autocomplete="off">  
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSaveBankBranch"><i class="fe fe-plus"></i> Create</button>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Data tables -->
<script src="<?php echo e(asset('assets/plugins/datatables/DataTables/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/JSZip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatables.js')); ?>"></script>
<!-- dropzone js -->
<script src="<?php echo e(asset('assets/plugins/dropzone/min/dropzone.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/superadmin/js/banks/view.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.superadmin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/superadmin/banks/view.blade.php ENDPATH**/ ?>