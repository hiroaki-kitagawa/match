<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use App\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendInvitation;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
        $application->job_id = $job_id;
        $application->save();

        // お仕事の投稿者に通知メール送信
        \Notification::send($owner, new \App\Notifications\SendInvitation(\Auth::user()->name));

        session()->flash('added_message', '応募しました');
        return redirect('jobs/' . $job_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // 応募したお仕事案件の詳細画面を表示する
        // ダイレクトメッセージもここでやり取りする
        $job = Job::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // お仕事案件への応募を取り消す
    }
}
