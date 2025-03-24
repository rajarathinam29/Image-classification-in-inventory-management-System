

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
</div>
<!--End Page header-->

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<ul id="treeview1">
					<li><a href="javascript:void(0);">General</a>
						<ul>
							<li><a href="<?php echo e(route('adminSettings.personal')); ?>">Personal Settings</a></li>
							<li><a href="<?php echo e(route('adminSettings.paymentmethod')); ?>">PaymentMethod Settings</a></li>
							<li><a href="<?php echo e(route('adminSettings.companydetails')); ?>">Company Details</a></li>
							<li><a href="<?php echo e(route('adminSettings.prefix')); ?>">Prefix</a></li>
						</ul>
					</li>
					<li>Users and Controls
						<ul>
							<li><a href="<?php echo e(route('adminUsers')); ?>">Users</a></li>
							
						</ul>
					</li>
					<li>Imports
						<ul>
							<li><a href="<?php echo e(route('adminSettings.customers')); ?>">Customers</a></li>
							<li><a href="<?php echo e(route('adminSettings.products')); ?>">Products</a></li>
							<li><a href="<?php echo e(route('adminSettings.suppliers')); ?>">Suppliers</a></li>
							
						</ul>
					</li>
					<li>Make & Model
						<ul>
							<li><a href="<?php echo e(route('adminSettings.makeModel')); ?>">Make & Model</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- INTERNAL Treeview js -->
<script src="<?php echo e(asset('assets/plugins/treeview/treeview.js')); ?>"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>