@extends('layouts.app')

@section('styles')

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
                                    <span class="font-weight-semibold w-50">Date</span>
                                </td>
                                <td id="date"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Customers</span>
                                </td>
                                <td id="customer"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Payment Method </span>
                                </td>
                                <td id="method"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Amount </span>
                                </td>
                                <td id="amount"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Description </span>
                                </td>
                                <td id="description"></td>
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
                <h3 class="card-title">
                    Paied Invoices
                </h3>
            </div>
			<div class="card-body">
				<div class="">
					<div class="table-responsive">
						<table id="salespaymentTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">InvoiceId</th>
                                    <th class="border-bottom-0">NetAmount</th>
								</tr>
							</thead>
							<tbody id="salespaymentContent">
								
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

<script src="{{asset('assets/js/sales/salesPaymentview.js')}}"></script>

@endsection