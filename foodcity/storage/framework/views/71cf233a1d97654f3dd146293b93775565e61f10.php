

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
				<form id="revenueForm">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-3 col-md-6">
								<div class="form-group">
									<label class="form-label">From date</label>
									<input type="date" class="form-control" name="fromDate" id="fromDate" placeholder="From Date" autocomplete="off">  
								</div>
							</div>
							
							<div class="col-lg-3 col-md-6">
								<div class="form-group">
									<label class="form-label">To date</label>
									<input type="date" class="form-control" name="toDate" id="toDate" placeholder="To Date" autocomplete="off">  
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer text-end">
						<button type="submit" class="btn  btn-success" id="btnSubmit">Filter <i class="fe fe-skip-forward"></i></button>
					</div>
				</form>
			</div>

		<div class="card">
			<div class="card-header">
				<a href="<?php echo e(route('revenues.create')); ?>" class="btn btn-md btn-green"><i class="fa fa-plus"></i></a>
			</div>
			<div class="card-body">
				<div class="">
					<div class="table-responsive">
						<table id="revenueTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">Ref No.</th>
									<th class="border-bottom-0">Date</th>
                                    <th class="border-bottom-0">Amount</th>
                                    <th class="border-bottom-0">Description</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
							</thead>
							<tbody id="revenueContent">
								
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

<script src="<?php echo e(asset('assets/js/revenue/revenue.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/revenue/revenue-list.blade.php ENDPATH**/ ?>