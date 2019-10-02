@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/admin/view-designs')}}">Designs</a> <a href="{{url('/admin/view-designs')}}" class="current">View Design</a> </div>
    <h1>Designs</h1>
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
            <h5>View Designs</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Design ID</th>
                  <th>Admin ID</th>
                  <th>Background Image</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($designs as $design)
                <tr class="gradeX">
                  <td>{{ $design->id }}</td>
                  <td>{{ $design->admin_id }}</td>
                  <td>
                    @if(!empty($design->background_img))
                      <img src="{{ asset('/images/backend_images/backgrounds/large/'.$design->background_img) }}"
                      style="width:60px;">
                    @endif
                  </td>
                  <td>{{ $design->created_at }}</td>
                  <td>{{ $design->updated_at }}</td>
                  <td class="center">
                    <a id="delProduct"
                    href="{{ url('/admin/delete-design/'.$design->id) }}"
                    class="btn btn-warning btn-mini deleteRecord" title="Delete Design">Delete</a>
                </td>
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
