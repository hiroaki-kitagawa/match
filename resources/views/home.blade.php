@extends('layouts.app')

@section('title', 'ホーム')

@section('content')
<div class="l-main">
    <div class="tab-wrap">
        <input id="TAB-01" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-01">すべて</label>
        <div class="tab-content">
            <job-list ajaxpath="job_all"></job-list>
        </div>
        <input id="TAB-02" type="radio" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-02">単発</label>
        <div class="tab-content">
            <job-list ajaxpath="job_single"></job-list>
        </div>
        <input id="TAB-03" type="radio" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-03">サービス開発</label>
        <div class="tab-content">
            <job-list ajaxpath="job_service"></job-list>
        </div>
    </div>
</div>
@include('sidebar')
@endsection
