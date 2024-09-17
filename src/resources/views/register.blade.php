@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="rese-content">
    <div class="login register">
        <p>Registration</p>
        <form action="/register/store" method="post">
            @csrf
            <div class="login-item">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="name" placeholder="Username">
                <div class="error_message">
                    @error('name')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
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
            <button>登録</button>
        </form>
    </div>
</div>
@endsection