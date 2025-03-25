@extends('layouts.superadmin-app')

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
            <form id="bankForm">
            <div class="card-body">
                    <div class="card-title font-weight-bold">Basic info:</div>
                    <div class="row">
                    <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Bank Code<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="bankCode" id="bankCode" placeholder="Bank Code"  autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Bank Name<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="bankName" id="bankName" placeholder="Bank Name"  autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Short Name<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="shortName" id="shortName" placeholder="Short Name"  autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Country<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="country" id="country" placeholder="Country" autocomplete="off">  
                            </div>
                        </div>   
                    </div>
                <div class="card-footer text-end">
                    <a href="javascript:void(0);" class="btn btn-info btnBack"><i class="fe fe-skip-back"></i> Back</a>
                    <button type="submit" class="btn  btn-success" id="btnSubmit">Edit <i class="fe fe-skip-forward"></i></button>
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

<script src="{{asset('assets/superadmin/js/banks/edit.js')}}"></script>

@endsection