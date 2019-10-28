
{{-- Supplier ADD CATGEORY  --}}
@section('content')
@extends('layouts.supplierLayout.supplier_design')

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ url('/supplier/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/supplier/add-product') }}">Add Product</a></li>
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
    <div id="content" class="content"  style="margin-left: -35px;margin-right: -55px;">

        <!-- begin page-header -->
        <h1 class="page-header">Manage Products</small></h1>
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
                <h4 class="panel-title">Products</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <table id="data-table-default" class="table table-striped table-bordered">
                    <thead>
                            <tr>
                                    <th>Product ID</th>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Product Description</th>
                                    <th>Product Color</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Feature Item</th>
                                    <th>Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                            @foreach($products as $product)
                          <tr class="odd gradeX">
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category_id }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->product_color }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                              @if(!empty($product->image))
                                <img src="{{ asset('/images/supplierend_images/products/small/'.$product->image) }}"
                                style="width:60px;">
                              @endif
                            </td>
                            <td class="center">@if($product->feature_item == 1) Yes @else No @endif</td>
                            <td class="center">
                              <a href="  {{ url('/supplier/edit-product/'.$product->id) }}"
                              class="btn btn-primary btn-mini" title="Edit Product">Edit</a>
                              <a href="{{ url('/supplier/add-attributes/'.$product->id) }}"
                              class="btn btn-success btn-mini" title="Add Attributes">Add Attributes</a>
                              <a href="{{ url('/supplier/add-colour/'.$product->id) }}"
                                class="btn btn-success btn-mini" title="Add Colours">Add Colour</a>
                              <a href="{{ url('/supplier/add-images/'.$product->id) }}"
                                  class="btn btn-primary btn-mini" title="Add Images">Add Images</a>
                              <a id="delProduct"
                               href="{{ url('/supplier/delete-product/'.$product->id) }}"
                              class="btn btn-warning btn-mini deleteRecord" title="Delete Product">Delete</a>
                          </td>
                          </tr>
                              <div id="myModal{{ $product->id }}" class="modal hide">
                                <div class="modal-header">
                                  <button data-dismiss="modal" class="close" type="button">×</button>
                                  <h3>{{ $product->product_name }} Full Details</h3>
                                </div>
                                <div class="modal-body">
                                  <p>Product ID: {{ $product->id }}</p>
                                  <p>Category ID: {{ $product->category_id }}</p>
                                  <p>Product Code: {{ $product->product_code }}</p>
                                  <p>Product Color: {{ $product->product_color }}</p>
                                  <p>Price: {{ $product->price }}</p>
                                  <p>Fabric: </p>
                                  <p>Material: </p>
                                  <p>Description: {{ $product->description }}</p>
                                </div>
                              </div>
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


