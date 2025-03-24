

<?php $__env->startSection('styles'); ?>


<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables/FixedHeader/css/fixedHeader.dataTables.css')); ?>">
<!-- Data table css -->
<link href="<?php echo e(asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css')); ?>" rel="stylesheet" />
<!-- datatable row  -->
<link href="https://cdn.datatables.net/rowgroup/1.5.0/css/rowGroup.bootstrap5.css" rel="stylesheet" />

<!-- fixed Column  -->
<!-- <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables/FixedColumns/css/fixedColumns.dataTables.css')); ?>"> -->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables/FixedColumns/css/fixedColumns.bootstrap5.min.css')); ?>">

<!-- <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables/FixedColumns/css/fixedColumns.bootstrap5.min.css')); ?>"> -->

<!-- Slect2 css -->
<link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />

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
	<div class="col-lg-12">
		<div class="card">
			<form id="wipForm">
				<div class="card-body pt-1 pb-1">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label class="form-label">Wip </label>
								<select class="form-control select2" name="wipId" id="wipId" multiple>
									
								</select>
							</div>
						</div>
						<!-- <div class="col-lg-3 col-md-6">
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
						</div> -->
						
						<!-- <div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label class="form-label">To date</label>
								<input type="date" class="form-control" name="toDate" id="toDate" placeholder="To Date" autocomplete="off">  
							</div>
						</div> -->
					</div>
				</div>
				<div class="card-footer text-end pt-1">
					<button type="button" class="btn  btn-primary" id="btnWipReset"><i class="fe fe-refresh-cw"></i> Reset</button>
					<button type="button" class="btn  btn-success" id="btnWipSubmit">Filter <i class="fe fe-skip-forward"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--  -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
                <h3 class="card-title" id="stockReportTitle">Receive Note(s)</h3>
                
            </div>
			<div class="card-body">
				<div class="">
					<div class="">
						<table id="stockReportTbl" class="table table-bordered nowrap" style="width:100%">
							<thead class="border-bottom-0 ">
								<tr>
									<th rowspan="2">#</th>
									<th rowspan="2">Product Name</th>
									<th rowspan="2">SKU/ Barcode</th>
									<th rowspan="2">WipNo</th>
									<th rowspan="2">Stock</th>
                                    <th rowspan="2">Ordered</th>
                                    <th rowspan="2">Used</th>
                                    <th rowspan="2">Returned</th>
                                    <th class="text-center" colspan="4">Single</th>
									<th class="text-center" colspan="4">Total</th>
									<!-- <th >Counted/ Opening</th>
									<th class="text-center" colspan="7">Avarage</th> -->
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
									<!-- <th>Cost Price</th>
									<th>selling Price</th>
									<th>Profit</th>
									<th>Margin</th>
									<th>Total Cost price</th>
									<th>Total selling price</th>
									<th >Total Margin</th> -->
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

<!-- INTERNAL Select2 js -->
<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>

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

<scritp src="https://cdn.datatables.net/rowgroup/1.5.0/js/dataTables.rowGroup.js"></script>
<scritp src="https://cdn.datatables.net/rowgroup/1.5.0/js/rowGroup.bootstrap5.js"></script>

<!-- <script src="<?php echo e(asset('assets/js/datatables.js')); ?>"></script> -->


<script src="<?php echo e(asset('assets/js/wipStock/wipStock.js?v=1.0.5')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/wipStock/wip-stock.blade.php ENDPATH**/ ?>