@section('content')
@extends('layouts.frontLayout.front_design')
<link href="{{ asset('css/frontend_css/StarRating.css') }}" rel="stylesheet">

<link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<section>
<div style="background-size: 100% 100%; background-image: url('../images/backend_images/backgrounds/large/{{$background_img}}'); background-repeat: no-repeat;">

        <div class="container" style="background-color: ">
            <div class="row">
                    @if(Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block" style="background-color: #f2dfd0">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                @endif
                <div class="col-sm-3" >
                    @include('layouts.frontLayout.front_sidebar')
                </div>
                <div class="col-sm-9 padding-right" >
                    <div class="product-details">
                        <!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                                    <a  href="{{ asset('images/supplierend_images/products/large/'.$productDetails->image) }}">
                                        <img style="width: 300px; border-radius: 38%;" class="mainImage"
                                        src="{{ asset('images/supplierend_images/products/medium/'.$productDetails->image) }}"
                                         alt="" />
                                    </a>
                                </div>
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
										{{-- @if(count($productAltImages)>0) --}}
										<div class="item active thumbnails">
                                                <a href="{{ asset('images/supplierend_images/products/large/'.$productDetails->image) }}"
                                                    data-standard="{{ asset('images/supplierend_images/products/small/'.$productDetails->image) }}">
                                                    <img  class="changeImage" style="width: 80px; border-radius: 38%" class="mainImage"
                                                    src="{{ asset('images/supplierend_images/products/small/'.$productDetails->image) }}"
                                                     alt="" />
                                                </a>
												@foreach($productAltImages as $altimg)
													<a href="{{ asset('images/supplierend_images/products/medium/'.$altimg->image) }}"
														data-standard="{{ asset('images/supplierend_images/products/small/'.$altimg->image) }}">
                                                          <img class="changeImage" style="width:80px; border-radius: 38%; cursor:pointer"
                                                          src="{{ asset('images/supplierend_images/products/small/'.$altimg->image) }}" alt="">
													</a>
												@endforeach
										</div>
									</div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <form name="addtoCartForm" id="addtoCartForm" action="{{ url('add-cart') }}" method="post">{{ csrf_field() }}
                                        <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                                        <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}">
                                        <input type="hidden" name="product_code" value="{{ $productDetails->product_code }}">
                                        <input type="hidden" name="product_color" value="{{ $productDetails->product_color }}">
                                        <input type="hidden" name="price" id="price" value="{{ $productDetails->price }}">
                            <div class="product-information"  style="border-color: transparent; padding-top: 2px">
                                    <div align="left" style="color: black;"><?php echo $breadcrumb; ?></div>
									<div>&nbsp;</div>
                                <!--/product-information-->
                                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2 class="admin-brand-content" style="color: {{ $main_color }}"><strong>{{ $productDetails->product_name}}</strong></h2>
                                <h2 style="color: {{ $main_color }}"><strong>Product By: </strong>{{ $outlet_name }}</h2>
                                <br>
                                <br>
                                <p style="color: black; font-size: 17px;">Code: {{ $productDetails->product_code}}</p>
                                <p style="color: black; font-size: 17px;">Color: {{ $productDetails->product_color}}</p>
                                <p style="color: black; font-size: 17px;">@if ($productDetails->pattern=="")@else Pattern: {{ $productDetails->pattern}} @endif</p>
                                <p style="color: black; font-size: 17px;">@if ($productDetails->sleeve=="")@else Sleeve: {{ $productDetails->sleeve}} @endif</p>
                                <p style="color: black; font-size: 17px;">
										<select id="selSize" name="size" style="width:150px; border-radius: 20% " required>
											<option value="">Select Size</option>
											@foreach($productDetails->attributes as $sizes)
											<option value="{{ $productDetails->id }}-{{ $sizes->size }}">{{ $sizes->size }}</option>
											@endforeach
										</select>
								</p>
                                <img src="images/product-details/rating.png" alt="" />
                                <span>
									<span style="color: {{ $main_color }};" id="getPrice">Rs. {{ $productDetails->price}}</span>
                                <label style="color: black; font-size: 14px;">Quantity:</label>
                                <input  type="text" name="quantity" value="1"  />
                                @if ($total_stock>0)
                                <button type="submit" class="btn btn-fefault cart" style="margin-left: 4px; border-radius: 15%;" id="cartButton">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
                                </button>
                                @endif
                                </span>
                                <p style="color: black; font-size: 17px;"><b>Availability:</b> <span id="Availability"> @if ($total_stock>0) In Stock @else Out of Stock @endif</p>
                                <p style="color: black; font-size: 17px;"><b>Condition:</b> New</p></span>
                                <p style="color: black; font-size: 17px;"><b>{{ $outlet_title }} </b>{{ $outlet_name }}</p>
                                <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
                            </div>
                    </form>
                            <!--/product-information-->
                    {{-- wishlist --}}
                    <form name="addtoWishListForm" id="addtoWishListForm" action="{{ url('add-wishlist') }}" method="post">{{ csrf_field() }}
                                <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                                <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}">
                                <input type="hidden" name="price" id="price" value="{{ $productDetails->price }}">
                    <div class="product-information" style="border-color: transparent">
                            @if ($store==true)
                            <button type="submit" class="btn btn-default" style="background-color: cornflowerblue;color:white; border-radius: 20%;
                        </button>" id="view_store">
                                    <i class="fa fa-eye"></i>
                                    <a  href="{{url('/view_store/'.$outlet_id)}}" style="background-color: cornflowerblue; color:white">View {{ $outlet_name }}</a>
                            </button>
                            @else
                            <button type="submit" class="btn btn-default" style="background-color: cornflowerblue;color:white" id="view_store">
                                    <i class="fa fa-eye"></i>
                                    <a href="{{url('/view_factory/'.$outlet_id)}}" style="background-color: cornflowerblue;color:white">View {{ $outlet_name }}</a>

                            @endif



                        <button type="submit" class="btn btn-default" style="background-color: tomato;color:white; border-radius: 20%;" id="wishlistButton">
                            <i class="fa fa-heart"></i>
                            Add to Wish List
                        </button>
                    </div>
                    </form>
                    {{-- wishlist end --}}
                    </div>
                    </div>
                    <!--/product-details-->
                </div>
                    <div class="category-tab shop-details-tab" style=" border:1px solid white; border-top: none; ">
                        <!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs" style="background-color: {{ $main_color }};">
                                <li  class="active"><a href="#reviews" data-toggle="tab">Reviews and Ratings</a></li>
                                <li><a href="#description" data-toggle="tab">Description</a></li>
                                <li><a href="#care" data-toggle="tab">Material & Care</a></li>
                                <li><a href="#delivery" data-toggle="tab">Delivery Options</a></li>
                                @if(!empty($productDetails->video))
									<li><a href="#video" data-toggle="tab">Product Video</a></li>
								@endif
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="reviews">
                                 @foreach ($reviews as $review)

                                    <div class="col-sm-12">
                                            <ul style="background-color: transparent">
                                                @foreach ($users as $user)
                                                    @if ($user->id == $review->user_id)
                                                    <li><a style="font-size: 20px; color: "><i class="fa fa-user" style="color: {{ $main_color }}">  {{ $user->name }}</i></a></li>

                                                    @endif
                                                @endforeach
                                                <li><a style="font-size: 20px; display: inline"><i class="fa fa-clock-o" style="color: {{ $main_color }}"></i>{{ $review->created_at }}</a></li>
                                                @if ($current_user->id == $review->user_id)
                                                <li><a href="{{ url('supplier/delete-comment/'.$review->id) }}" style="font-size: 20px; display: inline"><i class="fa fa-archive" style="color: {{ $main_color }}"></i>Delete</a></li>
                                                @endif
                                                <div class="row">
                                                @for ($stars = 0; $stars < $review->rating; $stars++)
                                                        <span class="star-five"  style="display: inline-block; margin-left: -70px; margin-right: -95px ">
                                                        </span>
                                                @endfor

                                                </div>

                                            </ul>
                                                <p style="color: black; font-size: 20px; display: inline">Title:</p>
                                                <p style="color: {{ $main_color }}; font-size: 20px; display: inline"> <strong>{{ $review->heading }}</strong></p>
                                            <br>
                                                <p style="color: black; font-size: 20px; display: inline">Review:</p>
                                                <p style="color: {{ $main_color }}; font-size: 20px; display: inline"> <strong>{{ $review->review }}</strong></p>
                                            <br>
                                            <br>

                                    <hr style="height:5px; background-color: {{ $main_color }};">

                                        </div>
                                    @endforeach

                                    @if (!$commented)
                                    <p style="font-size: 20px"><b>Write Your Review </b></p>
                                    <form name="addreview" id="addreview"  action="{{ url('add-comment/'.$productDetails->id) }}" method="post">{{ csrf_field() }}

                                                <x-star-rating value="0" type="text" id="rating" onclick="myFunction()" name="rating" number="5"></x-star-rating>

                                        <input type="hidden" id="rate" name="rate"></input>
                                        <span >
                                            <input style="width: 100%; margin-left: 0px; color: black" type="text" id="heading" name="heading" placeholder="Title of The Review" required/>
                                        </span>
                                        <textarea name="review" id="review" style="color: black" placeholder="Description for Review" required></textarea>
                                        <button type="submit" class="btn btn-default pull-right">
                                            Submit
                                        </button>
                                    </form>
                                    @endif

                            </div>
                            <div class="tab-pane fade in" id="description">
                                    <div class="col-sm-12">
                                        <p style="color: black; font-size: 17px;">{{ $productDetails->description}}</p>
                                    </div>
                            </div>
                            <div class="tab-pane fade" id="care">
                                    <div class="col-sm-12">
                                            <p style="color: black; font-size: 17px;">{{ $productDetails->care}}</p>
                                    </div>
                            </div>
                            <div class="tab-pane fade" id="delivery">
                                    <div class="col-sm-12">
                                            <p>Good Quality Products <br>
                                                Cash on Delivery
                                            </p>
                                    </div>
                            </div>
							@if(!empty($productDetails->video))
								<div class="tab-pane fade" id="video" >
									<div class="col-sm-12">
										<video controls width="640" height="480">
										  <source src="{{ url('videos/'.$productDetails->video)}}" type="video/mp4">
										</video>
									</div>
								</div>
							@endif
                        </div>
                    </div>
                    <!--/category-tab-->
                    <div class="recommended_items">
                        <!--recommended_items-->
                        <h2 style="color: {{ $main_color }};" class="title text-center">recommended items</h2>
                        <div id="recommended-item-carousel"  class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                    <?php $count=1; ?>
                                    @foreach($relatedProducts->chunk(3) as $chunk)
                                    <div <?php if($count==1){ ?> class="item active" <?php } else { ?> class="item" <?php } ?>>
                                        @foreach($chunk as $item)
                                        <div class="col-sm-4" >
                                            <div class="product-image-wrapper" style="border-color: transparent">
                                                <div class="single-products" >
                                                    <div class="productinfo text-center" >
                                                        <img style="width:200px; border-radius: 38%;" src="{{ asset('images/supplierend_images/products/small/'.$item->image) }}" alt="" />
                                                        <h2 style="color: {{ $main_color }};">Rs. {{ $item->price }}</h2>
                                                        <p style="color: {{ $secondary_color }};">{{ $item->product_name }}</p>
                                                        <a href="{{ url('/product/'.$item->id) }}"><button style="border-radius: 30%;" type="button" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <?php $count++; ?>
                                    @endforeach
                            </div>
                            <div style="color: {{ $main_color }};">
                            <a class="left recommended-item-control"   href="#recommended-item-carousel" data-slide="prev">
                                <i  class="fa fa-angle-left" style="background-color: {{ $main_color }}"></i>
                            </a>
                        </div>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right" style="background-color: {{ $main_color }}"></i>
                            </a>
                        </div>
                    </div>
                    <!--/recommended_items-->
                </div>
            </div>

</div>
</section>
<script>
        function myFunction() {
            $('#rate').val(document.getElementById("rating").value);

        }
</script>

@endsection
