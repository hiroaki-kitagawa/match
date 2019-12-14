<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use App\Message;
use App\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendInvitation;

class ApplicationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // お仕事に応募する
        // ユーザIDと応募対象のジョブID取得
        $user_id = Auth::id();
        $owner = $request->session()->get('owner');
        $job_id = $request->session()->get('job_id');


        $application = new Application;
        $application->user_id = $user_id;
        $application->user_name = User::find($user_id)->name;
        $application->job_id = $job_id;
        $application->owner_id = $owner->id;
        $application->save();

        $application_id = Application::where('owner_id', '=', $owner->id)->where('user_id', '=', $user_id)->get();

        // お仕事の投稿者に通知メール送信
        // \Notification::send($owner, new \App\Notifications\SendInvitation(\Auth::user()->name));
        \Notification::send($owner, new SendInvitation($application_id));

        session()->flash('added_message', '応募しました');
        return redirect('application/' . $job_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // 応募済みお仕事案件の詳細画面を表示する
        // 表示する取引情報に必要な応募情報を取得
        $application = Application::with('job')->where('id', $id)->get();

        // dd(Auth::id(), $application[0]->user_id,$application[0]->owner_id);

        // 取引およびDMを閲覧できるユーザか確認する。
        // ログイン中のユーザIDが取引情報の応募者or投稿者であれば表示する。
        // 取引に無関係のユーザの場合、マイページに飛ばすことで取引画面の直リンクを抑止する。
        if (Auth::id() == $application[0]->user_id || Auth::id() == $application[0]->owner_id)
        {
            // 必要な情報を取得する
            $apply_user = User::find($application[0]->user_id); // 応募者
            $owner_user = User::find($application[0]->owner_id); // 仕事の投稿者
            $messages = Message::with('user')->where('apply_id', $id)->get(); // DMメッセージ

            // DM送信時に使用する応募,仕事情報をセッションに保存する
            $request->session()->put('application', $application);

            return view('applications.show', compact('application', 'apply_user', 'owner_user', 'messages'));
        } else {
            return redirect('mypage');
        }

    }


}
