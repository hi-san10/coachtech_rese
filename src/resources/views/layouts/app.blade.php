<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <script src="https://kit.fontawesome.com/9c882e03ff.js" crossorigin="anonymous"></script>
    @yield('css')
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>
    <div class="rese">
        <header class="header">
            @if(Auth::check() || Auth::guard('admins')->check() || Auth::guard('restaurant_owners')->check())
            <div class="header__inner">
                <a href="#menu1" class="fa-solid fa-square-poll-horizontal fa-2xl menu-btn" style="color: #005af5;"></a>
                <h1 class="title" id="title">Rese</h1>
            </div>
            @else
            <div class="header__inner">
                <a href="#menu2" class="fa-solid fa-square-poll-horizontal fa-2xl menu-btn" style="color: #005af5;"></a>
                <h1 class="title" id="title">Rese</h1>
            </div>
            @endif
            <div class="header__inner-menu" id="menu1">
                <a href="#" class="close-btn">×</a>
                <div class="menu__content">
                    @if(Auth::check())
                    <a class="menu__content-link" href="/">Home</a>
                    <a class="menu__content-link" href="{{ route('mypage') }}">Mypage</a>
                    @elseif(Auth::guard('admins')->check())
                    <a href="/admin" class="menu__content-link">AdminHome</a>
                    @elseif(Auth::guard('restaurant_owners'))
                    <a href="/restaurant_owner" class="menu__content-link">RestaurantOwnerHome</a>
                    @endif
                    <form action="/logout" method="post">
                    @csrf
                    <p class="menu__content-btn"><button>Logout</button></p>
                    </form>
                </div>
            </div>
            <div class="header__inner-menu" id="menu2">
                <a href="#" class="close-btn">×</a>
                <div class="menu__content">
                    <a class="menu__content-link" href="/">Home</a>
                    <a class="menu__content-link menu__content-btn" href="/register">Registration</a>
                    <a class="menu__content-link" href="/login">Login</a>
                </div>
            </div>
            @yield('link')
        </header>
        @yield('content')
    </div>
</body>
</html>