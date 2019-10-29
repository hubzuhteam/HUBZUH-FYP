{{-- Factory VIEW product  --}}
@section('content')
@extends('layouts.factoryLayout.factory_design')

<main class="admin-main">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="{{ url('/factory/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/factory/add-product') }}">Add Product</a></li>
        </ol>
        <!-- end breadcrumb -->
        <section class="admin-content">
                <div class="bg-dark">
                    <div class="container  m-b-30">
                        <div class="row">
                            <div class="col-12 text-white p-t-40 p-b-90">
                                <h4 class="">
                                   Manage Products
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
                                                    <th>Product ID</th>
                                                    <th>Category ID</th>
                                                    <th>Category Name</th>
                                                    <th>Product Name</th>
                                                    <th>Product Code</th>
                                                    <th>Product Description</th>
                                                    <th>Product Color</th>
                                                    <th>Price</th>
                                                    <th>Image</th>
                                                    {{--  <th>Feature Item</th>  --}}
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
                                                    {{--  <td class="center">@if($product->feature_item == 1) Yes @else No @endif</td>  --}}
                                                    <td class="center">
                                                      <a href="  {{ url('/factory/edit-product/'.$product->id) }}"
                                                      class="btn btn-primary btn-mini" title="Edit Product">Edit</a>
                                                      <a href="{{ url('/factory/add-attributes/'.$product->id) }}"
                                                      class="btn btn-success btn-mini" title="Add Attributes">Add Attributes</a>
                                                      <a href="{{ url('/factory/add-colours/'.$product->id) }}"

                                                        class="btn btn-success btn-mini" title="Add Colours">Add Colours</a>
                                                      <a href="{{ url('/factory/add-images/'.$product->id) }}"
                                                          class="btn btn-primary btn-mini" title="Add Images">Add Images</a>
                                                      <a id="delProduct"
                                                       href="{{ url('/factory/delete-product/'.$product->id) }}"
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
                                            <tfoot>
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
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

</main>

@endsection


