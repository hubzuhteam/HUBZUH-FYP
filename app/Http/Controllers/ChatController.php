<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Chat;
use App\Admin;

class ChatController extends Controller
{
    public function viewChatSpecific($id=null){
        echo $id; die;
        $user = User::where(['email'=>Session::get('frontSession')])->first();

        $chatsWithAdmin = Chat::where(['user_id'=>$user->id])->groupBy('admin_id')->orderBy('created_at','desc')->get();
        // echo "<pre>"; print_r($chats); die;
        $admins = Admin::get();

        $chats = Chat::where(['user_id'=>$user->id])->where(['admin_id'=>$id])->orderBy('created_at','desc')->get();
         echo "<pre>"; print_r($chats); die;

        return view('users.chat_specific')->with(compact('chatsWithAdmin','admins','chats'));
    }
}
