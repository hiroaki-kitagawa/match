<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Job;
use App\User;
use App\Message;
use App\Application;
use App\Http\Requests;
use App\Http\Controllers\DB;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // お仕事案件の新規登録ページを表示する
        return view('jobs.add');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // お仕事案件の新規登録ページから案件情報を保存(POST)する
        $job = new Job;
        $job->user_id = Auth::id();
        $job->title = $request->title;
        $job->type = $request->type;
        $job->reward_min = $request->reward_min;
        $job->reward_max = $request->reward_max;
        $job->status = '応募中';
        $job->detail = $request->detail;
        $job->deadline = $request->deadline;
        $job->save();

        session()->flash('added_message', 'お仕事を登録しました');
        return redirect('mypage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // 選択したお仕事案件の詳細画面を表示する
        $job = Job::findOrFail($id);
        $owner = User::find($job->user_id);
        // パブリックコメントを取得する
        $messages = Message::with('user')->where('job_id', $id)->where('recipient_id', null)
                            ->orderBy('created_at', 'asc')
                            ->get();

        // 表示する仕事の投稿者とJobIDをセッションに保存する
        $request->session()->put('owner', $owner);
        $request->session()->put('job_id', $job->id);

        // 応募状況を確認する
        // ApplicationsテーブルにJobIDとログインユーザIDを含むレコードがあれば応募済み
        $check_user = Application::where('user_id', '=', Auth::id())->exists();
        $check_job = Application::where('job_id', '=', $job->id)->exists();

        if ( $check_user && $check_job )
        { // 応募済み
            $application_status = true;
        } else { // 未応募
            $application_status = false;
        }

        return view('jobs.show', compact('job', 'owner', 'messages', 'application_status'));
    }

    public function view_message()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // お仕事案件の詳細情報を編集する
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
        // 詳細情報の変更内容を更新(POST)する
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // お仕事案件を削除する
    }
}
