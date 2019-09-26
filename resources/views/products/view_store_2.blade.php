@extends('layouts.frontLayout.front_design')
@section('content')

<div class="parent">

<section id="slider" style="margin-bottom: -120px">
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
                                <a href="{{ $banner->link }}" title="Banner 1"><img src="{{ asset('/images/frontend_images/banners/'.$banner->image) }}"></a>
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
<img src="{{ asset('/images/supplierend_images/store_images/large/'.$supplierDetails->store_image) }}" alt="Avatar" class="avatar" style="margin-left: 38%;">
</div>

<!-- JavaScript Libraries -->

  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('lib/easing/easing.min.js')}}"></script>
  <script src="{{ asset('lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{ asset('lib/superfish/superfish.min.js')}}"></script>
  <script src="{{ asset('lib/wow/wow.min.js')}}"></script>
  <script src="{{ asset('lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{ asset('lib/counterup/counterup.min.js')}}"></script>
  <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('lib/isotope/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('lib/lightbox/js/lightbox.min.js')}}"></script>
  <script src="{{ asset('lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('js/frontend_js/main.js')}}"></script>

{{--  </body>  --}}
@endsection

