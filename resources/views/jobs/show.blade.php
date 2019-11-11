@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="tab-content">
                        <h2>{{$job->title}}</h2>
                        <hr>
                        投稿者：{{ $user->name }} <br>
                        {{$job->detail}} <br>
                        状態：{{$job->status}} <br>
                        種別：{{$job->type}} <br>
                        報酬：{{ number_format($job->reward_min) }}円〜{{ number_format($job->reward_max) }}円 <br>
                        応募締切：{{$job->deadline}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
