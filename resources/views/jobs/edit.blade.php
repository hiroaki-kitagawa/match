@extends('layouts.app')

@section('content')
@include('sidebar')
<div class="l-main">
    <form action="../update/{{$job->id}}" method="POST">
        <h1 class="c-form__heading">お仕事を編集する</h1>
        <hr>
        {{ csrf_field() }}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            {!! Form::label('title', 'タイトル') !!}<br>
            <input type="text" name="title" class="c-form__input" value="{{$job->title}}">
        </div>
        <div>
            {!! Form::label('type', '案件種別') !!}<br>
            {!! Form::select('type', [ $job->type => $job->type, '単発案件' => '単発案件','サービス開発案件' => 'サービス開発案件'], null, ['class' => 'c-form__input']) !!}
        </div>
        <div>
            {!! Form::label('reward', '報酬金額') !!}<br>
            <div class="c-form__inline-flex">
                {!! Form::text('reward_min', $job->reward_min, ['class' => 'c-form__input c-form__input-digits']) !!}
                〜
                {!! Form::text('reward_max', $job->reward_max, ['class' => 'c-form__input c-form__input-digits']) !!}
                円
            </div>
        </div>
        <div>
            {!! Form::label('detail', '内容') !!}
            {!! Form::textarea('detail', $job->detail, ['class' => 'c-form__input c-form__input-textarea', 'cols' => 4, 'rows' => 30]) !!}
        </div>
        <div>
            {!! Form::label('deadline', '応募期限') !!}
            {!! Form::date('deadline', $job->deadline, ['class' => 'c-form__input c-form__input-date']) !!}
        </div>

        <br>
        {!! Form::submit('更新',  ['id' => 'btn-submit', 'class' => 'btn-default']) !!}

    </form>
</div>
@endsection
