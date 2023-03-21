<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'to_user_id' => 'required|exists:users,id',
        'message_content' => 'required|string',
    ]);

    $message = new Message([
        'from_user_id' => auth()->user()->id,
        'to_user_id' => $request->input('to_user_id'),
        'message_content' => $request->input('message_content'),
        'date' => now()->toDateTimeString(),
    ]);

    $message->save();

    return response()->json([
        'message' => 'Message sent successfully',
        'data' => $message,
    ]);
}

}

