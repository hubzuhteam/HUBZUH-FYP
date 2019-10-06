{{--  Theme Store/factory 2nd Template  --}}
@section('content')
@extends('layouts.frontLayout.front_design')

<div style="background-size: 100% 100%;  background-repeat: no-repeat;">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<div class="container"  >
            <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong style="font-size: 24px">You can Add your store Image, Edit Main Color, Edit Seconday Color, Set Background Image etc.</strong>
            </div>
            <div class="fb-profile"  style="margin-bottom: 40px; margin-top: 0px;" >
                </div>
                <div align="center">
                <img style="border-radius: 40%; width: 500px " onerror="imgError(this);"  class="" src="{{ asset('images/supplierend_images//store_images/small/store.gif')}} " alt="Profile image example"/>
                </div>
            <div class="" align="center" style="padding-bottom: 2%">
                <h1 >Store/Factory Name</h1>
                <a href="#" class="my_Button">Follow +</a>
            </div>
        </div> <!-- /container -->
<div class="container" >
	<div class="category-tab shop-details-tab" style=" border-color: transparent">
		<!--category-tab-->
		<div class="col-sm-12" >
			<ul class="nav nav-tabs" >
				<li class="active"><a  data-toggle="tab">All Products</a></li>
				<li><a  data-toggle="tab">Description</a></li>
                <li><a  data-toggle="tab">Statistic Details</a></li>
				<li><a  data-toggle="tab">Branches</a></li>
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
                                    <div class="col-sm-3" >
											<a class="product_click" >
												<div class="product-image-wrapper" style=" border-color:transparent ">
													<div class="single-products">
														<div  class="productinfo text-center">
															<img style="border-radius: 0%;" src="{{ asset('images/supplierend_images/products/small/shirt_static_2.png') }}" alt="" />
															<h2 >Rs 950</h2>
															<p ><strong>Product Name</strong></p>
															<a class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
														</div>
													</div>
													<div class="choose text-center" style="border-color: transparent">

													</div>
												</div>
											</a>
                                    </div>
                                    <div class="col-sm-3" >
											<a class="product_click" >
												<div class="product-image-wrapper" style=" border-color:transparent ">
													<div class="single-products">
														<div  class="productinfo text-center">
															<img style="border-radius: 0%;" src="{{ asset('images/supplierend_images/products/small/dress.png') }}" alt="" />
															<h2 >Rs 1650</h2>
															<p ><strong>Product Name</strong></p>
															<a class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
														</div>
													</div>
													<div class="choose text-center" style="border-color: transparent">

													</div>
												</div>
											</a>
                                    </div>
                                    <div class="col-sm-3" >
											<a class="product_click" >
												<div class="product-image-wrapper" style=" border-color:transparent ">
													<div class="single-products">
														<div  class="productinfo text-center">
															<img style="border-radius: 0%;" src="{{ asset('images/supplierend_images/products/small/download.jpg') }}" alt="" />
															<h2 >Rs 950</h2>
															<p ><strong>Product Name</strong></p>
															<a class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
														</div>
													</div>
													<div class="choose text-center" style="border-color: transparent">

													</div>
												</div>
											</a>
                                    </div>
                                    <div class="col-sm-3" >
											<a class="product_click" >
												<div class="product-image-wrapper" style=" border-color:transparent ">
													<div class="single-products">
														<div  class="productinfo text-center">
															<img style="border-radius: 0%;" src="{{ asset('images/supplierend_images/products/small/shirt_static_3.png') }}" alt="" />
															<h2 >Rs 1650</h2>
															<p ><strong>Product Name</strong></p>
															<a class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
														</div>
													</div>
													<div class="choose text-center" style="border-color: transparent">

													</div>
												</div>
											</a>
                                    </div>

									<div align="center"></div>
								</div>
								<!--features_items-->


							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="tab-pane fade" id="delivery">
				<div class="col-sm-12">
					<h4 style="margin-left: 10px">No statistic details available<br>

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
