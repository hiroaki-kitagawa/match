@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="tab-content">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#added-jobs" data-toggle="tab">登録したお仕事</a></li>
                        <li><a href="#apply-jobs" data-toggle="tab">応募したお仕事</a></li>
                        <li><a href="#public-messages" data-toggle="tab">パブリックメッセージ</a></li>
                        <li><a href="#direct-messages" data-toggle="tab">ダイレクトメッセージ</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="added-jobs">
                            {{-- 登録したお仕事 --}}
                            <job-list ajaxpath="my_job_submit"></job-list>
                        </div>
                        <div class="tab-pane" id="apply-jobs">
                            {{-- 応募したお仕事 --}}
                            <job-list ajaxpath="my_job_applied"></job-list>
                        </div>
                        <div class="tab-pane" id="public-messages">
                            <my-public-message></my-public-message>
                        </div>
                        <div class="tab-pane" id="direct-messages">
                            <my-direct-message></my-direct-message>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
