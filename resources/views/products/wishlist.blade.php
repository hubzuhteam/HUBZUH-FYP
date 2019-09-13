@extends('layouts.frontLayout.front_design')
@section('content')
<section id="cart_items">
		    <div class="container">
		    	<div class="breadcrumbs">
		    		<ol class="breadcrumb">
		    		  <li><a href="{{asset('/')}}">Home</a></li>
		    		  <li class="active">Items you Loved</li>
		    		</ol>
		    	</div>
		    	<div class="table-responsive cart_info">
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
		    		<table class="table table-condensed">
		    			<thead>
		    				<tr class="cart_menu">
		    					<td class="image">Item</td>
		    					<td class="description"></td>
		    					<td class="price">Price</td>
		    					<td></td>
		    				</tr>
		    			</thead>
		    			<tbody>
                            @foreach ($userwishlist as $wishlist)
		    				<tr>
		    					<td class="cart_product">
		    						<a href="{{ url('product/'.$wishlist->product_id)}}"><img  style="width: 75px" src="{{ asset('images/backend_images/products/small/'.$wishlist->image) }}" alt=""></a>
		    					</td>
		    					<td class="cart_description">
                                <h4><a href="{{ url('product/'.$wishlist->product_id)}}">{{$wishlist->product_name}}</a></h4>

		    					</td>
		    					<td class="cart_price">
		    						<p>Rs. {{$wishlist->price}}</p>
		    					</td>
		    					<td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{url('/wishlist/delete-product/'.$wishlist->id)}}"><i class="fa fa-times"></i></a>
		    					</td>
                            </tr>
                            @endforeach

		    			</tbody>
		    		</table>
		    	</div>
		    </div>
</section> <!--/#wishlist_items-->
@endsection
