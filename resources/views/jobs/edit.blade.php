@extends('layouts.app')

@section('content')
@include('sidebar')
<div class="form-parent">
    <form action="../update/{{$job->id}}" method="POST">
        <h1 class="form-heading">お仕事を編集する</h1>
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
            <label for="title" class="form-label">タイトル</label>
            <input type="text" name="title" class="form-input" value="{{$job->title}}">
        </div>
        <div>
            {!! Form::label('type', '案件種別') !!}
            {!! Form::select('type', [ $job->type => $job->type, '単発案件' => '単発案件','サービス開発案件' => 'サービス開発案件'], null, ['class' => 'form-input']) !!}
        </div>
        <div>
            {!! Form::label('reward', '報酬金額') !!}
            <div class="form-inline-flex">
                {!! Form::text('reward_min', $job->reward_min, ['class' => 'form-input form-input-digits']) !!}
                〜
                {!! Form::text('reward_max', $job->reward_max, ['class' => 'form-input form-input-digits']) !!}
                円
            </div>
        </div>
        <div>
            {!! Form::label('detail', '内容') !!}
            {!! Form::textarea('detail', $job->detail, ['class' => 'form-input form-input-textarea', 'cols' => 4, 'rows' => 30]) !!}
        </div>
        <div>
            {!! Form::label('deadline', '応募期限') !!}
            {!! Form::date('deadline', $job->deadline, ['class' => 'form-input form-input-date']) !!}
        </div>

        <br>
        {!! Form::submit('更新',  ['id' => 'btn-submit', 'class' => 'btn-default']) !!}

    </form>
</div>
@endsection
