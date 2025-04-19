@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/passwordChange_mail.css') }}">
@endsection

@section('content')
<div class="rese-passwordChange_mail">
    <div class="mail content">
        <a href="{{ route('change_password', ['id' => $restaurant_owner->id]) }}">パスワード変更へ</a>
    </div>
</div>
@endsection