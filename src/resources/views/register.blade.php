@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="rese-content">
    <div class="register">
        <p class="register__text"><span class="register__text-item">Registration</span></p>
        <form class="register__form" action="/register/store" method="post">
            @csrf
            <div class="register-item">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="name" placeholder="Username">
            </div>
            <div class="error_message">
                @error('name')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="register-item">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="error_message">
                @error('email')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="register-item">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="error_message">
                @error('password')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="register-item__button">
                <button class="register__button"><span class="register__button-item">登録</span></button>
            </div>
        </form>
    </div>
</div>
@endsection