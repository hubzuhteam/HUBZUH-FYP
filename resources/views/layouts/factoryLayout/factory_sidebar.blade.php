
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
                                                    <span class="menu-name">Dashboard
                                                        <span class="menu-arrow"></span>
                            </span>
    
                            </span>
                            <span class="menu-icon">
                               <span class="icon-badge badge-success badge badge-pill">4</span>
                            <i class="icon-placeholder mdi mdi-shape-outline "></i>
                            </span>
                        </a>
                    </li>
                        </ul>
                    </li>
                </ul>
    
            </div>
    
    </aside>
    
        {{--  END OF SIDE BAR  --}}