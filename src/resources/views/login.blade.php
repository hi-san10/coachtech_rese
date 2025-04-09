@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="rese-content">
    @if(session('message'))
    <div class="error__message">
        <p class="error_text session_text">{{ session('message') }}</p>
    </div>
    @endif
    <div class="login">
        <p class="login__text"><span class="login__text-item">Login</span></p>
        <form class="login__form" action="/login/login" method="post">
            @csrf
            <div class="login-item">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="error__message">
                @error('email')
                <span class="error_text">{{ $message }}</span>
                @enderror
            </div>
            <div class="login-item">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="error__message">
                @error('password')
                <span class="error_text">{{ $message }}</span>
                @enderror
            </div>
            <div class="login-item__button">
                <button class="login__button"><span class="login__button-item">ログイン</span></button>
                <input type="hidden" name="guard" value="admin_users">
            </div>
        </form>
    </div>
</div>
@endsection