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
                <input class="form__item" type="text" name="name" placeholder="Name">
                @error('name')
                <span class="error_message">{{ $message }}</span>
                @enderror
                <input class="form__item" type="email" name="email" placeholder="Email">
                @error('email')
                <span class="error_message">{{ $message }}</span>
                @enderror
                <input class="form__item" type="password" name="password" placeholder="Password">
                @error('password')
                <span class="error_message">{{ $message }}</span>
                @enderror
                <button class="form__btn">店舗代表者作成</button>
            </form>
        </div>
        <div class="rese-admin__content-inner link">
            <a href="/admin/notice/mail">お知らせメールを送信する</a>
        </div>
    </div>
</div>
@endsection