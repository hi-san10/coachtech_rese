@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sent_mail.css') }}">
@endsection

@section('content')
<div class="rese-sent_mail">
    <div class="sent_mail__content">
        <p>メールアドレスに本人確認用のメールを送りました。</p>
    </div>
</div>
@endsection