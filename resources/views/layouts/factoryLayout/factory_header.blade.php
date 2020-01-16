<!--site header begins-->
<header class="admin-header">

    <a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body"> </a>

    <nav class=" mr-auto my-auto">
        <ul class="nav align-items-center">


        </ul>
    </nav>
    <nav class=" ml-auto">
        <ul class="nav align-items-center">
            <li>
                    <span class="d-none d-md-inline">{{  $factoryDetails->name}} {{  $factoryDetails->last_name}}</span> <b class="caret"></b>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                            <img class="admin-brand-logo" src="{{ asset('images/factoryend_images/factory_images/small/'.$factoryDetails->factory_image)}}" width="40" alt="atmos Logo">
                    </div>
                </a>
                <div class="dropdown-menu  dropdown-menu-right">
                    <a class="dropdown-item" href="{{ url('/factory/edit-profile')}}">  Account
            </a>
                    <a class="dropdown-item" href="{{ url('/factory/view-chats')}}">Chatting</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/factory-logout')}}"> Logout</a>
                </div>
            </li>

        </ul>

    </nav>
</header>
<!--site header End-->
