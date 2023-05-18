<!doctype html>
<html lang="en">

<!-- 01_02_home_2.html  [XR&CO'2014], Tue, 22 Oct 2019 11:54:23 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title") - Medicare</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon1.png')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/plugin/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/bootstrap/css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/poppins/poppins.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/process-bar/tox-progress.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/owl-carouse/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/owl-carouse/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/animsition/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/mediaelement/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/datetimepicker/bootstrap-datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/datetimepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/lightgallery/lightgallery.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Cairo', sans-serif">

	@include('frontend.body.header')

        <div id="main-content" class="site-main-content">

            @yield('frontend')

        </div>

        @include('frontend.body.footer')
    </div>
</div>
<script src="{{ asset('frontend/plugin/jquery/jquery-2.0.2.min.js')}}"></script>
<script src="{{ asset('frontend/plugin/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{ asset('frontend/plugin/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ asset('frontend/plugin/process-bar/tox-progress.js')}}"></script>
<script src="{{ asset('frontend/plugin/waypoint/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('frontend/plugin/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{ asset('frontend/plugin/owl-carouse/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/plugin/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{ asset('frontend/plugin/mediaelement/mediaelement-and-player.js')}}"></script>
<script src="{{ asset('frontend/plugin/masonry/masonry.pkgd.min.js')}}"></script>
<script src="{{ asset('frontend/plugin/datetimepicker/moment.min.js')}}"></script>
<script src="{{ asset('frontend/plugin/datetimepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('frontend/plugin/datetimepicker/bootstrap-datepicker.tr.min.js')}}"></script>
<script src="{{ asset('frontend/plugin/datetimepicker/bootstrap-datetimepicker.js')}}"></script>
<script src="{{ asset('frontend/plugin/datetimepicker/bootstrap-datetimepicker.fr.js')}}"></script>

<script src="{{ asset('frontend/plugin/lightgallery/picturefill.min.js')}}"></script>
<script src="{{ asset('frontend/plugin/lightgallery/lightgallery.js')}}"></script>
<script src="{{ asset('frontend/plugin/lightgallery/lg-pager.js')}}"></script>
<script src="{{ asset('frontend/plugin/lightgallery/lg-autoplay.js')}}"></script>
<script src="{{ asset('frontend/plugin/lightgallery/lg-fullscreen.js')}}"></script>
<script src="{{ asset('frontend/plugin/lightgallery/lg-zoom.js')}}"></script>
<script src="{{ asset('frontend/plugin/lightgallery/lg-hash.js')}}"></script>
<script src="{{ asset('frontend/plugin/lightgallery/lg-share.js')}}"></script>
<script src="{{ asset('frontend/plugin/sticky/jquery.sticky.js')}}"></script>

<script src="{{ asset('frontend/js/main.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script>
 		@if(Session::has('message'))
 		var type = "{{ Session::get('alert-type','info') }}"
 		switch(type){
    			case 'info':
    			toastr.info(" {{ Session::get('message') }} ");
    			break;

    			case 'success':
    			toastr.success(" {{ Session::get('message') }} ");
    			break;

    			case 'warning':
    			toastr.warning(" {{ Session::get('message') }} ");
    			break;

    			case 'error':
    			toastr.error(" {{ Session::get('message') }} ");
    			break; 
 			}
 		@endif 
	</script>
</body>

<!-- 01_02_home_2.html  [XR&CO'2014], Tue, 22 Oct 2019 11:54:52 GMT -->
</html>