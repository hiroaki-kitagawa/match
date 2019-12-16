@extends('layouts.app')

@section('title', '新規登録')

@section('content')
<div class="l-main form-m0a">
    <h1 class="c-form__heading">{{ __('Register') }}</h1>
    <div class="panel-body">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" >{{ __('Name') }}</label>

                <div>
                    <input id="name" type="text" class="c-form__input" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <div>
                    <input id="email" type="email" class="c-form__input" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-label" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">{{ __('Password') }}</label>

                <div>
                    <input id="password" type="password" class="c-form__input" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-label">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <div>
                    <input id="password-confirm" type="password" class="c-form__input" name="password_confirmation" required>
                </div>
            </div>

            <div  class="form-label"  class="form-group">
                <div>
                    <button type="submit" class="btn-default" id="">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
