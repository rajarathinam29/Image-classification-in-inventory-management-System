

<?php $__env->startSection('styles'); ?>
<!-- Data table css -->
<link href="<?php echo e(asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css')); ?>" rel="stylesheet" />

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
                                    <span class="font-weight-semibold w-50">Customer Id</span>
                                </td>
                                <td id="customer_id"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Customer Name</span>
                                </td>
                                <td id="customer_name"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Points </span>
                                </td>
                                <td id="points"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Phone No </span>
                                </td>
                                <td id="phone_no"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Alternative Phone No </span>
                                </td>
                                <td id="alt_phone_no"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Tax Number </span>
                                </td>
                                <td id="tax_no"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Opening Balance </span>
                                </td>
                                <td id="opening_balance"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Pay Period</span>
                                </td>
                                <td id="pay_type"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Pay Term</span>
                                </td>
                                <td id="pay_term"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Credit Limit </span>
                                </td>
                                <td id="credit_limit"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Email </span>
                                </td>
                                <td id="email"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Date Of Birth </span>
                                </td>
                                <td id="date_of_birth"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Address </span>
                                </td>
                                <td id="address"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Shipping Address </span>
                                </td>
                                <td id="shipping_address"></td>
                            </tr>
                            <!-- <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Status </span>
                                </td>
                                <td id="status"></td>
                            </tr> -->
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
                    Customer Sales
                </h3>
            </div>
			<div class="card-body">
				<div class="">
					<div class="table-responsive">
						<table id="customersalesTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">InvoiceId</th>
                                    <th class="border-bottom-0">Date</th>
                                    <th class="border-bottom-0">NetAmount</th>
                                    <th class="border-bottom-0">Status</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
							</thead>
							<tbody id="customersalesContent">
								
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


<script src="<?php echo e(asset('assets/js/customers/view.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/customers/view.blade.php ENDPATH**/ ?>