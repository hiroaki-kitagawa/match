@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')
        <div class="col-md-8">
            <div class="panel panel-default">
                        <h2>プロフィール・設定変更</h2>
                        <hr>
                        <form action="/profile/update" method="POST" enctype="multipart/form-data">
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
                                {!! Form::label('name', 'お名前') !!}
                                {!! Form::text('name', $user->name) !!}
                            </div>
                            <div>
                                {!! Form::label('email', 'メールアドレス') !!}
                                {!! Form::text('email', $user->email) !!}
                            </div>
                            @isset ($user->profile_image)
                                <div>
                                    <img src="{{ asset('storage/avatar/' . $user->profile_image) }}" />
                                </div>
                            @endif
                            <div>
                                {!! Form::label('profile_image', 'プロフィール画像') !!}
                                {!! Form::file('profile_image') !!}
                            </div>
                            <div>
                                {!! Form::label('profile_text', '自己紹介文') !!}
                                {!! Form::textarea('profile_text', $user->profile_text) !!}
                            </div>

                            <br>
                            {!! Form::submit('更新', ['id' => 'btn-submit']) !!}

                        </form>

            </div>
        </div>
    </div>
</div>
@endsection
