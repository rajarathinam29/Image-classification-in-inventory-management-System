@extends('layouts.app')

@section('styles')
<!-- INTERNAL Select2 css -->
<link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
<!-- INTERNAL Prism Css -->
<link href="{{asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!-- dropzone css -->
<link href="{{asset('assets/plugins/dropzone/min/dropzone.min.css')}}" rel="stylesheet" />
@endsection

@section('content')

<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary">{{$title}}</h4>
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
        <div class="card overflow-hidden" >
            <div class="card-body">
                <h2 class="font-weight-bold text-primary" id="invoiceId">INVOICE</h2>
                <div class="">
                    <h5 class="mb-1" id="invoiceDate">2023-01-01</h5>
                </div>

                <div class="dropdown-divider"></div>
                <div class="row pt-4">
                    <div class="col-lg-6 ">
                        <p class="h5 font-weight-bold">Supplier</p>
                        <address id="billTo">
                            Street Address<br>
                            State, City<br>
                            Region, Postal Code<br>
                            ltd@example.com
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
                                <th class="text-center" >Note</th>
                                <th class="text-end" >Cost Price</th>
                                <th class="text-end" colspan="2">Total</th>
                            </tr>
                            <tr id="trAddProduct">
                                <td class="text-center"><button type="button" class="btn btn-sm bg-primary-transparent btnResetProduct"><i class="fe fe-refresh-cw"></i></button></td>
                                <td>
                                    <input type="hidden" name="product_id">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" name="searchword" id="searchword" placeholder="Search Product" autocomplete="off">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-sm bg-info-transparent btnViewProduct"><i class="fe fe-file"></i></button>
                                        </span>
                                    </div>
                                    <div class="text-muted product_name"></div>
                                </td>
                                <td class="text-center">
                                    <input type="number" class="form-control form-control-sm" name="product_unit" id="product_unit" placeholder="Units" autocomplete="off">
                                </td>
                                
                                <td class="text-center">
                                    <textarea class="form-control form-control-sm" name="note" placeholder="Note" row="1" autocomplete="off"></textarea>
                                </td>
                                <td class="text-end">
                                    <input type="number" class="form-control form-control-sm" name="product_cost_price" id="product_cost_price" placeholder="Cost price" autocomplete="off">
                                    <input type="hidden"  name="product_sale_price" id="product_sale_price" >
                                    <input type="hidden"  name="product_mrp" id="product_mrp" >
                                </td>
                                
                                <td class="text-end">
                                    <input type="number" class="form-control form-control-sm" name="product_total" id="product_total" placeholder="Total" readonly>
                                </td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm bg-success-transparent btnAddProduct"><i class="fe fe-plus"></i></button>
                                </td>
                            </tr>
                        </tbody>
                        <tbody id="productContent">
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="font-weight-semibold text-end">Subtotal</td>
                                <td class="text-end" id="purchaseSubTotal" colspan="2">0.00</td>
                            </tr>
                            
                            <tr class="text-danger">
                                <td colspan="5" class="font-weight-bold text-uppercase text-end h4 mb-0">Total Due</td>
                                <td class="font-weight-bold text-end h4 mb-0" id="purchaseTotal" colspan="2">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="7" class="text-end">
                                    <button type="button" class="btn btn-success" id="btnAttachmentUpload"><i class="fe fe-upload"></i> Upload Attachments</button>
                                    <button type="button" class="btn btn-info" id="btnViewAttachments"><i class="fe fe-image"></i> Attachments</button>
                                    <!-- <button type="button" class="btn btn-danger" id="btnGenerateBarcode"><i class="mdi mdi-barcode"></i> Generate Barcode</button> -->
                                    <!-- <button type="button" class="btn btn-primary" id="btnPaymentHistory"><i class="si si-wallet"></i> Payment History</button> -->
                                    <!-- <button type="button" class="btn btn-success" onClick="javascript:window.print();"><i class="si si-paper-plane"></i> Send Invoice</button> -->
                                    <button type="button" class="btn btn-secondary" id="btnPrintInvoice"><i class="si si-printer"></i> Print Invoice</button>
                                    <button type="button" class="btn btn-success" id="btnCompleted"><i class="fe fe-check-circle"></i> Completed</button>
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
<!-- End row-->
<!-- barcode -->
<div id="generatedBarcode" style="display:none;">
    <div id="barcodeTarget" class="barcodeTarget" style="padding: 0px;overflow: auto;width: 90px; text-align:center;"></div>
</div>

@endsection('content')

@section('modal')

<div class="modal fade" id="uploadAttachmentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="viewAttachmentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="row" id="viewAttachmentContent">
					
				</div>
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="productListModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Select Product</h5>
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
                <button type="button" class="btn btn-primary" id="btnAddProduct"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>

<!-- payment History -->
<div class="modal fade" id="paymentHistoryModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Payment History</h5>
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
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Description/ Reff.</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody id="PaymentHistoryContent">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary" id="btnAddPayment"><i class="si si-plus"></i> Add Payment</button> -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<!-- INTERNAL Select2 js -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<!-- dropzone js -->
<script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>

<script src="{{asset('assets/plugins/jquery-barcode/jquery-barcode.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-barcode/jquery-barcode.min.js')}}"></script>

<!-- INTERNAL Clipboard js -->
<script src="{{asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('assets/plugins/clipboard/clipboard.js')}}"></script>

<!-- INTERNAL Prism js -->
<script src="{{asset('assets/plugins/prism/prism.js')}}"></script>

<script src="{{asset('assets/js/purchase-return/view.js?v=1.0.1')}}"></script>

<!-- INTERNAL tooltip js-->
<!-- <script src="{{asset('assets/js/tooltip.js')}}"></script> -->

@endsection