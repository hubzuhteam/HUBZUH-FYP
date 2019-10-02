{{-- Factory VIEW coupon  --}}
@section('content')
@extends('layouts.factoryLayout.factory_design')

<main class="admin-main">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="{{ url('/factory/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/factory/add-coupon') }}">Add Coupon</a></li>
        </ol>
        <!-- end breadcrumb -->
        <section class="admin-content">
                <div class="bg-dark">
                    <div class="container  m-b-30">
                        <div class="row">
                            <div class="col-12 text-white p-t-40 p-b-90">
                                <h4 class="">
                                   Manage coupon
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
                        
                                                  @if($factoryDetails->id==$coupon->factory_id)
                                                    <tr class="odd gradeX">
                                                        <td>{{++$count }}</td>
                        
                                                         <td>{{$coupon->coupon_code }}</td>
                                                        <td>{{$coupon->amount }}</td>
                                                        <td>{{$coupon->amount_type}}</td>
                                                        <td>{{$coupon->expiry_date }}</td>
                                                        <td class="center">
                                                            <a href="{{ url('/factory/edit-coupon/'.$coupon->id)}}"class="btn btn-primary btn-mini">Edit</a>
                                                            <a  href="{{ url('/factory/delete-coupon/'.$coupon->id)}}"class="btn btn-danger btn-mini deleteRecord">Delete</a>
                                                        </td>
                                                    </tr>
                                                    @endif
                        
                                                @endforeach
                                                </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-nowrap">  </th>
                                                    <th class="text-nowrap">Coupon Code</th>
                                                    <th class="text-nowrap">Amount</th>
                                                    <th class="text-nowrap">Amount Type</th>
                                                    <th class="text-nowrap">Expiry Date</th>
                                                    <th class="text-nowrap">  </th>
                        
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


