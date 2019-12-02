<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class MessagesController extends Controller
{
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // セッション経由でjobIDを取得する。
        $job_id = Session::get('job_id');
        //新しいメッセージを投稿(POST)する。
        $message = new Message;
        $message->user_id = Auth::id();
        $message->job_id = $job_id;
        $message->text = $request->public_message;
        $message->save();

        return redirect()->route('jobs.show', ['id' => $job_id]);
    }

    public function storeDM(Request $request)
    {
        // セッション情報から応募案件情報を取得
        $application = $request->session()->get('application');

        // DM受取人を判別する
        // ログイン中のユーザが応募者と同一
        if ( Auth::id() == $application[0]->user_id)
        {
            // DM受取人は仕事案件の投稿者
            $recipient_id = $application[0]->owner_id;
        }
        // ログイン中のユーザが仕事案件の投稿者と同一
        // elseif ( Auth::id() == $application[0]->owner_id )
        else
        {
            // DM受取人は仕事案件に対する応募者
            $recipient_id = $application[0]->user_id;
        }

        //新しいメッセージを投稿(POST)する。
        $message = new Message;
        // DM投稿者←ログイン中ユーザ
        $message->user_id = Auth::id();
        // DM受取人←条件分岐で判別したユーザID
        $message->recipient_id = $recipient_id;
        // 仕事ID←applications/{id}で開いていたお仕事情報のID
        $message->job_id = $application[0]->job_id;
        // 応募ID←applications/{id}で開いていた応募案件のID
        $message->apply_id = $application[0]->id;
        // ダイレクトメッセージ本文
        $message->text = $request->direct_message;
        // メッセージ保存
        $message->save();

        return redirect()->route('application.show', ['id' => $message->job_id]);
    }





}
