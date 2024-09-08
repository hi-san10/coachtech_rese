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
            </div>
            <div class="login-item">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="login-item">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Password">
            </div>
            <button>登録</button>
        </form>
    </div>
</div>
@endsection