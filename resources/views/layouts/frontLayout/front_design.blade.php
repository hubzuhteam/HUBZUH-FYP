<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(!empty($meta_title)){{ $meta_title }} @else Home | E-Shopper @endif</title>
    @if(!empty($meta_description))<meta name="description" content="{{ $meta_description }}">@endif
    @if(!empty($meta_keywords))<meta name="keywords" content="{{ $meta_keywords }}">@endif


    <link href="{{ asset('css/frontend_css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/easyzoom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/passtrength.css') }}" rel="stylesheet">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('plugins/supplierend_plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/supplierend_plugins/animate/animate.min.css" rel="stylesheet') }}" />
	<link href="{{ asset('css/supplierend_css/default/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/supplierend_css/default/theme/default.css') }}" rel="stylesheet" id="theme" />
        
    {{--  for table  --}}
    <link href="{{ asset('plugins/supplierend_plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('plugins/supplierend_plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
    <script src="{{ asset('plugins/supplierend_plugins/pace/pace.min.js')}}"></script>
    {{-- calendar datepicker --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
	<link href="{{ asset('plugins/supplierend_plugins/superbox/css/superbox.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('plugins/supplierend_plugins/lity/dist/lity.min.css')}}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->
    
	<!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('plugins/supplierend_plugins/pace/pace.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    {{-- {{ asset('images/frontend_images/') }} --}}

    <link rel="shortcut icon" href="{{ asset('images/frontend_images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/frontend_images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/frontend_images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/frontend_images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/frontend_images/ico/apple-touch-icon-57-precomposed.png') }}">
</head>
<!--/head-->

<body>

    @include('layouts.frontLayout.front_header')

    @yield('content')

    @include('layouts.frontLayout.front_footer')

    <script src="{{ asset('js/frontend_js/jquery.js') }}"></script>
    <script src="{{ asset('js/frontend_js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/frontend_js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/frontend_js/price-range.js') }}"></script>
    <script src="{{ asset('js/frontend_js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/frontend_js/main.js') }}"></script>
    <script src="{{ asset('js/frontend_js/easyzoom.js') }}"></script>
    <script src="{{ asset('js/frontend_js/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/frontend_js/passtrength.js') }}"></script>

    
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('plugins/supplierend_plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}"></script>
	<!--[if lt IE 9]>
		<script src="{{ asset('/crossbrowserjs/supplierend_crossbrowserjs/html5shiv.js')}}"></script>
		<script src="{{ asset('/crossbrowserjs/supplierend_crossbrowserjs/respond.min.js')}}"></script>
		<script src="{{ asset('/crossbrowserjs/supplierend_crossbrowserjs/excanvas.min.js')}}"></script>
	<![endif]-->
	<script src="{{ asset('plugins/supplierend_plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/js-cookie/js.cookie.js')}}"></script>
	<script src="{{ asset('js/supplierend_js/theme/default.min.js')}}"></script>
	<script src="{{ asset('js/supplierend_js/apps.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
	<script src="{{ asset('plugins/supplierend_plugins/superbox/js/jquery.superbox.min.js')}}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/lity/dist/lity.min.js')}}"></script>
	<script src="{{ asset('js/supplierend_js/demo/profile.demo.min.js')}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

</body>

</html>
