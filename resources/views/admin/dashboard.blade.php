{{-- Admin Dashboard --}}
@extends('layouts.adminLayout.admin_design')
@section('content')
<?php
use App\User;
use App\Supplier;
use App\Order;
use App\Factory;
use App\Product;
use App\Review;
$userCount = User::userCount();
$storeCount = Supplier::storeCount();
$orderCount = Order::orderCount();
$pendingOrderCount = Order::pendingOrderCount();
$factoryCount = Factory::factoryCount();

$totalproductCount = Product::totalproductCount();

$earningOrderTotal = Order::earningOrderTotal();
$reviewCount = Review::reviewCount();
?>


<!--main-container-part-->
<div id="content">
        <!--breadcrumbs-->
          <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
          </div>

        <!--End-breadcrumbs-->
        @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
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
        <!--Action boxes-->
        <div class="container-fluid">
            <div class="quick-actions_homepage">
              <ul class="quick-actions">
              <li class="bg_lb"> <a href="{{url('admin/dashboard')}}"> <i class="icon-dashboard"></i>
                <span class="label label-important"></span> My Dashboard </a> </li>

                @if (Session::get('adminDetails')['categories_access']==1)

                <li class="bg_lr"> <a href="{{url('admin/view-categories')}}"><i class="icon-inbox"></i>
                    <span class="label label-success"></span> Categories </a> </li>

                @endif
                @if (Session::get('adminDetails')['products_access']==1)

                <li class="bg_lo"> <a href="{{url('admin/view-products')}}"><i class="icon-inbox"></i>
                    <span class="label label-success"></span> Products </a> </li>

                @endif
                @if (Session::get('adminDetails')['orders_access']==1)

                <li class="bg_ls"> <a href="{{url('admin/view-orders')}}"><i class="icon-inbox"></i>
                    <span class="label label-success"></span> Orders </a> </li>

                @endif
                @if (Session::get('adminDetails')['users_access']==1)

                <li class="bg_db"> <a href="{{url('admin/view-users')}}"><i class="icon-user"></i>
                    <span class="label label-success"></span> Users </a> </li>
                @endif
                <li class="bg_db"> <a href="{{url('admin/view-factories')}}"><i class="icon-user"></i>
                    <span class="label label-success"></span> Factories </a> </li>

                <li class="bg_db"> <a href="{{url('admin/view-suppliers')}}"><i class="icon-user"></i>
                        <span class="label label-success"></span> Suppliers </a> </li>

                <li class="bg_db"> <a href="{{url('admin/view-chats')}}"><i class="icon-inbox"></i>
                    <span class="label label-success"></span> Chats </a> </li>


              </ul>
        </div>
        <!--End-Action boxes-->

        <!--Chart-box-->
            <div class="row-fluid">
              <div class="widget-box">
                <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                  <h5>Site Analytics</h5>
                </div>
                <div class="widget-content" >
                  <div class="row-fluid">
                    <div class="span9" >
                      <ul class="site-stats">
                        <li class="bg_lh" style="background-color: bisque; color: black"><i class="icon-user"></i> <strong>{{ $userCount }}</strong> <small>Total Users</small></li>
                        <li class="bg_lh" style="background-color: cornflowerblue; color: black"><i class="icon-shopping-cart"></i> <strong>{{ $storeCount }}</strong> <small>Total Stores</small></li>
                        <li class="bg_lh" style="background-color: darkgoldenrod; color: black"><i class="icon-list"></i> <strong>{{ $orderCount }}</strong> <small>Total Orders</small></li>
                        <li class="bg_lh" style="background-color: darkseagreen; color: black"><i class="icon-repeat"></i> <strong>{{ $pendingOrderCount }}</strong> <small>Pending Orders</small></li>
                        <li class="bg_lh" style="background-color: indianred; color: black"><i class="icon-building"></i> <strong>{{ $factoryCount }}</strong> <small>Total Factories</small></li>
                        <li class="bg_lh" style="background-color: lightskyblue; color: black"><i class="icon-user"></i> <strong>{{ $totalproductCount }}</strong> <small>Total Products</small></li>
                        <li class="bg_lh" style="background-color: lightskyblue; color: black"><i class="fa fa-dollar"></i> <strong>{{ $earningOrderTotal }}</strong> <small>Total Earnings</small></li>
                        <li class="bg_lh" style="background-color: lightskyblue; color: black"><i class="fa fa-list-ol"></i> <strong>{{ $reviewCount }}</strong> <small>Total Reviews</small></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </-dollfa-dollar
            </div>
        <!--End-Chart-box-->
            <hr/>
            <div class="row-fluid">
                    <div class="span6">
                      <div class="widget-box">
                        <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
                          <h5>Feedback</h5>
                        </div>
                        <div class="widget-content nopadding collapse in" id="collapseG2">
                          <ul class="recent-posts">
                            <?php  foreach ($feedback as $fee)  {   ?>



                            <li>
                              <div class="user-thumb">
                                <img width="40" height="40" alt="User" src="{{asset('images/backend_images/demo/av1.jpg')}}">
                              </div>


                              <div class="article-post">

                                <span class="user-info"> By: {{$fee->email}} </span>
                                <p><a href="#">{{$fee->comment}}</a> </p>

                               </div>
                            </li>

                      <?php } ?>



                         <button class="btn btn-warning btn-mini">View All</button>

                          </ul>
                        </div>
                      </div>
                    </div>
            </div>

          </div>
        </div>

        <!--end-main-container-part-->
        @endsection
