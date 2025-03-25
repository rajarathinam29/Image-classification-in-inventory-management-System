@extends('layouts.app')

@section('styles')
<!-- INTERNAL Select2 css -->
<link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
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
                        <!-- <p class="h5 font-weight-bold">Bill To</p> -->
                        
                    </div>
                </div>
                <div class="table-responsive push">
                    <table class="table table-bordered table-hover text-nowrap">
                        <tbody>
                            <tr class=" ">
                                <th class="text-center " style="width: 1%"></th>
                                <th style="width: 50%">Product</th>
                                <th class="text-center" >Units</th>
                                <th class="text-end" >Mrp</th>
                                <th class="text-end" >Discount</th>
                                <th class="text-end" >Sale Price</th>
                                <th class="text-end" >Total</th>
                            </tr>
                        </tbody>
                        <tbody id="productContent">
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="font-weight-semibold text-end">Subtotal</td>
                                <td class="text-end" id="salesSubTotal">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="font-weight-semibold text-end">Additional Discount</td>
                                <td class="text-end" id="salesAdditionalDiscount">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="font-weight-semibold text-end">Delivery Charge</td>
                                <td class="text-end" id="salesCost">0.00</td>
                            </tr>
                            <tr class="text-danger">
                                <td colspan="6" class="font-weight-bold text-uppercase text-end h4 mb-0">Total Due</td>
                                <td class="font-weight-bold text-end h4 mb-0 salesTotal">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="font-weight-semibold text-end">Total Discount</td>
                                <td class="text-end" id="salesDiscount">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="font-weight-semibold text-end">Total VAT</td>
                                <td class="text-end" id="salesVat">0.00</td>
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
                <button type="button" class="btn btn-secondary" id="btnPrintInvoice"><i class="si si-printer"></i> Print Invoice</button>
            </div>
        </div>
    </div>
    
</div>
<!-- End row-->

@endsection('content')

@section('modal')

@endsection

@section('scripts')
<!-- INTERNAL Select2 js -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-barcode/jquery-barcode.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-barcode/jquery-barcode.min.js')}}"></script>

<script src="{{asset('assets/js/sales/view.js')}}"></script>

@endsection