{{-- Factory FAQ'S of product  --}}
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
                                   FAQs of Products
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
                                        <table id="data-table-default" class="table table-striped table-bordered">
                                            <thead>
                                                    <tr>
                                                            <th>Product ID</th>
                                                            <th>Product Name</th>
                                                            <th>Price</th>
                                                            <th>Image</th>
                                                            <th>Actions</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($products as $product)
                                                  <tr class="odd gradeX">
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>
                                                      @if(!empty($product->image))
                                                        <img src="{{ asset('/images/supplierend_images/products/small/'.$product->image) }}"
                                                        style="width:60px;">
                                                      @endif
                                                    </td>
                                                    <td class="center">
                                                      <a href="  {{ url('/factory/view-faq/'.$product->id) }}"
                                                      class="btn btn-primary btn-mini" title="View FAQ">View FAQs</a>
                                                  </td>
                                                  </tr>

                                                  @endforeach
                                            </tbody>
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
