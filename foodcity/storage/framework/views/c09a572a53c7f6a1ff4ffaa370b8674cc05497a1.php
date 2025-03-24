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
		<title><?php echo e($title); ?> OwnMake</title>

        <?php echo $__env->make('layouts.superadmin.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </head>

	<body class="app">

		<!---Global-loader-->
		<div id="global-loader" >
			<img src="<?php echo e(asset('assets/images/svgs/loader.svg')); ?>" alt="loader">
		</div>
		<!--- End Global-loader-->

		<!-- Page -->
		<div class="page">
			<div class="page-main">

                <?php echo $__env->make('layouts.superadmin.app-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('layouts.superadmin.horizontal-main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- App-Content -->
				<div class="hor-content main-content">
                    <div class="container">

                <?php echo $__env->yieldContent('content'); ?>

                    </div>
                </div>
            </div>

            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->yieldContent('modal'); ?>

        </div>

        <?php echo $__env->make('layouts.superadmin.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </body>
</html>
<?php /**PATH C:\xampp\htdocs\foodcity\resources\views/layouts/versions/superadmin-horizontal-light.blade.php ENDPATH**/ ?>