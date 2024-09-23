@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks">
    <div class="thanks-content">
        <div class="thanks_content--text">
            <p>会員登録ありがとうございます</p>
            <div class="thanks-content__link">
                <a href="/login"><span>ログインする</span></a>
            </div>
        </div>
    </div>
</div>
@endsection