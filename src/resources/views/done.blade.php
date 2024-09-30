@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
<div class="done">
    <div class="done-content">
        <div class="done_content--text">
            <p>ご予約ありがとうございます</p>
            <div class="done-content__link">
                <a href="/"><span>戻る</span></a>
            </div>
        </div>
    </div>
</div>
@endsection