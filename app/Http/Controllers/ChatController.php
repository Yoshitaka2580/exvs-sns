<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ChatRoom;
use App\ChatMessage;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function rooms(Request $request, ChatRoom $chatRoom)
    {
        return $chatRoom->all();
    }

    public function messages(Request $request, $roomID)
    {
        return ChatMessage::where('chat_room_id', $roomID)
            ->with('user')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function newMessage(Request $request, $roomID)
    {
        $newMessage = new ChatMessage;
        $input = $request->all();
        $newMessage->fill($input);
        $newMessage->user_id = $request->user()->id;
        $newMessage->chat_room_id = $roomID;
        $newMessage->save();

        return $newMessage;
    }
}
