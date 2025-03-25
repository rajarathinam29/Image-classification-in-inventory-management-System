@extends('layouts.app')

@section('styles')
    <!-- Slect2 css -->
    <link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
    <style>
        .holder {
            position: relative;
        }
        .salesdropdown {
            position: absolute;
            border: 1px solid #e6ebf1;
            display: none;
            z-index: 1;
            background: white;
            padding: 0.375rem 0.75rem;
        }

        /* input:focus + .salesdropdown {
            display: block;
        } */
    </style>
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
            <form id="countProductForm">
                <div class="card-body">
                    <div class="card-title font-weight-bold">Basic info:</div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Product<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="searchproduct" id="searchproduct" placeholder="Search Product Name, Barcode or SKU" autocomplete="off"> 
                                <div class="salesdropdown custom-controls-stacked"></div> 
                                <input type="hidden" name="product_id" id="product_id">
                                <span class="text-muted product_name"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">MRP/Selling Price<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="sltMrp" id="sltMrp">
                                    <option value="">Select Price</option>
                                </select>  
                                <input type="number" class="form-control" name="inputMrp" id="inputMrp" placeholder="Cost Price" autocomplete="off" readonly>
                                <span class="text-danger">Default Price</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Cost Price</label>
                                <input type="number" class="form-control" name="cost_price" id="cost_price" placeholder="Cost Price" autocomplete="off" readonly> 
                                <span class="text-danger ">Default Price</span> 
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Quantity <span class="text-red">*</span></label>
                                <input type="number" class="form-control" name="inputQty" id="inputQty" placeholder="Qty" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Expiry Date </label>
                                <input type="date" class="form-control" name="expiryDate" id="expiryDate" autocomplete="off">  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="javascript:void(0);" class="btn btn-info btnBack"><i class="fe fe-skip-back"></i> Back</a>
                    <button type="submit" class="btn  btn-success" id="btnSubmit">Add <i class="fe fe-skip-forward"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection('content')
@section('modal')

@endsection

@section('scripts')

<!-- INTERNAL Select2 js -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<!-- <script src="{{asset('assets/js/select2.js')}}"></script> -->


<script src="{{asset('assets/js/stockcount/addProduct.js')}}"></script>

@endsection