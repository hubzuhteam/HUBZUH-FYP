
{{-- Fcatory edit Profile  --}}
@section('content')
@extends('layouts.factoryLayout.factory_design')


<main class="admin-main">
        @if(Session::has('flash_message_error'))
        <div class="alert alert-block alert-danger">
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
        <form enctype="multipart/form-data"  action="{{ url('/factory/update-profile') }}" method="POST" class="form-control-with-bg" >{{ csrf_field() }}
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
                                            <input type="text" name="name" value="{{ $factoryDetails->name }}" placeholder="First Name" class="form-control alert-info" />
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
                                        <div class="col-md-6" >
                                            <input class="form-control  alert-info" type="date" id="dob_date" autocomplete="off" name="dob_date" placeholder="Year-Month-Date" value="{{ $factoryDetails->dob }}"  />
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
                                                <input type="text" name="mobile" placeholder="Phone Number" value="{{ $factoryDetails->mobile }}" class="form-control  alert-info" />
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
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Information Regarding Factory</legend>
                                        <!-- begin form-group row -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Factory Name</label>
                                            <div class="col-md-6">
                                                <input type="text" name="factory_name" placeholder="Factory Name" value="{{ $factoryDetails->factory_name }}" class="form-control  alert-info" />
                                            </div>
                                        </div>
                                        <!-- end form-group row -->
                                        <!-- begin form-group row -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Factory Image</label>
                                            <div class="col-md-6" id="uniform-undefined" >
                                                {{-- <input type="file" name="factory_image" id="factory_image"/> --}}
                                                <table>
                                                    <tr>
                                                      <td>
                                                        <input name="factory_image" id="factory_image" type="file">
                                                        @if(!empty($factoryDetails->factory_image))
                                                          <input type="hidden" name="factory_image" value="{{ $factoryDetails->factory_image }}">
                                                        @endif
                                                      </td>
                                                      <td>
                                                        @if(!empty($factoryDetails->factory_name))
                                                        <img style="width:30px;" src="{{ asset('/images/factoryend_images/factory_images/small/'.$factoryDetails->factory_image) }}">
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
                                                <input type="text" name="deals_in" placeholder="Garments" value="{{ $factoryDetails->deals_in }}" class="form-control  alert-info" />
                                            </div>
                                        </div>
                                        <!-- end form-group row -->
        
                                        <!-- begin form-group row -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Factory Contact No</label>
                                            <div class="col-md-6">
                                                <input type="text" name="factory_mobile" placeholder="Factory Contact No" value="{{ $factoryDetails->factory_mobile }}"  class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                                <label class="col-md-3 text-md-right col-form-label">Factory Email Address</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="factory_email" placeholder="Factory Email Address" value="{{ $factoryDetails->factory_email }}" class="form-control  alert-info" required />
                                                </div>
                                        </div>
                                        <!-- end form-group row -->
                                        <!-- begin form-group row -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Factory Address</label>
                                            <div class="col-md-6">
                                                <input type="text" name="factory_address" placeholder="Factory Address" value="{{ $factoryDetails->factory_address }}" class="form-control m-b-10" required />
                                            </div>
                                        </div>
                                        <!-- end form-group row -->
                                        <div class="jumbotron m-b-0 text-center" style="background-color: transparent">
                                                    {{-- <p><a href="javascript:;" class="btn btn-primary btn-lg">Update Profile</a></p> --}}
                                                    <input type="submit" value="Update Profile" class="btn btn-primary btn-lg">
                                        </div>
                                </div>
                                {{-- end Factory info --}}
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
        
</main>

@endsection
