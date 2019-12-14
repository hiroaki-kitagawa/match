@extends('layouts.app')

@section('content')
<div class="l-main">
    <h1 class="c-form__heading">取引画面</h1>
    <hr>
    案件名：{{ $application[0]->job->title }} <br>
    内容：{{ $application[0]->job->detail }} <br>
    状態：{{$application[0]->job->status}} <br>
    種別：{{$application[0]->job->type}} <br>
    案件投稿者：{{ $owner_user->name }} <br>
    @if($application[0]->job->type == '単発案件')
        報酬：{{ number_format($application[0]->job->reward_min) }}円〜{{ number_format($application[0]->job->reward_max) }}円
    @else
        報酬：応相談
    @endif
    <br>
    応募締切：{{ $application[0]->job->deadline }} <br>
    応募者：{{ $application[0]->user_name }}
    <br><br>
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
    {{-- @foreach ($messages as $message)
        <div class="balloon">
            <div class="faceicon">
                @if ($message->user->profile_image)
                    <img src="{{ asset('storage/avatar/' . $message->user->profile_image) }}" />
                @else
                    <img src="{{ asset('storage/avatar/' . 'noimage.png') }}" />
                @endif
            </div>
            <div class="chat-user-name">{{$message->user->name}}</div>
            <div class="chatting">
                <div class="says"><p>{{ $message->text }}</p></div>
            </div>
        </div>
    @endforeach --}}

    <div>
        <form action="../messages/storeDM" method="POST">
            {{ csrf_field() }}
            <div>
                {!! Form::textarea('direct_message', null, ['rows' => 10,'cols' => 90]) !!}
            </div>
            <div>
                {!! Form::submit('ダイレクトメッセージを送る', ['id' => 'btn-submit']) !!}
            </div>
        </form>
    </div>
</div>
@include('sidebar')
@endsection
