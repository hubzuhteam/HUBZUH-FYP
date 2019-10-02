
{{-- Supplier ADD CATGEORY  --}}
@section('content')
    @extends('layouts.factoryLayout.factory_design')
<!-- begin #content -->
    <section class="admin-main">


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

    <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="{{ url('/factory/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/factory/add-banner') }}">Add Banner</a></li>
            </ol>

        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">
                        <h4 class="">
                            Manage Banners
                        </h4>
                        <p class="opacity-75 ">
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- begin panel -->
        <div class="panel panel-inverse">

            <div class="container  pull-up">

            <!-- begin panel-body -->
            <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                                  <th>Banner ID</th>
                                  <th>Title</th>
                                  <th>Link</th>
                                  <th>Image</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach($banners as $banner)
                                <tr class="gradeX">
                                  <td class="center">{{ $banner->id }}</td>
                                  <td class="center">{{ $banner->title }}</td>
                                  <td class="center">{{ $banner->link }}</td>
                                  <td class="center">
                                    @if(!empty($banner->image))
                                    <img src="{{ asset('/images/frontend_images/banners/'.$banner->image) }}" style="width:250px;">
                                    @endif
                                  </td>
                                  <td class="center">
                                    <a href="{{ url('/factory/banners/edit-banner/'.$banner->id) }}" class="btn btn-primary btn-mini">Edit</a>
                                    <a id="delBanner"  href="{{ url('/factory/banners/delete-banner/'.$banner->id) }}"
              <?php /* href="{{ url('/admin/delete-banner/'.$banner->id) }}" */ ?> class="btn btn-danger btn-mini deleteRecord">Delete</a>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                </table>
            </div>
            <!-- end panel-body -->
        </div>
        <!-- end panel -->
    </div>
    <!-- end #content -->
    </div>
    </section>

@endsection


