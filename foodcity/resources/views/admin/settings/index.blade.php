@extends('layouts.app')

@section('styles')

<!-- INTERNAL treeview -->
<link href="{{asset('assets/plugins/treeview/treeview.css')}}" rel="stylesheet" type="text/css" />
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
			<div class="card-body">
				<ul id="treeview1">
					<li><a href="javascript:void(0);">General</a>
						<ul>
							<li><a href="{{route('adminSettings.personal')}}">Personal Settings</a></li>
							<li><a href="{{route('adminSettings.paymentmethod')}}">PaymentMethod Settings</a></li>
							<li><a href="{{route('adminSettings.companydetails')}}">Company Details</a></li>
							<li><a href="{{route('adminSettings.prefix')}}">Prefix</a></li>
						</ul>
					</li>
					<li>Users and Controls
						<ul>
							<li><a href="{{route('adminUsers')}}">Users</a></li>
							
						</ul>
					</li>
					<li>Imports
						<ul>
							<li><a href="{{route('adminSettings.customers')}}">Customers</a></li>
							<li><a href="{{route('adminSettings.products')}}">Products</a></li>
							<li><a href="{{route('adminSettings.suppliers')}}">Suppliers</a></li>
							
						</ul>
					</li>
					<li>Make & Model
						<ul>
							<li><a href="{{route('adminSettings.makeModel')}}">Make & Model</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>


@endsection('content')

@section('scripts')
<!-- INTERNAL Treeview js -->
<script src="{{asset('assets/plugins/treeview/treeview.js')}}"></script>


@endsection