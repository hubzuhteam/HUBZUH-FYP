
{{-- Supplier edit Profile  --}}
@section('content')
@extends('layouts.supplierLayout.supplier_design')

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ url('/supplier/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/supplier/edit-profile') }}">Edit Profile</a></li>
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
    <form enctype="multipart/form-data" action="{{ url('/supplier/update-profile') }}" method="POST" class="form-control-with-bg">{{ csrf_field() }}
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
                                <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Your Personal Information</legend>
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Email</label>
                                    <div class="col-md-6">
                                        <input type="text"  name="email" value="{{ $supplierDetails->email }}" placeholder="Email" readonly class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">First Name</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" value="{{ $supplierDetails->name }}" placeholder="First Name" class="form-control" />
                                    </div>
                                </div>
                                <!-- end form-group row -->
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Last Name</label>
                                    <div class="col-md-6">
                                        <input type="text" name="last_name" placeholder="Last Name" value="{{ $supplierDetails->last_name }}" class="form-control" />
                                    </div>
                                </div>
                                <!-- end form-group row -->
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Date of Birth</label>
                                    <div class="col-md-6">
                                        <input type="date" id="dob_date" name="dob_date" placeholder="Year-Month-Date" value="{{ $supplierDetails->dob }}" class="form-control" />
                                    </div>
                                </div>
                                <!-- end form-group row -->
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">CNIC No</label>
                                    <div class="col-md-6">
                                        <input type="text" name="cnic" placeholder="CNIC" value="{{ $supplierDetails->cnic }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label">Phone Number</label>
                                        <div class="col-md-6">
                                            <input type="text" name="mobile" placeholder="Phone Number" value="{{ $supplierDetails->mobile }}" class="form-control" />
                                </div>
                                </div>
                                <!-- end form-group row -->
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Address</label>
                                    <div class="col-md-6">
                                        <input type="text" name="address" placeholder="Address" value="{{ $supplierDetails->address }}" class="form-control m-b-10" />
                                    </div>
                                </div>
                                <!-- end form-group row -->
                            </div>
                            {{-- end personal info --}}
                            {{-- begin store info --}}
                            <div class="col-md-8 offset-md-2">
                                    <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Information Regarding Store</legend>
                                    <!-- begin form-group row -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label">Store Name</label>
                                        <div class="col-md-6">
                                            <input type="text" name="store_name" placeholder="Store Name" value="{{ $supplierDetails->store_name }}" class="form-control" />
                                        </div>
                                    </div>
                                    <!-- end form-group row -->
                                    <!-- begin form-group row -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label">Store Image</label>
                                        <div class="col-md-6" id="uniform-undefined" >
                                            {{-- <input type="file" name="store_image" id="store_image"/> --}}
                                            <table>
                                                <tr>
                                                  <td>
                                                    <input name="store_image" id="store_image" type="file">
                                                    @if(!empty($supplierDetails->store_image))
                                                      <input type="hidden" name="store_image" value="{{ $supplierDetails->store_image }}">
                                                    @endif
                                                  </td>
                                                  <td>
                                                    @if(!empty($supplierDetails->store_name))
                                                    <img style="width:30px;" src="{{ asset('/images/supplierend_images/store_images/small/'.$supplierDetails->store_image) }}">
                                                    @endif
                                                  </td>
                                                </tr>
                                              </table>
                                        </div>
                                    </div>
                                    <!-- end form-group row -->
                                    <!-- begin form-group row -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label">Deals In</label>
                                        <div class="col-md-6">
                                            <input type="text" name="deals_in" placeholder="Garments" value="{{ $supplierDetails->deals_in }}" class="form-control" />
                                        </div>
                                    </div>
                                    <!-- end form-group row -->

                                    <!-- begin form-group row -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label">Store Contact No</label>
                                        <div class="col-md-6">
                                            <input type="text" name="store_mobile" placeholder="Store Contact No" value="{{ $supplierDetails->store_mobile }}"  class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Store Email Address</label>
                                            <div class="col-md-6">
                                                <input type="text" name="store_email" placeholder="Store Email Address" value="{{ $supplierDetails->store_email }}" class="form-control" required />
                                            </div>
                                    </div>
                                    <!-- end form-group row -->
                                    <!-- begin form-group row -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label">Store Address</label>
                                        <div class="col-md-6">
                                            <input type="text" name="store_address" placeholder="Store Address" value="{{ $supplierDetails->store_address }}" class="form-control m-b-10" required />
                                        </div>
                                    </div>
                                    <!-- end form-group row -->
                                    <div class="jumbotron m-b-0 text-center" style="background-color: transparent">
                                                {{-- <p><a href="javascript:;" class="btn btn-primary btn-lg">Update Profile</a></p> --}}
                                                <input type="submit" value="Update Profile" class="btn btn-primary btn-lg">
                                    </div>
                            </div>
                            {{-- end store info --}}
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
</div>
<!-- end #content -->

@endsection
