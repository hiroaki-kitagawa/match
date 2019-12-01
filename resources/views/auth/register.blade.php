@extends('layouts.app')

@section('content')
<div class="form-parent">
    <h1 class="panel-heading">{{ __('Register') }}</h1>

    <div class="panel-body">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-label" class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" >{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-input" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-label" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-input" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-label" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
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
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required>
                </div>
            </div>

            <div  class="form-label"  class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
