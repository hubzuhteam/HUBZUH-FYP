@section('content')
@extends('layouts.frontLayout.front_design')
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script>
     $(document).ready(function() {
        $( "#search" ).autocomplete({
            source: function(request, response) {
                $.ajax({
                url: "{{url('autocomplete')}}",
                data: {
                        term : request.term
                 },
                dataType: "json",
                success: function(data){
                   var resp = $.map(data,function(obj){
                        //console.log(obj.city_name);
                        return obj.product_name;
                   });

                   response(resp);
                }
            });
        },
        minLength: 1
     });
    });

    </script>
<section id="slider">
            <!--slider-->
            <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                    @foreach($banners as $key => $banner)
                                        <li data-target="#slider-carousel" data-slide-to="0" @if($key==0) class="active" @endif></li>
                                    @endforeach
                                </ol>

                                <div class="carousel-inner">
                                    @foreach($banners as $key => $banner)
                                    <div class="item @if($key==0) active @endif">
                                        <a href="{{ $banner->link }}" title="Banner 1"><img src="images/frontend_images/banners/{{ $banner->image }}"></a>
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

                </div>
            </div>
        </div>
</section>
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
                        <h2 class="title text-center">FEATURES ITEMS</h2>
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
                                            <button type="submit" class="btn btn-default" style="background-color: tomato;color:white" id="wishlistButton">
                                                    <i class="fa fa-heart"></i>
                                                    Add to Wish List
                                                </button>
                                                </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div align="center">{{ $productsAll->links() }}</div>
                    </div>
                    <div class="features_items">
                            <!--features_items-->
                            <h2 class="title text-center">STORES</h2>
                             @foreach ($suppliersAll as $supplier)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('images/supplierend_images/store_images/small/'.$supplier->store_image) }}" alt="" />
                                        <h2>{{$supplier->store_name}}</h2>
                                            <a href="{{ url('/view_store/'.$supplier->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div align="center"></div>
                        </div>
                    <!--features_items-->


                </div>


            </div>
        </div>
    </section>

    <script>
            $(document).ready(function() {
               $( "#search" ).autocomplete({

                   source: function(request, response) {
                       $.ajax({
                       url: "{{url('autocomplete')}}",
                       data: {
                               term : request.term
                        },
                       dataType: "json",
                       success: function(data){
                          var resp = $.map(data,function(obj){
                               //console.log(obj.city_name);
                               return obj.name;
                          });

                          response(resp);
                       }
                   });
               },
               minLength: 1
            });
           });

    </script>
@endsection
