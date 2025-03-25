@extends('layouts.app')

@section('styles')


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
			<form id="logForm">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label class="form-label">Module</label>
								<select class="form-control custom-select select2" name="sltModule" id="sltModule"></select>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label class="form-label">User</label>
								<select class="form-control custom-select select2" name="sltUser" id="sltUser"></select>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label class="form-label">From date</label>
								<input type="date" class="form-control" name="fromDate" id="fromDate" placeholder="From Date" autocomplete="off">  
							</div>
						</div>
						
						<div class="col-lg-3 col-md-6">
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
			<div class="card-body" >
				<ul class="timelineleft pb-5" id="timelineContent">
					<li class="timeleft-label"><span class="bg-cyan">10 May. 2021</span></li>
					<li>
						<i class="fa fa-camera bg-orange"></i>
						<div class="timelineleft-item">
							<span class="time"><i class="fa fa-clock-o text-danger"></i> 2 days ago</span>
							<h3 class="timelineleft-header"><a href="javascript:void(0);">Mina Lee</a> uploaded new photos</h3>
							<div class="timelineleft-body">
								<img src="{{asset('assets/images/photos/5.jpg')}}" alt="..." class="margin mt-2 mb-2">
								<img src="{{asset('assets/images/photos/7.jpg')}}" alt="..." class="margin mt-2 mb-2 ">
							</div>
						</div>
					</li>
					<li>
						<i class="fa fa-envelope bg-primary"></i>
						<div class="timelineleft-item">
							<span class="time"><i class="fa fa-clock-o text-danger"></i> 12:05</span>
							<h3 class="timelineleft-header"><a href="javascript:void(0);">Support Team</a> <span>sent you an email</span></h3>
							<div class="timelineleft-body">
								Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
								weebly ning heekya handango imeem plugg dopplr jibjab, movity
								jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
								quora plaxo ideeli hulu weebly balihoo...
							</div>
							<div class="timelineleft-footer">
								<a class="btn btn-success text-white btn-sm">Read more</a>
								<a class="btn btn-danger text-white btn-sm ">Delete</a>
							</div>
						</div>
					</li>
					<li>
						<i class="fa fa-user bg-secondary"></i>
						<div class="timelineleft-item">
							<span class="time"><i class="fa fa-clock-o text-danger"></i> 5 mins ago</span>
							<h3 class="timelineleft-header no-border"><a href="javascript:void(0);">Sarah Young</a> accepted your friright request</h3>
						</div>
					</li>
					<li>
						<i class="fa fa-comments bg-warning"></i>
						<div class="timelineleft-item">
							<span class="time"><i class="fa fa-clock-o text-danger"></i> 27 mins ago</span>
							<h3 class="timelineleft-header"><a href="javascript:void(0);">Jay White</a> commented on your post</h3>
							<div class="timelineleft-body">
								Take me to your leader!
								Switzerland is small and neutral!
								We are more like Germany, ambitious and misunderstood!
							</div>
							<div class="timelineleft-footer">
								<a class="btn btn-info text-white btn-flat btn-sm">View comment</a>
							</div>
						</div>
					</li>
					<li class="timeleft-label">
						<span class="bg-purple"> 3 Jan. 2014</span>
					</li>
					<li>
						<i class="fa fa-camera bg-orange"></i>
						<div class="timelineleft-item">
							<span class="time"><i class="fa fa-clock-o text-danger"></i> 2 days ago</span>
							<h3 class="timelineleft-header"><a href="javascript:void(0);">Mina Lee</a> uploaded new photos</h3>
							<div class="timelineleft-body">
								<img src="{{asset('assets/images/photos/1.jpg')}}" alt="..." class="margin mt-2 mb-2">
								<img src="{{asset('assets/images/photos/2.jpg')}}" alt="..." class="margin mt-2 mb-2 ">
								<img src="{{asset('assets/images/photos/3.jpg')}}" alt="..." class="margin mt-2 mb-2 ">
								<img src="{{asset('assets/images/photos/4.jpg')}}" alt="..." class="margin mt-2 mb-2">
							</div>
						</div>
					</li>
					<li>
						<i class="fa fa-clock-o bg-success pb-3"></i>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>


@endsection('content')

@section('scripts')



<!-- INTERNAL Select2 js -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<!-- <script src="{{asset('assets/js/select2.js')}}"></script> -->

<script src="{{asset('assets/js/activityLogs/activityLogs.js')}}"></script>

@endsection