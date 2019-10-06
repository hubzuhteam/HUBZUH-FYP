@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/admin/view-Themes')}}">Themes</a> <a href="{{url('/admin/view-themes')}}" class="current">View Themes</a> </div>
    <h1>Themes</h1>
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
            <h5>View Themes</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Theme ID (Default)</th>
                  <th>Admin ID</th>
                  <th>Theme ID</th>
                  <th>Theme Name</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($themes as $theme)
                <tr class="gradeX">
                  <td>{{ $theme->id }}</td>
                  <td>{{ $theme->admin_id }}</td>
                  <td>{{ $theme->theme_id }}</td>
                  <td>{{ $theme->theme_name }}</td>
                  <td>{{ $theme->created_at }}</td>
                  <td>{{ $theme->updated_at }}</td>
                  <td class="center">
                    <a id="delProduct"
                    href="{{ url('/admin/delete-theme/'.$theme->id) }}"
                    class="btn btn-warning btn-mini" title="Delete Theme">Delete</a>
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
