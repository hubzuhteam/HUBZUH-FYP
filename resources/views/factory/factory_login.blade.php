<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Sign In</title>
    <style>
        #loader {
            transition: all .3s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 90000
        }
        
        #loader.fadeOut {
            opacity: 0;
            visibility: hidden
        }
        
        .spinner {
            width: 40px;
            height: 40px;
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            background-color: #333;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1s infinite ease-in-out;
            animation: sk-scaleout 1s infinite ease-in-out
        }
        
        @-webkit-keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                opacity: 0
            }
        }
        
        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0
            }
        }
    </style>
    <link href="style.css" rel="stylesheet">
</head>

<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script>
        window.addEventListener('load', function load() {
            const loader = document.getElementById('loader');
            setTimeout(function() { loader.classList.add('fadeOut');
            }, 300);
        });
    </script>
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image:url(assets/static/images/pexels-photo-298863.jpeg)">
            {{--  <div class="pos-a centerXY">
                <div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px"><img class="pos-a centerXY" src="assets/static/images/logo.jpeg" alt=""></div>
            </div>  --}}
        </div>
        <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
                {{--  <img class="fw-300 c-grey-900 mB-40" src="assets/static/images/logo.jpeg"></img>  --}}
            <h1><strong>HUBZUH</strong></h1>
            <h4 class="fw-300 c-grey-900 mB-40">Factory Login</h4>
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
                <form action="{{url('/factory-login')}}" method="POST" class="margin-bottom-0">{{ csrf_field() }}            
                <div class="form-group">
                    <label class="text-normal text-dark">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Your Email">
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="peers ai-c jc-sb fxw-nw">
                        <div class="peer">
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                                <label for="inputCall1" class="peers peer-greed js-sb ai-c"><span class="peer peer-greed">Remember Me</span></label>
                            </div>
                        </div>
                        <div class="peer">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </div>
                <div class="m-t-20">
                        Not a member yet? Click <a href="{{ url('/factory/register')}}">here</a> to register.
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="vendor.js"></script>
    <script type="text/javascript" src="bundle.js"></script>
</body>

</html>