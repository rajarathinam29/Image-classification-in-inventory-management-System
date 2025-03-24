

<?php $__env->startSection('styles'); ?>
<!-- INTERNAL Select2 css -->
<link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary"><?php echo e($title); ?></h4>
    </div>
    <div class="page-rightheader">
        <div class="btn-list">
            <a href="javascript:void(0);" class="btn btn-outline-primary btnBack"><i class="fe fe-skip-back"></i> Back</a>
            <a href="javascript:void(0);"  class="btn btn-primary btn-pill btnEdit"><i class="fe fe-edit-3 me-2 fs-14"></i> Edit</a>
        </div>
    </div>
</div>
<!--End Page header-->

    <!-- Row-->
<div class="row">
    <div class="col-md-12">
        <div class="card overflow-hidden">
            <div class="card-body">
                <h2 class="font-weight-bold text-primary" id="invoiceId">INVOICE</h2>
                <div class="">
                    <h5 class="mb-1" id="invoiceDate">2023-01-01</h5>
                </div>
                <div class="dropdown-divider"></div>
                <div class="row pt-4">
                    <div class="col-lg-6 ">
                        <p class="h5 font-weight-bold">Bill To</p>
                        <address id="billTo">
                            Street Address<br>
                            State, City<br>
                            Region, Postal Code<br>
                            ltd@example.com
                        </address>
                    </div>
                    <div class="col-lg-6 text-end">
                        <p class="h5 font-weight-bold">Bill To</p>
                        
                    </div>
                </div>
                <div class="table-responsive push">
                    <table class="table table-bordered table-hover text-nowrap">
                        <tbody>
                            <tr class=" ">
                                <th class="text-center " style="width: 1%"></th>
                                <th style="width: 50%">Serial No.</th>
                                <th class="text-end" >Expiry Date</th>
                                <th class="text-end" >Total</th>
                            </tr>
                        </tbody>
                        <tbody id="voucherContent">
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="font-weight-semibold text-end">Subtotal</td>
                                <td class="text-end" id="salesSubTotal">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="font-weight-semibold text-end"> Discount</td>
                                <td class="text-end" id="salesAdditionalDiscount">0.00</td>
                            </tr>
                            <tr class="text-danger">
                                <td colspan="3" class="font-weight-bold text-uppercase text-end h4 mb-0">Total Due</td>
                                <td class="font-weight-bold text-end h4 mb-0 salesTotal">0.00</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row pt-4">
                    <div class="col-lg-6 ">
                        <p class="h5 font-weight-bold">Payment History</p>
                        <div class="push">
                            <table class="table table-bordered table-hover text-nowrap">
                                <tbody>
                                    <tr class=" ">
                                        <th class="text-center " style="width: 1%"></th>
                                        <th >Date</th>
                                        <th style="width: 50%">Payment Method</th>
                                        <th class="text-end" >Amount</th>
                                    </tr>
                                </tbody>
                                <tbody id="RevenuesHistory">
                                    
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p class="h5 font-weight-bold">Invoice Summary</p>
                        <div class="push">
                            <table class="table table-bordered table-hover text-nowrap">
                                <tbody>
                                    <tr class=" ">
                                        <td class="font-weight-semibold">Total Due</td>
                                        <td class="text-end salesTotal">0.00</td>
                                    </tr>
                                    <tr class=" ">
                                        <td class="font-weight-semibold">Total Paid</td>
                                        <td class="text-end" id="totalPaid">0.00</td>
                                    </tr>
                                    <tr class=" ">
                                        <td class="font-weight-semibold">Balance</td>
                                        <td class="text-end" id="balance">0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p>
            </div>
            <div class="card-footer text-end">
                <button type="button" class="btn btn-danger" id="btnGenerateBarcode"><i class="mdi mdi-barcode"></i> Generate Barcode</button>
                <button type="button" class="btn btn-secondary" id="btnPrintInvoice"><i class="si si-printer"></i> Print Invoice</button>
            </div>
        </div>
    </div>
    
</div>
<!-- End row-->
<!-- barcode -->
<div id="generatedBarcode" style="display:none;">
    <div id="barcodeTarget" class="barcodeTarget" style="padding: 0px;overflow: auto;width: 90px; text-align:center;"></div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<div class="modal fade" id="barcodeModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Print Barcode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered card-table table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                    <th>Barcode - vouchers</th>
                                </tr>
                            </thead>
                            <tbody id="barcodeContent">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnPrintBarcode"><i class="si si-printer"></i> Print</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- INTERNAL Select2 js -->
<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-barcode/jquery-barcode.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-barcode/jquery-barcode.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/vouchers/sales-view.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/vouchers/sales-view.blade.php ENDPATH**/ ?>