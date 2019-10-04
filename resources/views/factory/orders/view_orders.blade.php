
{{-- Supplier ADD CATGEORY  --}}
@section('content')
    @extends('layouts.factoryLayout.factory_design')

    <section class="admin-main">

    <!-- begin #content -->

    <!-- begin breadcrumb -->

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
        <div id="content" class="content">


        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="{{ url('/factory/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="">Orders</a></li>
        </ol>


        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">
                        <h4 class="">
                            View Order
                        </h4>
                        <p class="opacity-75 ">
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <!-- begin panel-body -->
            <div class="container  pull-up">

            <div class="panel-body">
                <table id="data-table-default" class="table table-striped table-bordered">
                    <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Ordered Products</th>
                                <th>Order Amount</th>
                                <th>Order Status</th>
                                <th>Payment Method</th>
                                <th>Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr class="gradeX">
                          <td class="center">{{ $order->id }}</td>
                          <td class="center">{{ $order->created_at }}</td>
                          <td class="center">{{ $order->name }}</td>
                          <td class="center">{{ $order->user_email }}</td>
                          <td class="center">
                               @foreach($order->orders as $pro)
                               {{ $pro->product_code }}
                               ({{ $pro->product_qty }})
                               <br>
                               @endforeach
                          </td>
                          <td class="center">PKR {{ $order->grand_total }}</td>
                          <td class="center">{{ $order->order_status }}</td>
                          <td class="center">{{ $order->payment_method }}</td>
                          <td class="center">
                            <a target="_blank" href="{{ url('factory/view-order-details/'.$order->id)}}"
                                class="btn btn-success btn-mini">View Order Details</a>
                                <br>
                                <br>
                                <a target="_blank" href="{{ url('factory/view-order-invoice/'.$order->id)}}"
                                    class="btn btn-success btn-mini">View Order Invoice</a>
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
        </div>
    </section>
@endsection


