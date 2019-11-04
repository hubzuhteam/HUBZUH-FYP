@section('content')
@extends('layouts.frontLayout.front_design')
<section id="slider">
        <!--slider-->
        <div class="container">
        <div class="row">

        </div>
    </div>
</section>
<!--/slider-->
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                        @include('layouts.frontLayout.front_sidebar')
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">
                                @if(!empty($search_product))
                                    {{ $search_product }} Items
                                @else
                                    {{ $categoryDetails->name }} Items
                                @endif
                                ({{ count($productsAll) }})
                        </h2>
                        @if(!empty($productsAll))
                            <div align="left"><?php echo $breadcrumb; ?></div>
					        <div>&nbsp;</div>
                        @endif
                         @foreach ($productsAll as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ asset('images/supplierend_images/products/small/'.$product->image) }}" alt="" />
                                    <h2>Rs {{$product->price}}</h2>
                                        <p>{{$product->product_name}}</p>
                                    <a href="{{ url('product/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
                                    </div>
                                    {{-- <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>Rs {{$product->price}}</h2>
                                            <p>{{$product->product_name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="choose text-center">
                                    <ul class="nav nav-pills nav-justified">
                                        <li>
                                                <form name="addtoWishListForm" id="addtoWishListForm" action="{{ url('add-wishlist') }}" method="post">{{ csrf_field() }}
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                                                        <input type="hidden" name="price" id="price" value="{{ $product->price }}">
                                            <button  type="submit" class="btn btn-default" style="background-color: tomato;color:white" id="wishlistButton">
                                                    <i class="fa fa-heart"></i>
                                                    Add to Wish List
                                                </button>
                                                </form>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                        @endforeach
                        @if(empty($search_product))
						<div align="center">{{ $productsAll->links() }}</div>
					        @endif
                    </div>
                    <!--STROES-->
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">
                                @if(!empty($search_product))
                                    {{ $search_product }} Stores
                                @else
                                    {{ $categoryDetails->name }} Stores
                                @endif
                                ({{ count($suppliersAll) }})
                        </h2>
                            <div align="left"><?php echo $breadcrumb; ?></div>
					        <div>&nbsp;</div>
                         @foreach ($suppliersAll as $supplier)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ asset('images/supplierend_images/store_images/small/'.$supplier->store_image) }}" alt="" />
                                    <h2>{{$supplier->store_name}}</h2>
                                        <a target="_black" href="{{ url('/view_store/'.$supplier->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- @if(empty($search_product))
						<div align="center">{{ $suppliersAll->links() }}</div>
					    @endif --}}
                    </div>
                    <!--FACTORIES-->
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">
                                @if(!empty($search_product))
                                    {{ $search_product }} Factories
                                @else
                                    {{ $categoryDetails->name }} Factories
                                @endif
                                ({{ count($factoriesAll) }})
                        </h2>
                            <div align="left"><?php echo $breadcrumb; ?></div>
					        <div>&nbsp;</div>
                        @foreach ($factoriesAll as $factory)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ asset('images/factoryend_images/factory_images/small/'.$factory->factory_image) }}" alt="" />
                                    <h2>{{$factory->factory_name}}</h2>
                                        <a target="_black" href="{{ url('/view_factory/'.$factory->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- @if(empty($search_product))
						<div align="center">{{ $suppliersAll->links() }}</div>
					    @endif --}}
                    </div>
                    <!--features_items-->

                </div>


            </div>
        </div>
    </section>

@endsection
