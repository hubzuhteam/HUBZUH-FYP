<!--Header-part-->
<div id="header">
    {{--  //header  --}}
    {{--  <img style="" src="http://localhost/project1/public/images/logo.jpeg" alt="">  --}}
    <h1><a href="{{ url('/admin/dashboard')}}">Admin</a></h1>
  </div>
  <!--close-Header-part-->
<!--start-top-serch-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
      <li class=""><a title="" href="javascript:void(0)"> <span class="text">Welcome
          {{Session::get('adminDetails')['username']}}
        ({{Session::get('adminDetails')['type']}})</span></a></li>
      <li class=""><a title="" href="{{ url('/admin/settings')}}"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="{{ url('/logout')}}"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    </ul>
  </div>
  <!--close-top-Header-menu-->



  {{--  <div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
  </div>  --}}
  <!--close-top-serch-->
