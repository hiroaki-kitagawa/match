@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>{{ $application[0]->job->title }}</h2>

                    <hr>
                    内容：{{ $application[0]->job->detail }} <br>
                    状態：{{$application[0]->job->status}} <br>
                    種別：{{$application[0]->job->type}} <br>
                    案件投稿者：{{ $owner_user->name }} <br>
                    報酬：{{ number_format($application[0]->job->reward_min) }}円〜{{ number_format($application[0]->job->reward_max) }}円 <br>
                    応募締切：{{ $application[0]->job->deadline }} <br>

                    <hr>
                    @foreach ($messages as $message)
                        <div>
                            <img src="{{ asset('storage/avatar/' . $message->user->profile_image) }}" />
                        </div>
                        <div>
                            {{ $message->text }}
                        </div>
                    @endforeach

                    <div>
                        <form action="../messages/storeDM" method="POST">
                            {{ csrf_field() }}
                            {!! Form::textarea('direct_message') !!}
                            {!! Form::submit('ダイレクトメッセージを送る') !!}
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
