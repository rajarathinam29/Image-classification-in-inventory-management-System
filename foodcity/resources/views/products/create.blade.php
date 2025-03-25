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
            <form id="productForm">
                <div class="card-body">
                    <div class="card-title font-weight-bold">Basic info:</div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Barcode (Leave as blank for no barcode)</label>
                                <input type="text" class="form-control" name="barcode" id="barcode" placeholder="barcode" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Product Name<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Product Category<span class="text-red">*</span></label>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control custom-select select2" name="product_category" id="product_category">
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                    <button class="btn btn-primary" type="button" id="btnAddCategory"><i class="fe fe-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Product Manufacture<span class="text-red">*</span></label>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control custom-select select2" name="company_name" id="company_name">
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                    <button class="btn btn-primary" type="button" id="btnAddCompany"><i class="fe fe-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Product Brand<span class="text-red">*</span></label>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control custom-select select2" name="brand_name" id="brand_name">
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                    <button class="btn btn-primary" type="button" id="btnAddBrand"><i class="fe fe-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Unit in Case<span class="text-red">*</span></label>
                                <input type="number" class="form-control" name="unit_in_case" id="unit_in_case" placeholder="Unit in Case" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Units Type<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="units_type" id="units_type">
                                    <option value="0">Kg</option>
                                    <option value="1">g</option>
                                    <option value="2">m</option>
                                    <option value="3">cm</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Alert Quantity</label>
                                <input type="number" class="form-control" name="alert_qty" id="alert_qty" placeholder="set minimum stock level" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Product Status<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="status" id="status">
                                    <option value="0">Inactive</option>
                                    <option value="1" selected>Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Part No</label>
                                <input type="text" class="form-control" name="partNo" id="partNo" placeholder="Part No" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-8">
							<div class="form-group">
								<label class="form-label">Compatibility Make & Models</label>
								<select class="form-control select2" name="productMakeModel" id="productMakeModel" multiple></select>
							</div>
						</div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea  class="form-control" name="description" id="description" row="30" autocomplete="off"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-title font-weight-bold">Stock info:</div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Stock (Leave as blank for no stock)</label>
                                <input type="number" step="any" class="form-control" name="stock" id="stock" placeholder="Stock" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Location</label>
                                <input type="text"  class="form-control" name="location" id="location" placeholder="Location" autocomplete="off">  
                            </div>
                        </div>
                    </div>
                    <div class="card-title font-weight-bold">Price info:</div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Price Type</label>
                                <select class="form-control custom-select select2" name="price_type" id="price_type">
                                    <option value="0">Non-Mrp</option>
                                    <option value="1" selected>Mrp</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Profit Margin (%)</label>
                                <input type="number" class="form-control" step="any" name="profit_margin" id="profit_margin" placeholder="Margin" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">VAT/Tax Type</label>
                                <select class="form-control custom-select select2" name="vat_type" id="vat_type">
                                    <option value="0" selected>Inclusive</option>
                                    <option value="1" >Exclusive</option>
                                </select>  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">VAT/Tax (%) </label>
                                <input type="number" class="form-control" step="any" name="vat" id="vat" placeholder="Vat" value="0" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Cost Price<span class="text-red">*</span></label>
                                <input type="number" class="form-control" step="any" name="cost_price" id="cost_price" placeholder="Cost Price" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">MRP/Selling Price<span class="text-red">*</span></label>
                                <input type="number" class="form-control" step="any" name="mrp" id="mrp" placeholder="MRP/Selling Price" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Discount Price (Leave as blank for no discount)</label>
                                <input type="number" class="form-control" step="any" name="sale_price" id="sale_price" placeholder="Discount Price" autocomplete="off">  
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="card-title font-weight-bold wipContent">WIP info:</div>
                    <div class="row wipContent">
                        
                    </div> -->
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
@section('modal')
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm">
                <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Category Name<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Descripton</label>
                                    <textarea class="form-control mb-4" name="description" id="description" placeholder="Textarea" rows="3"></textarea>
                                </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Category Status<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="status" id="status">
                                    <option value="0">Inactive</option>
                                    <option value="1" selected>Active</option>
                                </select>
                            </div>
                        </div>
                           
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSaveCategory"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addCompanyModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">New Manufacture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productcompaniesForm">
                <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Manufacture Name<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Manufacture Name" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Descripton</label>
                                    <textarea class="form-control mb-4" name="description" id="description" placeholder="Textarea" rows="3"></textarea>
                                </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Company Status<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="companies_status" id="companies_status">
                                    <option value="0">Inactive</option>
                                    <option value="1" selected>Active</option>
                                </select>
                            </div>
                        </div>
                           
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSaveCompany"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">New Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productbrandsForm">
                <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Brand Name<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Brand Name" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Descripton</label>
                                    <textarea class="form-control mb-4" name="description" id="description" placeholder="Textarea" rows="3"></textarea>
                                </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Brand Status<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="brands_status" id="brands_status">
                                    <option value="0">Inactive</option>
                                    <option value="1" selected>Active</option>
                                </select>
                            </div>
                        </div>
                           
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSaveBrand"><i class="fe fe-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<!-- INTERNAL Select2 js -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<!-- <script src="{{asset('assets/js/select2.js')}}"></script> -->


<script src="{{asset('assets/js/products/create.js?v=1.0.1')}}"></script>

@endsection