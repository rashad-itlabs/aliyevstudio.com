<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\app\Message;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        // WebSocket event-ini tetikləyirik
        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['status' => 'Sent!', 'message' => $message]);
    }

    public function getMessages($receiverId)
    {
        $userId = auth()->id();

        $messages = Message::where(function ($query) use ($userId, $receiverId) {
            $query->where('sender_id', $userId)
                  ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($userId, $receiverId) {
            $query->where('sender_id', $receiverId)
                  ->where('receiver_id', $userId);
        })->get();

        return response()->json([
            'data' => $messages
        ]);
    }
}
