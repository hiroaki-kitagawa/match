@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')
        <div class="col-md-8">
            <div class="panel panel-default">
                        <h2>お仕事を登録する</h2>
                        <hr>
                        <form action="jobs/store" method="POST">
                            {{ csrf_field() }}
                            <div>
                                {!! Form::label('title', 'タイトル') !!}
                                {!! Form::text('title') !!}
                            </div>
                            <div>
                                {!! Form::label('type', '案件種別') !!}
                                {!! Form::select('type', ['単発案件' => '単発案件','サービス開発案件' => 'サービス開発案件']) !!}
                            </div>
                            <div>
                                {!! Form::label('reward', '報酬金額') !!}
                                {!! Form::text('reward_min') !!}
                                〜
                                {!! Form::text('reward_max') !!}
                            </div>
                            <div>
                                {!! Form::label('detail', '内容') !!}
                                {!! Form::textarea('detail') !!}
                            </div>
                            <div>
                                {!! Form::label('deadline', '応募期限') !!}
                                {!! Form::date('deadline') !!}
                            </div>

                            <br>
                            {!! Form::submit('登録') !!}

                        </form>


            </div>
        </div>
    </div>
</div>
@endsection
