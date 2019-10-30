<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Chat;
use App\Admin;
use App\Factory;
use App\Supplier;

class ChatController extends Controller
{
    public function UserSendMessageFactory(Request $request){

        $data = $request->all();
        //    echo "<pre>"; print_r($data); die;
        $user = User::where(['email'=>Session::get('frontSession')])->first();

        $chat = new Chat;
           $chat->factory_id = $data['receiver_id'];
           $chat->user_id = $user->id;

           $chat->message = $data['message'];
           $chat->sender = 'user';
           $chat->save();

           return redirect()->back()->with('flash_message_success','Your Message has been sent to Supplier');

    }
    public function UserSendMessageSupplier(Request $request){

        $data = $request->all();
        //    echo "<pre>"; print_r($data); die;
        $user = User::where(['email'=>Session::get('frontSession')])->first();

        $chat = new Chat;
           $chat->supplier_id = $data['receiver_id'];
           $chat->user_id = $user->id;

           $chat->message = $data['message'];
           $chat->sender = 'user';
           $chat->save();

           return redirect()->back()->with('flash_message_success','Your Message has been sent to Supplier');

    }
    public function UserSendMessageAdmin(Request $request){

        $data = $request->all();
        //    echo "<pre>"; print_r($data); die;
        $user = User::where(['email'=>Session::get('frontSession')])->first();

        $chat = new Chat;
           $chat->admin_id = $data['receiver_id'];
           $chat->user_id = $user->id;

           $chat->message = $data['message'];
           $chat->sender = 'user';
           $chat->save();

           return redirect()->back()->with('flash_message_success','Your Message has been sent');

    }
    public function AdminviewChatSpecific($id=null){
        // echo $id; die;
        $admin = Admin::where(['username'=>Session::get('adminSession')])->first();

        $chatsWithUser = Chat::where(['admin_id'=>$admin->id])->where('user_id','!=','')->groupBy('user_id')->orderBy('created_at')->get();
        // echo "<pre>"; print_r($chats); die;
        $users = User::get();

        $chats = Chat::where(['admin_id'=>$admin->id])->orderBy('created_at')->get();
        //  echo "<pre>"; print_r($chats); die;

        return view('admin.chats.chat_specific')->with(compact('chatsWithUser','users','chats'));
    }
    public function AdminChats(){
        $admin = Admin::where(['username'=>Session::get('adminSession')])->first();

        $chatsWithUser = Chat::where(['admin_id'=>$admin->id])->where('user_id','!=','')->groupBy('user_id')->orderBy('created_at')->get();
        // echo "<pre>"; print_r($chats); die;
        $users = User::get();

        $chats = Chat::where(['admin_id'=>$admin->id])->orderBy('created_at','desc')->get();

        return view('admin.chats.chats')->with(compact('chatsWithUser','users','chats'));
    }

    public function chats(){
        $user = User::where(['email'=>Session::get('frontSession')])->first();

        $chatsWithAdmin = Chat::where(['user_id'=>$user->id])->where('admin_id','!=','')->groupBy('admin_id')->orderBy('created_at')->get();
        $chatsWithSupplier = Chat::where(['user_id'=>$user->id])->where('supplier_id','!=','')->groupBy('supplier_id')->orderBy('created_at')->get();
        $chatsWithFactory = Chat::where(['user_id'=>$user->id])->where('factory_id','!=','')->groupBy('factory_id')->orderBy('created_at')->get();

        //  echo "<pre>"; print_r($chatsWithSupplier); die;
        $admins = Admin::get();
        $suppliers = Supplier::get();
        $factories = Factory::get();

        $chats = Chat::where(['user_id'=>$user->id])->orderBy('created_at','desc')->get();

        return view('users.chats')->with(compact('chatsWithAdmin','chatsWithSupplier','admins','chats','suppliers','chatsWithFactory','factories'));
    }
    public function viewChatSpecificAdmin($id=null){
        // echo $id; die;
        $user = User::where(['email'=>Session::get('frontSession')])->first();

        $chatsWithAdmin = Chat::where(['user_id'=>$user->id])->where('admin_id','!=','')->groupBy('admin_id')->orderBy('created_at')->get();
        $chatsWithSupplier = Chat::where(['user_id'=>$user->id])->where('supplier_id','!=','')->groupBy('supplier_id')->orderBy('created_at')->get();
        $chatsWithFactory = Chat::where(['user_id'=>$user->id])->where('factory_id','!=','')->groupBy('factory_id')->orderBy('created_at')->get();

        // echo "<pre>"; print_r($chats); die;
        $admins = Admin::get();
        $suppliers = Supplier::get();
        $factories = Factory::get();


        $chats = Chat::where(['user_id'=>$user->id])->where(['admin_id'=>$id])->orderBy('created_at')->get();
        //  echo "<pre>"; print_r($chats); die;

        $receiver_id = $id;
        $receiver="admin";
        return view('users.chat_specific')->with(compact('chatsWithAdmin','suppliers',
        'chatsWithSupplier','admins','chats','chatsWithFactory','factories','receiver_id','receiver'));
    }
    public function viewChatSpecificSupplier($id=null){
        // echo $id; die;
        $user = User::where(['email'=>Session::get('frontSession')])->first();

        $chatsWithAdmin = Chat::where(['user_id'=>$user->id])->where('admin_id','!=','')->groupBy('admin_id')->orderBy('created_at')->get();
        $chatsWithSupplier = Chat::where(['user_id'=>$user->id])->where('supplier_id','!=','')->groupBy('supplier_id')->orderBy('created_at')->get();
        $chatsWithFactory = Chat::where(['user_id'=>$user->id])->where('factory_id','!=','')->groupBy('factory_id')->orderBy('created_at')->get();

        // echo "<pre>"; print_r($chats); die;
        $admins = Admin::get();
        $suppliers = Supplier::get();
        $factories = Factory::get();


        $chats = Chat::where(['user_id'=>$user->id])->where(['supplier_id'=>$id])->orderBy('created_at')->get();
        //  echo "<pre>"; print_r($chats); die;

        $receiver_id = $id;
        $receiver="supplier";
        return view('users.chat_specific')->with(compact('chatsWithAdmin','suppliers',
        'chatsWithSupplier','admins','chats','chatsWithFactory','factories','receiver_id','receiver'));
    }

    public function viewChatSpecificFactory($id=null){
        // echo $id; die;
        $user = User::where(['email'=>Session::get('frontSession')])->first();

        $chatsWithAdmin = Chat::where(['user_id'=>$user->id])->where('admin_id','!=','')->groupBy('admin_id')->orderBy('created_at')->get();
        $chatsWithSupplier = Chat::where(['user_id'=>$user->id])->where('supplier_id','!=','')->groupBy('supplier_id')->orderBy('created_at')->get();
        $chatsWithFactory = Chat::where(['user_id'=>$user->id])->where('factory_id','!=','')->groupBy('factory_id')->orderBy('created_at')->get();

        // echo "<pre>"; print_r($chats); die;
        $admins = Admin::get();
        $suppliers = Supplier::get();
        $factories = Factory::get();


        $chats = Chat::where(['user_id'=>$user->id])->where(['factory_id'=>$id])->orderBy('created_at')->get();
        //  echo "<pre>"; print_r($chats); die;

        $receiver_id = $id;
        $receiver="factory";
        return view('users.chat_specific')->with(compact('chatsWithAdmin','suppliers',
        'chatsWithSupplier','admins','chats','chatsWithFactory','factories','receiver_id','receiver'));
    }
}
