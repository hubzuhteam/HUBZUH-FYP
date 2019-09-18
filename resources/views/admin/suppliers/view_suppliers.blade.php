@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Users</a> <a href="#" class="current">View Users</a> </div>
    <h1>Users</h1>
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
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Users</h5>
          </div>
          <div class="widget-content nopadding">

            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Supplier ID</th>
                  <th>Name</th>
                  <th>Store Name</th>
                  <th>Date of Birth</th>
                  <th>CNIC</th>
                  <th>Address</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Store Image</th>
                  <th>Registered on</th>
                  <th>Active</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($suppliers as $supplier)
                <tr class="gradeX">
            <form class="form-horizontal" method="post" action="{{ url('admin/edit-supplier/'.$supplier->id) }}" name="edit_supplier" id="edit_supplier" novalidate="novalidate">{{ csrf_field() }}
                  <td class="center">{{ $supplier->id }}</td>
                  <td class="center">{{ $supplier->name }} {{ $supplier->last_name }}</td>
                  <td class="center">{{ $supplier->store_name }}</td>
                  <td class="center">{{ $supplier->dob }}</td>
                  <td class="center">{{ $supplier->cnic }}</td>
                  <td class="center">{{ $supplier->address }}</td>
                  <td class="center">{{ $supplier->mobile }}</td>
                  <td class="center">Email: {{ $supplier->email }}<br> Store Email: {{ $supplier->store_email }}</td>
                  <td class="center">
                      @if(!empty($supplier->store_image))
                        <img src="{{ asset('/images/supplierend_images/store_images/small/'.$supplier->store_image) }}"
                        style="width:60px;">
                      @endif</td>
                  <td class="center">{{ $supplier->created_at }}</td>
                  <td class="center"><div class="controls">
                        <input type="checkbox" name="active" id="active" @if($supplier->active == "1") checked @endif value="1">
                    <div class="form-actions">
                        <input type="submit" value="Save" class="btn btn-success btn-sm">
                    </div>
                      </div>
                  </td>
            </form>
                </tr>

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
