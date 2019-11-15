<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function create(Request $request) {
        \App\Message::create([
            'user_id' => Auth::id(),
            'job_id' => $request->job_id,
            'text' => $request->message,
            'type' => 'PM'
        ]);
    }
}
