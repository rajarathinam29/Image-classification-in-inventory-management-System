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
</div>
<!--End Page header-->

<div class="row">
	<div class="col-12">
	<div class="card">
			<form id="profitForm">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="form-group">
								<label class="form-label"> date</label>
								<input type="date" class="form-control" name="date" id="date" placeholder="Date" autocomplete="off">  
							</div>
						</div>
						
					</div>
				</div>
				<div class="card-footer text-end">
					<button type="submit" class="btn  btn-success" id="btnSubmit">Filter <i class="fe fe-skip-forward"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="row row-deck">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title" id="profitTitle">{{$title}}</h3>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered text-nowrap" id="profitTbl">
							<thead class="border-bottom-0 pt-3 pb-3">
								<tr id="profitThead">
									<th class="text-center">no</th>
									<th>Product Name</th>
									<th>Qty</th>
									<th>Total Sales Price</th>
									<th>Total Profit</th>
									<th>Margin</th>
								</tr>
							</thead>
							<tbody id="profitContent">
								
							</tbody>
							<tfoot>
								<tr id="profitTfoot">
									<th class=""></th>
									<th>Total</th>
									<th class="text-end"></th>
									<th class="text-end"></th>
									<th class="text-end"></th>
									<th class="text-end"></th>
								</tr>
							</tfoot>
						</table>
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

<script src="{{asset('assets/js/reports/productProfit.js')}}"></script>
@endsection