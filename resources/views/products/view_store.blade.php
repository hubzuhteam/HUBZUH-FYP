{{--  @extends('layouts.frontLayout.front_design')
@section('content')  --}}
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Store Profile</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{ asset('plugins/supplierend_plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/supplierend_plugins/animate/animate.min.css')}}" rel="stylesheet'" />
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

	<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
	<link href="{{ asset('plugins/supplierend_plugins/superbox/css/superbox.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('plugins/supplierend_plugins/lity/dist/lity.min.css')}}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL CSS STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('plugins/supplierend_plugins/pace/pace.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<link href="{{ asset('plugins/supplierend_plugins/bootstrap/4.0.0/css/bootstrap.min.css') }}" rel="stylesheet" />

        {{--  $('head').append('<link rel="stylesheet"  href="{{ asset('plugins/supplierend_plugins/bootstrap/4.0.0/css/bootstrap.min.css') }}">');  --}}
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Color</b> Admin</a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->

			<!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				<li>
					<form class="navbar-form">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter keyword" />
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</li>
				<li class="dropdown">
					<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-bell"></i>
						<span class="label">5</span>
					</a>
					<ul class="dropdown-menu media-list dropdown-menu-right">
						<li class="dropdown-header">NOTIFICATIONS (5)</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-bug media-object bg-silver-darker"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
									<div class="text-muted f-s-11">3 minutes ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<img src="../assets/img/user/user-1.jpg" class="media-object" alt="" />
									<i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">John Smith</h6>
									<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
									<div class="text-muted f-s-11">25 minutes ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<img src="../assets/img/user/user-2.jpg" class="media-object" alt="" />
									<i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">Olivia</h6>
									<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
									<div class="text-muted f-s-11">35 minutes ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-plus media-object bg-silver-darker"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading"> New User Registered</h6>
									<div class="text-muted f-s-11">1 hour ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-envelope media-object bg-silver-darker"></i>
									<i class="fab fa-google text-warning media-object-icon f-s-14"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading"> New Email From John</h6>
									<div class="text-muted f-s-11">2 hour ago</div>
								</div>
							</a>
						</li>
						<li class="dropdown-footer text-center">
							<a href="javascript:;">View more</a>
						</li>
					</ul>
				</li>
				<li class="dropdown navbar-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<img src="../assets/img/user/user-13.jpg" alt="" />
						<span class="d-none d-md-inline">Adam Schwartz</span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div>
						<a href="javascript:;" class="dropdown-item">Log Out</a>
					</div>
				</li>
			</ul>
			<!-- end header navigation right -->
		</div>
		<!-- end #header -->

		<!-- begin #content -->
		<div id="content" class="content content-full-width">
			<!-- begin profile -->
			<div class="profile">
				<div class="profile-header">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						<!-- BEGIN profile-header-img -->
						<div class="profile-header-img">
							<img src="../assets/img/user/user-13.jpg" alt="">
						</div>
						<!-- END profile-header-img -->
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5">Sean Ngu</h4>
							<p class="m-b-10">UXUI + Frontend Developer</p>
							<a href="#" class="btn btn-xs btn-yellow">Edit Profile</a>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item"><a href="#profile-post" class="nav-link active" data-toggle="tab">POSTS</a></li>
						<li class="nav-item"><a href="#profile-about" class="nav-link" data-toggle="tab">ABOUT</a></li>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<!-- end profile -->
			<!-- begin profile-content -->
            <div class="profile-content">
            	<!-- begin tab-content -->
            	<div class="tab-content p-0">
            		<!-- begin #profile-about tab -->
            		<div class="tab-pane fade in" id="profile-about">
						<!-- begin table -->
						<div class="table-responsive">
							<table class="table table-profile">
								<thead>
									<tr>
										<th></th>
										<th>
											<h4>Micheal	Meyer <small>Lorraine Stokes</small></h4>
										</th>
									</tr>
								</thead>
								<tbody>
									<tr class="highlight">
										<td class="field">Mood</td>
										<td><a href="javascript:;">Add Mood Message</a></td>
									</tr>
									<tr class="divider">
										<td colspan="2"></td>
									</tr>
									<tr>
										<td class="field">Mobile</td>
										<td><i class="fa fa-mobile fa-lg m-r-5"></i> +1-(847)- 367-8924 <a href="javascript:;" class="m-l-5">Edit</a></td>
									</tr>
									<tr>
										<td class="field">Home</td>
										<td><a href="javascript:;">Add Number</a></td>
									</tr>
									<tr>
										<td class="field">Office</td>
										<td><a href="javascript:;">Add Number</a></td>
									</tr>
									<tr class="divider">
										<td colspan="2"></td>
									</tr>
									<tr class="highlight">
										<td class="field">About Me</td>
										<td><a href="javascript:;">Add Description</a></td>
									</tr>
									<tr class="divider">
										<td colspan="2"></td>
									</tr>
									<tr>
										<td class="field">Country/Region</td>
										<td>
											<select class="form-control input-inline input-xs" name="region">
												<option value="US" selected>United State</option>
												<option value="AF">Afghanistan</option>
												<option value="AL">Albania</option>
												<option value="DZ">Algeria</option>
												<option value="AS">American Samoa</option>
												<option value="AD">Andorra</option>
												<option value="AO">Angola</option>
												<option value="AI">Anguilla</option>
												<option value="AQ">Antarctica</option>
												<option value="AG">Antigua and Barbuda</option>
											</select>
										</td>
									</tr>
									<tr>
										<td class="field">City</td>
										<td>Los Angeles</td>
									</tr>
									<tr>
										<td class="field">State</td>
										<td><a href="javascript:;">Add State</a></td>
									</tr>
									<tr>
										<td class="field">Website</td>
										<td><a href="javascript:;">Add Webpage</a></td>
									</tr>
									<tr>
										<td class="field">Gender</td>
										<td>
											<select class="form-control input-inline input-xs" name="gender">
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</td>
									</tr>
									<tr>
										<td class="field">Birthdate</td>
										<td>
											<select class="form-control input-inline input-xs" name="day">
												<option value="04" selected>04</option>
											</select>
											-
											<select class="form-control input-inline input-xs" name="month">
												<option value="11" selected>11</option>
											</select>
											-
											<select class="form-control input-inline input-xs" name="year">
												<option value="1989" selected>1989</option>
											</select>
										</td>
									</tr>
									<tr>
										<td class="field">Language</td>
										<td>
											<select class="form-control input-inline input-xs" name="language">
												<option value="" selected>English</option>
											</select>
										</td>
									</tr>
									<tr class="divider">
										<td colspan="2"></td>
									</tr>
									<tr class="highlight">
										<td class="field">&nbsp;</td>
										<td class="p-t-10 p-b-10">
											<button type="submit" class="btn btn-primary width-150">Update</button>
											<button type="submit" class="btn btn-white btn-white-without-border width-150 m-l-5">Cancel</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- end table -->
					</div>
            		<!-- end #profile-about tab -->
				</div>
            	<!-- end tab-content -->
            </div>
			<!-- end profile-content -->
		</div>
		<!-- end #content -->

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

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

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

	<script>
		$(document).ready(function() {
			App.init();
			Profile.init();
		});
	</script>
</body>
</html>

{{--  @endsection  --}}
