@extends('layouts.supplierLayout.supplier_design')
@section('content')
<link href="{{ asset('css/frontend_css/chat.css') }}" rel="stylesheet">

{{--  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">  --}}
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet"
<!--main-container-part-->
<div id="content" class="content">
        <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ url('/supplier/dashboard') }}">Home</a></li>
    </ol>
    <!-- end breadcrumb -->

        <!--End-breadcrumbs-->
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
    <div class="row-fluid">
      <div class="span12">

    <h3 class=" text-center">Messaging</h3>
    <div class="messaging" style="width:102%;">
          <div class="inbox_msg">
            <div class="inbox_people" style="width: 28%">
              <div class="headind_srch">
                <div class="recent_heading">
                  <h4>Chats</h4>
                </div>
              </div>
              <div class="inbox_chat">
                    @foreach ($chatsWithUser as $chat)
                    <div class="chat_list active_chat">
                      <div class="chat_people">
                            @foreach ($users as $user)
                            @if ($user->id == $chat->user_id)
                            <div class="chat_img"> <img style="border-radius: 45%;" src="{{ asset('images/frontend_images/users/small/'.$user->user_image)}}" alt="Profile Image"> </div>
                            @endif
                            @endforeach
                        <div class="chat_ib">
                            @foreach ($users as $user)
                            @if ($user->id == $chat->user_id)
                            @php
                                $date=date('h:i:s a m/d/Y', strtotime($chat->created_at));
                                $user_id=$user->id;
                            @endphp
                                <h5>{{ $user->name }}<span class="chat_date"></span></h5>
                            @endif
                            @endforeach
                          <p style="color: black;"><strong><a href="{{url('supplier/view_messages/'.$user_id)}}">View Messages</a></strong></p>
                        </div>
                      </div>
                    </div>
                    @endforeach
              </div>
            </div>

            <div class="mesgs" style="width:">
                    <p style="margin-left: ; margin-top: ; font-size: 30px"><strong>Click on any chat to View Messages!</strong></p>
            </div>
          </div>

    </div>
      </div>
        </div>
  </div>
</div>
@endsection
