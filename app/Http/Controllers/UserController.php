<?php

namespace App\Http\Controllers;

use App\User;
use App\Chat;
use Illuminate\Http\Request;
use Redis;

class UserController extends Controller
{
    
    public function findOrCreate(Request $request)
    {
        $user = User::firstOrCreate($request->all());
        
        $redis = Redis::connection();
        $redis->publish('new_user_joined_event', User::get());

        return response()->json($user, 200);
    }
   
    public function getUsers()
    {
        return response()->json(User::get(), 200);
    }

    public function saveMessage(Request $request)
    {
        Chat::create($request->all());
        $redis = Redis::connection();
        $redis->publish('new_chat_sent', json_encode($request->all()));
        return $request->all();
    }
    
    public function getMessages(Request $request)
    {
        $chats = Chat::whereIn('sender_id', [$request->auth_user_id, $request->user_id])
	    ->whereIn('receiver_id', [$request->auth_user_id, $request->user_id])
	    
        ->get();
        
        return response()->json($chats, 200);
    }



}
