@extends('layouts.superadmin-app')

@section('styles')
<!-- INTERNAL Select2 css -->
<link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

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
            <a href="javascript:void(0);"  class="btn btn-primary btn-pill btnEdit"><i class="fe fe-edit-3 me-2 fs-14"></i> Edit</a>
            <a href="javascript:void(0);"  class="btn btn-primary btn-pill btnSetPermission"><i class="fe fe-settings me-2 fs-14"></i> Set Permission</a>
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
                <div class="card-title font-weight-bold">Basic info:</div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <tbody>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">User Name</span>
                                </td>
                                <td id="userId"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Name </span>
                                </td>
                                <td id="userName"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Email</span>
                                </td>
                                <td id="userEmail"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">User Status</span>
                                </td>
                                <td id="userStatus"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Phone No.</span>
                                </td>
                                <td id="userPhone"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-title font-weight-bold">Address info:</div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <tbody>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Building No.</span>
                                </td>
                                <td id="building_no"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Street </span>
                                </td>
                                <td id="street"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">City</span>
                                </td>
                                <td id="city"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">State</span>
                                </td>
                                <td id="state"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Country</span>
                                </td>
                                <td id="country"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Zipcode</span>
                                </td>
                                <td id="zipcode"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
	</div>
</div>


@endsection('content')

@section('modal')
<div class="modal fade" id="companyAssignModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Assign Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="assignCompanyForm">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Company<span class="text-red">*</span></label>
                                <select class="form-control select2 custom-select" name="company_id" data-placeholder="Choose one" id="sltCompany">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Branch<span class="text-red">*</span></label>
                                <select class="form-control select2 custom-select" name="branch_id" data-placeholder="Choose one" id="sltBranch">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Status<span class="text-red">*</span></label>
                                <select class="form-control custom-select select2" name="status" id="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAssignCompany">Assign</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<!-- INTERNAL Select2 js -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<!-- <script src="{{asset('assets/js/select2.js')}}"></script> -->

<script src="{{asset('assets/superadmin/js/admins/view.js')}}"></script>

@endsection