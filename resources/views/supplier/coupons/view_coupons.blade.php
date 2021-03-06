
{{-- Supplier VIEW COUPONS  --}}
@section('content')
    @extends('layouts.supplierLayout.supplier_design')

    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="{{ url('/supplier/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/supplier/add-coupon') }}">Add Coupon</a></li>
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
        <div id="content" class="content" style="margin-left: auto;margin-right: auto;">

            <!-- begin page-header -->
            <h1 class="page-header">Manage Coupons</h1>
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
                    <h4 class="panel-title">Coupons</h4>
                </div>
                <!-- end panel-heading -->


                <!-- begin (only my coupn table) panel-body -->

                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="text-nowrap">  </th>
                            <th class="text-nowrap">Coupon Code</th>
                            <th class="text-nowrap">Amount</th>
                            <th class="text-nowrap">Amount Type</th>
                            <th class="text-nowrap">Expiry Date</th>
                            <th class="text-nowrap">  </th>

                        </tr>
                        </thead>
                        <tbody>
                        <p hidden>{{$count=0}}</p>
                        @foreach ($coupons as $coupon)

                          @if($supplierDetails->id==$coupon->supplier_id)
                            <tr class="odd gradeX">
                                <td>{{++$count }}</td>

                                 <td>{{$coupon->coupon_code }}</td>
                                <td>{{$coupon->amount }}</td>
                                <td>{{$coupon->amount_type}}</td>
                                <td>{{$coupon->expiry_date }}</td>
                                <td class="center">
                                    <a href="{{ url('/supplier/edit-coupon/'.$coupon->id)}}"class="btn btn-primary btn-mini">Edit</a>
                                    <a  href="{{ url('/supplier/delete-coupon/'.$coupon->id)}}"class="btn btn-danger btn-mini deleteRecord">Delete</a>
                                </td>
                            </tr>
                            @endif

                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- end(only my coupn table) panel-body -->



            </div>
            <!-- end panel -->
        </div>
        <!-- end #content -->
    </div>

@endsection


