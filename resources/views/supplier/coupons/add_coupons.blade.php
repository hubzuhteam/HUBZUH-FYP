
{{-- Supplier ADD CATGEORY  --}}
@section('content')
    @extends('layouts.supplierLayout.supplier_design')

    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="{{ url('/supplier/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/supplier/view-coupons') }}">View Coupons</a></li>
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
        <form action="{{ url('/supplier/add-coupon') }}" method="POST" name="add_coupon" class="form-control-with-bg">{{ csrf_field() }}
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
                                <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Add Category</legend>
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Coupon Code</label>
                                    <div class="col-md-6">
                                        <input type="text" name="coupon_code" id="coupon_code"  placeholder="Coupon Code" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Amount</label>
                                    <div class="col-md-6">
                                        <input type="number" name="amount" id="amount"  placeholder="Amount" class="form-control" />
                                    </div>
                                </div>

                                <!-- end form-group row -->
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Amount Type</label>
                                    <div class="col-md-6">
                                        <select name="amount_type" id="amount_type" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-info">
                                            <option value="percertage">Percertage</option>
                                            <option value="Fixed">Fixed</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end form-group row -->


                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Expiry Date</label>
                                    <div class="col-md-6">
                                        <input type="date" id="expiry_date" name="expiry_date" placeholder="Year-Month-Date" class="form-control" />
                                    </div>
                                </div>

                                <!-- begin form-group row -->






                                <!-- end form-group row -->




                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Enable</label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="status" class="form-control m-b-10" id="status" value="1" checked>
                                    </div>
                                </div>
                                <!-- end form-group row -->
                                <div class="jumbotron m-b-0 text-center" style="background-color: transparent">
                                    {{-- <p><a href="javascript:;" class="btn btn-primary btn-lg">Update Profile</a></p> --}}
                                    <input type="submit" value="Add Coupon" class="btn btn-primary btn-lg">
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
    </div>
    <!-- end #content -->

@endsection
