

<?php $__env->startSection('styles'); ?>
    <!-- Slect2 css -->
    <link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />
    <!--Date Picker-->
		<link href="<?php echo e(asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css')); ?>" rel="stylesheet" />
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
<div class="col-md-12">
        <div class="card overflow-hidden">
            <div class="card-body">
                <h2 class="font-weight-bold text-primary" id="invoiceId">INVOICE</h2>
                <div class="card-body ps-0 pe-0">
                    <div class="row">
                        <div class="col-sm-6">
                            <span>Invoice Date</span><br>
                            <strong><input type="datetime-local" class="form-control" name="invoice_date" id="invoice_date" value="" autocomplete="off"></strong>
                        </div>
                        <div class="col-sm-6 text-end">
                            <span>Customer</span><br>
                            <div class="input-group">
                                <input type="text" class="form-control" name="searchcustomer" id="searchcustomer" placeholder="Search for..." autocomplete="off">
                                <input type="hidden" name="customer_id">
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="btnNewCustomer"><i class="fe fe-plus"></i></button>
                                </span>
                            </div>
                            <div class="text-muted customer_name"></div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <!-- <div class="row pt-4">
                    <div class="col-lg-6 ">
                        <p class="h5 font-weight-bold">Bill From</p>
                        <address id="billFrom">
                            Street Address<br>
                            State, City<br>
                            Region, Postal Code<br>
                            ltd@example.com
                        </address>
                    </div>
                    <div class="col-lg-6 text-end">
                        <p class="h5 font-weight-bold">Bill To</p>
                        <address id="billTo">
                            Street Address<br>
                            State, City<br>
                            Region, Postal Code<br>
                            ctr@example.com
                        </address>
                    </div>
                </div> -->
                <div class="table-responsive push">
                    <table class="table table-bordered table-hover text-nowrap">
                        <tbody>
                            <tr class=" ">
                                <th class="text-center " style="width: 1%"></th>
                                <th style="width: 50%">Amount</th>
                                <th class="text-center" >Qty</th>
                                <th class="text-end" >Exp.Date</th>
                                <th class="text-end" >Total</th>
                            </tr>
                            <tr id="trAddVoucher">
                                <td class="text-center"></td>
                                <td>
                                    <p class="font-weight-semibold mb-1">
                                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" autocomplete="off">
                                    </p>
                                    <div class="text-muted product_name"></div>
                                </td>
                                <td class="text-center"><input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" autocomplete="off"></td>
                                <td class="text-center"><input type="date" class="form-control" name="expiry_date" id="expiry_date" autocomplete="off"></td>
                                <td class="text-end"><input type="number" class="form-control" name="total" id="total" placeholder="Total" autocomplete="off"></td>
                            </tr>
                        </tbody>
                        <tbody id="productContent">
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="font-weight-semibold text-end">Subtotal</td>
                                <td class="text-end" id="salesSubTotal">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="font-weight-semibold text-end">Discount</td>
                                <td class="text-end" id="salesDiscount">0.00</td>
                            </tr>
                            <tr class="text-danger">
                                <td colspan="4" class="font-weight-bold text-uppercase text-end h4 mb-0">Total Due</td>
                                <td class="font-weight-bold text-end h4 mb-0" id="salesTotal">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-end">
                                    <button type="button" class="btn btn-secondary" id="btnPrintInvoice"><i class="si si-printer"></i> Print Invoice</button>
                                    <div class="btn-group mt-2 mb-2">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h"></i> More Options <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="dropdown-plus-title">
                                                Other payment methods
                                                <b class="fa fa-angle-up" aria-hidden="true"></b>
                                            </li>
                                            <li><a href="javascript:void(0);" id="btnCheque">Cheque</a></li>
                                        </ul>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="btnCard"><i class="fa fa-credit-card"></i> Card</button>
                                    <button type="button" class="btn btn-success" id="btnCash"><i class="fa fa-money"></i> Cash</button>
                                    
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<div class="modal fade" id="customerListModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Select Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group ">
                        <div class="custom-controls-stacked">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddcustomer"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cashPaymentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Cash Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Amount<span class="text-red">*</span></label>
                            <input type="number" class="form-control" name="input_cash" id="input_cash" placeholder="0.00" autocomplete="off">  
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddCash"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cardPaymentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Card Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Amount<span class="text-red">*</span></label>
                            <input type="number" class="form-control" name="input_card" id="input_card" placeholder="0.00" autocomplete="off">  
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Card Number (last 4 digits)<span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="input_card_no" id="input_card_no" placeholder="XXXX" autocomplete="off">  
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddCard"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="pointsPaymentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Points Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-3">Available Points</dt>
                    <dd class="col-sm-9" id="availablePoints"></dd>
                </dl>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Amount<span class="text-red">*</span></label>
                            <input type="number" class="form-control" name="input_points" id="input_points" placeholder="0.00" autocomplete="off">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddPoint"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="creditPaymentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Credit Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Credit Days<span class="text-red">*</span></label>
                            <input type="number" class="form-control" name="input_credit" id="input_credit" placeholder="5" autocomplete="off">  
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddCredit"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="newCustomerModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">New Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="customerForm">
                    <div class="card-body">
                        <div class="card-title font-weight-bold">Basic info:</div>
                        <div class="row">
                        <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">First Name<span class="text-red">*</span></label>
                                    <div class="row g-xs">
                                        <div class="col-3">
                                            <select class="form-control custom-select select2" name="title"  id="title">
                                                <option value="Mr">Mr.</option>
                                                <option value="Mrs">Mrs.</option>
                                                <option value="Miss">Miss.</option>
                                                <option value="Dr">Dr.</option>
                                            </select>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name"  autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name<span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"  autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phone Number<span class="text-red">*</span></label>
                                    <div class="input-group ">
                                        <input type="tel" class="form-control" name="phone_no" id="phone_no"  placeholder="e.g. +94 112233444">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"  placeholder="Email">
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-title font-weight-bold">Address info:</div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Building Number</label>
                                    <input type="text" class="form-control" name="building_no" id="building_no" placeholder="Building Number">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Street</label>
                                    <input type="text" class="form-control" name="street" id="street" placeholder="Street">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" name="state" id="state" placeholder="State">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select class="form-control custom-select select2" name="country" id="country">
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Zipcode</label>
                                    <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Zipcode">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddCustomer"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- INTERNAL Datepicker js -->
<script src="<?php echo e(asset('assets/plugins/date-picker/date-picker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/date-picker/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/input-mask/jquery.maskedinput.js')); ?>"></script>

<script src="<?php echo e(asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
<!-- INTERNAL Select2 js -->
<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script> -->
<!-- Mask js -->
<script src="<?php echo e(asset('assets/plugins/input-mask/jquery.mask.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/vouchers/sale.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/vouchers/sale.blade.php ENDPATH**/ ?>