<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="author" />
    <meta content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons" name="description" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons" />
    <meta property="og:description" content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons" />
    <meta property="og:image" content="../../cdn.dribbble.com/users/180706/screenshots/5424805/the_sceens_-_mobile_perspective_mockup_3_-_by_tranmautritam.jpg" />
    <meta property="og:site_name" content="atlas " />
    <title>HUBZUH Factory Login</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
    <link rel="icon" href="assets/img/logo.png" type="image/png" sizes="16x16">
    <link rel='stylesheet' href='../factory/d33wubrfki0l68.cloudfront.net/css/478ccdc1892151837f9e7163badb055b8a1833a5/crisp/assets/vendor/pace/pace.css' />
    <script src='../factory/d33wubrfki0l68.cloudfront.net/js/3d1965f9e8e63c62b671967aafcad6603deec90c/js/pace.min.js'></script>
    <!--vendors-->
    <link rel='stylesheet' type='text/css' href='../factory/d33wubrfki0l68.cloudfront.net/bundles/291bbeead57f19651f311362abe809b67adc3fb5.css' />

    <link rel='stylesheet' href='../factory/d33wubrfki0l68.cloudfront.net/bundles/30bc673ce76f73ecf02568498f6b139269f6e4c7.css' />

    <link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600" rel="stylesheet">
    <link rel='stylesheet' href='../factory/d33wubrfki0l68.cloudfront.net/css/04cc97dcdd1c8f6e5b9420845f0fac26b54dab84/default/assets/fonts/jost/jost.css' />
    <!--Material Icons-->
    <link rel='stylesheet' type='text/css' href='../factory/d33wubrfki0l68.cloudfront.net/css/548117a22d5d22545a0ab2dddf8940a2e32c04ed/default/assets/fonts/materialdesignicons/materialdesignicons.min.css' />
    <!--Bootstrap + Admin CSS-->
    <link rel='stylesheet' type='text/css' href='../factory/d33wubrfki0l68.cloudfront.net/css/ed18bd005cf8b05f329fad0688d122e0515499ff/default/assets/css/atmos.min.css' />
    <!-- Additional library for page -->

</head>

<body class="jumbo-page">
    <main class="admin-main">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-4  bg-white">
                    <div class="row align-items-center m-h-100">
                        <div class="mx-auto col-md-8">
                            <div class="p-b-20 text-center">
                                <p>
                                    <img src="{{asset('/images/logo1.jpeg')}}" width="190" height="60" alt="">
                                </p>
                                <p class="admin-brand-content">
                                    HUBZUH Factory Site
                                </p>
                            </div>
                            <h3 class="text-center p-b-20 fw-400">Login</h3>
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
                            <form class="needs-validation" action="{{url('/factory-login')}}" method="POST" >{{ csrf_field() }}
                                <div class="form-row">
                                    <div class="form-group floating-label col-md-12">
                                        <label>Email</label>
                                        <input type="email" name="email" required class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group floating-label col-md-12">
                                        <label>Password</label>
                                        <input type="password" name="password" required class="form-control ">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>

                            </form>
                            <p class="text-right p-t-10">
                                    <a href="{{ url('factory/forgetpassword') }}"class="text-underline" >Forgot Password?</a>
                                    </p>
                            <p class="text-right p-t-10">
                            <a href="{{ url('/factory/register')}}" class="text-underline">Want to Join? Sign Up Here.</a>
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 d-none d-md-block bg-cover" style="background-image: url('assets/static/images/yarn.jpg');">

                </div>
            </div>
        </div>
    </main>

    <div class="modal modal-slide-left  fade" id="siteSearchModal" tabindex="-1" role="dialog" aria-labelledby="siteSearchModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body p-all-0" id="site-search">
                    <button type="button" class="close light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <div class="form-dark bg-dark text-white p-t-60 p-b-20 bg-dots">
                        <h3 class="text-uppercase    text-center  fw-300 "> Search</h3>

                        <div class="container-fluid">
                            <div class="col-md-10 p-t-10 m-auto">
                                <input type="search" placeholder="Search Something" class=" search form-control form-control-lg">

                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="bg-dark text-muted container-fluid p-b-10 text-center text-overline">
                            results
                        </div>
                        <div class="list-group list  ">


                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm "><img class="avatar-img rounded-circle" src="assets/img/users/user-3.jpg" alt="user-image"></div>
                                </div>
                                <div class="">
                                    <div class="name">Eric Chen</div>
                                    <div class="text-muted">Developer</div>
                                </div>


                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm "><img class="avatar-img rounded-circle" src="assets/img/users/user-4.jpg" alt="user-image"></div>
                                </div>
                                <div class="">
                                    <div class="name">Sean Valdez</div>
                                    <div class="text-muted">Marketing</div>
                                </div>


                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm "><img class="avatar-img rounded-circle" src="assets/img/users/user-8.jpg" alt="user-image"></div>
                                </div>
                                <div class="">
                                    <div class="name">Marie Arnold</div>
                                    <div class="text-muted">Developer</div>
                                </div>


                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm ">
                                        <div class="avatar-title bg-dark rounded"><i class="mdi mdi-24px mdi-file-pdf"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="name">SRS Document</div>
                                    <div class="text-muted">25.5 Mb</div>
                                </div>


                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm ">
                                        <div class="avatar-title bg-dark rounded"><i class="mdi mdi-24px mdi-file-document-box"></i></div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="name">Design Guide.pdf</div>
                                    <div class="text-muted">9 Mb</div>
                                </div>


                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm ">
                                        <div class="avatar avatar-sm  ">
                                            <div class="avatar-title bg-primary rounded"><i class="mdi mdi-24px mdi-code-braces"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="name">response.json</div>
                                    <div class="text-muted">15 Kb</div>
                                </div>


                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm ">
                                        <div class="avatar avatar-sm ">
                                            <div class="avatar-title bg-info rounded"><i class="mdi mdi-24px mdi-file-excel"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="name">June Accounts.xls</div>
                                    <div class="text-muted">6 Mb</div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src='../factory/d33wubrfki0l68.cloudfront.net/bundles/9556cd6744b0b19628598270bd385082cda6a269.js'></script>

</body>

</html>
