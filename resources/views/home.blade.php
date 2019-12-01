@extends('layouts.app')

@section('content')
@include('sidebar')
    <div class="contents">
        <div class="cp_tab">
            <input type="radio" name="cp_tab" id="tab1_1" aria-controls="first_tab01" checked>
            <label for="tab1_1">すべて</label>
            <input type="radio" name="cp_tab" id="tab1_2" aria-controls="second_tab01">
            <label for="tab1_2">単発</label>
            <input type="radio" name="cp_tab" id="tab1_3" aria-controls="third_tab01">
            <label for="tab1_3">サービス開発</label>
            <div class="cp_tabpanels">
                <div id="first_tab01" class="cp_tabpanel">
                    <job-list ajaxpath="job_all"></job-list>
                </div>
                <div id="second_tab01" class="cp_tabpanel">
                    <job-list ajaxpath="job_single"></job-list>
                </div>
                <div id="third_tab01" class="cp_tabpanel">
                    <job-list ajaxpath="job_service"></job-list>
                </div>
            </div>
        </div>
    </div>
@endsection
