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
            <form id="productbrandsForm">
                <div class="card-body">
                    <div class="card-title font-weight-bold">Basic info:</div>
                    <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Brand Name<span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Brand Name" autocomplete="off">  
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                <label class="form-label">Brand Status<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="brands_status" id="brands_status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Descripton</label>
                                    <textarea class="form-control mb-4" name="description" id="description" placeholder="Textarea" rows="3"></textarea>
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
<!-- Mask js -->
<script src="{{asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

<script src="{{asset('assets/js/productbrands/create.js')}}"></script>

@endsection