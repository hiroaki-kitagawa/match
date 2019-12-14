@extends('layouts.app')

@section('content')
<div class="l-main">
    <h1 class="c-form__heading">{{$job->title}}</h1>
    <hr>
    投稿者：{{ $owner->name }} <br>
    内容：{{$job->detail}} <br>
    状態：{{$job->status}} <br>
    種別：{{$job->type}} <br>
    @if($job->type == '単発案件')
        報酬：{{ number_format($job->reward_min) }}円〜{{ number_format($job->reward_max) }}円
    @else
        報酬：応相談
    @endif
    <br>
    応募締切：{{$job->deadline}} <br>

    <div class="dp-bl">
        <a href="'https://twitter.com/share?text={{$job->title}}:{{$job->detail}}?ref_src=twsrc%5etfw'" class="twitter-share-button" data-show-count="false">tweet</a>
    </div>
    <br>

    @if( $owner->id != Auth::id() )
        <div>
            @if($application_status === false)
            <form action="/applications/store" method="post">
                {{ csrf_field() }}
                {!! Form::submit('応募する', ['id' => 'btn-submit']) !!}
            </form>
            @else
            <form>
                {!! Form::submit('応募済み',['disabled' => 'disabled']) !!}
            </form>
            @endif
        </div>
    @endif

    @foreach ($messages as $message)
        @if($message->user_id != Auth::id())
            <div class="balloon1">
                <div class="icon">
                    @if ($message->user->profile_image)
                    <img src="{{ asset('storage/avatar/' . $message->user->profile_image) }}" />
                    @else
                    <img src="{{ asset('storage/avatar/' . 'noimage.png') }}" />
                    @endif
                </div>
                {{$message->text}}
            </div>
            <div class="icon_name-left">
                {{$message->user->name}}
            </div>
            <br><br>
        @else
            <div class="balloon2">
                <div class="icon">
                    @if ($message->user->profile_image)
                        <img src="{{ asset('storage/avatar/' . $message->user->profile_image) }}" />
                    @else
                        <img src="{{ asset('storage/avatar/' . 'noimage.png') }}" />
                    @endif
                </div>
                {{$message->text}}
            </div>
            <div class="icon_name-right">
                {{$message->user->name}}
            </div>
            <br><br>
        @endif
    @endforeach

    <div>
        <form action="../messages/store" method="POST">
            {{ csrf_field() }}
            <div>
                {!! Form::textarea('public_message', null, ['rows' => 10,'cols' => 90]) !!}
            </div>
            <div>
                {!! Form::submit('パブリックメッセージを送る', ['id' => 'btn-submit']) !!}
            </div>
        </form>
    </div>
</div>
@include('sidebar')
@endsection
