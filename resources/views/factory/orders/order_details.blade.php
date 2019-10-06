
{{-- Factory View Orders  --}}
@section('content')
    @extends('layouts.factoryLayout.factory_design')

    <section class="admin-main">
    
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ url('/factory/dashboard') }}">Home</a></li>
    </ol>
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
    <div class="container-fluid">
    <hr>
                <div class="panel panel-inverse" style="margin-right: 25%;margin-left: 25%"  data-sortable-id="table-basic-9">
                        <div class="table-responsive p-t-10" style="background-color: cornflowerblue; color: black">
                                        <h4 class="panel-title" style="padding-left: 5px">Order Details</h4>                                    
                                <table id="example-height" class="table   " style="width:100%; background-color: tan; color: black">
                                        <tbody>
                                                <tr class="info">
                                                  <td class="taskDesc">Order Date</td>
                                                  <td class="taskStatus">{{ $orderDetails->created_at }}</td>
                                                </tr>
                                                <tr class="danger">
                                                  <td class="taskDesc">Order Status</td>
                                                  <td class="taskStatus">{{ $orderDetails->order_status }}</td>
                                                </tr>
                                                <tr class="info">
                                                  <td class="taskDesc">Order Total</td>
                                                  <td class="taskStatus">PKR {{ $orderDetails->grand_total }}</td>
                                                </tr>
                                                <tr class="danger">
                                                  <td class="taskDesc">Shipping Charges</td>
                                                  <td class="taskStatus">PKR {{ $orderDetails->shipping_charges }}</td>
                                                </tr>
                                                <tr class="info">
                                                  <td class="taskDesc">Coupon Code</td>
                                                  <td class="taskStatus">{{ $orderDetails->coupon_code }}</td>
                                                </tr>
                                                <tr class="danger">
                                                  <td class="taskDesc">Coupon Amount</td>
                                                  <td class="taskStatus">PKR {{ $orderDetails->coupon_amount }}</td>
                                                </tr>
                                                <tr class="info">
                                                  <td class="taskDesc">Payment Method</td>
                                                  <td class="taskStatus">{{ $orderDetails->payment_method }}</td>
                                                </tr>
                                              </tbody>
                                </table>
                        </div>
                </div>
                    <div class="panel panel-inverse" style="margin-right: 25%;margin-left: 25%; margin-top: 1%" data-sortable-id="table-basic-9">
                            <div class="table-responsive p-t-10" style="background-color: cornflowerblue; color: black">
                                    <h4 class="panel-title" style="padding-left: 5px">Customer Details</h4>                                    
                            <table id="example-height" class="table   " style="width:100%; background-color: skyblue; color: black">
                                    <tbody>
                                            <tr class="warning">
                                              <td class="taskDesc">Customer Name</td>
                                              <td class="taskStatus">{{ $orderDetails->name }}</td>
                                            </tr>
                                            <tr class="success">
                                              <td class="taskDesc">Customer Email</td>
                                              <td class="taskStatus">{{ $orderDetails->user_email }}</td>
                                            </tr>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="panel panel-inverse" style="margin-right: 25%;margin-left: 25%; margin-top: 1%"  data-sortable-id="table-basic-9">
                            <div class="table-responsive p-t-10" style="background-color: cornflowerblue; color: black">
                                    <h4 class="panel-title" style="padding-left: 5px">Supplier Details</h4>                                    
                            <table id="example-height" class="table   " style="width:100%; background-color: cornflowerblue; color: white">
                                    <tbody>
                                            <tr class="info">
                                              <td class="taskDesc">Factory ID</td>
                                              <td class="taskStatus">{{ $factoryDetails->id }}</td>
                                            </tr>
                                            <tr class="danger">
                                              <td class="taskDesc">Factory Name</td>
                                              <td class="taskStatus">{{ $factoryDetails->factory_name }}</td>
                                            </tr>
                                            <tr class="info">
                                              <td class="taskDesc">Deals In</td>
                                              <td class="taskStatus">{{ $factoryDetails->deals_in }}</td>
                                            </tr>
                                            <tr class="danger">
                                              <td class="taskDesc">Factory Email</td>
                                              <td class="taskStatus">{{ $factoryDetails->factory_email }}</td>
                                            </tr>
                                          </tbody>
                            </table>
                            </div>        
                    </div>

                    <div class="panel panel-inverse" style="margin-right: 25%;margin-left: 25%; margin-top: 1%" data-sortable-id="table-basic-9">
                                            <h4 class="panel-title" style="padding-left: 5px">Update Order Status</h4>                                    
                                            <form action="{{ url('factory/update-order-status') }}" method="post">{{ csrf_field() }}
                                                <input type="hidden" name="order_id" value="{{ $orderDetails->id }}">
                                            <div class="form-group row m-b-10">
                                                    <div class="col-md-6">
                                                        <select name="order_status" id="order_status" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-info" required>
                                                            <option value="">Select Pattern</option>
                                                            <option value="New" @if($orderDetails->order_status == "New") selected @endif>New</option>
                                                                <option value="Pending" @if($orderDetails->order_status == "Pending") selected @endif>Pending</option>
                                                                <option value="Cancelled" @if($orderDetails->order_status == "Cancelled") selected @endif>Cancelled</option>
                                                                <option value="In Process" @if($orderDetails->order_status == "In Process") selected @endif>In Process</option>
                                                                <option value="Shipped" @if($orderDetails->order_status == "Shipped") selected @endif>Shipped</option>
                                                                <option value="Delivered" @if($orderDetails->order_status == "Delivered") selected @endif>Delivered</option>
                                                                <option value="Paid" @if($orderDetails->order_status == "Paid") selected @endif>Paid</option>
                                                          </select>
                                                    </div>
                                                    <input type="submit" value="Update Order Status" class="btn btn-primary btn-lg">
                                            </div>
                                            </form>
                    </div>


    </div>


    {{--  <div class="row">
            <div class="col-sm-12">
            </div>
    </div>  --}}

                <div class="panel panel-inverse" style="margin-right: 25%;margin-left: 25%; margin-top: 1%" data-sortable-id="table-basic-9">
                        <div class="table-responsive p-t-10" style="background-color: cornflowerblue; color: black">
                                <h4 class="panel-title" style="padding-left: 5px">Billing Address</h4>                                    
                        <table id="example-height" class="table   " style="width:100%; background-color: darkgoldenrod; color: white">
                                <tbody>

                                        <tr class="danger">
                                          <td class="taskStatus">{{ $userDetails->name }}</td>
                                        </tr>
                                        <tr class="success">
                                          <td class="taskStatus">PKR {{ $userDetails->address }}</td>
                                        </tr>
                                        <tr class="danger">
                                          <td class="taskStatus">PKR {{ $userDetails->city }}</td>
                                        </tr>
                                        <tr class="success">
                                          <td class="taskStatus">{{ $userDetails->state }}</td>
                                        </tr>
                                        <tr class="danger">
                                          <td class="taskStatus">PKR {{ $userDetails->country }}</td>
                                        </tr>
                                        <tr class="success">
                                          <td class="taskStatus">{{ $userDetails->pincode }}</td>
                                        </tr>
                                        <tr class="danger">
                                            <td class="taskStatus">{{ $userDetails->mobile }}</td>
                                         </tr>
                                      </tbody>
                        </table>
                </div>
                </div>
                <div class="panel panel-inverse" style="margin-right: 25%;margin-left: 25%; margin-top: 1%" data-sortable-id="table-basic-9">
                        <div class="table-responsive p-t-10" style="background-color: cornflowerblue; color: black">
                                <h4 class="panel-title" style="padding-left: 5px">Shipping Address</h4>                                    
                        <table id="example-height" class="table   " style="width:100%; background-color: darksalmon; color: black">
                                <tbody>
                                        <tr class="danger">
                                          <td class="taskStatus">{{ $orderDetails->name }}</td>
                                        </tr>
                                        <tr class="success">
                                          <td class="taskStatus">PKR {{ $orderDetails->address }}</td>
                                        </tr>
                                        <tr class="danger">
                                          <td class="taskStatus">PKR {{ $orderDetails->city }}</td>
                                        </tr>
                                        <tr class="success">
                                          <td class="taskStatus">{{ $orderDetails->state }}</td>
                                        </tr>
                                        <tr class="danger">
                                          <td class="taskStatus">PKR {{ $orderDetails->country }}</td>
                                        </tr>
                                        <tr class="success">
                                          <td class="taskStatus">{{ $orderDetails->pincode }}</td>
                                        </tr>
                                        <tr class="danger">
                                            <td class="taskStatus">{{ $orderDetails->mobile }}</td>
                                         </tr>
                                </tbody>
                        </table>
                </div>
                </div>
        <div class="panel panel-inverse" style="margin-right: 15%;margin-left: 15%; margin-top: 1%" data-sortable-id="table-basic-9">
                <div class="table-responsive p-t-10" style="background-color: cornflowerblue; color: black">
                        <h4 class="panel-title" style="padding-left: 5px">Product Details</h4>                                    
                <table id="example-height" class="table   " style="width:100%; background-color: darkcyan; color: white">
                        <thead>
                                <tr>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Product Size</th>
                                    <th>Product Color</th>
                                    <th>Product Price</th>
                                    <th>Product Qty</th>
                                </tr>
                        </thead>
                        <tbody>
                                    @foreach($orderDetails->orders as $pro)
                                      <tr class="warning">
                                          <td>{{ $pro->product_code }}</td>
                                          <td>{{ $pro->product_name }}</td>
                                          <td>{{ $pro->product_size }}</td>
                                          <td>{{ $pro->product_color }}</td>
                                          <td>PKR {{ $pro->product_price }}</td>
                                          <td>{{ $pro->product_qty }}</td>
                                      </tr>
                                      @endforeach
                        </tbody>
                </table>
        </div>
        </div>

</section>

@endsection


