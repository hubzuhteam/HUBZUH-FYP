<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>HUBZUH | Supplier Dashboard</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{ asset('plugins/supplierend_plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/supplierend_plugins/bootstrap/4.0.0/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/supplierend_plugins/font-awesome/5.0/css/fontawesome-all.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/supplierend_plugins/animate/animate.min.css" rel="stylesheet') }}" />
	<link href="{{ asset('css/supplierend_css/default/style.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/supplierend_css/default/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/supplierend_css/default/theme/default.css') }}" rel="stylesheet" id="theme" />
    {{--  for table  --}}
    <link href="{{ asset('plugins/supplierend_plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('plugins/supplierend_plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
    <script src="{{ asset('plugins/supplierend_plugins/pace/pace.min.js')}}"></script>

    {{-- calendar datepicker --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{ asset('plugins/supplierend_plugins/jquery-jvectormap/jquery-jvectormap.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/supplierend_plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('plugins/supplierend_plugins/gritter/css/jquery.gritter.css" rel="') }}" /> --}}
	<link href="{{ asset('plugins/supplierend_plugins/jquery-smart-wizard/src/css/smart_wizard.css') }}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('/plugins/supplierend_plugins/pace/pace.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>

        @include('layouts.supplierLayout.supplier_header')

        @include('layouts.supplierLayout.supplier_sidebar')

        @yield('content');

        @include('layouts.supplierLayout.supplier_footer')

	<!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('plugins/supplierend_plugins/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js') }}"></script>
	<!--[if lt IE 9]>
		<script src="../assets/crossbrowserjs/html5shiv.js"></script>
		<script src="../assets/crossbrowserjs/respond.min.js"></script>
		<script src="../assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="{{ asset('plugins/supplierend_plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/js-cookie/js.cookie.js') }}"></script>
	<script src="{{ asset('js/supplierend_js/theme/default.min.js') }}"></script>
	<script src="{{ asset('js/supplierend_js/apps.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	{{-- <script src="{{ asset('plugins/supplierend_plugins/gritter/js/jquery.gritter.js') }}"></script> --}}
	<script src="{{ asset('plugins/supplierend_plugins/flot/jquery.flot.min.js') }}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/flot/jquery.flot.time.min.js') }}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/flot/jquery.flot.resize.min.js') }}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/flot/jquery.flot.pie.min.js') }}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/sparkline/jquery.sparkline.js') }}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/jquery-jvectormap/jquery-jvectormap.min.js') }}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/supplierend_js/demo/dashboard.min.js')}}"></script>
    <script src="{{ asset('js/supplier_js/matrix.form_validation.js') }}"></script>

    {{--  for supplier view categories  --}}
    <script src="{{ asset('plugins/supplierend_plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('js/supplierend_js/demo/table-manage-default.demo.min.js')}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

    {{-- Datepicker Calendar --}}
    {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
    <script>
        $(function(){
            $("#dob_date").datepicker({
            	dateFormat: 'yy-mm-dd'
            });
        });
    </script>
	<script>
		$(document).ready(function() {
			App.init();
			Dashboard.init();
		});
    </script>
    <script>
            $(document).ready(function() {
                App.init();
                TableManageDefault.init();
            });
    </script>
</body>
</html>
