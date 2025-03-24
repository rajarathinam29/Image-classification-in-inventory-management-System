<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Azea – Laravel Admin & Dashboard Template" name="description">
		<meta content="Spruko Private Limited" name="author">
		<meta name="keywords" content="laravel ui admin template, laravel admin template, laravel dashboard template,laravel ui template, laravel ui, livewire, laravel, laravel admin panel, laravel admin panel template, laravel blade, laravel bootstrap5, bootstrap admin template, admin, dashboard, admin template">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
		<!-- Title -->
		<title>Admin Login Portal</title>

        <?php echo $__env->make('layouts.superadmin-login-styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	</head>

	<body class="h-100vh error-bg">

	<?php echo $__env->yieldContent('class'); ?>

	    <!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="<?php echo e(asset('assets/images/svgs/loader.svg')); ?>" alt="loader">
		</div>
		<!-- End GLOBAL-LOADER -->

            <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('layouts.superadmin-login-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	</div>

	</body>
</html>
<?php /**PATH C:\xampp\htdocs\foodcity\resources\views/layouts/versions/superadmin-light.blade.php ENDPATH**/ ?>