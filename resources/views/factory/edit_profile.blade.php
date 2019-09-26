
{{-- Fcatory edit Profile  --}}
@section('content')
@extends('layouts.factoryLayout.factory_design')

<div>
        <div class="page-container">
           <main class="main-content bgc-grey-100">
              <div id="mainContent">
                 <div class="row gap-20 masonry pos-r">
                    <div class="masonry-sizer col-md-6"></div>
                    <div class="masonry-item w-100">
                           
<form enctype="multipart/form-data"  action="{{ url('/factory/update-profile') }}" method="POST" class="form-control-with-bg" style="margin-top: 250dp">{{ csrf_field() }}
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
                                    <input type="text"  name="email" value="{{ $factoryDetails->email }}" placeholder="Email" readonly class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">First Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="{{ $factoryDetails->name }}" placeholder="First Name" class="form-control" />
                                </div>
                            </div>
                            <!-- end form-group row -->
                            <!-- begin form-group row -->
                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Last Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="last_name" placeholder="Last Name" value="{{ $factoryDetails->last_name }}" class="form-control" />
                                </div>
                            </div>
                            <!-- end form-group row -->
                            <!-- begin form-group row -->
                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Date of Birth</label>
                                <div class="col-md-6">
                                    <input type="text" id="dob_date" name="dob_date" placeholder="Year-Month-Date" value="{{ $factoryDetails->dob }}" class="form-control" />
                                </div>
                            </div>
                            <!-- end form-group row -->
                            <!-- begin form-group row -->
                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">CNIC No</label>
                                <div class="col-md-6">
                                    <input type="text" name="cnic" placeholder="CNIC" value="{{ $factoryDetails->cnic }}" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Phone Number</label>
                                    <div class="col-md-6">
                                        <input type="text" name="mobile" placeholder="Phone Number" value="{{ $factoryDetails->mobile }}" class="form-control" />
                            </div>
                            </div>
                            <!-- end form-group row -->
                            <!-- begin form-group row -->
                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Address</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" placeholder="Address" value="{{ $factoryDetails->address }}" class="form-control m-b-10" />
                                </div>
                            </div>
                            <!-- end form-group row -->
                        </div>
                        {{-- end personal info --}}
                        {{-- begin factory info --}}
                        <div class="col-md-8 offset-md-2">
                                <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Information Regarding Store</legend>
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Store Name</label>
                                    <div class="col-md-6">
                                        <input type="text" name="store_name" placeholder="Store Name" value="{{ $factoryDetails->store_name }}" class="form-control" />
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
                                                @if(!empty($factoryDetails->store_image))
                                                  <input type="hidden" name="store_image" value="{{ $factoryDetails->store_image }}">
                                                @endif
                                              </td>
                                              <td>
                                                @if(!empty($factoryDetails->store_name))
                                                <img style="width:30px;" src="{{ asset('/images/supplierend_images/store_images/small/'.$factoryDetails->store_image) }}">
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
                                        <input type="text" name="deals_in" placeholder="Garments" value="{{ $factoryDetails->deals_in }}" class="form-control" />
                                    </div>
                                </div>
                                <!-- end form-group row -->

                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Store Contact No</label>
                                    <div class="col-md-6">
                                        <input type="text" name="store_mobile" placeholder="Store Contact No" value="{{ $factoryDetails->store_mobile }}"  class="form-control" required/>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label">Store Email Address</label>
                                        <div class="col-md-6">
                                            <input type="text" name="store_email" placeholder="Store Email Address" value="{{ $factoryDetails->store_email }}" class="form-control" required />
                                        </div>
                                </div>
                                <!-- end form-group row -->
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Store Address</label>
                                    <div class="col-md-6">
                                        <input type="text" name="store_address" placeholder="Store Address" value="{{ $factoryDetails->store_address }}" class="form-control m-b-10" required />
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
                 </div>
              </div>
           </main>

@endsection
