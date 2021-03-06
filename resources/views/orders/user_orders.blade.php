@extends('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
			  <li class="active"><b>Orders</b></li>
			</ol>
		</div>
	</div>
</section>

<section id="do_action">
	<div class="container">
		<div class="heading" align="center">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="text-align: center">Order ID</th>
                <th style="text-align: center">Ordered Products</th>
                <th style="text-align: center">Payment Method</th>
                <th style="text-align: center">Grand Total</th>
                <th style="text-align: center">Created on</th>
                <th style="text-align: center">Actions</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($orders as $order)
            <tr style="text-align: center">
                <td>{{ $order->id }}</td>
                <td>
                	@foreach($order->orders as $pro)
                		<a href="{{ url('/orders/'.$order->id) }}">{{ $pro->product_code }}</a><br>
                	@endforeach
                </td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->grand_total }}</td>
                <td>{{ $order->created_at }}</td>
                <td>View Details</td>
            </tr>
            @endforeach
        </tbody>
    </table>
		</div>
	</div>
</section>

@endsection
