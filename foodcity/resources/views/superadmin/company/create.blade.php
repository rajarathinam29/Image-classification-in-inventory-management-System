@extends('layouts.superadmin-app')

@section('styles')
    <!-- Slect2 css -->
    <link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
    <!-- INTERNAL telephoneinput css-->
    <link rel="stylesheet" href="{{asset('assets/plugins/telephoneinput/telephoneinput.css')}}">
    
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
            <form id="companyForm">
                <div class="card-body">
                    <div class="card-title font-weight-bold">Basic info:</div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Company Name<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name"  autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Company Registered No.<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="registered_no" id="registered_no" placeholder="Registered No"  autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Company Start Date<span class="text-red">*</span></label>
                                <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start Date">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Proprietor Name</label>
                                <input type="text" class="form-control" name="proprietor_name" id="proprietor_name" placeholder="Proprietor Name">
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
                                <label class="form-label">Email<span class="text-red">*</span></label>
                                <input type="email" class="form-control" name="email" id="email"  placeholder="Email">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">User Limit<span class="text-red">*</span></label>
                                <input type="number" class="form-control" name="user_limit" id="user_limit"  placeholder="User Limit E.g 5">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Company Status<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="status" id="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
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
                    <div class="card-title font-weight-bold">More info:</div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                             <div class="form-group">
                                    <label class="form-label">Finiancial Year Start Month</label>
                                    <select class="form-control custom-select select2" name="starting_month" id="starting_month">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                            </div>
                        </div> 
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Currency</label>
                                <select class="form-control custom-select select2" name="currency" id="currency">
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Currency Symbol Placement</label>
                                <select class="form-control custom-select select2" name="currency_placement" id="currency_placement">
                                    <option value="before">Before Amount</option>
                                    <option value="after">After Amount</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Date Format</label>
                                <select class="form-control custom-select select2" name="date_format" id="date_format">
                                    <option value="mm-dd-yyyy">mm-dd-yyyy</option>
                                    <option value="dd-mm-yyyy">dd-mm-yyyy</option>
                                    <option value="yyyy-mm-dd">yyyy-mm-dd</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="javascript:void(0);" class="btn btn-info btnBack"><i class="fe fe-skip-back"></i> Back</a>
                    <button type="submit" class="btn  btn-success" id="btnSubmit">Create <i class="fe fe-skip-forward"></i></button>
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

<script src="{{asset('assets/superadmin/js/companies/create.js')}}"></script>

@endsection