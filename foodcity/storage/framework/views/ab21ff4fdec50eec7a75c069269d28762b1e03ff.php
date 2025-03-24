

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
							Browse <input type="file" class="file-browserinput" style="display: none;" id="importProductFile">
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
				<h4 class="text-muted text-center">Please don't close or refresh this page until complete importing.</h4>
			</div>
			
			<div class="card-footer text-end">
				<button type="button" class="btn btn-primary" id="btnSubmitImport">Submit</button>
			</div>
		</form>
	</div>
</div>

<div class="row" id="errorReportRow" style="display:none;">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Error Report(s)</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table card-table table-vcenter text-nowrap">
						<thead>
							<tr>
								<th>Barcode</th>
								<th>Product</th>
								<th>Errors</th>
							</tr>
						</thead>
						<tbody id="errorContent"></tbody>
					</table>
				</div>
			</div>
		</div>
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
					<a href="<?php echo e(url('uploads/import/products.xlsx')); ?>" class="btn btn-sm btn-success" target="_blank"><i class="fe fe-download me-2"></i> Download Templete File</a>
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
								<th>Name</th>
								<th>Column Name</th>
								<th>Instruction</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Barcode (Required)</td>
								<td>barcode</td>
								<td>Barcode/SKU of the product</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Product Name (Required)</td>
								<td>product_name</td>
								<td>Name of the product</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Product Category (Required)</td>
								<td>product_category</td>
								<td>Name of the Category <br> (If not found new category with the given name will be created)</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Unit in Case (Required)</td>
								<td>unit_in_case</td>
								<td>How many Pieces in a Case</td>
							</tr>
							<tr>
								<td>5</td>
								<td>Alert Quantity (Optional)</td>
								<td>alert_qty</td>
								<td></td>
							</tr>
							<tr>
								<td>6</td>
								<td>Unit Type (Required)</td>
								<td>units_type</td>
								<td>Available Options: Pcs, Kg</td>
							</tr>
							<tr>
								<td>7</td>
								<td>Price Type (Required)</td>
								<td>price_type</td>
								<td>Non-Mrp and Mrp in Price Type <br> 0 = Non-Mrp <br> 1 = Mrp  </td>
							</tr>
							<tr>
								<td>8</td>
								<td>Profit Margin (Optional)</td>
								<td>profit_margin</td>
								<td>Profit Margin (Only in numbers)</td>
							</tr>
							<tr>
								<td>9</td>
								<td>Cost Price (Required)</td>
								<td>cost_price</td>
								<td>Must be greater than Selling Price and Must be Less than or equal Mrp </td>
							</tr>
							<tr>
								<td>10</td>
								<td>Discount Price (Required)</td>
								<td>sale_price</td>
								<td></td>
							</tr>
							<tr>
								<td>11</td>
								<td>MRP/Selling Price (Required)</td>
								<td>mrp</td>
								<td>Must be greater than Cost Price</td>
							</tr>
							<tr>
								<td>12</td>
								<td>VAT/Tax (Optional)</td>
								<td>vat</td>
								<td></td>
							</tr>
							<tr>
								<td>13</td>
								<td>VAT/Tax Type (Required)</td>
								<td>vat_type</td>
								<td>Inclusive and Exclusive in VAT/Tax Type <br> 0 = Inclusive <br>1 = Exclusive</td>
							</tr>
							<tr>
								<td>14</td>
								<td>Product Company (Required)</td>
								<td>company_name</td>
								<td>Name of the Company <br> (If not found new company with the given name will be created)</td>
							</tr>
							<tr>
								<td>15</td>
								<td>Product Brand (Required)</td>
								<td>brand_name</td>
								<td>Name of the Brand <br> (If not found new brand with the given name will be created)</td>
							</tr>
							<tr>
								<td>16</td>
								<td>Product Status (Required)</td>
								<td>status</td>
								<td>Available Options: <br> 1 = Active, 0 = Inactive</td>
							</tr>
							<tr>
								<td>17</td>
								<td>Stock (Optional)</td>
								<td>stock</td>
								<td>Opening stock of the Product</td>
							</tr>
							<tr>
								<td>18</td>
								<td>Part No (Optional)</td>
								<td>part_no</td>
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

<script src="<?php echo e(asset('assets/js/settings/imports/importProducts.js?v=1.0.1')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/settings/imports/products.blade.php ENDPATH**/ ?>