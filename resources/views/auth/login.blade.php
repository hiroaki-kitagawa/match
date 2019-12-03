@extends('layouts.app')

@section('content')
<div class="l-main form-m0a">
        <h1 class="c-form__heading">{{ __('Login') }}</h1>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-label form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <div>
                    <input id="email" type="email" class="c-form__input" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
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

            <div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="form-label">
                <button type="submit" class="btn-default" id="btn-submit">
                    {{ __('Login') }}
                </button>
                <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
            </div>
        </form>

</div>
@endsection
