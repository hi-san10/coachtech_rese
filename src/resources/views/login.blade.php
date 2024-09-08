@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="rese-content">
    <div class="login register">
        <p>Login</p>
        <form action="/login/login" method="post">
            @csrf
            <div class="login-item">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="login-item">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Password">
            </div>
            <button>ログイン</button>
        </form>
    </div>
</div>
@endsection