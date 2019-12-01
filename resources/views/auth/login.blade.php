@extends('layouts.app')

@section('content')
    <div class="form-parent form-m0a">

        <div class="form-body">
                <h1 class="form-heading">{{ __('Login') }}</h1>
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-label form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-input" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-label form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-input" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-label">
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
    </div>
@endsection
