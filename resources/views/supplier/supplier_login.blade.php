<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>HUBZUH | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{ asset('plugins/supplierend_plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('plugins/supplierend_plugins/bootstrap/4.0.0/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('plugins/supplierend_plugins/font-awesome/5.0/css/fontawesome-all.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('plugins/supplierend_plugins/animate/animate.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('css/supplierend_css/default/style.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('css/supplierend_css/default/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('css/supplierend_css/default/theme/default.css')}}" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('plugins/supplierend_plugins/pace/pace.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<div class="login-cover">
	    <div class="login-cover-image" style="background-image: url({{ asset('images/supplierend_images/sample/pexels-photo-298863.jpeg')}})" data-id="login-cover-image"></div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                    @if(Session::has('flash_message_error'))
                    <div class="alert alert-block alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{!! session('flash_message_error') !!}</strong>
                </div>
                @endif
                @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>{!! session('flash_message_success') !!}</strong>
                  </div>
                @endif
                <div class="brand">
                    <span class="logo"></span> <b>HUBZUH</b> Supplier
                    <small>A hub you need for your business</small>
                </div>
                {{-- <div class="icon">
                    <i class="fa fa-lock"></i>
                </div> --}}
            </div>
            <!-- end brand -->
            <!-- begin login-content -->
            <div class="login-content">
                <form action="{{url('/supplier-login')}}" method="POST" class="margin-bottom-0">{{ csrf_field() }}
                    <div class="form-group m-b-20">
                        <input id="email" name="email" type="text" class="form-control form-control-lg" placeholder="Email Address" required />
                    </div>
                    <div class="form-group m-b-20">
                        <input id="password" name="password" type="password" class="form-control form-control-lg" placeholder="Password" required />
                    </div>
                    <div class="checkbox checkbox-css m-b-20">
                        <input type="checkbox" id="remember_checkbox" />
                        <label for="remember_checkbox">
                        	Remember Me
                        </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
                    </div>
                    <div class="m-t-20">
                        Not a member yet? Click <a href="{{ url('/supplier/register')}}">here</a> to register.
                    </div>
                    <p class="text-right p-t-10">
                            <a href="{{ url('/supplier/forgetpassword') }}"class="text-underline" >Forgot Password?</a>
                            </p>
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end login -->

        <ul class="login-bg-list clearfix">
            <li class="active"><a href="javascript:;" data-click="change-bg" data-img="{{ asset('images/supplierend_images/sample/pexels-photo-298863.jpeg')}}" style="background-image: url({{ asset('images/supplierend_images/sample/pexels-photo-298863.jpeg)')}}"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="{{ asset('images/supplierend_images/sample/img-3.jpg')}}" style="background-image: url({{ asset('images/supplierend_images/sample/img-3.jpg)')}}"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="{{ asset('images/supplierend_images/sample/pexels-photo-322207.jpeg')}}" style="background-image: url({{ asset('images/supplierend_images/sample/pexels-photo-322207.jpeg)')}}"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="{{ asset('images/supplierend_images/sample/photo-1441984904996-e0b6ba687e04.jpg')}}" style="background-image: url({{ asset('images/supplierend_images/sample/photo-1441984904996-e0b6ba687e04.jpg)')}}"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="{{ asset('images/supplierend_images/sample/img-2.jpg')}}" style="background-image: url({{ asset('images/supplierend_images/sample/img-2.jpg)')}}"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="{{ asset('images/supplierend_images/sample/Camerinageking001-650x600.jpg')}}" style="background-image: url({{ asset('images/supplierend_images/sample/Camerinageking001-650x600.jpg)')}}"></a></li>
        </ul>


	</div>
	<!-- end page container -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('plugins/supplierend_plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}"></script>
	<!--[if lt IE 9]>
		<script src="../assets/crossbrowserjs/html5shiv.js"></script>
		<script src="../assets/crossbrowserjs/respond.min.js"></script>
		<script src="../assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="{{ asset('plugins/supplierend_plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{ asset('plugins/supplierend_plugins/js-cookie/js.cookie.js')}}"></script>
	<script src="{{ asset('js/supplierend_js/theme/default.min.js')}}"></script>
	<script src="{{ asset('js/supplierend_js/apps.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('js/supplierend_js/demo/login-v2.demo.min.js')}}"></script>

	<!-- ================== END PAGE LEVEL JS ================== -->
s
	<script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();
		});
	</script>
</body>
</html>
