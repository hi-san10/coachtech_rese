@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="rese-content">
    <div class="login">
        <p class="login__text"><span class="login__text-item">Login</span></p>
        <form class="login__form" action="/login/login" method="post">
            @csrf
            <div class="login-item">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email" placeholder="Email">
                <div class="error_message">
                    @error('email')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="login-item">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Password">
                <div class="error_message">
                    @error('password')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="login-item__button">
                <button class="login__button"><span class="login__button-item">ログイン</span></button>
            </div>
        </form>
    </div>
</div>
@endsection