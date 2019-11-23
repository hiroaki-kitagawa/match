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
        $application->owner_id = $owner->id;
        $application->save();

        \Notification::send($owner, new \App\Notifications\SendInvitation(\Auth::user()->name));

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
        $application = Application::find($id);
        $application = Application::with('job')->where('id', $id)->get();
        $apply_user = User::find($application[0]->user_id);
        $owner_user = User::find($application[0]->owner_id);
        // dd($id);
        $messages = Message::with('user')->where('apply_id', $id)->get();

        // DM送信時に使用する応募,仕事情報をセッションに保存する
        $request->session()->put('application', $application);

        return view('applications.show', compact('application', 'apply_user', 'owner_user', 'messages'));
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
