<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use app\Library\Common;

class JobsController extends Controller
{

    public function job_all() {
        return \App\Job::paginate(10);
    }

    public function job_single() {
        $query = \App\Job::query()->where('type', '単発案件');
        return $query->paginate(10);
    }

    public function job_service() {
        $query = \App\Job::query()->where('type', 'サービス開発案件');
        return $query->paginate(10);
    }


}
