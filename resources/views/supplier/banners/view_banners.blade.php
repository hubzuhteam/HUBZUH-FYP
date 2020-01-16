
{{-- Supplier ADD CATGEORY  --}}
@section('content')
@extends('layouts.supplierLayout.supplier_design')

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ url('/supplier/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/supplier/add-banner') }}">Add Banner</a></li>
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

    <!-- begin #content -->
    <div id="content" class="content" style="margin-left: auto;margin-right: auto;">

        <!-- begin page-header -->
        <h1 class="page-header">Manage Banners</small></h1>
        <!-- end page-header -->

        <!-- begin panel -->
        <div class="panel panel-inverse">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Banners</h4>
            </div>
            <!-- end panel-heading -->
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
                                    <a href="{{ url('/supplier/edit-banner/'.$banner->id) }}" class="btn btn-primary btn-mini">Edit</a>
                                    <a id="delBanner"  href="{{ url('/admin/delete-banner/'.$banner->id) }}" <?php /* href="{{ url('/admin/delete-banner/'.$banner->id) }}" */ ?> class="btn btn-danger btn-mini deleteRecord">Delete</a>
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


@endsection


