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
		<title><?php echo e($title); ?> Daily Food city</title>

        <?php echo $__env->make('layouts.horizontal.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </head>

	<body class="app">

		<!-- Page -->
		<div class="page">
			<div class="page-main">

                <!-- App-Content -->
				<div class="hor-content main-content">
                    <div class="container">
                        <!-- Row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <h2 class="font-weight-bold text-primary">INV#<?php echo e($order->id); ?></h2>
                                        <div class="">
                                            <h5 class="mb-1" ><?php echo e($order->date); ?></h5>
                                            <h6 class="mb-1" ><?php echo e($order->order_id); ?></h6>
                                        </div>

                                        <!-- <div class="card-body ps-0 pe-0">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <span>Payment No.</span><br>
                                                    <strong>INV23456-234</strong>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <span>Payment Date</span><br>
                                                    <strong>July 10, 2021 - 12:20 pm</strong>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="dropdown-divider"></div>
                                        <div class="row pt-4">
                                            <div class="col-6 ">
                                                <p class="h5 font-weight-bold">Bill From</p>
                                                <address id="billFrom">
                                                    <?php echo e($order->suppliers->company_name); ?><br>
                                                    <?php if($order->suppliers->building_no || $order->suppliers->street): ?>
                                                    <?php echo e($order->suppliers->building_no); ?>, <?php echo e($order->suppliers->street); ?><br>
                                                    <?php endif; ?>
                                                    <?php if($order->suppliers->state || $order->suppliers->city): ?>
                                                    <?php echo e($order->suppliers->state); ?>, <?php echo e($order->suppliers->city); ?><br>
                                                    <?php endif; ?>
                                                    <?php echo e($order->suppliers->country); ?>, <?php echo e($order->suppliers->zipcode); ?><br>
                                                    <?php echo e($order->suppliers->email); ?>, <?php echo e($order->suppliers->phone_no); ?>

                                                </address>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p class="h5 font-weight-bold">Bill To</p>
                                                <address id="billTo">
                                                    <?php echo e($order->company->name); ?> - <?php echo e($order->branch->branch_name); ?><br>
                                                    <?php echo e($order->branch->building_no); ?>, <?php echo e($order->branch->street); ?><br>
                                                    <?php echo e($order->branch->state); ?>, <?php echo e($order->branch->city); ?><br>
                                                    <?php echo e($order->branch->country); ?>, <?php echo e($order->branch->zipcode); ?><br>
                                                    <?php echo e($order->branch->email); ?>, <?php echo e($order->branch->phone_no); ?>

                                                </address>
                                            </div>
                                        </div>
                                        <div class="table-responsive push">
                                            <table class="table table-bordered table-hover text-nowrap">
                                                <tbody>
                                                    <tr class=" ">
                                                        <th class="text-center " style="width: 1%"></th>
                                                        <th >Product</th>
                                                        <th class="text-center" style="width: 15%">Units</th>
                                                        
                                                    </tr>
                                                </tbody>
                                                <?php
                                                    $sub_total = 0;
                                                    $no = 0
                                                ?>
                                                <tbody id="productContent">
                                                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    
                                                    <tr>
                                                        <td class="text-center"><?php echo e($no += 1); ?></td>
                                                        <td>
                                                            <p class="font-weight-semibold mb-1">
                                                                <?php echo e($product->product->product_name); ?>

                                                            </p>
                                                    
                                                            <div class="text-muted product_name"><?php echo e($product->product->bar_code); ?></div>
                                                        </td>
                                                        <td class="text-center"><?php echo e($product->units); ?></td>
                                                        
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr>
                                                        <td colspan="10" class="font-weight-semibold text-end">No Products Available</td>
                                                    </tr>
                                                <?php endif; ?>
                                                </tbody>
                                                
                                                <tfoot>
                                                    
                                                </tfoot>
                                            </table>
                                        </div>
                                        <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- End row-->

                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/purchase/purchase-order-printBill.blade.php ENDPATH**/ ?>