<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use app\Library\Common;

class JobsController extends Controller
{
    // すべてのお仕事案件を取得
    public function job_all() {
        $jobs = \App\Job::with('user');
        return $jobs->paginate(10);
    }

    // 単発案件を取得
    public function job_single() {
        $jobs = \App\Job::with('user');
        $jobs = $jobs->where('type', '単発案件');
        return $jobs->paginate(10);
    }

    // サービス開発案件を取得
    public function job_service() {
        $jobs = \App\Job::with('user');
        $jobs = $jobs->where('type', 'サービス開発案件');
        return $jobs->paginate(10);
    }

    // 自分が登録したお仕事案件
    public function my_job_submit() {
        $id = Auth::id();
        $jobs = \App\Job::with('user','applications');
        $jobs = $jobs->where('user_id', $id)->paginate(10);
        return $jobs;
    }

    // 自分が応募したお仕事案件
    public function my_job_applied() {
        $id = Auth::id();
        $jobs = \App\Job::with('user', 'applications');
        $jobs = $jobs->whereHas('applications' , function($query) use ($id) {
            $query->where('user_id', $id);
        })->paginate(10);
        return $jobs;
    }

}
