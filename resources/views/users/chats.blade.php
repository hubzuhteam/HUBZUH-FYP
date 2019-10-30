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
                    <div class="chat_img"> <img src="{{ asset('images/backend_images/admin.png')}}" alt="Profile Image"> </div>
                    <div class="chat_ib">
                        @foreach ($admins as $admin)
                        @if ($admin->id == $chat->admin_id)
                        @php
                            $date=date('h:i:s a m/d/Y', strtotime($chat->created_at));
                            $admin_id=$admin->id;
                        @endphp
                            <h5>{{ $admin->username }}<span class="chat_date"></span></h5>
                        @endif
                        @endforeach
                      <p style="color: black"><strong><a href="{{url('/view_messages_admin/'.$admin_id)}}">View Messages</a></strong></p>
                    </div>
                  </div>
                </div>
                @endforeach
                @foreach ($chatsWithSupplier as $chat)
                <div class="chat_list active_chat">
                  <div class="chat_people">
                        @foreach ($suppliers as $supplier)
                        @if ($supplier->id == $chat->supplier_id)
                            <div class="chat_img" > <img style="border-radius: 45%;" src="{{ asset('images/supplierend_images/store_images/small/'.$supplier->store_image)}}" alt="Profile Image"> </div>
                        @endif
                        @endforeach
                    <div class="chat_ib">
                        @foreach ($suppliers as $supplier)
                        @if ($supplier->id == $chat->supplier_id)
                        @php
                            $date=date('h:i:s a m/d/Y', strtotime($chat->created_at));
                            $supplier_id=$supplier->id;
                        @endphp
                            <h5>{{ $supplier->store_name }}<span class="chat_date"></span></h5>
                        @endif
                        @endforeach
                      <p style="color: black"><strong><a href="{{url('/view_messages_supplier/'.$supplier_id)}}">View Messages</a></strong></p>
                    </div>
                  </div>
                </div>
                @endforeach
                @foreach ($chatsWithFactory as $chat)
                <div class="chat_list active_chat">
                  <div class="chat_people">
                        @foreach ($factories as $factory)
                        @if ($factory->id == $chat->factory_id)
                            <div class="chat_img" > <img style="border-radius: 45%;" src="{{ asset('images/factoryend_images/factory_images/small/'.$factory->factory_image)}}" alt="Profile Image"> </div>
                        @endif
                        @endforeach
                    <div class="chat_ib">
                        @foreach ($factories as $factory)
                        @if ($factory->id == $chat->factory_id)
                        @php
                            $date=date('h:i:s a m/d/Y', strtotime($chat->created_at));
                            $factory_id=$factory->id;
                        @endphp
                            <h5>{{ $factory->factory_name }}<span class="chat_date"></span></h5>
                        @endif
                        @endforeach
                      <p style="color: black"><strong><a href="{{url('/view_messages_factory/'.$factory_id)}}">View Messages</a></strong></p>
                    </div>
                  </div>
                </div>
                @endforeach
          </div>
        </div>

        <div class="mesgs">
                <p style="margin-left: 25%; margin-top: 25%; font-size: 40px"><strong>Click on any chat to View Messages!</strong></p>
        </div>
      </div>


    </div>
    </div>
</section><!--/form-->


@endsection
