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
                    @if( $owner->id != Auth::id() )
                        @if($application_status === false)
                            <form action="/application/store" method="post">
                                {{ csrf_field() }}
                                {!! Form::submit('応募する') !!}
                            </form>
                        @else
                            <form>
                                {!! Form::submit('応募済み',['disabled' => 'disabled']) !!}
                            </form>
                        @endif
                    @endif
                    <hr>

                    @foreach ($messages as $message)
                        <div>
                            {{$message->user->profile_image}}
                        </div>
                        <div>
                            {{ $message->text }}
                        </div>
                    @endforeach
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
