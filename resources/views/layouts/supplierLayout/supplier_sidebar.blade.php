		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="{{ asset('images/supplierend_images/store_images/small/'.$supplierDetails->store_image)}}" alt="" />
							</div>
							<div class="info">
								<b class="caret pull-right"></b>
								{{ Session::get('supplierdetails')['store_name'] }}
								<small>Owner: {{Session::get('supplierdetails')['name']}}</small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
                            <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
                            <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
                        </ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li class="has-sub active">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-th-large"></i>
						    <span>Dashboard</span>
					    </a>
						<ul class="sub-menu">
						    <li class="active"><a href="{{ url('/supplier/dashboard') }}">Dashboard</a></li>
						    {{-- <li><a href="index_v2.html">Dashboard v2</a></li> --}}
						</ul>
                    </li>
					<li class="has-sub active">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-th-large"></i>
						    <span>Categories</span>
					    </a>
						<ul class="sub-menu">
						    <li class="active"><a href="{{ url('/supplier/add-category') }}">Add Category</a></li>
                            <li class="active"><a href="{{ url('/supplier/view-categories') }}">View Categories</a></li>

						</ul>
                    </li>
                    <li class="has-sub active">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-th-large"></i>
						    <span>Products</span>
					    </a>
						<ul class="sub-menu">
						    <li class="active"><a href="{{ url('/supplier/add-product') }}">Add Product</a></li>
                            <li class="active"><a href="{{ url('/supplier/view-products') }}">View Products</a></li>

						</ul>
                    </li>
                    <li class="has-sub active">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-th-large"></i>
							<span>Coupons</span>
						</a>
						<ul class="sub-menu">
							<li class="active"><a href="{{ url('/supplier/add-coupon') }}">Add Coupons</a></li>
							<li class="active"><a href="{{ url('/supplier/view-coupons') }}">View Coupons</a></li>

						</ul>
                    </li>
                    <li class="has-sub active">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                <i class="fa fa-th-large"></i>
                                <span>Store</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="active"><a href="{{ url('/view_store_notice') }}">View Store</a></li>
                                <li class="active"><a href="{{ url('/supplier/edit-store/'.$supplierDetails->id) }}">Edit Store</a></li>
    
                            </ul>
                        </li>
                    <li class="has-sub active">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                <i class="fa fa-th-large"></i>
                                <span>Banners</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="active"><a href="{{ url('/supplier/add-banner') }}">Add Banner</a></li>
                                <li class="active"><a href="{{ url('/supplier/view-banners') }}">View Banners</a></li>

                            </ul>
                        </li>
					<li class="has-sub active">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-th-large"></i>
								<span>Orders</span>
							</a>
							<ul class="sub-menu">
								<li class="active"><a href="{{ url('/supplier/view-orders') }}">View Orders</a></li>
							</ul>
						</li>
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
