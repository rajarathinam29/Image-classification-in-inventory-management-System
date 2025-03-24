

<?php $__env->startSection('styles'); ?>


<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables/FixedHeader/css/fixedHeader.dataTables.css')); ?>">
<!-- Data table css -->
<link href="<?php echo e(asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css')); ?>" rel="stylesheet" />

<!-- fixed Column  -->
<!-- <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables/FixedColumns/css/fixedColumns.dataTables.css')); ?>"> -->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables/FixedColumns/css/fixedColumns.bootstrap5.min.css')); ?>">

<!-- <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables/FixedColumns/css/fixedColumns.bootstrap5.min.css')); ?>"> -->

<style>
.DTFC_LeftBodyWrapper {
    color: black !important;
    background-color: #ffffff !important;
}

.DTFC_LeftBodyLiner {
    overflow: hidden;
}
</style>

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
	<div class="col-md-12">
		<div class="card">
			<div class="row me-0 ms-0">
				<div class="col-xl-3 col-lg-6 col-sm-6 pe-0 ps-0 border-end">
					<div class="card-body text-center">
						<p class="mb-1">Total Stock (Cost Price)</p>
						<h2 class="mb-1 font-weight-bold" id="stockValCost">0.00</h2>
						<!-- <span class="mb-0 text-muted"><span class="text-success"><i class="fa fa-caret-up  me-1"></i> 0.7%</span> Last month</span> -->
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-sm-6 pe-0 ps-0 border-end">
					<div class="card-body text-center">
						<p class="mb-1">Total Stock (Selling Price)</p>
						<h2 class="mb-1 font-weight-bold" id="stockValSell">0.00</h2>
						<!-- <span class="mb-0 text-muted"><span class="text-success"><i class="fa fa-caret-up  me-1"></i> 0.2%</span> Last month</span> -->
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-sm-6 pe-0 ps-0 border-end">
					<div class="card-body text-center">
						<p class="mb-1">Profit</p>
						<h2 class="mb-1 font-weight-bold" id="stockValProfit">0.00</h2>
						<!-- <span class="mb-0 text-muted"><span class="text-danger"><i class="fa fa-caret-down  me-1"></i> 12%</span> Last month</span> -->
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-sm-6 pe-0 ps-0">
					<div class="card-body text-center">
						<p class="mb-1">Margin</p>
						<h2 class="mb-1 font-weight-bold" id="stockValMargin">0.00</h2>
						<!-- <span class="mb-0 text-muted"><span class="text-danger"><i class="fa fa-caret-down  me-1"></i> 0.6%</span> Last month</span> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body" id="progressBody" >
				<div class="dimmer active">
					<div class="spinner3">
						<div class="dot1"></div>
						<div class="dot2"></div>
					</div>
				</div>
				<h4 class="text-muted text-center">Thanks for patiently waiting. May be it's take few minutes</h4>
			</div>
			<div class="card-body" id="contentBody" style="display:none;">
				<div class="">
					<div class="">
						<table id="stockReportTbl" class="table table-bordered nowrap" style="width:100%">
							<thead class="border-bottom-0 ">
								<tr>
									<th rowspan="2">#</th>
									<th rowspan="2">Product Name</th>
									<th rowspan="2">SKU/ Barcode</th>
                                    <th rowspan="2">Stock</th>
                                    <th class="text-center" colspan="4">Single</th>
									<th class="text-center" colspan="4">Total</th>
									<th rowspan="2">Counted/ Opening</th>
									<th class="text-center" colspan="7">Avarage</th>
								</tr>
								<tr>
									<!-- <th >#</th>
									<th >Product Name</th>
									<th >SKU/ Barcode</th>
                                    <th >Stock</th> -->
									<th>Cost Price</th>
									<th>selling Price</th>
									<th>Profit</th>
									<th>Margin</th>
									<th>Cost Price</th>
									<th>selling Price</th>
									<th>Profit</th>
									<th>Margin</th>
									<!-- <th>Counted/ Opening</th> -->
									<th>Cost Price</th>
									<th>selling Price</th>
									<th>Profit</th>
									<th>Margin</th>
									<th>Total Cost price</th>
									<th>Total selling price</th>
									<th >Total Margin</th>
								</tr>
							</thead>
							<tbody id="stockReportContent"></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Data tables -->
<script src="<?php echo e(asset('assets/plugins/datatables/DataTables/js/jquery.dataTables.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/plugins/datatables/DataTables/js/dataTables.dataTables.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/JSZip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/buttons.colVis.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js')); ?>"></script> -->

<scritp src="<?php echo e(asset('assets/plugins/datatables/FixedHeader/js/dataTables.fixedHeader.js')); ?>"></script>

<scritp src="<?php echo e(asset('assets/plugins/datatables/FixedColumns/js/dataTables.fixedColumns.js')); ?>"></script>
<scritp src="<?php echo e(asset('assets/plugins/datatables/FixedColumns/js/fixedColumns.bootstrap5.min.js')); ?>"></script>

<!-- <script src="<?php echo e(asset('assets/js/datatables.js')); ?>"></script> -->


<script src="<?php echo e(asset('assets/js/reports/stockreport.js?v=1.0.4')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/reports/stock-report.blade.php ENDPATH**/ ?>