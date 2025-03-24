

<?php $__env->startSection('styles'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="page">
            <div class="page-single">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- <div class="text-center mb-5">
                                                <img src="<?php echo e(asset('assets/images/brand/ownmake.png')); ?>" class="header-brand-img desktop-lgo" alt="Azea logo">
                                            </div> -->
                                            <div class="text-center mb-3">
                                                <h1 class="mb-2">Upload Attachment</h1>
                                            </div>
                                            <form class="mt-5" id="attachmentForm">
                                                <div class="form-group">
                                                    <label class="form-label">Title<span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="attachmentTitle" id="attachmentTitle" placeholder="Attachment Title"  autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Attachment<span class="text-red">*</span></label>
                                                    <div class="input-group file-browser mb-5">
                                                        <input type="file" class="form-control " name="attachmentFile" id="attachmentFile" capture="user" accept="image/*" placeholder="choose">
                                                        
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" />
                                                        <span class="custom-control-label">Remember me</span>
                                                    </label>
                                                </div> -->
                                                <div class="form-group text-center mb-3" >
                                                    <button type="submit" class="btn btn-primary btn-lg w-100 br-7" id="btnSubmit">Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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

<script src="<?php echo e(asset('assets/js/wip/uploadAttachment.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.custom-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/wip/upload-attachments.blade.php ENDPATH**/ ?>