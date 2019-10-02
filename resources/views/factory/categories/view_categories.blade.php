{{-- Factory VIEW categories  --}}
@section('content')
@extends('layouts.factoryLayout.factory_design')

<main class="admin-main">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="{{ url('/factory/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/factory/add-category') }}">Add Category</a></li>
        </ol>
        <!-- end breadcrumb -->
        <section class="admin-content">
                <div class="bg-dark">
                    <div class="container  m-b-30">
                        <div class="row">
                            <div class="col-12 text-white p-t-40 p-b-90">
                                <h4 class="">
                                   Manage Categories
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
                                                    <th class="text-nowrap">Category ID</th>
                                                    <th class="text-nowrap">Main Category</th>
                                                    <th class="text-nowrap">Category Level</th>
                                                    <th class="text-nowrap">Category URL</th>
                                                    <th class="text-nowrap">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                <tr class="odd gradeX">
                                                <td>{{$category->id }}</td>
                                                        <td>{{$category->name }}</td>
                                                        <td>{{$category->parent_id}}</td>
                                                        <td>{{$category->url }}</td>
                                                <td class="center"><a href="{{ url('/factory/edit-category/'.$category->id)}}"
                                                    class="btn btn-primary btn-mini">Edit</a>  <a
                                                         href="{{ url('/factory/delete-category/'.$category->id)}}"
                                                        class="btn btn-danger btn-mini deleteRecord">Delete</a></td>
                                                      </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-nowrap">Category ID</th>
                                                    <th class="text-nowrap">Main Category</th>
                                                    <th class="text-nowrap">Category Level</th>
                                                    <th class="text-nowrap">Category URL</th>
                                                    <th class="text-nowrap">Actions</th>
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


