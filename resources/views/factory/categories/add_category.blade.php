
{{-- Factory ADD CATGEORY  --}}
@section('content')
@extends('layouts.factoryLayout.factory_design')
<main class="admin-main">

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ url('/factory/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/factory/view-categories') }}">View Categories</a></li>
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
    <form action="{{ url('/factory/add-category') }}" method="POST" name="add_category" class="form-control-with-bg">{{ csrf_field() }}
        <!-- begin wizard -->
        <div id="wizard">
            <!-- begin wizard-content -->
            <div>
                <!-- begin step-1 -->
                <div id="step-1">
                        <!-- begin row -->
                        <div class="row">
                            <!-- begin col-8 -->
                            {{-- begin personal information --}}
                            <div class="col-md-8 offset-md-2">
                                <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Add Category</legend>
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Category Name</label>
                                    <div class="col-md-6">
                                        <input type="text" name="category_name" id="category_name"  placeholder="Category Name" class="form-control" required/>
                                    </div>
                                </div>
                                <!-- end form-group row -->
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Category Lavel</label>
                                    <div class="col-md-6">
                                            <select name="parent_id" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-info" required>
                                                    <option value="0">Main Category</option>
                                                    @foreach ($levels as $val)
                                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                                    @endforeach
                                            </select>
                                    </div>
                                </div>
                                <!-- end form-group row -->
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Discription</label>
                                    <div class="col-md-6">
                                        <textarea cols="40" rows="6" id="description" name="description" placeholder="Description"  class="form-control" required/></textarea>
                                    </div>
                                </div>
                                <!-- end form-group row -->
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">URL</label>
                                    <div class="col-md-6">
                                        <input type="text" id="rl" name="url" placeholder="Same name as category (Space not allowed)"  class="form-control" required/>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label">Meta Title</label>
                                        <div class="col-md-6">
                                            <input type="text" name="meta_title" id="meta_title" placeholder="Meta Title (SEO)"  class="form-control" required/>
                                </div>
                                </div>
                                <!-- end form-group row -->
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Meta Description</label>
                                    <div class="col-md-6">
                                        <input type="text" name="meta_description" id="meta_description" placeholder="Meta Description (SEO)"  class="form-control m-b-10" />
                                    </div>
                                </div>
                                <!-- end form-group row -->
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Meta Keywords</label>
                                    <div class="col-md-6">
                                        <input type="text" name="meta_keywords" id="meta_keywords" placeholder="Meta Keywords (SEO)"  class="form-control m-b-10" />
                                    </div>
                                </div>
                                <!-- end form-group row -->
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Enable</label>
                                    <div class="col-md-6">
                                            <input type="checkbox" name="status" class="form-control m-b-10" id="status" value="1" checked>
                                    </div>
                                </div>
                                <!-- end form-group row -->
                                <div class="jumbotron m-b-0 text-center" style="background-color: transparent">
                                        {{-- <p><a href="javascript:;" class="btn btn-primary btn-lg">Update Profile</a></p> --}}
                                        <input type="submit" value="Add Category" class="btn btn-primary btn-lg">
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
