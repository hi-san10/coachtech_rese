@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/verify_email') }}">
@endsection

@section('content')
<p>登録いただいたメールアドレス宛てに認証メールを送信しました</p>
@endsection