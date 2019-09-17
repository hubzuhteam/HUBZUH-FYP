
{{-- Supplier ADD CATGEORY  --}}
@section('content')
@extends('layouts.supplierLayout.supplier_design')

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ url('/supplier/dashboard') }}">Home</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <!-- end page-header -->
    <!-- begin wizard-form -->
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


    <!-- begin #content -->
    <div id="content" class="content"  style="margin-left: -35px;margin-right: -55px;">

        <!-- begin page-header -->
        <h1 class="page-header">View Orders</small></h1>
        <!-- end page-header -->

        <!-- begin panel -->
        <div class="panel panel-inverse">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Orders</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <table id="data-table-default" class="table table-striped table-bordered">
                    <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Ordered Products</th>
                                <th>Order Amount</th>
                                <th>Order Status</th>
                                <th>Payment Method</th>
                                <th>Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr class="gradeX">
                          <td class="center">{{ $order->id }}</td>
                          <td class="center">{{ $order->created_at }}</td>
                          <td class="center">{{ $order->name }}</td>
                          <td class="center">{{ $order->user_email }}</td>
                          <td class="center">
                            @foreach($order->orders as $pro)
                            {{ $pro->product_code }}
                            ({{ $pro->product_qty }})
                            <br>
                            @endforeach
                          </td>
                          <td class="center">PKR {{ $order->grand_total }}</td>
                          <td class="center">{{ $order->order_status }}</td>
                          <td class="center">{{ $order->payment_method }}</td>
                          <td class="center">
                            <a target="_blank" href="{{ url('supplier/view-order/'.$order->id)}}"
                                class="btn btn-success btn-mini">View Order Details</a>
                                <br>
                                <br>
                                <a target="_blank" href="{{ url('supplier/view-order-invoice/'.$order->id)}}"
                                    class="btn btn-success btn-mini">View Order Invoice</a>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- end panel-body -->
        </div>
        <!-- end panel -->
    </div>
    <!-- end #content -->


@endsection


