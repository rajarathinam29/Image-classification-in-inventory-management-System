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
		<h4 class="page-title mb-0 text-primary">{{$title}} </h4>
		<p class="mb-0 text-primary" id="pChequeStatus">{{$title}} </p>
	</div>
</div>
<!--End Page header-->

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<div class="btn-list">
					<div class="btn-group mt-2 mb-2">
						<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" id="btnMoreOptions">
							<i class="fa fa-ellipsis-h"></i> Cheque Status <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-plus-title">
								Cheque Status
								<b class="fa fa-angle-up" aria-hidden="true"></b>
							</li>
							<li><a href="javascript:void(0);" id="btnPending">Pending</a></li>
							<li><a href="javascript:void(0);" id="btnOnhold">On hold</a></li>
							<li><a href="javascript:void(0);" id="btnDeposited">Deposited</a></li>
							<li><a href="javascript:void(0);" id="btnPassed">Passed</a></li>
							<li><a href="javascript:void(0);" id="btnReturned">Returned</a></li>
						</ul>
					</div>
					<!-- <button class="btn btn-warning" id="btnUnused">Pending</button>
					<button class="btn btn-success" id="btnUsed">On hold</button>
					<button class="btn btn-info" id="btnUsed">Deposited</button>
					<button class="btn btn-success" id="btnUsed">Passed</button>
					<button class="btn btn-danger" id="btnUsed">Returned</button> -->
				</div>
			</div>
			<div class="card-body">
				<div class="">
					<div class="table-responsive">
						<table id="chequeTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">Issued Date</th>
									<th class="border-bottom-0">Cheque Info</th>
                                    <th class="border-bottom-0">Effective Date</th>
									<th class="border-bottom-0">Amount</th>
                                    <th class="border-bottom-0">Status</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
							</thead>
							<tbody id="chequeContent">
								
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

<script src="{{asset('assets/js/cheque/issued/cheque-list.js')}}"></script>

@endsection