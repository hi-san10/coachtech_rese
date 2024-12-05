@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="rese-admin">
    <div class="rese-admin__content">
        <div class="rese-admin__content-inner">
            <form class="content-inner__form" action="/admin/store" method="post">
                @csrf
                <input type="text" name="name" placeholder="Name">
                @error('name')
                <span class="error_message">{{ $message }}</span>
                @enderror
                <input type="email" name="email" placeholder="Email">
                @error('email')
                <span class="error_message">{{ $message }}</span>
                @enderror
                <input type="password" name="password" placeholder="Password">
                @error('password')
                <span class="error_message">{{ $message }}</span>
                @enderror
                <button class="form__btn">店舗代表者作成</button>
            </form>
        </div>
        <div class="rese-admin__content-inner">
            <a href="/admin/notice/mail">お知らせメールを送信する</a>
        </div>
    </div>
</div>
@endsection