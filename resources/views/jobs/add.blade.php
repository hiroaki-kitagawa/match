@extends('layouts.app')

@section('content')
@include('sidebar')
<div class="form-parent">
    <h1 class="form-heading">お仕事を登録する</h1>
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
            {!! Form::text('title',null, ['class' => 'form-input']) !!}
        </div>
        <div>
            {!! Form::label('type', '案件種別') !!}
            {!! Form::select('type', ['単発案件' => '単発案件','サービス開発案件' => 'サービス開発案件'],null, ['class' => 'form-input']) !!}
        </div>
        <div>
            {!! Form::label('reward', '報酬金額') !!}
            <div class="form-inline-flex">
                {!! Form::text('reward_min', null, ['class' => 'form-input form-input-digits']) !!}
                〜
                {!! Form::text('reward_max', null, ['class' => 'form-input form-input-digits']) !!}
                円
            </div>
        </div>
        <div>
            {!! Form::label('detail', '内容') !!}
            {!! Form::textarea('detail', null, ['class' => 'form-input form-input-textarea', 'cols' => 4, 'rows' => 30]) !!}
        </div>
        <div>
            {!! Form::label('deadline', '応募期限') !!}
            {!! Form::date('deadline', null, ['class' => 'form-input form-input-date']) !!}
        </div>

        <br>
        {!! Form::submit('登録',  ['id' => 'btn-submit', 'class' => 'btn-default']) !!}

    </form>
</div>
@endsection
