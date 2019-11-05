{{--  View Store 1st Template  --}}
@section('content')
@extends('layouts.frontLayout.front_design')

<div style="background-size: 100% 100%; background-color: {{ $background_color }}; background-image: url('../images/backend_images/backgrounds/large/{{$background_img}}'); background-repeat: no-repeat;">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<div class="container"  >
        @if ($banners->isEmpty())
        <div class="fb-profile" style="margin-bottom: 40px;margin-top: 10%;" >
                {{--  <div style="margin: 0px" id="slider-carousel" class="carousel slide" data-ride="carousel" >
                    <ol class="carousel-indicators">
                        @foreach($banners as $key => $banner)
                            <li data-target="#slider-carousel" data-slide-to="0" @if($key==0) class="active" @endif></li>
                        @endforeach
                    </ol>

                    <div class="carousel-inner" >
                        @foreach($banners as $key => $banner)
                            <div class="item @if($key==0) active @endif">
                                <a href="{{ $banner->link }}" title="Banner 1"><img onerror="imgErrorBanner(this);"  src="{{ asset('images/frontend_images/banners/'.$banner->image )}}" alt="Image Banner"></a>
                            </div>
                        @endforeach
                    </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>  --}}
                    <img align="left" style="border-radius: 0%;" onerror="imgError(this);"  class="fb-image-profile thumbnail" src="{{ asset('images/supplierend_images/store_images/small/'.$supplier->store_image)}} " alt="Profile image example"/>
                <div class="fb-profile-text">
                    <h1 style="color: {{ $store_name_color }}">{{$supplier->store_name}}</h1>
                    <a href="#" class="my_Button">Follow +</a>
                </div>
            </div>
        @else
        <div class="fb-profile" style="margin-bottom: 40px;margin-top: 0px;" >
                <div style="margin: 0px" id="slider-carousel" class="carousel slide" data-ride="carousel" >
                    <ol class="carousel-indicators">
                        @foreach($banners as $key => $banner)
                            <li data-target="#slider-carousel" data-slide-to="0" @if($key==0) class="active" @endif></li>
                        @endforeach
                    </ol>

                    <div class="carousel-inner" >
                        @foreach($banners as $key => $banner)
                            <div class="item @if($key==0) active @endif">
                                <a href="{{ $banner->link }}" title="Banner 1"><img onerror="imgErrorBanner(this);"  src="{{ asset('images/frontend_images/banners/'.$banner->image )}}" alt="Image Banner"></a>
                            </div>
                        @endforeach
                    </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                    <img align="left" style="border-radius: 0%;" onerror="imgError(this);"  class="fb-image-profile thumbnail" src="{{ asset('images/supplierend_images/store_images/small/'.$supplier->store_image)}} " alt="Profile image example"/>
                <div class="fb-profile-text">
                    <h1 style="color: {{ $store_name_color }}">{{$supplier->store_name}}</h1>
                    <a href="#" class="my_Button">Follow +</a>
                </div>
            </div>
        @endif


	</div> <!-- /container -->




