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
</head>
<body>
    <div class="rese">
        <header class="header">
            <div class="header__inner">
                <a href="#" class="fa-solid fa-square-poll-horizontal fa-2xl" style="color: #005af5;"></a>
            </div>
            <div class="header__inner-nav">
                <ul>
                    <li><a href="/">ホーム</a></li>
                    <li><a href="/login">ログイン</a></li>
                    <form action="/logout" method="post">
                    @csrf
                    <li><button>ログアウト</button></li>
                    </form>
                    <li><a href="{{ route('mypage', ['user_id' => Auth::id()]) }}">マイページ</a></li>
                    <li><a href="/register">登録</a></li>
                </ul>
            </div>
            @yield('link')
        </header>
        @yield('content')
    </div>
</body>
</html>