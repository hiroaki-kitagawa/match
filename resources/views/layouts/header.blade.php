<header class="l-header header__static-top">
    <div class="l-header__site-title" >
        <a href="{{ url('/home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>

    <div class="l-header__right">
        <ul class="nav">
            <!-- Authentication Links -->
            @guest
                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
                <li>
                    <a href="/mypage"  class="user-icon">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="trim">
                            <img src="{{ asset('storage/avatar/' . Auth::user()->profile_image) }}" />
                        </div>
                    </a>
                </li>
            @endguest
        </ul>
    </div>
</header>
