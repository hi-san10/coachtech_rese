@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create_notice_mail.css') }}">
@endsection

@section('content')
<div class="create_notice_mail">
    <div class="rese-create_notice_mail__content">
        <div class="content_inner">
            <form action="/notice/send" method="post">
                @csrf
                <div class="inner_item subject">
                    <label for="subject">件名</label>
                    <input class="mail_txt" name="subject" type="text" id="subject">
                </div>
                <div class="inner_item txt">
                    <label for="main_txt">本文</label>
                    <textarea class="mail_txt" name="mail_txt" id="main_txt" rows=15></textarea>
                </div>
                <div class="btn">
                    <button>送信する</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection