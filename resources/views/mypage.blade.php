@extends('layouts.app')

@section('title', 'マイページ')
@section('description', 'MATCH(マッチ)はエンジニア向けのお仕事案件を簡単にマッチングできるサービスです。自身がお仕事を投稿したり、他のお仕事に応募することができます。また、他の会員との公開チャットや応募者とのダイレクトメッセージによる取引も行えます。')


@section('content')
<div class="l-main">
    <div class="tab-wrap">
        <input id="TAB02-01" type="radio" name="TAB02" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB02-01">登録済</label>
        <div class="tab-content">
            <my-job-list ajaxpath="my_job_submit" login_id="{{Auth::id()}}"></my-job-list>
        </div>
        <input id="TAB02-02" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-02">応募済</label>
        <div class="tab-content">
            <job-list ajaxpath="my_job_applied" login_id="{{Auth::id()}}"></job-list>
        </div>
        <input id="TAB02-03" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-03">PM</label>
        <div class="tab-content">
            <my-public-message></my-public-message>
        </div>
        <input id="TAB02-04" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-04">DM</label>
        <div class="tab-content">
            <my-direct-message></my-direct-message>
        </div>
    </div>

</div>
@include('sidebar')
@endsection
