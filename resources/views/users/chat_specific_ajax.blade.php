<div id="chat_specific">

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
                        @php
                            $color=""
                        @endphp
                        @if ($chat->admin_id==$receiver_id)
                        @php
                            $color="silver"
                        @endphp
                        @endif
                        <div class="chat_list active_chat" style="background-color: {{ $color }}">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="{{ asset('images/backend_images/admin.png')}}" alt="Profile Image"> </div>
                            <div class="chat_ib">
                                @foreach ($admins as $admin)
                                @if ($admin->id == $chat->admin_id)
                                @php
                                    $date=date('h:i a m/d/Y', strtotime($chat->created_at));
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

                        {{-- ////////////////////////SUPPLIER --}}
                        @foreach ($chatsWithSupplier as $chat)
                        @php
                            $color=""
                        @endphp
                        @if ($chat->supplier_id==$receiver_id)
                        @php
                            $color="silver"
                        @endphp
                        @endif
                        <div class="chat_list active_chat" style="background-color: {{ $color }}">
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
                        @php
                            $color=""
                        @endphp
                        @endforeach
                        @foreach ($chatsWithFactory as $chat)
                        @php
                            $color=""
                        @endphp
                        @if ($chat->factory_id==$receiver_id)
                        @php
                            $color="silver"
                        @endphp
                        @endif
                        <div class="chat_list active_chat" style="background-color: {{ $color }}">
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
                        <div class="msg_history">
                    @foreach ($chats as $chat)
                    @php
                                    $date=date('h:i a m/d/y', strtotime($chat->created_at));
                                @endphp
                    @if ($chat->sender=="user")
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
                          <form action="{{ url('/customer/send-message/'.$receiver ) }}" method="post">{{csrf_field()}}

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
        </section><!--/form-->

        </div>
