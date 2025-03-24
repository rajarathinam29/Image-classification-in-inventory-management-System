

<?php $__env->startSection('styles'); ?>
    <!-- INTERNAL treeview -->
    <link href="<?php echo e(asset('assets/plugins/treeview/treeview.css')); ?>" rel="stylesheet" type="text/css" />
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
            <form id="permissionForm">
                <div class="card-body">
                    <div class="card-title font-weight-bold">Basic info:</div>
                        <ul id="tree3">
                            <li><a href="javascript:void(0);">Users</a>
                                <ul>
                                    <li>
                                        View
                                        <div class="material-switch pull-right">
                                            <input id="usersView" name="usersView" type="checkbox"/>
                                            <label for="usersView" class="label-success"></label>
                                        </div>
                                    </li>
                                    <li>
                                        Write
                                        <div class="material-switch pull-right">
                                            <input id="userWrite" name="userWrite" type="checkbox"/>
                                            <label for="userWrite" class="label-success"></label>
                                        </div>
                                    </li>
                                    <li>
                                        Delete
                                        <div class="material-switch pull-right">
                                            <input id="userDelete" name="userDelete" type="checkbox"/>
                                            <label for="userDelete" class="label-success"></label>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                </div>
                <div class="card-footer text-end">
                    <a href="javascript:void(0);" class="btn btn-info btnBack"><i class="fe fe-skip-back"></i> Back</a>
                    <button type="button" class="btn btn-success" id="btnSubmit">Set permission <i class="fe fe-skip-forward"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Treeview js -->
<script src="<?php echo e(asset('assets/plugins/treeview/treeview.js')); ?>"></script>

<script src="<?php echo e(asset('assets/superadmin/js/admins/setpermission.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.superadmin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/superadmin/admins/setpermission.blade.php ENDPATH**/ ?>