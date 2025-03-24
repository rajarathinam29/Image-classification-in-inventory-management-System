

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
            <form id="chequeForm">
                <div class="card-body">
                    <div class="card-title font-weight-bold">Basic info:</div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Issue Date<span class="text-red">*</span></label>
                                <input type="datetime-local" class="form-control" name="issueDate" id="issueDate" placeholder="issueDate">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 chequeField">
                            <div class="form-group">
                                <label class="form-label">Cheque No.<span class="text-red">*</span></label>
                                <input type="number" class="form-control" name="chequeNo" id="chequeNo" placeholder="ChequeNo" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 chequeField">
                            <div class="form-group">
                                <label class="form-label">Effective Date<span class="text-red">*</span></label>
                                <input type="date" class="form-control" name="effectiveDate" id="effectiveDate" placeholder="effectiveDate">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 chequeField">
                            <div class="form-group">
                                <label class="form-label">Payee Name.<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="payeeName" id="payeeName" placeholder="payeeName" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Amount<span class="text-red">*</span></label>
                                <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" autocomplete="off">  
                            </div>
                        </div> 
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Issue To<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="issueTo" id="issueTo" placeholder="issueTo" autocomplete="off" readonly>  
                            </div>
                        </div>  
                        <div class="col-lg-12 ">
                            <div class="form-group">
                                <label class="form-label">Refference </label>
                                <textarea class="form-control mb-4" placeholder="Refference, Card no., Description." rows="3" id="refference" name="refference"></textarea>
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

<!-- mask -->
<script src="<?php echo e(asset('assets/plugins/input-mask/jquery.mask.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/cheque/issued/edit.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/cheque/issued/edit.blade.php ENDPATH**/ ?>