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
                        <li class="active"><a href="#">すべて</a></li>
                        <li><a href="#">単発</a></li>
                        <li><a href="#">サービス開発</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
