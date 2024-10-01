<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="https://unpkg.com/ress@4.0.0/dist/ress.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <script src="https://kit.fontawesome.com/9c882e03ff.js" crossorigin="anonymous"></script>
    @yield('css')
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>
    <div class="rese">
        <header class="header">
            @if(Auth::check())
            <div class="header__inner">
                <a href="#menu1" class="fa-solid fa-square-poll-horizontal fa-2xl menu-btn" style="color: #005af5;"></a>
                <h3 class="title" id="title">Rese</h3>
            </div>
            @else
            <div class="header__inner">
                <a href="#menu2" class="fa-solid fa-square-poll-horizontal fa-2xl menu-btn" style="color: #005af5;"></a>
                <h3 class="title" id="title">Rese</h3>
            </div>
            @endif
            <div class="header__inner-menu" id="menu1">
                <a href="#" class="close-btn">×</a>
                <div class="menu__content">
                    <a class="menu__content-link" href="/">Home</a>
                    <form action="/logout" method="post">
                    @csrf
                    <p class="menu__content-btn"><button>Logout</button></p>
                    </form>
                    <a class="menu__content-link" href="{{ route('mypage') }}">Mypage</a>
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