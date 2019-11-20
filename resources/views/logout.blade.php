@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="tab-content">
                    <button href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
