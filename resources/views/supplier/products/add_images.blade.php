
{{-- Supplier ADD Images  --}}
@section('content')
@extends('layouts.supplierLayout.supplier_design')

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ url('/supplier/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/supplier/view-products') }}">View Products</a></li>
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
    <form action="{{ url('/supplier/add-images/'.$productDetails->id) }}" enctype="multipart/form-data" method="POST" name="add_image" id="add_image" class="form-control-with-bg">{{ csrf_field() }}
        <!-- begin wizard -->
        <input type="hidden" name="product_id" value={{$productDetails->id}}>

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
                                <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Add Attributes</legend>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Product Name</label>
                                    <div class="col-md-6">
                                        <strong class="form-control">{{ $productDetails->product_name }}</strong>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Product Code</label>
                                    <div class="col-md-6">
                                            <strong class="form-control">{{ $productDetails->product_code }}</strong>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Product Color</label>
                                    <div class="col-md-6">
                                            <strong class="form-control">{{ $productDetails->product_color }}</strong>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label">Alternate Image(s)</label>
                                        <div class="col-md-6">
                                          <input type="file" name="image[]" id="image" multiple="multiple">
                                        </div>
                                </div>
                                <div class="jumbotron m-b-0 text-center" style="background-color: transparent">
                                        <input type="submit" value="Add Images" class="btn btn-primary btn-lg">
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
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
            <h4 class="panel-title">Categories</h4>
        </div>
        <!-- end panel-heading -->
        <!-- begin panel-body -->
        <div class="panel-body">
                <form action="{{ url('supplier/edit-images/'.$productDetails->id) }}" method="post">{{csrf_field()}}
            <table id="data-table-default" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-nowrap">Image ID</th>
                        <th class="text-nowrap">Product ID</th>
                        <th class="text-nowrap">Image</th>
                        <th class="text-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($productImages as $image)
                        <tr class="gradeX">
                          <td class="center">{{ $image->id }}</td>
                          <td class="center">{{ $image->product_id }}</td>
                          <td class="center"><img width=130px
                            src="{{ asset('images/supplierend_images/products/small/'.$image->image) }}"></td>
                          <td class="center"><a id="delImage"
                            href="{{ url('/supplier/delete-alt-image/'.$image->id) }}"
                             class="btn btn-danger btn-mini deleteRecord">Delete</a></td>
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
</form>
<!-- end wizard-form -->
@endsection
