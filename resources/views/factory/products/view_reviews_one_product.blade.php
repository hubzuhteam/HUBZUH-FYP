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
                                   Review Products
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
                                                            <th>Review ID</th>
                                                            <th>Review Rating</th>
                                                            <th>Review Heading</th>
                                                            <th>Review Description</th>
                                                            <th>Created at</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($reviews as $product)
                                                  <tr class="odd gradeX">
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->rating }} out of 5</td>
                                                    <td>{{ $product->heading }}</td>
                                                    <td>{{ $product->review }}</td>
                                                    <td>{{ $product->created_at }}</td>

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
