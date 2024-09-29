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
@foreach($restaurants as $restaurant)
<p>{{$restaurant->name}}</p>
@foreach($users as $user)
@if($user->restaurant_id = $restaurant->id)
                        <button class="fa-solid fa-heart" style="color: #ec0914;"></button>
                        @else
                        <button class="fa-solid fa-heart" style="color: #c1c7d1;"></button>
                        @endif
@endforeach
@endforeach
@endsection