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
                                        <h2 class="font-weight-bold text-primary">INV#<?php echo e($purchase->id); ?></h2>
                                        <div class="">
                                            <h5 class="mb-1" ><?php echo e($purchase->date); ?></h5>
                                            <h6 class="mb-1" ><?php echo e($purchase->invoice_no); ?></h6>
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
                                                    <?php echo e($purchase->suppliers->company_name); ?><br>
                                                    <?php if($purchase->suppliers->building_no || $purchase->suppliers->street): ?>
                                                    <?php echo e($purchase->suppliers->building_no); ?>, <?php echo e($purchase->suppliers->street); ?><br>
                                                    <?php endif; ?>
                                                    <?php if($purchase->suppliers->state || $purchase->suppliers->city): ?>
                                                    <?php echo e($purchase->suppliers->state); ?>, <?php echo e($purchase->suppliers->city); ?><br>
                                                    <?php endif; ?>
                                                    <?php echo e($purchase->suppliers->country); ?>, <?php echo e($purchase->suppliers->zipcode); ?><br>
                                                    <?php echo e($purchase->suppliers->email); ?>, <?php echo e($purchase->suppliers->phone_no); ?>

                                                </address>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p class="h5 font-weight-bold">Bill To</p>
                                                <address id="billTo">
                                                    <?php echo e($purchase->company->name); ?> - <?php echo e($purchase->branch->branch_name); ?><br>
                                                    <?php echo e($purchase->branch->building_no); ?>, <?php echo e($purchase->branch->street); ?><br>
                                                    <?php echo e($purchase->branch->state); ?>, <?php echo e($purchase->branch->city); ?><br>
                                                    <?php echo e($purchase->branch->country); ?>, <?php echo e($purchase->branch->zipcode); ?><br>
                                                    <?php echo e($purchase->branch->email); ?>, <?php echo e($purchase->branch->phone_no); ?>

                                                </address>
                                            </div>
                                        </div>
                                        <div class="table-responsive push">
                                            <table class="table table-bordered table-hover text-nowrap">
                                                <tbody>
                                                    <tr class=" ">
                                                        <th class="text-center " style="width: 1%"></th>
                                                        <th style="width: 15%">Product</th>
                                                        <th class="text-center" >Units</th>
                                                        <th class="text-center" >Free</th>
                                                        <th class="text-center" >Expiry</th>
                                                        <th class="text-end" >Pur. Price</th>
                                                        <th class="text-end" >Dis. price</th>
                                                        <th class="text-end" >Mrp</th>
                                                        <th class="text-end" >Mrp_c</th>
                                                        <th class="text-end" >Total</th>
                                                    </tr>
                                                </tbody>
                                                <?php
                                                    $sub_total = 0;
                                                    $no = 0
                                                ?>
                                                <tbody id="productContent">
                                                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <?php
                                                        $sub_total += $product->cost_price*$product->units;
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo e($no += 1); ?></td>
                                                        <td>
                                                            <p class="font-weight-semibold mb-1">
                                                                <?php echo e($product->product->product_name); ?>

                                                            </p>
                                                    
                                                            <div class="text-muted product_name"><?php echo e($product->product->bar_code); ?></div>
                                                        </td>
                                                        <td class="text-center"><?php echo e($product->units); ?></td>
                                                        <td class="text-center"><?php echo e($product->free); ?></td>
                                                        <td class="text-center"><?php echo e($product->expiry_date); ?></td>
                                                        <td class="text-end"><?php echo e($product->cost_price); ?></td>
                                                        <td class="text-end"><?php echo e($product->sale_price); ?></td>
                                                        <td class="text-end"><?php echo e($product->mrp); ?></td>
                                                        <td class="text-end"><?php echo e($product->mrp_c); ?></td>
                                                        <td class="text-end"><?php echo e($product->total); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr>
                                                        <td colspan="10" class="font-weight-semibold text-end">No Products Available</td>
                                                    </tr>
                                                <?php endif; ?>
                                                </tbody>
                                                <?php
                                                $net_total = $sub_total - $purchase->discount + $purchase->cost;
                                                ?>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="9" class="font-weight-semibold text-end">Subtotal</td>
                                                        <td class="text-end" ><?php echo e(number_format((float)$sub_total, 2, '.', '')); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9" class="font-weight-semibold text-end">Discount</td>
                                                        <td class="text-end" ><?php echo e($purchase->discount); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9" class="font-weight-semibold text-end">Cost</td>
                                                        <td class="text-end" ><?php echo e($purchase->cost); ?></td>
                                                    </tr>
                                                    <tr class="text-danger">
                                                        <td colspan="9" class="font-weight-bold text-uppercase text-end h4 mb-0">Total Due</td>
                                                        <td class="font-weight-bold text-end h4 mb-0" id="purchaseTotal"><?php echo e(number_format((float)$net_total, 2, '.', '')); ?></td>
                                                    </tr>
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
<?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/purchase/printBill.blade.php ENDPATH**/ ?>