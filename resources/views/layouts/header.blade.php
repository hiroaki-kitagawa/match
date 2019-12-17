<header class="l-header header__static-top">
    <h1 class="l-header__site-title" >
        <a href="{{ url('/top') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </h1>

    <div class="l-header__right">
        <ul class="nav" id="menu">
            <li>
                <!-- Authentication Links -->
                @guest
                <a href="#">メニュー<i class="fas fa-chevron-down"></i></a>
                <ul>
                    <li class="menu__single"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li class="menu__single"><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                </ul>
                @else
                <a href="#">{{ Auth::user()->name }}<i class="fas fa-chevron-down"></i></a>
                <ul>
                    <li class="menu__single">
                        <a href="/mypage"  class="user-icon">
                            <div class="nav-single">マイページ</div>
                        </a>
                    </li>
                    <li class="menu__single">
                        <a href="/home"  class="user-icon">
                            <div class="nav-single">お仕事一覧</div>
                        </a>
                    </li>
                    <li class="menu__single">
                        <a href="/jobs/create"  class="user-icon">
                            <div class="nav-single">お仕事登録</div>
                        </a>
                    </li>
                    <li class="menu__single">
                        <a href="/profile/edit"  class="user-icon">
                            <div class="nav-single">プロフィール</div>
                        </a>
                    </li>
                    <li class="menu__single">
                            <a class="" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
                @endguest
            </li>
        </ul>
    </div>
</header>
