<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- フラッシュメッセージ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>


<body>
    <div id="app">
        <div class="container">
            @include('layouts.header')

            <div class="wrapper">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script>
        // フラッシュメッセージ
        @if (session('added_message'))
            $(function () {
                toastr.success('{{ session('added_message') }}');
            });
        @endif

        @if (session('changedProfile_message'))
            $(function () {
                toastr.success('{{ session('changedProfile_message') }}');
            });
        @endif

        function deletePost(e) {
            'use strict';

            if (confirm('本当に削除していいですか?')) {
                document.getElementById('form_' + e.dataset.id).submit();
            } else {
                return false;
            }
        }

    </script>
</body>
</html>
