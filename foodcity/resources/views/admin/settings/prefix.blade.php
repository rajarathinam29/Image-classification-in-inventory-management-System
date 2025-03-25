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
    <div class="page-rightheader">
        <div class="btn-list">
            <a href="javascript:void(0);" class="btn btn-outline-primary btnBack"><i class="fe fe-skip-back"></i> Back</a>
        </div>
    </div>
</div>
<!--End Page header-->

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <form id="prefixForm">
                <div class="card-body">
                    <div class="card-title font-weight-bold">Prefix:</div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Purchase</label>
                                <input type="text" class="form-control" name="purchase" id="purchase" placeholder="Purchase" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Purchase Order</label>
                                <input type="text" class="form-control" name="purchase_order" id="purchase_order" placeholder="Purchase Order" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Sales</label>
                                <input type="text" class="form-control" name="sales" id="sales" placeholder="Sales" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Suppliers</label>
                                <input type="text" class="form-control" name="suppliers" id="suppliers" placeholder="Suppliers" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Customers</label>
                                <input type="text" class="form-control" name="customers" id="customers" placeholder="Customers" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Products</label>
                                <input type="text" class="form-control" name="products" id="products" placeholder="Products" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Purchase Payment</label>
                                <input type="text" class="form-control" name="purchase_payment" id="purchase_payment" placeholder="Purchase Payment" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Sales Payment</label>
                                <input type="text" class="form-control" name="sales_payment" id="sales_payment" placeholder="Sales Payment" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Expenses</label>
                                <input type="text" class="form-control" name="expenses" id="expenses" placeholder="Expense" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Revenues</label>
                                <input type="text" class="form-control" name="revenues" id="revenues" placeholder="Revenue" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Vouchers</label>
                                <input type="text" class="form-control" name="vouchers" id="vouchers" placeholder="Voucher" autocomplete="off">  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end"> 
                    <button type="button" class="btn  btn-success" id="btnSubmit">Save <i class="fe fe-skip-forward"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection('content')


@section('scripts')

<!-- INTERNAL Select2 js -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<!-- <script src="{{asset('assets/js/select2.js')}}"></script> -->
<!-- Mask js -->
<script src="{{asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

<script src="{{asset('assets/js/settings/general/prefix.js')}}"></script>

@endsection