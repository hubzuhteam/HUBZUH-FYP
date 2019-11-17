
<div id="chat_specific">
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
      {{--  <div class="span12">  --}}

    <h3 class=" text-center">Messaging</h3>
    <div class="messaging" style="width:102%;">
          <div class="inbox_msg">
            <div class="inbox_people" style="width: 38%">
              <div class="headind_srch">
                <div class="recent_heading">
                  <h4>Chats</h4>
                </div>
              </div>
              <div class="inbox_chat">
                    @foreach ($chatsWithUser as $chat)
                    <div class="chat_list active_chat">
                      <div class="chat_people">
                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
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
            <div class="mesgs" id="mesgs" name="mesgs" style="background-color: lightsteelblue;">
                    <div class="msg_history">
                @foreach ($chats as $chat)
                @php
                                $date=date('h:i a m/d/y', strtotime($chat->created_at));
                            @endphp
                @if ($chat->sender=="supplier")
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                          <p>{{ $chat->message }}</p>
                          <span class="time_date">{{ $date }}</span> </div>
                      </div>
                @else
                    <div class="incoming_msg" >
                        <div class="received_msg" >
                          <div class="received_withd_msg">
                            <p style="background-color: cornflowerblue; color: white">{{ $chat->message }}</p>
                            <span class="time_date">{{ $date }}</span></div>
                        </div>
                      </div>
                @endif

                @endforeach
                    </div>
                      <form action="{{ url('/supplier/send-message/'.$receiver) }}" method="post">{{csrf_field()}}
                    <div class="type_msg">
                      <div class="input_msg_write">
                        <input type="hidden" class="write_msg" name="receiver_id"  id="receiver_id" value="{{ $receiver_id }}" />

                        <input type="text" class="write_msg" name="message"  id="message" placeholder="Type a message" />
                        <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                      </div>
                    </div>
                      </form>
            </div>
          </div>

    </div>
      </div>
        {{--  </div>  --}}
  </div>
</div>

</div>

