@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>{{$job->title}}</h2>
                    <hr>
                    投稿者：{{ $owner->name }} <br>
                    内容：{{$job->detail}} <br>
                    状態：{{$job->status}} <br>
                    種別：{{$job->type}} <br>
                    報酬：{{ number_format($job->reward_min) }}円〜{{ number_format($job->reward_max) }}円 <br>
                    応募締切：{{$job->deadline}} <br>
                    <hr>

                    @foreach ($messages as $message)
                        <div class="pull-left">
                            @if($message->user_id == $owner->id)
                                {{$message->user->profile_image}}
                            @endif
                        </div>
                        <div>
                            {{ $message->text }}
                        </div>
                        <div class="pull-right">
                            @if($message->user_id <> $owner->id)
                                {{$message->user->profile_image}}
                            @endif
                        </div>
                    @endforeach
                    <hr>
                    <div>

                        <form action="../messages/store" method="POST">

                            {{ csrf_field() }}
                            {!! Form::textarea('public_message') !!}
                            {!! Form::submit('パブリックメッセージを送る') !!}
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
