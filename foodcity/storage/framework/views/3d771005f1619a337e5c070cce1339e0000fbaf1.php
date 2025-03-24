

<?php $__env->startSection('styles'); ?>

<!-- Data table css -->
<link href="<?php echo e(asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css')); ?>" rel="stylesheet" />

<!-- Slect2 css -->
<link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />

<!-- dropzone css -->
<link href="<?php echo e(asset('assets/plugins/dropzone/min/dropzone.min.css')); ?>" rel="stylesheet" type="text/css" />

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
			<form id="salesForm">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="form-group">
								<label class="form-label">Customer</label>
								<select class="form-control custom-select select2" name="sltCustomer" id="sltCustomer"></select>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="form-group">
								<label class="form-label">Status</label>
								<select class="form-control custom-select select2" name="sltStatus" id="sltStatus">
									<option value="">Select Status</option>
									<option value="0">Incomplete</option>
									<option value="1">Billed/Packed</option>
									<option value="2">Shipped</option>
									<option value="3">Delivered</option>
									<option value="4">Returned</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="form-group">
								<label class="form-label">Payment Status</label>
								<select class="form-control custom-select select2" name="sltPaymentStatus" id="sltPaymentStatus">
									<option value="">Select Status</option>
									<option value="0">Unpaid</option>
									<option value="1">Paid</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="form-group">
								<label class="form-label">From date</label>
								<input type="date" class="form-control" name="fromDate" id="fromDate" placeholder="From Date" autocomplete="off">  
							</div>
						</div>
						
						<div class="col-lg-4 col-md-6">
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
			<div class="card-body">
				<div class="">
					<div class="table-responsive">
						<table id="salesTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">InvoiceID</th>
									<th class="border-bottom-0">Date</th>
                                    <th class="border-bottom-0">Customer</th>
                                    <th class="border-bottom-0">Net Amount</th>
									<th class="border-bottom-0">Status</th>
									<th class="border-bottom-0">Payment Status</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
							</thead>
							<tbody id="salesContent"></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<div class="modal fade" id="uploadAttachmentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="viewAttachmentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="row" id="viewAttachmentContent">
					
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

<!-- dropzone js -->
<script src="<?php echo e(asset('assets/plugins/dropzone/min/dropzone.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/sales/sales.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/sales/sales-list.blade.php ENDPATH**/ ?>