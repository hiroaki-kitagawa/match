@extends('layouts.app')

@section('content')
<div class="l-main">
    <h1 class="c-form__heading">プロフィール・設定変更</h1>
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
            {!! Form::text('name', $user->name, ['class' => 'c-form__input']) !!}
        </div>
        <div>
            {!! Form::label('email', 'メールアドレス') !!}
            {!! Form::text('email', $user->email, ['class' => 'c-form__input']) !!}
        </div>
        @isset ($user->profile_image)
            <div>
                <img class="c-form__profile-image" src="{{ asset('storage/avatar/' . $user->profile_image) }}" />
            </div>
        @endif
        <div>
            {!! Form::label('profile_image', 'プロフィール画像') !!}
            {!! Form::file('profile_image', ['class' => 'c-form__input']) !!}
        </div>
        <div>
            {!! Form::label('profile_text', '自己紹介文') !!}
            {!! Form::textarea('profile_text', $user->profile_text, ['rows' => 10,'cols' => 90]) !!}
        </div>

        <br>
        {!! Form::submit('更新', ['id' => 'btn-submit', 'class' => 'btn-default']) !!}

    </form>

</div>
@endsection
