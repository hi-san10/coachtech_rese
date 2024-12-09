@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/passwordChange_mail.css') }}">
@endsection

@section('content')
<div class="rese-passwordChange_mail">
    <div class="mail content">
        <form id="form" action="{{ route('change_password', ['id' => $restaurant_owner_id]) }}">

            <div>
                <input type="password" name="new_password" placeholder="新しいパスワード">
                <input type="password" name="confirm_password" placeholder="新しいパスワード(確認)">
            </div>
            <div class="form__btn">
                <a href="{{ route('change_password', ['id' => $restaurant_owner_id]) }}">変更する</a>
                <button form="form">変更</button>
            </div>
        </form>
    </div>
</div>
@endsection