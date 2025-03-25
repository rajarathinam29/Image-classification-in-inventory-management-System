@extends('layouts.app')

@section('styles')
    <!-- Slect2 css -->
    <link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
    <!-- INTERNAL telephoneinput css-->
   <link rel="stylesheet" href="{{asset('assets/plugins/telephoneinput/telephoneinput.css')}}">

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
            <form id="customerForm">
            <div class="card-body">
                    <div class="card-title font-weight-bold">Basic info:</div>
                    <div class="row">
                    <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Company name/ Customer name<span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company name/ Customer name"  autocomplete="off">
                                </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Customer Id<span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="customer_id" id="customer_id" placeholder="Customer Id"  autocomplete="off">
                                </div>
                        </div>
                    <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">First Name/ Short Name<span class="text-red">*</span></label>
                                <div class="row g-xs">
                                    <div class="col-2">
                                        <select class="form-control custom-select select2 is-invalid" name="title"  id="title">
                                            <option value="">--</option>
                                            <option value="Mr">Mr.</option>
                                            <option value="Mrs">Mrs.</option>
                                            <option value="Miss">Miss.</option>
                                            <option value="Dr">Dr.</option>
                                        </select>
                                    </div>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name/ Short Name"  autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"  autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Date of Birth<span class="text-red"></span></label>
                                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Phone Number<span class="text-red">*</span></label>
                                <div class="input-group ">
                                    <input type="tel" class="form-control" name="phone_no" id="phone_no"  placeholder="e.g. +94 112233444">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label"> Alternative Phone Number</label>
                                <div class="input-group ">
                                        <input type="tel" class="form-control" name="alt_phone_no" id="alt_phone_no"  placeholder="e.g. +94 112233444">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
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
                                <label class="form-label">County</label>
                                <input type="text" class="form-control" name="state" id="state" placeholder="County">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <select class="form-control custom-select select2" name="country" id="country">
                                    <!-- <option value="Sri Lanka">Sri Lanka</option> -->
                                    <option value="United Kingdom">United Kingdom</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Post code</label>
                                <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Post code">
                            </div>
                        </div>
                    </div>
                    <div class="card-title font-weight-bold">Shipping Address info:</div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Shipping Building Number</label>
                                <input type="text" class="form-control" name="shipping_building_no" id="shipping_building_no" placeholder="Shipping Building Number">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Shipping Street</label>
                                <input type="text" class="form-control" name="shipping_street" id="shipping_street" placeholder="Shipping Street">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Shipping City</label>
                                <input type="text" class="form-control" name="shipping_city" id="shipping_city" placeholder="Shipping City">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Shipping County</label>
                                <input type="text" class="form-control" name="shipping_state" id="shipping_state" placeholder="Shipping County">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Shipping Country</label>
                                <select class="form-control custom-select select2" name="shipping_country" id="shipping_country">
                                    <!-- <option value="Sri Lanka">Sri Lanka</option> -->
                                    <option value="United Kingdom">United Kingdom</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Shipping Post code</label>
                                <input type="text" class="form-control" name="shipping_zipcode" id="shipping_zipcode" placeholder="Shipping Post code">
                            </div>
                        </div>
                    </div>
                    <div class="card-title font-weight-bold">More info:</div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tax Number</label>
                                <input type="text" class="form-control" name="tax_no" id="tax_no" placeholder="Tax Number">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Opening Balance</label>
                                <input type="text" class="form-control" name="opening_balance" id="opening_balance" placeholder="Opening Balance">
                            </div>
                        </div>
                    </div>
                    <div class="card-title font-weight-bold">Credit info:</div>
                    <div class="row">
                    <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Pay Period</label>
                                <select class="form-control custom-select select2" name="pay_period" id="pay_period">
                                    <option value="Months">Months</option>
                                    <option value="Days">Days</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Pay Term</label>
                                <input type="number" class="form-control" name="pay_term" id="pay_term" placeholder="Pay Term">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Credit Limit</label>
                                <input type="number" class="form-control" name="credit_limit" id="credit_limit" placeholder="Credit Limit">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="javascript:void(0);" class="btn btn-info btnBack"><i class="fe fe-skip-back"></i> Back</a>
                    <button type="submit" class="btn  btn-success" id="btnSubmit">Save <i class="fe fe-skip-forward"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection('content')

@section('scripts')

<!-- INTERNAL Select2 js -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>

<!-- mask -->
<script src="{{asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

<!--INTERNAL telephoneinput js-->
<script src="{{asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>

<script src="{{asset('assets/js/customers/edit.js')}}"></script>

@endsection