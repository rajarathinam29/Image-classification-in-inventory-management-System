

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
    <!-- <div class="page-rightheader">
        <div class="btn-list">
            <a href="javascript:void(0);" class="btn btn-outline-primary btnBack"><i class="fe fe-skip-back"></i> Back</a>
        </div>
    </div> -->
</div>
<!--End Page header-->

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <form id="categoryForm">
                <div class="card-body">
                    <div class="card-title font-weight-bold">Basic info:</div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Category Name<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Category Status<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="status" id="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                    <label class="form-label">Descripton</label>
                                    <textarea class="form-control mb-4" name="description" id="description" placeholder="Textarea" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="card-footer text-end">
                    <a href="javascript:void(0);" class="btn btn-info btnBack"><i class="fe fe-skip-back"></i> Back</a>
                    <button type="button" class="btn  btn-success" id="btnSubmit">Save <i class="fe fe-skip-forward"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Select2 js -->
<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>


<script src="<?php echo e(asset('assets/js/productcategories/create.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/productcategories/create.blade.php ENDPATH**/ ?>