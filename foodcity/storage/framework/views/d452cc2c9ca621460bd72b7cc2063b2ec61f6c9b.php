

<?php $__env->startSection('styles'); ?>
    <!-- Slect2 css -->
    <link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />
    <!-- INTERNAL telephoneinput css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/telephoneinput/telephoneinput.css')); ?>">
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
                        <div class="row">
							<div class="col-lg-12 col-md-12">
								<form method="post" class="card">
									<div class="card-header">
										<h3 class="card-title">File Import</h3>
									</div>
									<div class="card-body" id="uploadBody">
										<div class="input-group file-browser mb-5">
											<input type="text" class="form-control border-end-0 browse-file" placeholder="choose" readonly>
											<label class="input-group-text btn btn-primary">
													Browse <input type="file" class="file-browserinput" style="display: none;" id="importSupplierFile">
											</label>
										</div>
										
									</div>
									<div class="card-body" id="progressBody" style="display:none;">
										<div class="dimmer active">
											<div class="spinner3">
												<div class="dot1"></div>
												<div class="dot2"></div>
											</div>
										</div>
										<p class="text-muted text-center">Please don't close or refresh this page until complete importing.</p>
									</div>
									<div class="card-footer text-end">
										<button type="button" class="btn btn-primary" id="btnSubmitImport">Submit</button>
									</div>
								</form>
							</div>
						</div>

                        <div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">
											Instructions
										</h3>
										<div class="card-options">
											<a href="<?php echo e(url('uploads/import/suppliers.xlsx')); ?>" class="btn btn-sm btn-success" target="_blank"><i class="fe fe-download me-2"></i> Download Templete File</a>
										</div>
									</div>
									<div class="card-body">
										<h6 class="font-weight-semibold">Follow the instructions carefully before importing the file.</h6>
										<p class="text-muted">The columns of the file should be in the following order.</p>
										<div class="table-responsive">
											<table class="table card-table table-vcenter text-nowrap">
												<thead >
													<tr>
														<th>Column No</th>
														<th> Name</th>
														<th>Column Name</th>
														<th>Instruction</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>Company Name (Required)</td>
														<td>company_name</td>
														<td>Name of the Company</td>
													</tr>
													<tr>
														<td>2</td>
														<td>Delear Name (Required)</td>
														<td>dealer_name</td>
														<td>Name of the Dealer</td>
													</tr>
													<tr>
														<td>3</td>
														<td>Phone Number (Required)</td>
														<td>phone_no</td>
														<td></td>
													</tr>
													<tr>
														<td>4</td>
														<td>Alternate Phone Number (Optional)</td>
														<td>alt_phone_no</td>
														<td></td>
													</tr>
													<tr>
														<td>5</td>
														<td>Email (Optional)</td>
														<td>email</td>
														<td></td>
													</tr>
													
													<tr>
														<td>6</td>
														<td>Building Number (Optional)</td>
														<td>building_no</td>
														<td></td>
													</tr>
													<tr>
														<td>7</td>
														<td>Street (Optional)</td>
														<td>street</td>
														<td></td>
													</tr>
													<tr>
														<td>8</td>
														<td>City (Optional)</td>
														<td>city</td>
														<td></td>
													</tr>
													<tr>
														<td>9</td>
														<td>State (Optional)</td>
														<td>state</td>
														<td></td>
													</tr>
													<tr>
														<td>10</td>
														<td>Country (Optional)</td>
														<td>zipcode</td>
														<td>Available Options: Sri Lanka and United Kindom</td>
													</tr>
													<tr>
														<td>11</td>
														<td>Zipcode (Optional)</td>
														<td>zipcode</td>
														<td></td>
													</tr>
													<tr>
														<td>12</td>
														<td>Tax Number (Optional)</td>
														<td>tax_no</td>
														<td></td>
													</tr>
													<tr>
														<td>13</td>
														<td>Pay Period (Optional)</td>
														<td>pay_period</td>
														<td>Available Options: Months and Days</td>
													</tr>
													<tr>
														<td>14</td>
														<td>Pay Term (Optional)</td>
														<td>pay_term</td>
														<td></td>
													</tr>
													<tr>
														<td>15</td>
														<td>Credit Limit (Optional)</td>
														<td>credit_limit</td>
														<td></td>
													</tr>
													<tr>
														<td>16</td>
														<td>Status (Required)</td>
														<td>status</td>
														<td>Available Options: <br> 1 = Active, 0 = Inactive</td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
										<!-- table-responsive -->
									</div>
								</div>
							</div>
						</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Select2 js -->
<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>

<!--INTERNAL telephoneinput js-->
<script src="<?php echo e(asset('assets/plugins/telephoneinput/telephoneinput.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/file-upload.js')); ?>"></script>

<!--Excel js-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>

<script src="<?php echo e(asset('assets/js/settings/imports/importSuppliers.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/settings/imports/suppliers.blade.php ENDPATH**/ ?>