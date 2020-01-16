
{{-- factory ADD Banner  --}}
@section('content')
    @extends('layouts.factoryLayout.factory_design')
    <main class="admin-main">

    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="{{ url('/factory/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/factory/view-banners') }}">View Banners</a></li>
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
        <form action="{{ url('/factory/add-banner') }}" enctype="multipart/form-data" method="POST" name="add_banner" class="form-control-with-bg">{{ csrf_field() }}
        <!-- begin wizard -->
            <div id="wizard">
                <div>
                    <div id="step-1">
                        <div class="row">
                            {{-- begin personal information --}}
                            <div class="col-md-8 offset-md-2">
                                <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Add Banner</legend>
                                <div class="form-group row m-b-10" style="margin-top: 50px">
                                        <label class="col-md-3 text-md-right col-form-label">Banner Image</label>
                                        <div  class="col-md-6" id="uniform-undefined" >
                                             <input type="file" name="image" id="image" required/>
                                        </div>
                                </div>
                                <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label">Title</label>
                                        <div class="col-md-6">
                                            <input type="text" name="title" id="title"  placeholder="Title" class="form-control" required/>
                                        </div>
                                    </div>
                                    <!-- end form-group row -->
                                    <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Link</label>
                                            <div class="col-md-6">
                                                <input type="text" name="link" id="link"  placeholder="same as title and without space" class="form-control" required/>
                                            </div>
                                        </div>
                                    <!-- begin form-group row -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"></label>
                                        <div class="col-md-6">
                                                <input type="hidden" name="status" class="form-control m-b-10" id="status" value="0" checked>
                                        </div>
                                    </div>
                                    <div class="jumbotron m-b-0 text-center" style="background-color: transparent">
                                            <input type="submit" value="Add Banner" class="btn btn-primary btn-lg">
                                    </div>
                            </div>
                        {{-- end personal info --}}
                        <!-- end col-8 -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end step-1 -->
                </div>
                <!-- end wizard-content -->
            </div>
            <!-- end wizard -->
        </form>
        <!-- end wizard-form -->
    </div>
    <!-- end #content -->
</main>

@endsection
