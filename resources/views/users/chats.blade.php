@extends('layouts.frontLayout.front_design')
@section('content')
<link href="{{ asset('css/frontend_css/chat.css') }}" rel="stylesheet">

{{--  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">  --}}
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet"
<section id="form" style="margin-top: 15px"><!--form-->
    <div class="container">
        <div class="row">
            @if(Session::has('flash_message_error'))
                <div class="alert alert-block alert-danger">
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
        <h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent Chats</h4>
            </div>
          </div>
          <div class="inbox_chat">
                @foreach ($chatsWithAdmin as $chat)
            <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>{{ $chat->id }}<span class="chat_date">Dec 25</span></h5>
                  <p>Thank you for contacting, How can i help you sir!</p>
                </div>
              </div>
            </div>
                @endforeach
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history">
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Hey there? need some help</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
            </div>
            <div class="incoming_msg">
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Thank you for contacting, How can i help you sir!</p>
                  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
              </div>
            </div>
          </div>
          <form action="{{ url('/customer/send-message/') }}" method="post">{{csrf_field()}}

          <div class="type_msg">
            <div class="input_msg_write">

              <input type="text" class="write_msg" name="message"  id="message" placeholder="Type a message" />
              <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>

            </div>
          </div>
        </form>

        </div>
      </div>


    </div>
    </div>
</section><!--/form-->


@endsection
