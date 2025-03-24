

<?php $__env->startSection('styles'); ?>

<!-- INTERNAL File Uploads css-->
<link href="<?php echo e(asset('assets/plugins/fileupload/css/fileupload.css')); ?>" rel="stylesheet" type="text/css" />

<!-- INTERNAL Jquerytransfer css-->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jQuerytransfer/jquery.transfer.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jQuerytransfer/icon_font/icon_font.css')); ?>">

<!-- INTERNAL multi css-->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/multi/multi.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title mb-0 text-primary">Image Search</h4>
	</div>
</div>

<!-- Row -->
<div class="row">
	<div class="col-lg-12 col-md-12">
		<form method="post" class="card">
			<div class="card-header">
				<h3 class="card-title">Image Upload</h3>
			</div>
			<div class=" card-body">
				<div class="input-group file-browser mb-5">
					<input type="text" class="form-control border-end-0 browse-file" placeholder="choose" readonly>
					<label class="input-group-text btn btn-primary">
							Browse <input type="file" class="file-browserinput" style="display: none;" id="attachmentFile" name="attachmentFile" capture="user" accept="image/*">
					</label>
				</div>
				<img id="preview" class="avatar avatar-xxl bradius" style="display: none;">
				<h3 class="text-success" id="rsltSearch"></h3>
				<p id="rsltAccurate"></p>
			</div>
			<div class="card-footer text-end">
                    <a href="javascript:void(0);" class="btn btn-info btnBack"><i class="fe fe-skip-back"></i> Back</a>
                    <button type="button" class="btn  btn-success" id="btnSubmit">Search <i class="fe fe-skip-forward"></i></button>
         </div>
		</form>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

		<!-- INTERNAL Select2 js -->
		<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>

		<!-- INTERNAL File-Uploads Js-->
		<script src="<?php echo e(asset('assets/plugins/fancyuploder/jquery.ui.widget.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/fancyuploder/jquery.fileupload.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/fancyuploder/fancy-uploader.js')); ?>"></script>

		<!-- INTERNAL File uploads js -->
        <script src="<?php echo e(asset('assets/plugins/fileupload/js/dropify.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/filupload.js')); ?>"></script>

		<!--INTERNAL jquery transfer js-->
		<script src="<?php echo e(asset('assets/plugins/jQuerytransfer/jquery.transfer.js')); ?>"></script>

		<!--INTERNAL multi js-->
		<script src="<?php echo e(asset('assets/plugins/multi/multi.min.js')); ?>"></script>

		<script src="<?php echo e(asset('assets/js/file-upload.js')); ?>"></script>

	<script src="<?php echo e(asset('assets/js/products/imageSearch.js?v=1.0.1')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/products/image-search.blade.php ENDPATH**/ ?>