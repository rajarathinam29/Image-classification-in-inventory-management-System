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
</div>
<!--End Page header-->

<div class="row">
	<div class="col-12">
		<div class="card">
			<form id="purchasePaymentForm">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="form-group">
								<label class="form-label">Supplier</label>
								<select class="form-control custom-select select2" name="sltSupplier" id="sltSupplier"></select>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="form-group">
								<label class="form-label">From date</label>
								<input type="date" class="form-control" name="fromDate" id="fromDate" placeholder="From Date" autocomplete="off">  
							</div>
						</div>
						
						<div class="col-lg-4 col-md-6">
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
				<a href="{{route('payorder.create')}}" class="btn btn-md btn-green"><i class="fa fa-plus"></i></a>
			</div>
			<div class="card-body">
				<div class="">
					<div class="table-responsive">
						<table id="paymentTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">Ref No.</th>
									<th class="border-bottom-0">Date</th>
                                    <th class="border-bottom-0">Suppliers</th>
                                    <th class="border-bottom-0">Payment Method</th>
                                    <th class="border-bottom-0">TotalAmount</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
							</thead>
							<tbody id="paymentContent">
								
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


<script src="{{asset('assets/js/purchase/purchasePayment.js')}}"></script>

@endsection