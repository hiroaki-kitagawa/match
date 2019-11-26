@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')
        <div class="col-md-8">
            <div class="panel panel-default">
                        <h2>お仕事を編集する</h2>
                        <hr>
                        <form action="../update/{{$job->id}}" method="POST">
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
                                {!! Form::label('title', 'タイトル') !!}
                                {!! Form::text('title', $job->title) !!}
                            </div>
                            <div>
                                {!! Form::label('type', '案件種別') !!}
                                {!! Form::select('type', [ $job->type => $job->type, '単発案件' => '単発案件','サービス開発案件' => 'サービス開発案件']) !!}
                            </div>
                            <div>
                                {!! Form::label('reward', '報酬金額') !!}
                                {!! Form::text('reward_min', $job->reward_min) !!}
                                〜
                                {!! Form::text('reward_max', $job->reward_max) !!}
                            </div>
                            <div>
                                {!! Form::label('detail', '内容') !!}
                                {!! Form::textarea('detail', $job->detail) !!}
                            </div>
                            <div>
                                {!! Form::label('deadline', '応募期限') !!}
                                {!! Form::date('deadline', $job->deadline) !!}
                            </div>

                            <br>
                            {!! Form::submit('更新',  ['id' => 'btn-submit']) !!}

                        </form>
            </div>
        </div>
    </div>
</div>
@endsection
