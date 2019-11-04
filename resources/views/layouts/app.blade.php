<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('layouts.head')

<body>
    <div id="app">
        @include('layouts.header')

        @yield('content')
    </div>

    @include('layouts.footer')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
