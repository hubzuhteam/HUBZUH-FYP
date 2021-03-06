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
	    <div class="login-cover-image" style="background-image: url({{ asset('images/supplierend_images/login-bg/login-bg-17.jpg')}})" data-id="login-cover-image"></div>
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
                <form action="{{url('/supplier/forgetpassword')}}" method="POST" class="margin-bottom-0">{{ csrf_field() }}
                    <div class="form-group m-b-20">
                        <input id="email" name="email" type="text" class="form-control form-control-lg" placeholder="Email Address" required />
                    </div>
               
                    <div class="checkbox checkbox-css m-b-20">
                        <input type="checkbox" id="remember_checkbox" />
                        <label for="remember_checkbox">
                        	Remember Me
                        </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
                    </div>
                    <div class="m-t-20">
                        Not a member yet? Click <a href="{{ url('/supplier/register')}}">here</a> to register.
                    </div>
                    <p class="text-right p-t-10">
                        <a href="{{ url('/supplier/dashboard') }}"class="text-underline" >Do you want to login again?</a>
                        </p> 
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end login -->

        <ul class="login-bg-list clearfix">
            <li class="active"><a href="javascript:;" data-click="change-bg" data-img="{{ asset('images/supplierend_images/login-bg/login-bg-17.jpg')}}" style="background-image: url({{ asset('images/supplierend_images/login-bg/login-bg-17.jpg)')}}"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="{{ asset('images/supplierend_images/sample/img-3.jpg')}}" style="background-image: url({{ asset('images/supplierend_images/sample/img-3.jpg)')}}"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="{{ asset('images/supplierend_images/login-bg/login-bg-15.jpg')}}" style="background-image: url({{ asset('images/supplierend_images/login-bg/login-bg-15.jpg)')}}"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="{{ asset('images/supplierend_images/login-bg/login-bg-14.jpg')}}" style="background-image: url({{ asset('images/supplierend_images/login-bg/login-bg-14.jpg)')}}"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="{{ asset('images/supplierend_images/login-bg/login-bg-13.jpg')}}" style="background-image: url({{ asset('images/supplierend_images/login-bg/login-bg-13.jpg)')}}"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="{{ asset('images/supplierend_images/login-bg/login-bg-12.jpg')}}" style="background-image: url({{ asset('images/supplierend_images/login-bg/login-bg-12.jpg)')}}"></a></li>
        </ul>

        <!-- begin theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-theme-file="{{ asset('css/supplierend_css/default/theme/default.css')}}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="{{ asset('css/supplierend_css/default/theme/red.css')}}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="{{ asset('css/supplierend_css/default/theme/blue.css')}}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="{{ asset('css/supplierend_css/default/theme/purple.css')}}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="{{ asset('css/supplierend_css/default/theme/orange.css')}}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="{{ asset('css/supplierend_css/default/theme/black.css')}}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                        <select name="header-styling" class="form-control form-control-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                        <select name="header-fixed" class="form-control form-control-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                    <div class="col-md-7">
                        <select name="sidebar-styling" class="form-control form-control-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                        <select name="sidebar-fixed" class="form-control form-control-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                    <div class="col-md-7">
                        <select name="content-gradient" class="form-control form-control-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Content Styling</div>
                    <div class="col-md-7">
                        <select name="content-styling" class="form-control form-control-sm">
                            <option value="1">default</option>
                            <option value="2">black</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a href="javascript:;" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage">Reset Local Storage</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end theme-panel -->
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

	<script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();
		});
	</script>
</body>
</html>