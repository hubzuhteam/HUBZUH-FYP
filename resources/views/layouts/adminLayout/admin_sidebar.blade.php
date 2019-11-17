<?php $url = url()->current(); ?>
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i>
    Dashboard</a>
    <ul>
    <li <?php if(preg_match("/dashboard/i",$url)){?> class="active" <?php } ?>><a
        href="{{ url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>

        <li><a
            href="{{ url('/admin/view-chats')}}"><i class="icon icon-inbox"></i> <span>Chat Rooms</span></a> </li>

        @if (Session::get('adminDetails')['categories_access']==1)

        <li class="submenu"> <a href="#"><i class="icon icon-list-alt"></i> <span>Categories</span>
        <span class="label label-important">2</span></a>
      <ul <?php if(preg_match("/categor/i",$url)){?> style="display: block;" <?php } ?>>
        <li <?php if(preg_match("/add-category/i",$url)){?> class="active" <?php } ?>><a
            href="{{ url('/admin/add-category')}}">Add Category</a></li>
          <li <?php if(preg_match("/view-categories/i",$url)){?> class="active" <?php } ?>><a
            href="{{ url('/admin/view-categories')}}">View Categories</a></li>
        </ul>
      </li>
      @endif

      @if (Session::get('adminDetails')['type']=="Admin")


      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Coupons</span>
        <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/coupon/i",$url)){?> style="display: block;" <?php } ?>>
        <li <?php if(preg_match("/add-coupon/i",$url)){?> class="active" <?php } ?>><a
            href="{{ url('/admin/add-coupon')}}">Add Coupon</a></li>
          <li <?php if(preg_match("/view-coupons/i",$url)){?> class="active" <?php } ?>><a
            href="{{ url('/admin/view-coupons')}}">View Coupon</a></li>
        </ul>
      </li>

      @endif

      @if (Session::get('adminDetails')['orders_access']==1)

      <li class="submenu"> <a href="#"><i class="icon icon-shopping-cart"></i> <span>Orders</span>
        <span class="label label-important">1</span></a>
        <ul <?php if(preg_match("/orders/i",$url)){?> style="display: block;" <?php } ?>>
          <li <?php if(preg_match("/view-orders/i",$url)){?> class="active" <?php } ?>><a
            href="{{ url('/admin/view-orders')}}">View Orders</a></li>
        </ul>
      </li>

      @endif

      {{--  /////Design stuff for Supplier and Factory  --}}
      <li class="submenu"> <a href="#"><i class="icon icon-picture"></i> <span>Designs</span>
        <span class="label label-important">4</span></a>
        <ul <?php if(preg_match("/design/i",$url)){?> style="display: block;" <?php } ?>>
          <li <?php if(preg_match("/add-Design/i",$url)){?> class="active" <?php } ?>><a
            href="{{ url('/admin/add-design')}}">Add Background Image</a></li>
            <li <?php if(preg_match("/view-Designs/i",$url)){?> class="active" <?php } ?>><a
                href="{{ url('/admin/view-designs')}}">View Background Images</a></li>

            <li <?php if(preg_match("/add-theme/i",$url)){?> class="active" <?php } ?>><a
                href="{{ url('/admin/add-theme')}}">Add Theme</a></li>
            <li <?php if(preg_match("/view-themes/i",$url)){?> class="active" <?php } ?>><a
                    href="{{ url('/admin/view-themes')}}">View Themes</a></li>

        </ul>
      </li>

      @if (Session::get('adminDetails')['type']=="Admin")

      <li class="submenu"> <a href="#"><i class="icon icon-picture"></i> <span>Banners</span>
        <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/banner/i",$url)){?> style="display: block;" <?php } ?>>
        <li <?php if(preg_match("/add-banner/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/add-banner')}}">Add Banner</a></li>
          <li <?php if(preg_match("/view-banners/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/view-banners')}}">View Banner</a></li>
        </ul>
      </li>

      @endif

      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Suppliers</span>
        <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/suppliers/i",$url)){?> style="display: block;" <?php } ?>>
          <li <?php if(preg_match("/view-suppliers/i",$url)){?> class="active" <?php } ?>><a
            href="{{ url('/admin/view-suppliers')}}">View Suppliers</a></li>
        </ul>
      </li>
      @if (Session::get('adminDetails')['users_access']==1)

      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span>
        <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/users/i",$url)){?> style="display: block;" <?php } ?>>
          <li <?php if(preg_match("/view-users/i",$url)){?> class="active" <?php } ?>><a
            href="{{ url('/admin/view-users')}}">View Users</a></li>
        </ul>
      </li>

      @endif

      @if (Session::get('adminDetails')['type']=="Admin")


      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Admins/Sub-Admins</span>
        <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/admins/i",$url)){?> style="display: block;" <?php } ?>>
          <li <?php if(preg_match("/add-admins/i",$url)){?> class="active" <?php } ?>><a
            href="{{ url('/admin/add-admin')}}">Add Admin/Sub-Admin</a></li>
        <li <?php if(preg_match("/view-admins/i",$url)){?> class="active" <?php } ?>><a
            href="{{ url('/admin/view-admins')}}">View Admins/Sub-Admins</a></li>
        </ul>
      </li>

      @endif

      @if (Session::get('adminDetails')['type']=="Admin")

      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>CMS Pages</span>
        <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/cms-page/i",$url)){?> style="display: block;" <?php } ?>>
        <li <?php if(preg_match("/add-cms-page/i",$url)){?> class="active" <?php } ?>><a
            href="{{ url('/admin/add-cms-page')}}">Add CMS Page</a></li>
          <li <?php if(preg_match("/view-cms-pages/i",$url)){?> class="active" <?php } ?>><a
            href="{{ url('/admin/view-cms-pages')}}">View CMS Pages</a></li>
        </ul>
      </li>

      @endif

      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Factories</span>
        <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/factories/i",$url)){?> style="display: block;" <?php } ?>>
          <li <?php if(preg_match("/view-factories/i",$url)){?> class="active" <?php } ?>><a
            href="{{ url('/admin/view-factories')}}">View Factories</a></li>
        </ul>
      </li>

    </ul>
  </div>
  <!--sidebar-menu-->
