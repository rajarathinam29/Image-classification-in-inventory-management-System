@extends('layouts.app')

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
            <form id="expenseForm">
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
                                <label class="form-label">Type<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="type" id="type">
                                    <option value="0">Invesment</option>
                                    <option value="1">Loan</option>
                                    <option value="2">Purchase</option>
                                    <option value="3">Sales</option>
                                    <option value="3">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Method<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="method" id="method">
                                    <option value="0">Cash</option>
                                    <option value="1">Card</option>
                                    <option value="2">Online Banking</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Amount<span class="text-red">*</span></label>
                                <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                    <label class="form-label">Descripton<span class="text-red">*</span></label>
                                    <textarea class="form-control mb-4" name="description" id="description" placeholder="Textarea" rows="3"></textarea>
                                </div>
                            </div>
                    </div>
                </div>
                    
                <div class="card-footer text-end">
                    <a href="javascript:void(0);" class="btn btn-info btnBack"><i class="fe fe-skip-back"></i> Back</a>
                    <button type="button" class="btn btn-success" id="btnSubmit">Save <i class="fe fe-skip-forward"></i></button>
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

<script src="{{asset('assets/js/expenses/edit.js')}}"></script>

@endsection