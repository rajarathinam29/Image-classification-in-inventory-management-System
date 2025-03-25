		<!-- Jquery js-->
		<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
		<script>var baseUrl = "{{url('')}}";</script>

		<!-- Bootstrap5 js-->
		<script src="{{asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--Othercharts js-->
		<script src="{{asset('assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

		<!-- Circle-progress js-->
		<script src="{{asset('assets/plugins/circle-progress/circle-progress.min.js')}}"></script>

		<!-- Jquery-rating js-->
		<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!-- Show Password -->
		<script src="{{asset('assets/plugins/bootstrap-show-password/bootstrap-show-password.min.js')}}"></script>

		<!-- INTERNAL Notifications js -->
		<script src="{{asset('assets/plugins/notify/js/rainbow.js')}}"></script>
		<script src="{{asset('assets/plugins/notify/js/jquery.growl.js')}}"></script>
		<script src="{{asset('assets/plugins/notify/js/notifIt.js')}}"></script>

		@yield('scripts')

		<!-- Custom js-->
		<script src="{{asset('assets/js/custom.js')}}"></script>