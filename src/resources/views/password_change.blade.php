@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/password_change.css') }}">
@endsection

@section('content')
<div class="rese_password_change">
    <div class="password_change__content">
        <form action="/restaurant_owner/change_password" method="post">
            @method('patch')
            @csrf
            <div class="now_password">
                <input type="password" name="now_password" placeholder="現在のパスワード">
            </div>
            <div class="new_password">
                <input type="password" name="new_password" placeholder="新しいパスワード">
            </div>
            <div class="confirm_password">
                <input type="password" name="confirm_password" placeholder="新しいパスワード確認">
            </div>
            <div class="password_change__btn">
                <button>変更する</button>
            </div>
        </form>
    </div>
</div>
@endsection