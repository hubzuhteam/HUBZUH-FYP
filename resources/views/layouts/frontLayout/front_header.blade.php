<?php
use App\Http\Controllers\Controller;
use App\Product;
$mainCategories =  Controller::mainCategories();
$cartCount = Product::cartCount();
$wishlistCount = Product::wishlistCount();
?>

<header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +92 3249612543</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> hubzuhteam@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle" >
            <!--header-middle-->
            <div class="container">
                <div class="row" style="border:none;">
{{--                    style="border:2px solid black;"--}}
                    <div class="col-sm-2" >
                        <div class="lo" height="100px"  width="100px">
                        <a href="{{ asset('/')}}"><img height="40px"  width="120px" src="{{asset('/images/logo1.jpeg')}}" alt="" /></a>
                        </div>
                        {{-- <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-sm-4" >
                        <form action="{{ url('/search-products') }}" method="post">{{ csrf_field() }}
                            <div class="search" style="align-content: center">
                                <input id="search" name="search" type="text" class="searchTerm" name="product" placeholder="Search by Name, Code, Color, Description">
                                <button type="submit" class="searchButton">
                                    <i class="fa fa-search"></i>
                                </button>

                            </div>
                        </form>

                    </div>
                    <div class="col-sm-6" >

                        <div class="shop-menu pull-right">


                            <ul class="nav navbar-nav">
                            <li><a href="{{url('/wishlist')}}"><i class="fa fa-star">
                                </i> Wishlist ({{$wishlistCount}})</a></li>
                            <li><a href="{{url('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="{{url('/cart')}}"> <i class="fa fa-shopping-cart">
                                </i> Cart ({{$cartCount}})</a></li>
                            @if (empty(Auth::check()))
                                 <li><a href="{{url('/login-register')}}"><i class="fa fa-lock"></i> Sign In/Sign Up</a></li>
                            @else
                                <li><a href="{{url('/account')}}"><i class="fa fa-user">
                                    </i> Account</a></li>
                                <li><a href="{{url('/chats')}}"><i class="fa fa-fax">
                                    </i> Chats</a></li>
                                  <li><a href="{{url('/user-logout')}}"><i class="fa fa-sign-out">
                                      </i> Logout</a></li>
                            @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom" style=" padding:2px; ">
            <!--header-bottom-->
            <div class="container"  >
                <div class="row"   >
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{asset('/')}}" class="active">Home</a></li>
                                <li class="dropdown"><a>Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach ($mainCategories as $cat)
                                        @if ($cat->status=="1")
                                           <li><a href="{{ asset('products/'.$cat->url)}}">{{$cat->name}}</a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>
                                {{-- <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> --}}
                                {{-- <li><a href="404.html">404</a></li> --}}
                            <li><a href="{{ url('page/contact')}}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-sm-3">
                            <form action="{{ url('/search-products') }}" method="post">{{ csrf_field() }}
								<input style="border:0px; height:33px; margin-left:-3px" type="text" placeholder="Search Product" name="product" />
								<button type="submit" style="border:0px; height:33px; margin-left:-3px">Go</button>
							</form>
                    </div > --}}




                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->
