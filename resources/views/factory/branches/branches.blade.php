
{{-- factory edit Profile  --}}
@section('content')
@extends('layouts.factoryLayout.factory_design')
<main class="admin-main">

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ url('/factory/dashboard') }}">Home</a></li>
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
    <form enctype="multipart/form-data" action="{{ url('/factory/add-branch') }}" method="POST" class="form-control-with-bg">{{ csrf_field() }}
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
                                        <input type="text"  name="email" value="{{ $factoryDetails->email }}"  placeholder="Email" readonly class="form-control" />
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

    <section class="admin-content">
            <div class="bg-dark">
                <div class="container  m-b-30">
                    <div class="row">
                        <div class="col-12 text-white p-t-40 p-b-90">
                            <h4 class="">
                               Manage Branches
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
                                                    <a  href="{{ url('factory/edit-branch/'.$branch->id)}}"
                                                        class="btn btn-success btn-mini">Edit Branch</a>
                                                        <br>
                                                        <br>
                                                        <a  href="{{ url('factory/delete-branch/'.$branch->id)}}"
                                                            class="btn btn-success btn-mini">Delete Branch</a>
                                                  </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        <tfoot>
                                                <tr>
                                                        <th>Branch ID</th>
                                                        <th>Branch Name</th>
                                                        <th>Branch Location</th>
                                                        <th>Branch Contact No</th>
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
</div>
<!-- end #content -->

</main>
@endsection
