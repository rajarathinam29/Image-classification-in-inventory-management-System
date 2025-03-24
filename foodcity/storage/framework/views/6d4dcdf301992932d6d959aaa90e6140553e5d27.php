

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title mb-0 text-primary"><?php echo e($title); ?></h4>
	</div>
    <div class="page-rightheader">
        <div class="btn-list">
            <a href="javascript:void(0);" class="btn btn-outline-primary btnBack"><i class="fe fe-skip-back"></i> Back</a>
        </div>
    </div>
</div>
<!--End Page header-->

<div class="row">
	<div class="col-12">
		<div class="card">
			<!-- <div class="card-header">
				<a href="<?php echo e(route('adminUsers.create')); ?>" class="btn btn-md btn-green"><i class="fa fa-user-plus"></i></a>
			</div> -->
			<div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <tbody>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">VoucherId</span>
                                </td>
                                <td id="voucher_id"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Total Value</span>
                                </td>
                                <td id="amount"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Used Value</span>
                                </td>
                                <td id="usedAmount"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Balanced Value</span>
                                </td>
                                <td id="balanceAmount"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Expiry Date</span>
                                </td>
                                <td id="expirydate"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Status </span>
                                </td>
                                <td id="vouchers_status"></td>
                            </tr>
                            <!-- <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Status </span>
                                </td>
                                <td id="status"></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
	</div>
    <div class="col-12">
		<div class="card">
			<div class="card-body">
                <p class="h5 font-weight-bold">Voucher Used History</p>
                <div class="push">
                    <table class="table table-bordered table-hover text-nowrap">
                        <tbody>
                            <tr class=" ">
                                <th class="text-center " style="width: 1%"></th>
                                <th>Date</th>
                                <th style="width: 50%">Used To</th>
                                <th class="text-end" >Amount</th>
                            </tr>
                        </tbody>
                        <tbody id="voucherHistory">
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
		</div>
	</div> 
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(asset('assets/js/vouchers/view.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/vouchers/view.blade.php ENDPATH**/ ?>