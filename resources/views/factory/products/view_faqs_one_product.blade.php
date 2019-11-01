{{-- Factory View one FAQ's  --}}
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
                                                            <th>FAQ ID</th>
                                                            <th>Question By:</th>
                                                            <th>Question</th>
                                                            <th>Answer</th>
                                                            <th>Created at</th>
                                                            <th>Actions</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($faqs as $product)

                                                  <tr class="odd gradeX">
                                                    <td>{{ $product->id }}</td>
                                                    @foreach ($users as $user)
                                                        @if ($user->id == $product->user_id)
                                                            <td>{{ $user->name }}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>{{ $product->question }}</td>
                                                    <form action="{{ url('factory/edit-faq/'.$product->id) }}" method="post">{{csrf_field()}}

                                                    <td><input type="text" id="answer" name="answer" value="{{ $product->answer }}"></td>
                                                    <td>{{ $product->created_at }}</td>

                                                    <td class="center">
                                                            <input type="submit" value="Update Answer" class="btn btn-info btn-mini">
                                                    </td>
                                                </form>

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
