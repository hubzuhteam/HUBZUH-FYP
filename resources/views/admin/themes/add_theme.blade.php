@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Theme</a> <a href="#" class="current">Add Theme</a> </div>
    <h1>Add Theme</h1>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Theme</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-theme') }}" name="add_theme" id="add_theme" novalidate="novalidate"> {{ csrf_field() }}

              <div class="control-group">
                    <label class="control-label">Theme Name</label>
                    <div class="controls">
                        <div id="uniform-undefined"><input name="theme_name" id="theme_name"
                            type="text" required></div>
              </div>
              <div class="control-group">
                    <label class="control-label">Theme ID</label>
                    <div class="controls">
                        <div id="uniform-undefined"><input name="theme_id" id="theme_id"
                            type="text" required></div>
              </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Theme" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
