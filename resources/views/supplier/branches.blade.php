
{{-- Supplier edit Profile  --}}
@section('content')
@extends('layouts.supplierLayout.supplier_design')

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ url('/supplier/dashboard') }}">Home</a></li>
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
    <form enctype="multipart/form-data" action="{{ url('/supplier/add-branch') }}" method="POST" class="form-control-with-bg">{{ csrf_field() }}
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
                                <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Add Information about Branch</legend>
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Email</label>
                                    <div class="col-md-6">
                                        <input type="text"  name="email" value="{{ $supplierDetails->email }}"  placeholder="Email" readonly class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Branch Name</label>
                                    <div class="col-md-6">
                                        <input type="text" name="branch_name"  placeholder="Branch Name" class="form-control" />
                                    </div>
                                </div>
                                <!-- end form-group row -->
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Branch Location</label>
                                    <div class="col-md-6">
                                        <input type="text" name="branch_location" placeholder="Branch Location"  class="form-control" />
                                    </div>
                                </div>
                                <!-- end form-group row -->
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Phone Number</label>
                                    <div class="col-md-6">
                                        <input type="text" id="branch_phn_no" name="branch_phn_no" placeholder="Phone Number of Branch"  class="form-control" />
                                    </div>
                                </div>
                                <!-- end form-group row -->
                                <div class="jumbotron m-b-0 text-center" style="background-color: transparent">
                                    <input type="submit" value="Add Branch" class="btn btn-primary btn-lg">
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

    <!-- begin #content -->
    <div id="content" class="content"  style="margin-left: -35px;margin-right: -55px;">

        <!-- begin page-header -->
        <h1 class="page-header">View Branches</small></h1>
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
                <h4 class="panel-title">Branches</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <table id="data-table-default" class="table table-striped table-bordered">
                    <thead>
                            <tr>
                                <th>Branch ID</th>
                                <th>Branch Name</th>
                                <th>Branch Location</th>
                                <th>Branch Contact No</th>
                                <th>Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($branches as $branch)
                        <tr class="gradeX">
                          <td class="center">{{ $branch->id }}</td>
                          <td class="center">{{ $branch->branch_name }}</td>
                          <td class="center">{{ $branch->branch_location }}</td>
                          <td class="center">{{ $branch->branch_phn_no }}</td>
                          <td class="center">
                            <a  href="{{ url('supplier/edit-branch/'.$branch->id)}}"
                                class="btn btn-success btn-mini">Edit Branch</a>
                                <br>
                                <br>
                                <a  href="{{ url('supplier/delete-branch/'.$branch->id)}}"
                                    class="btn btn-success btn-mini">Delete Branch</a>
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

</div>
<!-- end #content -->

@endsection
