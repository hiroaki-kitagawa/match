<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function my_public_message() {
        $id = Auth::id();
        $messages = \App\Message::with('job', 'user')
                    ->where('user_id', $id)
                    ->where('apply_id', null) // 応募案件に紐付かないPM一覧を取得
                    ->where('deleted_at', null)
                    ->groupBy('job_id')
                    ->paginate(10);
        return $messages;
    }

    public function my_direct_message() {
        $id = Auth::id();
        $messages = \App\Message::with('application', 'job', 'user')
                    ->where('recipient_id', $id) // 受信者IDがログインIDのDM一覧を取得
                    ->where('deleted_at', null)
                    ->paginate(10);
        return $messages;
    }
}
