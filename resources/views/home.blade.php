@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')
        <div class="col-md-8">
            <div>
                <input name="search_job" placeholder="お仕事を探す" type="text" class="search_box">
                <button class="search_button">検索</button>
            </div>
            <div class="panel panel-default">

                <div class="tab-content">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#all-jobs" data-toggle="tab">すべて</a></li>
                        <li><a href="#single-jobs" data-toggle="tab">単発</a></li>
                        <li><a href="#service-jobs" data-toggle="tab">サービス開発</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="all-jobs">
                            すべて
                            <all-jobs></all-jobs>
                        </div>
                        <div class="tab-pane" id="single-jobs">
                            単発
                        </div>
                        <div class="tab-pane" id="service-jobs">
                            サービス開発
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
