@extends('layouts.app')

@section('styles')

<!-- Data table css -->
<link href="{{asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" />

<!-- Slect2 css -->
<link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
<style>
	.tableFixHead          { overflow: auto; height: 500px; }
.tableFixHead thead th { position: sticky; top: 0; z-index: 1; }

/* Just common table stuff. Really. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px; }
th     { background:#eee; }

</style>

@endsection

@section('content')

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title mb-0 text-primary">{{$title}}</h4>
	</div>
</div>
<!--End Page header-->

<div class="row">
	<div class="col-12">
		<div class="card">
			<form id="productForm">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label class="form-label">Category</label>
								<select class="form-control custom-select select2" name="sltCategory" id="sltCategory"></select>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label class="form-label">Manufacture</label>
								<select class="form-control custom-select select2" name="sltCompany" id="sltCompany"></select>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label class="form-label">Brand</label>
								<select class="form-control custom-select select2" name="sltBrand" id="sltBrand"></select>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label class="form-label">Unit Type</label>
								<select class="form-control custom-select select2" name="sltUnitType" id="sltUnitType"></select>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer text-end">
					<button type="submit" class="btn  btn-success" id="btnSubmit">Filter <i class="fe fe-skip-forward"></i></button>
				</div>
			</form>
		</div>
		<div class="card">
			<div class="card-header">
				<a href="{{route('products.create')}}" class="btn btn-md btn-green"><i class="fa fa-plus"></i></a>
			</div>
			<div class="card-body" id="progressBody" >
				<div class="dimmer active">
					<div class="spinner3">
						<div class="dot1"></div>
						<div class="dot2"></div>
					</div>
				</div>
				<h4 class="text-muted text-center">Thanks for patiently waiting. May be it's take few minutes</h4>
			</div>
			<div class="card-body" id="contentBody" style="display:none;">
				<div class="">
					<div class="table-responsive tableFixHead">
						<table id="productsTbl" class="table table-sm table-bordered text-nowrap key-buttons ">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th style="background-color: white;">#</th>
									<th style="background-color: white;">Barcode/sku</th>
									<th style="background-color: white;">Part No</th>
									<th style="background-color: white;">Product Name</th>
                                    <th style="background-color: white;">Units in case</th>
                                    <th style="background-color: white;">Unit Type</th>
                                    <th style="background-color: white;">Cost Price</th>
                                    <th style="background-color: white;">Sale Price</th>
									<th style="background-color: white;">Status</th>
									<th style="background-color: white;">Actions</th>
								</tr>
							</thead>
							<tbody id="productsContent">
<!-- 								
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><span class="badge badge-gradient-success mt-2 fs-11">Active</span></td>
									<td>
										<div class="btn-group">
											<a href="javascript:void(0);" class="btn btn-light btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options <i class="fa fa-angle-down"></i></a>
											<div class="dropdown-menu">
												<a class="dropdown-item" href=""><i class="fe fe-list me-2"></i> List of all products</a>
												<a class="dropdown-item" href=""><i class="fe fe-plus-circle me-2"></i> Add products</a>
											</div>
										</div>
									</td>
									<td>
										<a href=""><button type="button" class="btn btn-sm bg-success-transparent" data-bs-toggle="modal"><i class="fe fe-unlock"></i></button></a>
										<a href=""><button type="button" class="btn btn-sm bg-success-transparent" data-bs-toggle="modal"><i class="fe fe-eye"></i></button></a>
										<a href=""><button type="button" class="btn btn-sm bg-info-transparent"><i class="fe fe-edit-3"></i></button></a>
										<button type="button" class="btn btn-sm bg-danger-transparent delete"><i class="fe fe-trash"></i></button>
										
									</td>
									
								</tr> -->
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection('content')

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
<script src="{{asset('assets/js/select2.js')}}"></script>

<script src="{{asset('assets/js/products/product.js?v=1.0.2')}}"></script>

@endsection