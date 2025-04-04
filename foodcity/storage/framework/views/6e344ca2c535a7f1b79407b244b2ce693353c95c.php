

<?php $__env->startSection('styles'); ?>

<!-- Data table css -->
<link href="<?php echo e(asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css')); ?>" rel="stylesheet" />

<!-- Slect2 css -->
<link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title mb-0 text-primary"><?php echo e($title); ?></h4>
	</div>
</div>
<!--End Page header-->

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<a href="<?php echo e(route('superAdminBanks.create')); ?>" class="btn btn-md btn-green"><i class="fa fa-plus"></i></a>
			</div>
			<div class="card-body">
				<div class="">
					<div class="table-responsive">
						<table id="banksTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">Bank Code</th>
									<th class="border-bottom-0">Bank Name</th>
									<th class="border-bottom-0">Short Name</th>
									<th class="border-bottom-0">Country</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
							</thead>
							<tbody id="banksContent">
								
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><span class="badge badge-gradient-success mt-2 fs-11">Active</span></td>
									<td>
										<div class="btn-group">
											<a href="javascript:void(0);" class="btn btn-light btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options <i class="fa fa-angle-down"></i></a>
											<div class="dropdown-menu">
												<a class="dropdown-item" href=""><i class="fe fe-list me-2"></i> List of all banks</a>
												<a class="dropdown-item" href=""><i class="fe fe-plus-circle me-2"></i> Add banks</a>
											</div>
										</div>
									</td>
									<td>
										<a href=""><button type="button" class="btn btn-sm bg-success-transparent" data-bs-toggle="modal"><i class="fe fe-unlock"></i></button></a>
										<a href=""><button type="button" class="btn btn-sm bg-success-transparent" data-bs-toggle="modal"><i class="fe fe-eye"></i></button></a>
										<a href=""><button type="button" class="btn btn-sm bg-info-transparent"><i class="fe fe-edit-3"></i></button></a>
										<button type="button" class="btn btn-sm bg-danger-transparent delete"><i class="fe fe-trash"></i></button>
										
									</td>
									
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
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

<!-- INTERNAL Select2 js -->
<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>

<script src="<?php echo e(asset('assets/superadmin/js/banks/banks.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.superadmin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/superadmin/banks/banks-list.blade.php ENDPATH**/ ?>