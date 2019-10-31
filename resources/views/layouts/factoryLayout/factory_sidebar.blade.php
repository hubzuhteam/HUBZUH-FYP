
    {{--  START OF SIDE BAR  --}}
    <aside class="admin-sidebar">
            <div class="admin-sidebar-brand">
                <!-- begin sidebar branding-->
                <img class="admin-brand-logo" src="{{ asset('images/factoryend_images/factory_images/small/'.$factoryDetails->factory_image)}}" width="40" alt="atmos Logo">
                <span class="admin-brand-content font-secondary" style="padding-right: 20%"><a href='{{ url('/factory/dashboard')}}'>{{  $factoryDetails->factory_name}}</a></span>
                <!-- end sidebar branding-->
                <div class="ml-auto">
                    <!-- sidebar pin-->
                    <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a>
                    <!-- sidebar close for mobile device-->
                    <a href="#" class="admin-close-sidebar"></a>
                </div>
            </div>
            <div class="admin-sidebar-wrapper js-scrollbar">
                <ul class="menu">
                    <li class="menu-item active ">
                        <a href="#" class="open-dropdown menu-link">
                            <span class="menu-label">
                                    <a href='{{ url('/factory/dashboard') }}' class=' menu-link'>
                                                    <span class="menu-name">My Dashboard
                                                        <span class="menu-arrow"></span>
                            </span>
                            </span>
                            <span class="menu-icon">
                               <span class="icon-badge badge-success badge badge-pill">4</span>
                            <i class="icon-placeholder mdi mdi-view-dashboard "></i>
                            </span>
                        </a>
                    </li>
            <li class="menu-item ">
                <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                            <span class="menu-name">My Products
                                <span class="menu-arrow"></span>
                            </span>
                        </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder mdi mdi-apps "></i>
                            </span>
                </a>
                <!--submenu-->
                <ul class="sub-menu">
                    <li class="menu-item">
                        <a href='{{ url('/factory/add-product') }}' class=' menu-link'>
                                        <span class="menu-label">
                                                <span class="menu-name">Add New Product
                                                </span>
                                        </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder mdi mdi-tshirt-crew  "></i>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                            <a href='{{ url('/factory/view-products') }}' class=' menu-link'>
                                            <span class="menu-label">
                                                    <span class="menu-name">My All Products
                                                    </span>
                                            </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder mdi mdi-tshirt-crew  "></i>
                                </span>
                            </a>
                        </li>
                        <li class="menu-item">
                                <a href='{{ url('/factory/products-reviews') }}' class=' menu-link'>
                                                <span class="menu-label">
                                                        <span class="menu-name">View Reviews of Products
                                                        </span>
                                                </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi mdi-tshirt-crew  "></i>
                                    </span>
                                </a>
                            </li>
                </ul>
            </li>
            <li class="menu-item ">
                <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                            <span class="menu-name">My Factory
                                <span class="menu-arrow"></span>
                            </span>
                        </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder mdi mdi-apps "></i>
                            </span>
                </a>
                <!--submenu-->
                <ul class="sub-menu">
                    <li class="menu-item">
                        <a href='{{ url('/view_factorystore_notice') }}' class=' menu-link'>
                                        <span class="menu-label">
                                                <span class="menu-name">View Factory
                                                </span>
                                        </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder mdi mdi-tshirt-crew  "></i>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                            <a href='{{ url('/factory/edit-factorystore/'.$factoryDetails->id) }}' class=' menu-link'>
                                            <span class="menu-label">
                                                    <span class="menu-name">Edit Factory
                                                    </span>
                                            </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder mdi mdi-tshirt-crew  "></i>
                                </span>
                            </a>
                        </li>
                </ul>
            </li>

            <li class="menu-item ">
                    <a href="#" class="open-dropdown menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Orders
                            <span class="menu-arrow"></span>
                        </span>
                    </span>
                        <span class="menu-icon">
                            <i class="icon-placeholder mdi mdi-apps "></i>
                        </span>
                    </a>
                    <!--submenu-->
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href='{{ url('/factory/view-orders') }}' class=' menu-link'>
                                    <span class="menu-label">
                                            <span class="menu-name">View Orders
                                            </span>
                                    </span>
                                <span class="menu-icon">
                            <i class="icon-placeholder mdi mdi-tshirt-crew  "></i>
                        </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="menu-item ">
                    <a href="#" class="open-dropdown menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Banners
                            <span class="menu-arrow"></span>
                        </span>
                    </span>
                        <span class="menu-icon">
                            <i class="icon-placeholder mdi mdi-apps "></i>
                        </span>
                    </a>
                    <!--submenu-->
                    <ul class="sub-menu">
                            <li class="menu-item">
                                    <a href='{{ url('/factory/add-banner') }}' class=' menu-link'>
                                            <span class="menu-label">
                                                    <span class="menu-name">Add Banner
                                                    </span>
                                            </span>
                                        <span class="menu-icon">
                                    <i class="icon-placeholder mdi mdi-tshirt-crew  "></i>
                                </span>
                                    </a>
                                </li>
                        <li class="menu-item">
                            <a href='{{ url('/factory/view-banners') }}' class=' menu-link'>
                                    <span class="menu-label">
                                            <span class="menu-name">View Banners
                                            </span>
                                    </span>
                                <span class="menu-icon">
                            <i class="icon-placeholder mdi mdi-tshirt-crew  "></i>
                        </span>
                            </a>
                        </li>


                    </ul>
                </li>
            <li class="menu-item ">
                    <a href="#" class="open-dropdown menu-link">
                            <span class="menu-label">
                                <span class="menu-name">My Categories
                                    <span class="menu-arrow"></span>
                                </span>
                            </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder mdi mdi-folder-outline "></i>
                                </span>
                    </a>
                    <!--submenu-->
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href='{{ url('/factory/add-category') }}' class=' menu-link'>
                                            <span class="menu-label">
                                                    <span class="menu-name">Add New Category
                                                    </span>
                                            </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder mdi mdi-import  "></i>
                                </span>
                            </a>
                        </li>
                        <li class="menu-item">
                                <a href='{{ url('/factory/view-category') }}' class=' menu-link'>
                                                <span class="menu-label">
                                                        <span class="menu-name">My All category
                                                        </span>
                                                </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi mdi-eye  "></i>
                                    </span>
                                </a>
                            </li>
                    </ul>
                </li>

                <li class="menu-item ">
                    <a href="#" class="open-dropdown menu-link">
                            <span class="menu-label">
                                <span class="menu-name">My Coupon
                                    <span class="menu-arrow"></span>
                                </span>
                            </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder mdi mdi-gift"></i>
                                </span>
                    </a>
                    <!--submenu-->
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href='{{ url('/factory/add-coupon') }}' class=' menu-link'>
                                            <span class="menu-label">
                                                    <span class="menu-name">Add New Coupon
                                                    </span>
                                            </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder mdi mdi-currency-usd  "></i>
                                </span>
                            </a>
                        </li>
                        <li class="menu-item">
                                <a href='{{ url('/factory/view-coupons') }}' class=' menu-link'>
                                                <span class="menu-label">
                                                        <span class="menu-name">My All coupon
                                                        </span>
                                                </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi mdi-eye  "></i>
                                    </span>
                                </a>
                            </li>
                    </ul>
                </li>
                            </ul>
                        </li>

            {{--  STORE BUTTON  START--}}
            {{--  <li class="menu-item ">
                    <a href="#" class="open-dropdown menu-link">
                            <span class="menu-label">
                                <span class="menu-name">My Factory
                                    <span class="menu-arrow"></span>
                                </span>
                            </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder mdi mdi-store "></i>
                                </span>
                    </a>
                    <!--submenu-->
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href='{{ url('view_store/'.$factoryDetails->id) }}' class=' menu-link'>
                                            <span class="menu-label">
                                                    <span class="menu-name">View Store
                                                    </span>
                                            </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder mdi mdi-eye"></i>
                                </span>
                            </a>
                        </li>
                        <li class="menu-item">
                                <a href='{{ url('/factory/view-products') }}' class=' menu-link'>
                                                <span class="menu-label">
                                                        <span class="menu-name">Edit Store
                                                        </span>
                                                </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi mdi-grease-pencil"></i>
                                    </span>
                                </a>
                            </li>
                    </ul>
            </li>  --}}
            {{--  STORE BUTTON  END--}}

                        </ul>
                    </li>
                </ul>

            </div>

    </aside>

        {{--  END OF SIDE BAR  --}}
