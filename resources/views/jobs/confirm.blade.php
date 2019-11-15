@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')
        <div class="col-md-8">
            <div class="panel panel-default">
                        <h2>登録内容の確認</h2>
                        <hr>
                        <form action="complete" method="POST">
                            {{ csrf_field() }}
                            <div>
                                {!! Form::label('title', 'タイトル：'. $data["title"]) !!}
                            </div>
                            <div>
                                {!! Form::label('type', '案件種別：'. $data["type"]) !!}
                            </div>
                            <div>
                                {!! Form::label('reward', '報酬金額：') !!}
                                {!! Form::label('reward_min', number_format($data['reward_min'])) !!}
                                〜
                                {!! Form::label('reward_max', number_format($data['reward_max'])) !!}
                                円
                            </div>
                            <div>
                                {!! Form::label('detail', '内容：' . $data['detail']) !!}
                            </div>
                            <div>
                                {!! Form::label('deadline', '応募期限：' . $data['deadline']) !!}
                            </div>

                            <br>
                            {!! Form::submit('登録') !!}

                        </form>


            </div>
        </div>
    </div>
</div>
@endsection
