@extends('layouts.app')

@section('content')
@include('sidebar')
<div class="form-parent">
    <div class="form-label">
        <form method="POST" action="{{ route('logout')}}">
            {{ csrf_field() }}
            <button type="submit" class="btn-default" id="btn-submit">
                {{ __('Logout') }}
            </button>
        </form>
    </div>
</div>
@endsection
