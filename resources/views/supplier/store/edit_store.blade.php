{{-- Supplier EDIT Store  --}}
@section('content')
    @extends('layouts.supplierLayout.supplier_design')

    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="{{ url('/supplier/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/supplier/view_store_notice') }}">View Store</a></li>
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
        <form action="{{ url('/supplier/edit-store/'.$supplierDetails->id )}}" style="margin-top: 5%" method="post" name="edit_store" class="form-control-with-bg">{{ csrf_field() }}
                <div id="wizard" >
                    <div>
                        <div id="step-1">
                            <div class="row" style="background-color:">
                                <div class="col-md-8 offset-md-2">
                                    <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse"><h1>Edit Store</h1></legend>
                                    {{--  //Main Color  --}}
                                    <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Main Color:</label>
                                            <div class="col-md-6" style=" padding-left: 25px">
                                                <input style="width: 120px; height: 35px;" type="color" name="main_color" value="{{ $supplierDetails->main_color}}">
                                            </div>
                                    </div>
                                    {{--  secondary_color  --}}
                                    <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Secondary Color:</label>
                                            <div class="col-md-6" style=" padding-left: 25px">
                                                <input style="width: 120px; height: 35px;" type="color" name="secondary_color" value="{{ $supplierDetails->secondary_color}}">
                                            </div>
                                    </div>
                                    {{--  store_name_color  --}}
                                    <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Store Name Color:</label>
                                            <div class="col-md-6" style=" padding-left: 25px">
                                                <input style="width: 120px; height: 35px;" type="color" name="store_name_color" value="{{ $supplierDetails->store_name_color}}">
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                        </div>
                                    <div class="jumbotron m-b-0 text-center col-sm-2" style="background-color: transparent">
                                        <input type="submit" value="Update Store" class="btn btn-primary btn-lg">
                                    </div>
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="jumbotron m-b-0 text-center col-sm-2" style="background-color: transparent; vertical-align:middle; text-align:center;">
                                            <a style="width: 150px; height: 45px; vertical-align:middle; text-align:center; " href="{{ url('/view_store/'.$supplierDetails->id) }}"
                                                class="btn btn-success btn-large" >View Store</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
<div align="center" style="margin-top: 40px">
        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse"><h1>Select Background Image</h1></legend>
        <div id="wrapper-img" style="background-color: lightgrey">
                <div id="innerwrapper" class="row">
                    @foreach ($designs as $design)
                        <div class="containerr">
                        <form action="{{ url('/supplier/edit-store-background/'.$design->id) }}" enctype="multipart/form-data" method="POST" name="edit_store" >{{ csrf_field() }}
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

@endsection
