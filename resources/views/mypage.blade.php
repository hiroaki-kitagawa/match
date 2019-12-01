@extends('layouts.app')

@section('content')
    @include('sidebar')
    <div class="contents">
        <div class="cp_tab">
            <input type="radio" name="cp_tab" id="tab1_1" aria-controls="first_tab01" checked>
            <label for="tab1_1">登録済</label>
            <input type="radio" name="cp_tab" id="tab1_2" aria-controls="second_tab01">
            <label for="tab1_2">応募済</label>
            <input type="radio" name="cp_tab" id="tab1_3" aria-controls="third_tab01">
            <label for="tab1_3">公開メッセージ</label>
            <input type="radio" name="cp_tab" id="tab1_4" aria-controls="force_tab01">
            <label for="tab1_4">ダイレクトメッセージ</label>
            <div class="cp_tabpanels">
                <div id="first_tab01" class="cp_tabpanel">
                    <my-job-list ajaxpath="my_job_submit" login_id="{{Auth::id()}}"></my-job-list>
                </div>
                <div id="second_tab01" class="cp_tabpanel">
                    <job-list ajaxpath="my_job_applied" login_id="{{Auth::id()}}"></job-list>
                </div>
                <div id="third_tab01" class="cp_tabpanel">
                    <my-public-message></my-public-message>
                </div>
                <div id="force_tab01" class="cp_tabpanel">
                    <my-direct-message></my-direct-message>
                </div>
            </div>
        </div>
    </div>
@endsection
