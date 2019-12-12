@extends('layouts.app')

@section('content')
<div class="l-main form-m0a">
    <h1 class="c-form__heading">{{ __('Reset Password') }}</h1>
    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>

            <div>
                <input id="email" type="email" class="c-form__input" name="email" value="{{ $email or old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">{{ __('Password') }}</label>

            <div>
                <input id="password" type="password" class="c-form__input" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="c-form__input" name="password_confirmation" required>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-label">
            <div>
                <button type="submit" class="btn-default">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
