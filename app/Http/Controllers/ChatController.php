<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ChatController extends Controller
{
    public function show_chat_admin()
    {
        if(Session::has('AdminloginId')){
            $data = User::where('id','=',Session::get('AdminloginId'))->first();
            $users = User::all();
            $msg = Chat::where(function ($query) use ($data) {
                $query->where('to', '!=', $data->id)
                    ->orWhere('from', '!=', $data->id);
            })->get();

            return view('admin.admin-inbox',compact('data','users','msg'));
        }
        return view('login');
    }
    public function show_chat_user()
    {
        if(Session::has('UserloginId')){
            $data = User::where('id','=',Session::get('UserloginId'))->first();
            $users = User::all();
            $msg = Chat::where(function ($query) use ($data) {
                $query->where('to', '!=', $data->id)
                    ->orWhere('from', '!=', $data->id);
            })->get();

            return view('user.user-inbox',compact('data','users','msg'));
        }
        return view('login');
    }
    public function chat_box_admin($id){
        if(Session::has('AdminloginId')) {
            $data = User::where('id', '=', Session::get('AdminloginId'))->first();
            $user = User::find($id);

            $messagesFromUser = Chat::where('from', $user->id)
                ->where('to', $data->id)
                ->orderBy('created_at', 'asc')
                ->get();

            $messagesToUser = Chat::where('from', $data->id)
                ->where('to', $user->id)
                ->orderBy('created_at', 'asc')
                ->get();

            $allMessages = $messagesFromUser->concat($messagesToUser)->sortBy('created_at');

            return view('admin.admin-chat', compact('data', 'user', 'allMessages'));
        }
        return view('login');
    }
    public function chat_box_user($id){
        if(Session::has('UserloginId')) {
            $data = User::where('id', '=', Session::get('UserloginId'))->first();
            $user = User::find($id);

            $messagesFromUser = Chat::where('from', $user->id)
                ->where('to', $data->id)
                ->orderBy('created_at', 'asc')
                ->get();

            $messagesToUser = Chat::where('from', $data->id)
                ->where('to', $user->id)
                ->orderBy('created_at', 'asc')
                ->get();

            $allMessages = $messagesFromUser->concat($messagesToUser)->sortBy('created_at');

            return view('user.user-chat', compact('data', 'user', 'allMessages'));
        }
        return view('login');
    }

    public function admin_send_msg(Request $request,$id){
        if(Session::has('AdminloginId')) {
            $msg = new Chat();
            $msg->message = $request->message;
            $msg->from = Session::get('AdminloginId');
            $msg->to = $id;
            $res = $msg->save();
            if($res){
                return back()->with('success','User registered successfully');
            }
            else{
                return back()->with('fail','something wrong happen.Try later');
            }
        }

    }
    public function user_send_msg(Request $request,$id){
        if(Session::has('UserloginId')) {
            $msg = new Chat();
            $msg->message = $request->message;
            $msg->from = Session::get('UserloginId');
            $msg->to = $id;
            $res = $msg->save();
            if($res){
                return back()->with('success','User registered successfully');
            }
            else{
                return back()->with('fail','something wrong happen.Try later');
            }
        }
    }


}
