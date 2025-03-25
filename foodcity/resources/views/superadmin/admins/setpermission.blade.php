@extends('layouts.superadmin-app')

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
    <!-- <div class="page-rightheader">
        <div class="btn-list">
            <a href="javascript:void(0);" class="btn btn-outline-primary btnBack"><i class="fe fe-skip-back"></i> Back</a>
        </div>
    </div> -->
</div>
<!--End Page header-->

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <form id="permissionForm">
                <div class="card-body">
                    <div class="card-title font-weight-bold">Basic info:</div>
                    <ul id="tree3"> </ul>
                </div>
                <div class="card-footer text-end">
                    <a href="javascript:void(0);" class="btn btn-info btnBack"><i class="fe fe-skip-back"></i> Back</a>
                    <button type="button" class="btn btn-success" id="btnSubmit">Set permission <i class="fe fe-skip-forward"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection('content')

@section('scripts')

<!-- INTERNAL Treeview js -->
<script src="{{asset('assets/plugins/treeview/treeview.js')}}"></script>

<script src="{{asset('assets/superadmin/js/admins/setpermission.js')}}"></script>

@endsection