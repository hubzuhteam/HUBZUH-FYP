<!-- begin #header -->
<div id="header" class="header navbar-default">
        <!-- begin navbar-header -->
        <div class="navbar-header">
            <a href="{{ url('/supplier/dashboard') }}" class="navbar-brand"><span class="navbar-logo"></span> <b>HUBZUH</b> Supplier Dashboard</a>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- end navbar-header -->
        <!-- begin header-nav -->
        <ul class="navbar-nav navbar-right">
            <li class="dropdown navbar-user" href="javascript:void(0)">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('images/supplierend_images/store_images/small/'.$supplierDetails->store_image)}}" alt="" />
                    <span class="d-none d-md-inline">{{ Session::get('supplierdetails')['name'] }} {{ Session::get('supplierdetails')['last_name'] }}</span> <b class="caret"></b>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ url('/supplier/edit-profile') }}" class="dropdown-item">Edit Profile</a>
                    <a href="{{ url('/supplier/view-chats') }}" class="dropdown-item">Inbox</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ url('/supplier-logout')}}" class="dropdown-item">Log Out</a>
                </div>
            </li>
        </ul>
        <!-- end header navigation right -->
    </div>
    <!-- end #header -->
