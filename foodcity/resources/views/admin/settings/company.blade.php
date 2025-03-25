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

<div class="main-proifle">
    <div class="row">
        <div class="col-lg-12 col-xl-8">
            <div class="box-widget widget-user">
                <div class="widget-user-image1 d-xl-flex d-block">
                    <img alt="User Avatar" class="avatar brround p-0" src="{{asset('assets/images/users/2.jpg')}}">
                    <div class="mt-1 ms-xl-5">
                        <h4 class="pro-user-username mb-3 font-weight-bold">Patrenna <i class="fa fa-check-circle text-success"></i></h4>
                        <!-- <small class="text-muted"><span class="userRole">Admin</span> at <span class="userCompanyName">Daily Food city</span></small> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-auto col-xl-4">
            <div class="text-xl-right text-left btn-list mt-4 mt-lg-0">
                <!-- <a href="javascript:void(0);" class="btn btn-primary btnEdit">Edit Profile</a> -->
            </div>
        </div>
    </div>
    <div class="profile-cover">
        <div class="wideget-user-tab">
            <div class="tab-menu-heading p-0">
                <div class="tabs-menu1 px-3">
                    <ul class="nav">
                        <li><a href="#tab-about" class="active fs-14" data-bs-toggle="tab">About</a></li>
                        <li><a href="#tab-branch" class=" fs-14" data-bs-toggle="tab">Branches</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- /.profile-cover -->
</div>
<!-- Row -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="border-0">
            <div class="tab-content">
                <div class="tab-pane active" id="tab-about">
                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title">Company Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                <tbody>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Company Name</span>
                                            </td>
                                            <td id="companyName"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Proprirtor Name </span>
                                            </td>
                                            <td id="proprirtorName"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Registred No </span>
                                            </td>
                                            <td id="registredNo"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Start Date </span>
                                            </td>
                                            <td id="startDate"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Email</span>
                                            </td>
                                            <td id="companyEmail"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50"> Company Status</span>
                                            </td>
                                            <td id="companyStatus"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Phone No.</span>
                                            </td>
                                            <td id="companyPhone"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-header ">
                            <h3 class="card-title">Address Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Building Number</span>
                                            </td>
                                            <td id="companyBuildingNo"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Street </span>
                                            </td>
                                            <td id="companyStreet"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">City </span>
                                            </td>
                                            <td id="companyCity"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">State</span>
                                            </td>
                                            <td id="companyState"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Country</span>
                                            </td>
                                            <td id="companyCountry"></td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <span class="font-weight-semibold w-50">Zipcode</span>
                                            </td>
                                            <td id="companyZipcode"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab-branch">
                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title">Branch Information</h3>
                        </div>
                        <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="">
                                        <div class="table-responsive">
                                            <table id="branchesTbl" class="table table-sm table-bordered text-nowrap key-buttons">
                                                <thead>
                                                    <tr>
                                                        <!-- <th class="border-bottom-0">User id</th> -->
                                                        <th class="border-bottom-0">#</th>
                                                        <th class="border-bottom-0">Name</th>
                                                        <th class="border-bottom-0">PhoneNo</th>
                                                        <th class="border-bottom-0">Email</th>
                                                        <th class="border-bottom-0">Status</th>
                                                        <th class="border-bottom-0">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="branchesContent">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

<script src="{{asset('assets/js/settings/general/company.js')}}"></script>


@endsection