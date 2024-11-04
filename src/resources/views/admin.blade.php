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
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button class="form__btn">店舗代表者作成</button>
            </form>
        </div>
        <div class="rese-admin__content-inner">
            <a href="">お知らせメールを送信する</a>
        </div>
    </div>
</div>
@endsection