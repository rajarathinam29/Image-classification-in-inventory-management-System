@extends('layouts.app')

@section('styles')
<!-- Data table css -->
<link href="{{asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" />
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
            <a href="javascript:void(0);"  class="btn btn-primary btn-pill btnEdit"><i class="fe fe-edit-3 me-2 fs-14"></i> Edit</a>
        </div>
    </div>
</div>
<!--End Page header-->

<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<!-- <div class="card-header">
				<a href="{{route('adminUsers.create')}}" class="btn btn-md btn-green"><i class="fa fa-user-plus"></i></a>
			</div> -->
			<div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <tbody>
                            <tr>
                                <td style="width:30%;">
                                    <span class="font-weight-semibold w-50">Barcode</span>
                                </td>
                                <td id="tr_barcode"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Product Name</span>
                                </td>
                                <td id="tr_product_name"></td>
                            </tr>
                            <tr class="wipContent">
                                <td class="">
                                    <span class="font-weight-semibold w-50">Part No</span>
                                </td>
                                <td id="tr_part_no"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Stock</span>
                                </td>
                                <td id="tr_stock"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Location</span>
                                </td>
                                <td id="tr_location"></td>
                            </tr>
                            <tr >
                                <td class="">
                                    <span class="font-weight-semibold w-50">Compatibility Make & Models</span>
                                </td>
                                <td id="tr_compatibility"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Product Category</span>
                                </td>
                                <td id="tr_product_category_id"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Product Manufacture</span>
                                </td>
                                <td id="tr_product_company_id"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Product Brand</span>
                                </td>
                                <td id="tr_product_brand_id"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Unit in Case </span>
                                </td>
                                <td id="tr_unit_in_case"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Units Type </span>
                                </td>
                                <td id="tr_units_type"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Alert Quantity </span>
                                </td>
                                <td id="tr_alery_qty"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Price Type </span>
                                </td>
                                <td id="tr_price_type"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Cost Price  </span>
                                </td>
                                <td id="tr_cost_price"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Discount Price </span>
                                </td>
                                <td id="tr_sale_price"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Mrp/Sale Price </span>
                                </td>
                                <td id="tr_mrp"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">VAT/TAX (%)</span>
                                </td>
                                <td id="tr_vat"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">VAT/TAX Type</span>
                                </td>
                                <td id="tr_vat_type"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Profit Margin (%)</span>
                                </td>
                                <td id="tr_profit_margin"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Status </span>
                                </td>
                                <td id="tr_status"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Description </span>
                                </td>
                                <td id="tr_description"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
	</div>
    <div class="col-lg-6">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sales Report </h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <canvas id="chartBarSales" class="h-300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Purchase Report</h3>
                    </div>
                    <div class="card-body">
                    <div>
                            <canvas id="chartBarPurchase" class="h-300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Purchased Products
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered" id="purchasedProductTbl">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">Date</th>
                                <th class="border-bottom-0">INV No</th>
                                <th class="border-bottom-0">Qty</th>
                                <th class="border-bottom-0">Cost Price</th>
                                <th class="border-bottom-0">Sell Price</th>
                                <th class="border-bottom-0">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="purchasedProductContent"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
		<div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Multiple Alliance
                </h3>
                <div class="card-options">
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" id="btnAddAlliance"><i class="fe fe-plus"></i> Add New</a>
                </div>
            </div>
			<div class="card-body">
				<div class="">
					<div class="table-responsive">
						<table id="allianceTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">Barcode</th>
                                    <th class="border-bottom-0">unitType</th>
                                    <th class="border-bottom-0">Qty</th>
                                    <th class="border-bottom-0">Cost Price</th>
                                    <th class="border-bottom-0">Sell Price</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
							</thead>
							<tbody id="allianceContent">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
   
    <div class="col-lg-6">
		<div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Product Native Names
                </h3>
                <div class="card-options">
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" id="btnAddProductLanguage"><i class="fe fe-plus"></i> Add New</a>
                </div>
            </div>
			<div class="card-body">
				<div class="">
					<div class="table-responsive">
						<table id="productlanguageTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">Product Language</th>
                                    <th class="border-bottom-0">Product Name</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
							</thead>
							<tbody id="productlanguageContent">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection('content')

@section('modal')
<div class="modal fade" id="addAllienceModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alliance-modal-title">Add New Alliance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addAllianceForm">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Barcode<span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Units Type</label>
                                <select class="form-control custom-select select2" name="units_type" id="units_type">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">qty</label>
                                <input type="number" class="form-control" name="qty" id="qty" placeholder="qty" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Cost Price</label>
                                <input type="number" class="form-control" name="cost_price" id="cost_price" placeholder="Cost Price" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Sell Price</label>
                                <input type="number" class="form-control" name="sell_price" id="sale_price" placeholder="Sell Price" autocomplete="off">  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Status<span class="text-red">*</span></label>
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
                <button type="button" class="btn btn-primary" id="btnSaveAlliance"><i class="fe fe-plus"></i> Create</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addProductLanguageModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productlanguage-modal-title">Add new productlanguage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addProductLanguageForm">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Language Name<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="language_id" id="language_id"></select>
                            </div>
                        </div>
                        
                    
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Name in Native Language</label>
                                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" autocomplete="off">  
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSaveProductLanguage"><i class="fe fe-plus"></i> Create</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- INTERNAL Data tables -->
<script src="{{asset('assets/plugins/datatables/DataTables/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/Buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/Buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/JSZip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/Buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/Buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/Buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/js/datatables.js')}}"></script>
<!-- INTERNAL Select2 js -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>

<!-- INTERNAL Chart js -->
<script src="{{asset('assets/plugins/chart/chart.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/chart/utils.js')}}"></script>

<script src="{{asset('assets/js/products/view.js?v=1.0.3')}}"></script>

@endsection