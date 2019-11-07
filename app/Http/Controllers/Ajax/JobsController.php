<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use app\Library\Common;

class JobsController extends Controller
{
    public function index_all() {
        return json_decode(\App\Job::all(), true);

    }

    public function index_single() {
        return \App\Job::query()->where('type', '単発案件')->get();
    }

    public function index_service() {
        return \App\Job::query()->where('type', 'サービス開発案件')->get();
    }
}
