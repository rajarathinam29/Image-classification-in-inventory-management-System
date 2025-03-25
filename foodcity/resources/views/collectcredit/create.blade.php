@extends('layouts.app')

@section('styles')
    <!-- Slect2 css -->
    <link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
    
@endsection

@section('content')

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title mb-0 text-primary">{{$title}}</h4>
	</div>
    <!-- <div class="page-rightheader">
        <div class="btn-list">
            <a href="javascript:void(0);" class="btn btn-outline-primary btnBack"><i class="fe fe-skip-back"></i> Back</a>
        </div>
    </div> -->
</div>
<!--End Page header-->

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <form id="collectcreditForm">
                <div class="card-body">
                    <div class="card-title font-weight-bold">Basic info:</div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Date<span class="text-red">*</span></label>
                                <input type="datetime-local" class="form-control" name="date" id="date" placeholder="Date">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Customer<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="searchcustomer" id="searchcustomer" placeholder="Search for..." autocomplete="off">
                                <input type="hidden" name="customer_id">
                                <input type="hidden" name="customer_name">
                                <input type="hidden" name="customer_points">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Payment Method<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="method" id="method">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Amount<span class="text-red">*</span></label>
                                <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Credit Invoice<span class="text-red">*</span></label>
                                <select class="form-control select2" name="invoice_no" id="invoice_no" multiple>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Balance</label>
                                <input type="number" class="form-control" name="balance_amount" id="balance_amount" placeholder="Balance" readonly>  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 chequeField">
                            <div class="form-group">
                                <label class="form-label">Bank Account<span class="text-red">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose one" id="companyBankId" name="companyBankId"></select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 chequeField">
                            <div class="form-group">
                                <label class="form-label">Cheque No.<span class="text-red">*</span></label>
                                <input type="number" class="form-control" name="chequeNo" id="chequeNo" placeholder="ChequeNo" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 chequeField">
                            <div class="form-group">
                                <label class="form-label">Effective Date<span class="text-red">*</span></label>
                                <input type="date" class="form-control" name="effectiveDate" id="effectiveDate" placeholder="Date">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 chequeField">
                            <div class="form-group">
                                <label class="form-label">Payee Name.<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="payeeName" id="payeeName" placeholder="payeeName" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-12 ">
                            <div class="form-group">
                                <label class="form-label">Refference / Description</label>
                                <textarea class="form-control mb-4" placeholder="Refference, Card no., Description." rows="3" id="description" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="card-footer text-end">
                    <a href="javascript:void(0);" class="btn btn-info btnBack"><i class="fe fe-skip-back"></i> Back</a>
                    <button type="button" class="btn  btn-success" id="btnSubmit">Save <i class="fe fe-skip-forward"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection('content')

@section('modal')
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
<div class="modal fade" id="voucherPaymentModal" tabindex="-1" role="dialog"  aria-hidden="true"  data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Voucher Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Voucher Serial No.<span class="text-red">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="voucherNo" id="voucherNo" placeholder="Search for..." autocomplete="off">
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="btnValidateVoucher"><i class="fe fe-plus"></i></button>
                                </span>
                            </div>  
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="h5 font-weight-bold">Voucher Value</p>
                                <p class="text-danger" id="voucherTotalValue"></p>
                            </div>
                            <div class="col-lg-6 text-end">
                                <p class="h5 font-weight-bold">Used Value</p>
                                <p class="text-danger" id="voucherUsedValue"></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddVoucher"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<!-- INTERNAL Select2 js -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>
<!-- Mask js -->
<script src="{{asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

<script src="{{asset('assets/js/config/notoword.js')}}"></script>
<script src="{{asset('assets/js/collectcredit/create.js')}}"></script>

@endsection