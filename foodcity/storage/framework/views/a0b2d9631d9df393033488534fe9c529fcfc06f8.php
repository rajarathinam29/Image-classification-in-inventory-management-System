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
			<h4 class="page-title mb-0 text-primary">Dashboard</h4>
		</div>
		<div class="page-rightheader">
			<div class="btn-list">
				<a href="javascript:void(0);"  class="btn btn-primary btn-pill" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-calendar me-2 fs-14"></i> Search By Month</a>
				<div class="dropdown-menu border-0" id="searchByMonth">
						<a class="dropdown-item" href="javascript:void(0);">Today</a>
						<a class="dropdown-item" href="javascript:void(0);">Yesterday</a>
						<a class="dropdown-item active bg-primary text-white" href="javascript:void(0);">Last 7 days</a>
						<a class="dropdown-item" href="javascript:void(0);">Last 30 days</a>
						<a class="dropdown-item" href="javascript:void(0);">Last Month</a>
						<a class="dropdown-item" href="javascript:void(0);">Last 6 months</a>
						<a class="dropdown-item" href="javascript:void(0);">Last year</a>
				</div>
			</div>
		</div>
	</div>
	<!--End Page header-->

	<!-- Row-1 -->
	<div class="row">
		<div class="col-xl-3 col-lg-4 col-md-6 col-xm-12">
			<div class="card overflow-hidden dash1-card border-0 dash1">
				<div class="card-body">
					<div class="">
						<span class="fs-14">Current Month Sales</span>
						<h3 class="mb-2 number-font carn1 font-weight-bold" id="totalMonthSales">0</h3>
						<span class="monthSalesGrowth"><i class="fe fe-arrow-up-circle"></i> 76% <span class="ms-1 fs-11">Growth This Month</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-4 col-md-6 col-xm-12">
			<div class="card overflow-hidden dash1-card border-0 dash1">
				<div class="card-body">
					<div class="">
						<span class="fs-14">Current Month Purchase</span>
						<h3 class="mb-2 mt-1 number-font carn2 font-weight-bold" id="totalMonthPurchase">0</h3>
						<span class="monthPurchaseGrowth"><i class="fe fe-arrow-down-circle"></i> 15% <span class="ms-1 fs-11">Loss This Month</span>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-xl-3 col-lg-4 col-md-6 col-xm-12">
			<div class="card overflow-hidden dash1-card border-0 dash3">
				<div class="card-body">
					<div class="">
						<span class="fs-14">Total Revenue</span>
						<h3 class="mb-2 mt-1 number-font carn2 font-weight-bold" id="totalRevenue">0</h3>
						<span class="totalRevenuePreiod"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-4 col-md-6 col-xm-12">
			<div class="card overflow-hidden dash1-card border-0 dash4">
				<div class="card-body">
					<div class="text-justify">
						<span class="fs-14">Total Expense</span>
						<h3 class="mb-2 mt-1 number-font carn2 font-weight-bold" id="totalExpense">0</h3>
						<span class="totalExpensePreiod"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="row">
		<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
			<div class="card overflow-hidden dash1-card border-0 dash1">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6 col-md-12 col-sm-6 col-6">
							<div class="">
								<span class="fs-14 font-weight-normal">Monthly Sales</span>
								<h2 class="mb-2 number-font carn1 font-weight-bold" id="totalMonthSales">0</h2>
								<span class="monthSalesGrowth"><i class="fe fe-arrow-up-circle"></i> 76% <span class="ms-1 fs-11">Growth This Month</span>
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
								<span class="fs-14">Monthly Purchase</span>
								<h2 class="mb-2 mt-1 number-font carn2 font-weight-bold" id="totalMonthPurchase">0</h2>
								<span class="monthPurchaseGrowth"><i class="fe fe-arrow-down-circle"></i> 15% <span class="ms-1 fs-11">Loss This Month</span>
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
			<div class="card overflow-hidden dash1-card border-0 dash1">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6 col-md-12 col-sm-6 col-6">
							<div class="">
								<span class="fs-14 font-weight-normal">Monthly Wip Sales</span>
								<h2 class="mb-2 number-font carn1 font-weight-bold" id="totalMonthSales">0</h2>
								<span class="monthWipSalesGrowth"><i class="fe fe-arrow-up-circle"></i> 76% <span class="ms-1 fs-11">Growth This Month</span>
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
								<span class="fs-14">Monthly Wip Purchase</span>
								<h2 class="mb-2 mt-1 number-font carn2 font-weight-bold" id="totalMonthPurchase">0</h2>
								<span class="monthWipPurchaseGrowth"><i class="fe fe-arrow-down-circle"></i> 15% <span class="ms-1 fs-11">Loss This Month</span>
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
		<div class="col-xl-6 col-lg-6 col-md-6 col-xm-12">
			<div class="card overflow-hidden dash1-card border-0 dash3">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="">
								<span class="fs-14">Total Revenue</span>
								<h2 class="mb-2 mt-1 number-font carn2 font-weight-bold" id="totalRevenue">0</h2>
								<span class="totalRevenuePreiod"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-lg-6 col-md-6 col-xm-12">
			<div class="card overflow-hidden dash1-card border-0 dash4">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="text-justify">
								<span>Total Expense</span>
								<h2 class="mb-2 mt-1 number-font carn2 font-weight-bold" id="totalExpense">0</h2>
								<span class="totalExpensePreiod"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- End Row-1 -->

	<!-- Row-2 -->
	<div class="row">
		<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
			<div class="card">
				<div class="card-header border-bottom-0">
					<h3 class="card-title">Purchase & Sales Activity (Last 12 Months)</h3>
				</div>
				<div class="card-body pt-0">
					<div class="chart-wrapper">
						<div id="statistics"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">
						Recent Activity
					</h3>
					<div class="card-options">
						<a href="<?php echo e(route('logs')); ?>" class="btn btn-sm btn-primary">View All</a>
					</div>
				</div>
				<div class="card-body p-0" style="max-height: 415px;overflow: auto;">
					<ul class="recent-activity"></ul>
				</div>
			</div>
		</div>
	</div>
	<!-- End Row-2 -->

	<!-- Row-3 -->
	<!-- <div class="row row-deck">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-6">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">
						Frequently Selling Products
					</h3>
					<div class="card-options">
						<a href="<?php echo e(route('reports.frequentlysales-report')); ?>" class="btn btn-sm btn-primary">View All</a>
					</div>
				</div>
				<div class="card-body p-0">
					<div class="table-responsive">
						<table class="table table-hover card-table table-vcenter text-nowrap">
							<thead class="border-bottom-0 pt-3 pb-3">
								<tr>
									<th class="text-center">s.no</th>
									<th>Product Name</th>
									<th class="text-center">Sale Qty</th>
									<th class="text-center">Sale Value</th>
									<th class="text-center">Total Sale Value</th>
								</tr>
							</thead>
							<tbody id="frqSalesProductContent">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-6">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">
						Frequently Purchased Products
					</h3>
					<div class="card-options">
						<a href="<?php echo e(route('reports.frequentlypurchase-report')); ?>" class="btn btn-sm btn-primary">View All</a>
					</div>
				</div>
				<div class="card-body p-0">
					<div class="table-responsive">
						<table class="table table-hover card-table table-vcenter text-nowrap">
							<thead class="border-bottom-0 pt-3 pb-3">
								<tr>
									<th class="text-center">s.no</th>
									<th>Product Name</th>
									<th class="text-center">Purchase Qty</th>
									<th class="text-center">Purchase Value</th>
									<th class="text-center">Total Purchase Value</th>
								</tr>
							</thead>
							<tbody id="frqPurchaseProductContent">
								<tr>
									<td class="text-center">1</td>
									<td><img class="avatat avatar-md brround me-2" src="<?php echo e(asset('assets/images/orders/7.jpg')); ?>" alt="img">Books</td>
									<td class="fs-13 text-success"><span class="dot-label bg-success me-2 w-2 h-2"></span>Book</td>
									<td><span class="font-weight-normal1">$1234</span></td>
									<td class="text-muted">3 days ago</td>
									<td><span class="badge fs-11 bg-success-transparent text-success ms-2">Regular</span></td>
								</tr>
								<tr>
									<td class="text-center">2</td>
									<td><img class="avatat avatar-md brround me-2" src="<?php echo e(asset('assets/images/orders/5.jpg')); ?>" alt="img">Sports</td>
									<td class="fs-13 text-secondary"><span class="dot-label bg-secondary me-2 w-2 h-2"></span>Shoes</td>
									<td><span class="font-weight-normal1">$5436</span></td>
									<td class="text-muted">1hr ago</td>
									<td><span class="badge fs-11 bg-secondary-transparent text-secondary ms-2">Top Seller</span></td>
								</tr>
								<tr>
									<td class="text-center">3</td>
									<td><img class="avatat avatar-md brround me-2" src="<?php echo e(asset('assets/images/orders/6.jpg')); ?>" alt="img">Accesories</td>
									<td class="fs-13 text-danger"><span class="dot-label bg-danger me-2 w-2 h-2"></span>Watch</td>
									<td><span class="font-weight-normal1">$540</span></td>
									<td class="text-muted">1 week ago</td>
									<td><span class="badge fs-11 bg-danger-transparent text-danger ms-2">Irregular</span></td>
								</tr>
								<tr>
									<td class="text-center">4</td>
									<td><img class="avatat avatar-md brround me-2" src="<?php echo e(asset('assets/images/orders/4.jpg')); ?>" alt="img">Watches</td>
									<td class="fs-13 text-success"><span class="dot-label bg-success me-2 w-2 h-2"></span>Smart Watch</td>
									<td><span class="font-weight-normal1">$1543</span></td>
									<td class="text-muted">Today</td>
									<td><span class="badge fs-11 bg-success-transparent text-success text-success ms-2">Regular</span></td>
								</tr>
								<tr>
									<td class="text-center">5</td>
									<td><img class="avatat avatar-md brround me-2" src="<?php echo e(asset('assets/images/orders/10.jpg')); ?>" alt="img">speakers</td>
									<td class="fs-13 text-info"><span class="dot-label bg-info me-2 w-2 h-2"></span>Head set</td>
									<td><span class="font-weight-normal1">$6427</span></td>
									<td class="text-muted">Today</td>
									<td><span class="badge fs-11 bg-info-transparent text-info ms-2 mb-0">Top Pick</span></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- End Row-3 -->
					
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
		<!-- <script src="<?php echo e(asset('assets/js/index1.js')); ?>"></script> -->

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

		<script src="<?php echo e(asset('assets/js/dashboard/dashboard.js?v=1.0.4')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/index.blade.php ENDPATH**/ ?>