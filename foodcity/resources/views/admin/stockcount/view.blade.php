@extends('layouts.app')

@section('styles')
<!-- Data table css -->
<link href="{{asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" />
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
	<div class="col-12">
		<div class="card">
			<!-- <div class="card-header">
				<a href="{{route('adminUsers.create')}}" class="btn btn-md btn-green"><i class="fa fa-user-plus"></i></a>
			</div> -->
			<div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <tbody>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Start Date</span>
                                </td>
                                <td id="startDate"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">End Date</span>
                                </td>
                                <td id="endDate"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Status</span>
                                </td>
                                <td id="status"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Created By </span>
                                </td>
                                <td id="createdBy"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Total Cost Value </span>
                                </td>
                                <td id="proTotalCost"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Total MRP/ Selling Value </span>
                                </td>
                                <td id="proTotalMrp"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Total Profit </span>
                                </td>
                                <td id="proTotalProfit"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Total Profit Margin (%) </span>
                                </td>
                                <td id="proTotalMargin"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
	</div> 
    <div class="col-12">
		<div class="card">
            <div class="card-header">
                <h3 class="card-title">Counted Products</h3>
                <div class="card-options">
                    <button type="button" class="btn btn-sm bg-success-transparent btnAddProduct" ><i class="fe fe-plus"></i> Add Product</button>
                </div>
            </div>
			<div class="card-body">
				<div class="">
					<div class="table-responsive">
						<table id="stockCountProductsTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
                                <tr>
									<th class="border-bottom-0" rowspan="2">#</th>
									<th class="border-bottom-0" rowspan="2">Product</th>
                                    <th class="border-bottom-0" rowspan="2">Qty</th>
                                    <th class="border-bottom-0 text-center" colspan="4">Single</th>
                                    <th class="border-bottom-0 text-center" colspan="4">Total</th>
                                    <th class="border-bottom-0" rowspan="2">Expiry Date</th>
                                    <th class="border-bottom-0" rowspan="2">Actions</th>
								</tr>
								<tr>
                                    <th class="border-bottom-0">Cost Price</th>
                                    <th class="border-bottom-0">MRP/ Selling price</th>
                                    <th class="border-bottom-0">Profit</th>
                                    <th class="border-bottom-0">Margin</th>
                                    <th class="border-bottom-0">Cost Price</th>
                                    <th class="border-bottom-0">MRP/ Selling price</th>
                                    <th class="border-bottom-0">Profit</th>
                                    <th class="border-bottom-0">Margin</th>
								</tr>
							</thead>
							<tbody id="stockCountProductsContent">
								
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
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Expiry Date<span class="text-red">*</span></label>
                            <input type="number" class="form-control" name="inputQty" id="inputQty" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Expiry Date<span class="text-red">*</span></label>
                            <input type="date" class="form-control" name="inputExpiry" id="inputExpiry" value="" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSCPUpdate"><i class="fe fe-edit-3"></i> Update</button>
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

<script src="{{asset('assets/js/stockcount/view.js')}}"></script>

@endsection