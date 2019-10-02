@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Factories</a> <a href="#" class="current">View Factories</a> </div>
    <h1>Factories</h1>
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
            <h5>Factories</h5>
          </div>
          <div class="widget-content nopadding">

            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Factory ID</th>
                  <th>Name</th>
                  <th>Factory Name</th>
                  <th>Date of Birth</th>
                  <th>CNIC</th>
                  <th>Address</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Factory Image</th>
                  <th>Registered on</th>
                  <th>Enable</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($factories as $factory)
                <tr class="gradeX">
            <form class="form-horizontal" method="post" action="{{ url('admin/edit-factory/'.$factory->id) }}" name="edit_factory" id="edit_factory" novalidate="novalidate">{{ csrf_field() }}
                  <td class="center">{{ $factory->id }}</td>
                  <td class="center">{{ $factory->name }} {{ $factory->last_name }}</td>
                  <td class="center">{{ $factory->factory_name }}</td>
                  <td class="center">{{ $factory->dob }}</td>
                  <td class="center">{{ $factory->cnic }}</td>
                  <td class="center">{{ $factory->address }}</td>
                  <td class="center">{{ $factory->mobile }}</td>
                  <td class="center">Email: {{ $factory->email }}<br> Factory Email: {{ $factory->factory_email }}</td>
                  <td class="center">
                      @if(!empty($factory->factory_image))
                        <img src="{{ asset('/images/factoryend_images/factory_images/small/'.$factory->factory_image) }}"
                        style="width:60px;">
                      @endif</td>
                  <td class="center">{{ $factory->created_at }}</td>
                  <td class="center"><div class="controls">
                        <input type="checkbox" name="active" id="active" @if($factory->active == "1") checked @endif value="1">
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