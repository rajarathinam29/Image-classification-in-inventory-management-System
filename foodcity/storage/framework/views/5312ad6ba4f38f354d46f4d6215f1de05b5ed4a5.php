<?php $__env->startSection('styles'); ?>

		<!-- Simplebar css -->
		<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/simplebar/css/simplebar.css')); ?>">

		<!-- INTERNAL Morris Charts css -->
		<link href="<?php echo e(asset('assets/plugins/morris/morris.css')); ?>" rel="stylesheet" />

		<!-- INTERNAL Select2 css -->
		<link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />

		<!-- Data table css -->
		<link href="<?php echo e(asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css')); ?>" rel="stylesheet" />
		<link href="<?php echo e(asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css')); ?>"  rel="stylesheet">
		<link href="<?php echo e(asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css')); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0 text-primary"><?php echo e($title); ?></h4>
							</div>
							
						</div>
						<!--End Page header-->

						<!-- Row-1 -->
						<div class="row">
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0 dash1">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-6 col-md-12 col-sm-6 col-6">
												<div class="">
													<span class="fs-14 font-weight-normal">Total Sales</span>
													<h2 class="mb-2 number-font carn1 font-weight-bold">3,257</h2>
													<span class=""><i class="fe fe-arrow-up-circle"></i> 76% <span class="ms-1 fs-11">Growth This Month</span>
												</div>
											</div>
											<div class="col-lg-6 col-md-12 col-sm-6 col-6 my-auto mx-auto">
												<div class="mx-auto text-right">
													<div id="spark1"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0 dash2">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-6 col-md-12 col-sm-6 col-6">
												<div class="">
													<span class="fs-14">Total Stats</span>
													<h2 class="mb-2 mt-1 number-font carn2 font-weight-bold">1,678</h2>
													<span class=""><i class="fe fe-arrow-down-circle"></i> 15% <span class="ms-1 fs-11">Loss This Month</span>
												</div>
											</div>
											<div class="col-lg-6 col-md-12 col-sm-6 col-6 my-auto mx-auto">
												<div class="mx-auto text-right">
													<div id="spark2"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0 dash3">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-6 col-md-12 col-sm-6 col-6">
												<div class="">
													<span class="fs-14">Total Income</span>
													<h2 class="mb-2 mt-1 number-font carn2 font-weight-bold">$2,590</h2>
													<span class=""><i class="fe fe-arrow-up-circle"></i> 62% <span class="ms-1 fs-11">From Last Month</span>
												</div>
											</div>
											<div class="col-lg-6 col-md-12 col-sm-6 col-6 my-auto mx-auto">
												<div class="mx-auto text-right">
													<div id="spark3"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0 dash4">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-6 col-md-12 col-sm-6 col-6">
												<div class="text-justify">
													<span>Total Tax</span>
													<h2 class="mb-2 mt-1 number-font carn2 font-weight-bold">$1,954</h2>
													<span class=""><i class="fe fe-arrow-up-circle"></i> 53% <span class="ms-1 fs-11">From Last Month</span>
												</div>
											</div>
											<div class="col-lg-6 col-md-12 col-sm-6 col-6 my-auto mx-auto">
												<div class="mx-auto text-right">
													<div id="spark4"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row-1 -->


						

						
						
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

		<!--INTERNAL Flot Charts js-->
		<script src="<?php echo e(asset('assets/plugins/flot/jquery.flot.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/flot/jquery.flot.fillbetween.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/flot/jquery.flot.pie.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/dashboard.sampledata.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/chart.flot.sampledata.js')); ?>"></script>

		<!-- INTERNAL Chart js -->
		<script src="<?php echo e(asset('assets/plugins/chart/chart.bundle.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/chart/utils.js')); ?>"></script>

		<!-- INTERNAL Apexchart js -->
		<script src="<?php echo e(asset('assets/js/apexcharts.js')); ?>"></script>

		<!--INTERNAL Moment js-->
		<script src="<?php echo e(asset('assets/plugins/moment/moment.js')); ?>"></script>

		<!--INTERNAL Index js-->
		<script src="<?php echo e(asset('assets/js/index1.js')); ?>"></script>

		<!-- INTERNAL Data tables -->
		<script src="<?php echo e(asset('assets/plugins/datatables/DataTables/js/jquery.dataTables.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js')); ?>"></script>

		<!-- INTERNAL Select2 js -->
		<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>

		<!-- Simplebar JS -->
		<script src="<?php echo e(asset('assets/plugins/simplebar/js/simplebar.min.js')); ?>"></script>

		<!-- Rounded bar chart js-->
		<script src="<?php echo e(asset('assets/js/rounded-barchart.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.superadmin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/superadmin/index.blade.php ENDPATH**/ ?>