<div class="container" >
	<div class="category-tab shop-details-tab" style=" border-color: transparent">
		<!--category-tab-->
		<div class="col-sm-12" >
			<ul class="nav nav-tabs" style="background-color: {{ $main_color }};">
				<li class="active"><a href="#description" data-toggle="tab">All Products</a></li>
				<li><a href="#care" data-toggle="tab">Description</a></li>
                <li><a href="#delivery" data-toggle="tab">Statistic Details</a></li>
				<li><a href="#branches" data-toggle="tab">Branches</a></li>
			</ul>
		</div>
		<div class="tab-content"  >
			<div class="tab-pane fade active in" id="description" >
				<div class="col-sm-12">
					<div class="container" style="width:100%;" >
						<div class="row">

							<div class="col-sm-12">
								<div class="features_items">
									<!--features_items-->
									@foreach ($productsAll as $product)
                                    <div class="col-sm-3" >
											<a class="product_click" >
												<div class="product-image-wrapper" style=" border-color:transparent ">
													<div class="single-products">
														<div  class="productinfo text-center">
															<img style="border-radius: 0%;" src="{{ asset('images/supplierend_images/products/small/'.$product->image) }}" alt="" />
															<h2 style="color: {{ $main_color }}">Rs {{$product->price}}</h2>
															<p style="color: {{ $secondary_color }};"><strong>{{$product->product_name}}</strong></p>
															<a href="{{ url('product/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
														</div>
													</div>
													<div class="choose text-center" style="border-color: transparent">

																<form name="addtoWishListForm" id="addtoWishListForm" action="{{ url('add-wishlist') }}" method="post">{{ csrf_field() }}
																	<input type="hidden" name="product_id" value="{{ $product->id }}">
																	<input type="hidden" name="product_name" value="{{ $product->product_name }}">
																	<input type="hidden" name="price" id="price" value="{{ $product->price }}">
																	<button type="submit" class="btn btn-default" style="background-color: tomato;color:white;" id="wishlistButton">
																		<i class="fa fa-heart"></i>
																		Add to Wish List
																	</button>
																</form>
													</div>
												</div>
											</a>
                                    </div>
									@endforeach
									<div align="center">{{ $productsAll->links() }}</div>
								</div>
								<!--features_items-->
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="tab-pane fade" id="care">
				<div class="col-sm-12">
					<div style="margin-left: 10px;"	 class="store_description">
					<h3 style="color: {{ $main_color }};">First Name    :</h3><h4 style="color: {{ $secondary_color }};">{{$supplier->name}}   </h4> <br>
					<h3 style="color: {{ $main_color }};">Last Name     :</h3><h4 style="color: {{ $secondary_color }};">{{$supplier->last_name}} </h4><br>
					<h3 style="color: {{ $main_color }};">Store Email   :</h3><h4 style="color: {{ $secondary_color }};">{{$supplier->email}}   </h4><br>
					<h3 style="color: {{ $main_color }};">Store Address :</h3><h4 style="color: {{ $secondary_color }};">{{$supplier->address}} </h4><br>
					<h3 style="color: {{ $main_color }};">Phone Number  :</h3><h4 style="color: {{ $secondary_color }};">{{$supplier->mobile}}  </h4><br>
					<h3 style="color: {{ $main_color }};">Product Types :</h3><h4 style="color: {{ $secondary_color }};">{{$supplier->deals_in}} </h4><br>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="branches">
                @foreach ($branches as $branch)
                    <div class="col-sm-12">
                        <div style="margin-left: 10px;" class="store_description">
                        <h3 style="color: {{ $main_color }}; margin-top:-1%">Branch Name    :</h3><h4 style="color: {{ $secondary_color }};">{{$branch->branch_name}}   </h4> <br>
                        <h3 style="color: {{ $main_color }}; margin-top:-1%">Branch Location     :</h3><h4 style="color: {{ $secondary_color }};">{{$supplier->last_name}} </h4><br>
                        <h3 style="color: {{ $main_color }}; margin-top:-1%">Branch Contact Number   :</h3><h4 style="color: {{ $secondary_color }};">{{$supplier->email}}   </h4><br>
                        </div>

                    <hr style="height:11px; background-color: {{ $main_color }};">
                    </div>
                @endforeach
            </div>

			<div class="tab-pane fade" id="delivery">
				<div class="col-sm-12">
					<h4 style="color: {{ $main_color }};margin-left: 10px">No statistic details available<br>

					</h4>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	<section>

	</section>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<script>function imgError(image) {
			image.onerror = "";
			image.src = "{{ asset('images/supplierend_images/store_images/small/store.gif')}}";
			return true;
		}</script>
	<script>function imgErrorBanner(image) {
			image.onerror = "";
			image.src = "{{ asset('images/logo1.jpeg')}}";
			return true;
		}</script>

@endsection
