@extends('layouts.app')

@section('styles')
    <!-- Slect2 css -->
    <link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
    <!-- INTERNAL telephoneinput css-->
    <link rel="stylesheet" href="{{asset('assets/plugins/telephoneinput/telephoneinput.css')}}">
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
	<div class="col-lg-12 col-md-12">
		<form method="post" class="card">
			<div class="card-header">
				<h3 class="card-title">File Import</h3>
			</div>
			<div class="card-body" id="uploadBody">
				<div class="input-group file-browser mb-5">
					<input type="text" class="form-control border-end-0 browse-file" placeholder="choose" readonly>
					<label class="input-group-text btn btn-primary">
							Browse <input type="file" class="file-browserinput" style="display: none;" id="importCustomerFile">
					</label>
				</div>
				
			</div>
			<div class="card-body" id="progressBody" style="display:none;">
				<div class="dimmer active">
					<div class="spinner3">
						<div class="dot1"></div>
						<div class="dot2"></div>
					</div>
				</div>
				<p class="text-muted text-center">Please don't close or refresh this page until complete importing.</p>
			</div>
			<div class="card-footer text-end">
				<button type="button" class="btn btn-primary" id="btnSubmitImport">Submit</button>
			</div>
		</form>
	</div>
</div>

<div class="row" id="errorReportRow" style="display:none;">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Error Report(s)</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table card-table table-vcenter text-nowrap">
						<thead>
							<tr>
								<th>Company Name</th>
								<th>Customer</th>
								<th>Errors</th>
							</tr>
						</thead>
						<tbody id="errorContent"></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

                        <div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">
											Instructions
										</h3>
										<div class="card-options">
											<a href="{{url('uploads/import/customers.xlsx')}}" class="btn btn-sm btn-success" target="_blank"><i class="fe fe-download me-2"></i> Download Templete File</a>
										</div>
									</div>
									<div class="card-body">
										<h6 class="font-weight-semibold">Follow the instructions carefully before importing the file.</h6>
										<p class="text-muted">The columns of the file should be in the following order.</p>
										<div class="table-responsive">
											<table class="table card-table table-vcenter text-nowrap">
												<thead >
													<tr>
														<th>Column No</th>
														<th>Name</th>
														<th>Column Name</th>
														<th>Instruction</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>Company Name (Required)</td>
														<td>company_name</td>
														<td></td>
													</tr>
													<tr>
														<td>1</td>
														<td>Customer Id (Required)</td>
														<td>customer_id</td>
														<td></td>
													</tr>
													<tr>
														<td>1</td>
														<td>Title (Optional)</td>
														<td>title</td>
														<td></td>
													</tr>
													<tr>
														<td>2</td>
														<td>First Name (Required)</td>
														<td>first_name</td>
														<td></td>
													</tr>
													<tr>
														<td>3</td>
														<td>Last Name (Optional)</td>
														<td>last_name</td>
														<td></td>
													</tr>
													<tr>
														<td>4</td>
														<td>Date of Birth (Optional)</td>
														<td>date_of_birth</td>
														<td>Format dd-mm-yyyy, mm-dd-yyyy, yyyy-mm-dd</td>
													</tr>
													<tr>
														<td>5</td>
														<td>Phone Number (Required)</td>
														<td>phone_no</td>
														<td></td>
													</tr>
													<tr>
														<td>6</td>
														<td>Alternative Phone Number (Optional)</td>
														<td>alt_phone_no</td>
														<td></td>
													</tr>
													<tr>
														<td>7</td>
														<td>Email (Optional)</td>
														<td>email</td>
														<td></td>
													</tr>
													<tr>
														<td>8</td>
														<td>Building Number (Optional)</td>
														<td>building_no</td>
														<td></td>
													</tr>
													<tr>
														<td>9</td>
														<td>Street (Required)</td>
														<td>street</td>
														<td></td>
													</tr>
													<tr>
														<td>10</td>
														<td>City (Required)</td>
														<td>city</td>
														<td></td>
													</tr>
													<tr>
														<td>11</td>
														<td>City (Required)</td>
														<td>state</td>
														<td></td>
													</tr>
													<tr>
														<td>12</td>
														<td>Country (Required)</td>
														<td>country</td>
														<td>Available Options: SriLanka and United Kindom</td>
													</tr>
													<tr>
														<td>13</td>
														<td>Zipcode (Optional)</td>
														<td>zipcode</td>
														<td></td>
													</tr>
													<tr>
														<td>14</td>
														<td>Points (Optional)</td>
														<td>points</td>
														<td></td>
													</tr>
													<tr>
														<td>15</td>
														<td>Credit Limit (Optional)</td>
														<td>credit_limit</td>
														<td></td>
													</tr>
													<tr>
														<td>16</td>
														<td>Shipping Building Number (Optional)</td>
														<td>shipping_building_no</td>
														<td></td>
													</tr>
													<tr>
														<td>17</td>
														<td>Shipping Street (Optional)</td>
														<td>shipping_street</td>
														<td></td>
													</tr>
													<tr>
														<td>18</td>
														<td>Shipping City (Optional)</td>
														<td>shipping_city</td>
														<td></td>
													</tr>
													<tr>
														<td>19</td>
														<td>Shipping City (Optional)</td>
														<td>shipping_state</td>
														<td></td>
													</tr>
													<tr>
														<td>20</td>
														<td>Shipping Country (Optional)</td>
														<td>shipping_country</td>
														<td>Available Options: SriLanka and United Kindom</td>
													</tr>
													<tr>
														<td>21</td>
														<td>Shipping Zipcode (Optional)</td>
														<td>shipping_zipcode</td>
														<td></td>
													</tr>
													<tr>
														<td>22</td>
														<td>Tax Number (Optional)</td>
														<td>tax_no</td>
														<td></td>
													</tr>
													<tr>
														<td>23</td>
														<td>Pay Term (Optional)</td>
														<td>pay_term</td>
														<td></td>
													</tr>
													<tr>
														<td>24</td>
														<td>Pay Period (Optional)</td>
														<td>pay_period</td>
														<td>Available Options: Months and Days</td>
													</tr>
													
												</tbody>
											</table>
										</div>
										<!-- table-responsive -->
									</div>
								</div>
							</div>
						</div>


@endsection('content')

@section('scripts')

<!-- INTERNAL Select2 js -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>

<!--INTERNAL telephoneinput js-->
<script src="{{asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>

<script src="{{asset('assets/js/file-upload.js')}}"></script>

<!--Excel js-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>

<script src="{{asset('assets/js/settings/imports/importCustomers.js?v=1.0.1')}}"></script>

@endsection