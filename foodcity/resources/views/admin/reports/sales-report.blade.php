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
	<div class="col-md-12">
		<div class="card">
			<div class="row me-0 ms-0">
				<div class="col-xl-3 col-lg-6 col-sm-6 pe-0 ps-0 border-end">
					<div class="card-body text-center">
						<p class="mb-1">Total Stock (Cost Price)</p>
						<h2 class="mb-1 font-weight-bold" id="stockValCost">3,56,667</h2>
						<!-- <span class="mb-0 text-muted"><span class="text-success"><i class="fa fa-caret-up  me-1"></i> 0.7%</span> Last month</span> -->
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-sm-6 pe-0 ps-0 border-end">
					<div class="card-body text-center">
						<p class="mb-1">Total Stock (Selling Price)</p>
						<h2 class="mb-1 font-weight-bold" id="stockValSell">39Sec</h2>
						<!-- <span class="mb-0 text-muted"><span class="text-success"><i class="fa fa-caret-up  me-1"></i> 0.2%</span> Last month</span> -->
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-sm-6 pe-0 ps-0 border-end">
					<div class="card-body text-center">
						<p class="mb-1">Profit</p>
						<h2 class="mb-1 font-weight-bold" id="stockValProfit">5,987</h2>
						<!-- <span class="mb-0 text-muted"><span class="text-danger"><i class="fa fa-caret-down  me-1"></i> 12%</span> Last month</span> -->
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-sm-6 pe-0 ps-0">
					<div class="card-body text-center">
						<p class="mb-1">Margin</p>
						<h2 class="mb-1 font-weight-bold" id="stockValMargin">12.7%</h2>
						<!-- <span class="mb-0 text-muted"><span class="text-danger"><i class="fa fa-caret-down  me-1"></i> 0.6%</span> Last month</span> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="">
					<div class="table-responsive">
						<table id="stockReportTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<th class="border-bottom-0" rowspan="2">#</th>
									<th class="border-bottom-0" rowspan="2">Product Name</th>
									<th class="border-bottom-0" rowspan="2">SKU/ Barcode</th>
                                    <th class="border-bottom-0" rowspan="2">Stock</th>
                                    <th class="border-bottom-0 text-center" colspan="4">Single</th>
									<th class="border-bottom-0 text-center" colspan="4">Total</th>
									<th class="border-bottom-0" rowspan="2">Counted/ Opening</th>
									<th class="border-bottom-0" rowspan="2">Purchased</th>
									<th class="border-bottom-0" rowspan="2">Sold</th>
								</tr>
								<tr>
									<th class="border-bottom-0">Cost Price</th>
									<th class="border-bottom-0">selling Price</th>
									<th class="border-bottom-0">Profit</th>
									<th class="border-bottom-0">Margin</th>
									<th class="border-bottom-0">Cost Price</th>
									<th class="border-bottom-0">selling Price</th>
									<th class="border-bottom-0">Profit</th>
									<th class="border-bottom-0">Margin</th>
									
								</tr>
							</thead>
							<tbody id="stockReportContent"></tbody>
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

<script src="{{asset('assets/js/reports/stockreport.js')}}"></script>

@endsection