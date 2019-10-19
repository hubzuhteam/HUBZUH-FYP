{{-- factory EDIT Store  --}}
@section('content')
    @extends('layouts.factoryLayout.factory_design')
    <link href="{{ asset('css/factoryend_css/default/style.min2.css') }}" rel="stylesheet" />
    <main class="admin-main">

    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="{{ url('/factory/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/view_factorystore_notice') }}">View FactoryStore</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/factory/edit-profile') }}">Edit FactoryStore Details</a></li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <!-- end page-header -->
        <!-- begin wizard-form -->
        @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif

        <div  class="col-md-8 offset-md-2" style="margin-top: 5%;"  >

        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse"><h1>Edit Your FactoryStore Details.</h1></legend>

        <form action="{{ url('/factory/edit-profile/' )}}" style="margin-top: 5% align-cont" method="post" name="edit_profile" class="form-control-with-bg">{{ csrf_field() }}

                <div  class="jumbotron m-b-0 text-center col-sm-2" style="background-color: transparent">
                        <input type="submit" value="Edit Store Details" class="btn btn-success btn-lg">
                </div>

        </form>

        </div>

        <div  class="col-md-8 offset-md-2" style="margin-top: 5%;"  >

            <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse"><h1>Add/Edit Your Branches.</h1></legend>

            <form action="{{ url('/factory/branches/' )}}" style="margin-top: 5% align-cont" method="post" name="edit_profile" class="form-control-with-bg">{{ csrf_field() }}

                    <div  class="jumbotron m-b-0 text-center col-sm-2" style="background-color: transparent">
                            <input type="submit" value="Add/Edit Branches" class="btn btn-primary btn-lg">
                    </div>

            </form>

        </div>

        <form action="{{ url('/factory/edit-factorystore/'.$factoryDetails->id )}}" style="margin-top: 5%" method="post" name="edit_store" class="form-control-with-bg">{{ csrf_field() }}
                <div id="wizard" >
                    <div>
                        <div id="step-1">
                            <div class="row" style="background-color:">
                                    <!-- begin #content -->
    <div id="content" class="col-md-8 offset-md-2" >

            <section class="admin-content">
                    <div class="bg-dark">
                        <div class="container  m-b-30">
                            <div class="row">
                                <div class="col-12 text-white p-t-40 p-b-90">
                                    <h4 class="">
                                       Manage Branches
                                    </h4>
                                    <p class="opacity-75 ">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container  pull-up">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive p-t-10">
                                            <table id="example" class="table   " style="width:100%">
                                                    <thead>
                                                            <tr>
                                                              <th>Theme ID</th>
                                                              <th>Theme Name</th>
                                                              <th>Selected Theme</th>
                                                              <th>Actions</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                              @foreach($themes as $theme)
                                                            <tr class="gradeX">
                                                              <td style="font-style: bold; font-size: 15px" class="center">{{ $theme->theme_id }}</td>
                                                              <td style="font-style: bold; font-size: 15px" class="center">{{ $theme->theme_name }}</td>
                                                              <td class="center">
                                                                @if(!empty($factoryDetails->theme_id==$theme->theme_id))
                                                                    <i style="font-style: bold; font-size: 20px" class="fas fa-hand-peace">   Selected</i>
                                                                @endif
                                                              </td>
                                                              <td class="center">
                                                                <a href="{{ url('/factory/view-theme/'.$theme->theme_id) }}" class="btn btn-primary btn-mini">View Theme</a>
                                                                <a href="{{ url('/factory/edit-factorystore-theme/'.$theme->theme_id) }}" class="btn btn-danger btn-mini deleteRecord">Select Theme</a>
                                                              </td>
                                                            </tr>
                                                            @endforeach
                                                          </tbody>
                                                <tfoot>
                                                        <tr>
                                                                <th>Theme ID</th>
                                                                <th>Theme Name</th>
                                                                <th>Selected Theme</th>
                                                                <th>Actions</th>
                                                        </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
    </div>
    <!-- end #content -->

                                <div class="col-md-8 offset-md-2" style="margin-top: 25px">
                                    <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse"><h1>Edit Store</h1></legend>
                                    {{--  //Main Color  --}}
                                    <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Main Color:</label>
                                            <div class="col-md-6" style=" padding-left: 25px">
                                                <input style="width: 120px; height: 35px;" type="color" name="main_color" value="{{ $factoryDetails->main_color}}">
                                            </div>
                                    </div>
                                    {{--  secondary_color  --}}
                                    <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Secondary Color:</label>
                                            <div class="col-md-6" style=" padding-left: 25px">
                                                <input style="width: 120px; height: 35px;" type="color" name="secondary_color" value="{{ $factoryDetails->secondary_color}}">
                                            </div>
                                    </div>
                                    {{--  store_name_color  --}}
                                    <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Store Name Color:</label>
                                            <div class="col-md-6" style=" padding-left: 25px">
                                                <input style="width: 120px; height: 35px;" type="color" name="factorystore_name_color" value="{{ $factoryDetails->factorystore_name_color}}">
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                        </div>
                                    <div class="jumbotron m-b-0 text-center col-sm-2" style="background-color: transparent">
                                        <input type="submit" value="Update Factory Store" class="btn btn-primary btn-lg">
                                    </div>
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="jumbotron m-b-0 text-center col-sm-2" style="background-color: transparent; vertical-align:middle; text-align:center;">
                                            <a target="_black" style="width: 150px; height: 45px; vertical-align:middle; text-align:center; " href="{{ url('view_factory/'.$factoryDetails->id) }}"
                                                class="btn btn-success btn-large" >View Factory Store</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
            <div align="center" style="margin-top: 40px">
                <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse"><h1>Select Background Image</h1></legend>
                <div id="wrapper-imgg" style="background-color: lightgrey">
                <div id="innerwrapper" class="row">
                    @foreach ($designs as $design)
                        <div class="containerr">
                        <form action="{{ url('/factory/edit-factorystore-background/'.$design->id) }}" enctype="multipart/form-data" method="POST" name="edit_store" >{{ csrf_field() }}
                                <img src="{{ asset('images/backend_images/backgrounds/large/'.$design->background_img)}}" alt="Snow">
                                <input type="hidden" name="image" id="image" value="{{ $design->background_img }}">
                                <button class="btn" type="submit">Select</button>
                        </form>
                        </div>
                    @endforeach
                </div>
              </div>
            </div>

    </div>

    </main>
@endsection
