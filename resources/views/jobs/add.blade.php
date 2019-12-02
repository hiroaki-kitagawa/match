@extends('layouts.app')

@section('content')
@include('sidebar')
<div class="l-main">
    <h1 class="c-form__heading">お仕事を登録する</h1>
    <hr>
    <form action="store" method="POST">
        {{ csrf_field() }}
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            {!! Form::label('title', 'タイトル') !!}
            {!! Form::text('title',null, ['class' => 'c-form__input']) !!}
        </div>
        <div>
            {!! Form::label('type', '案件種別') !!}
            {!! Form::select('type', ['単発案件' => '単発案件','サービス開発案件' => 'サービス開発案件'],null, ['class' => 'c-form__input']) !!}
        </div>
        <div>
            {!! Form::label('reward', '報酬金額') !!}
            <div class="c-form__inline-flex">
                {!! Form::text('reward_min', null, ['class' => 'c-form__input c-form__input-digits']) !!}
                〜
                {!! Form::text('reward_max', null, ['class' => 'c-form__input c-form__input-digits']) !!}
                円
            </div>
        </div>
        <div>
            {!! Form::label('detail', '内容') !!}
            {!! Form::textarea('detail', null, ['class' => 'c-form__input c-form__input-textarea', 'cols' => 4, 'rows' => 30]) !!}
        </div>
        <div>
            {!! Form::label('deadline', '応募期限') !!}
            {!! Form::date('deadline', null, ['class' => 'c-form__input c-form__input-date']) !!}
        </div>

        <br>
        {!! Form::submit('登録',  ['id' => 'btn-submit', 'class' => 'btn-default']) !!}

    </form>
</div>
@endsection
