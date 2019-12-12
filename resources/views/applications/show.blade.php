@extends('layouts.app')

@section('content')
<div class="l-main">
    <h1 class="form-heading">{{ $application[0]->job->title }}</h1>
    <hr>
    内容：{{ $application[0]->job->detail }} <br>
    状態：{{$application[0]->job->status}} <br>
    種別：{{$application[0]->job->type}} <br>
    案件投稿者：{{ $owner_user->name }} <br>
    報酬：{{ number_format($application[0]->job->reward_min) }}円〜{{ number_format($application[0]->job->reward_max) }}円 <br>
    応募締切：{{ $application[0]->job->deadline }} <br>
    応募者：{{ $application[0]->user_name }}

    @foreach ($messages as $message)
        <div class="balloon">
            <div class="faceicon">
                <img src="{{ asset('storage/avatar/' . $message->user->profile_image) }}" />
            </div>
            <div class="chat-user-name">{{$message->user->name}}</div>
            <div class="chatting">
                <div class="says"><p>{{ $message->text }}</p></div>
            </div>
        </div>
    @endforeach

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
