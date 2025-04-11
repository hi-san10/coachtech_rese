@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks">
    <div class="thanks-content">
        <div class="thanks_content--text">
            <p class="thanks-message">会員登録<br class="br">ありがとうございます</p>
            <div class="thanks-content__link">
                <a class="login-link" href="/login">ログインする</a>
            </div>
        </div>
    </div>
</div>
@endsection