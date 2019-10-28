
{{-- Supplier View FAQs  --}}
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


    <!-- begin #content -->
    <div id="content" class="content"  style="margin-left: -35px;margin-right: -55px;">



        <!-- begin page-header -->
        <p style="font-size: 30px; color: black; display: inline"><strong>{{ $product->product_name }}</strong></p>
        <h1 class="page-header" style="display: inline"></h1>
        <p style="font-size: 30px; color: black; display: inline"><strong>(Code: {{ $product->product_code }} )</strong></p>


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
                <h4 class="panel-title">FAQs</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
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
                            <form action="{{ url('supplier/edit-faq/'.$product->id) }}" method="post">{{csrf_field()}}

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
            <!-- end panel-body -->
        </div>
        <!-- end panel -->
    </div>
    <!-- end #content -->


@endsection


