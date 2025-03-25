@extends('layouts.app')

@section('styles')

<!-- Data table css -->
<link href="{{asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" />

<!-- Slect2 css -->
<link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

<!-- dropzone css -->
<link href="{{asset('assets/plugins/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />

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
			<form id="purchaseForm">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label class="form-label">Supplier</label>
								<select class="form-control custom-select select2" name="sltSupplier" id="sltSupplier"></select>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label class="form-label">Status</label>
								<select class="form-control custom-select select2" name="sltStatus" id="sltStatus">
									<option value="">Select status</option>
									<option value="0">Incompleted</option>
									<option value="1">Completed</option>
								</select>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label class="form-label">From date</label>
								<input type="date" class="form-control" name="fromDate" id="fromDate" placeholder="From Date" autocomplete="off">  
							</div>
						</div>
						
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label class="form-label">To date</label>
								<input type="date" class="form-control" name="toDate" id="toDate" placeholder="To Date" autocomplete="off">  
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
				<a href="{{route('purchases.create')}}" class="btn btn-md btn-green"><i class="fa fa-plus"></i></a>
			</div>
			<div class="card-body">
				<div class="">
					<div class="table-responsive">
						<table id="purchaseTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">Id</th>
									<th class="border-bottom-0">Date</th>
                                    <th class="border-bottom-0">Bill No</th>
                                    <th class="border-bottom-0">Suppliers</th>
                                    <th class="border-bottom-0">TotalAmount</th>
                                    <th class="border-bottom-0">Discount</th>
									<th class="border-bottom-0">Cost</th>
									<th class="border-bottom-0">Status</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
							</thead>
							<tbody id="purchaseContent">
								
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
<div class="modal fade" id="uploadAttachmentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="viewAttachmentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="row" id="viewAttachmentContent">
					
				</div>
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
<script src="{{asset('assets/js/select2.js')}}"></script>

<!-- dropzone js -->
<script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>

<script src="{{asset('assets/js/purchase/purchase.js')}}"></script>

@endsection