@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reminder.css') }}">
@endsection

@section('content')
<div class="rese_container">
    <div class="rese_reservation-confirm">
        <h3>{{ $reservation->user->name }}様</h3>
        <p>{{ $reservation->restaurant->name }}の予約当日となりました</p>
        <h4>[予約内容]</h4>
        <p>{{ $reservation->date }}</p>
        <p>{{ substr($reservation->time, 0, 5) }}</p>
        <p>{{ $reservation->number_of_people}}人</p>
    </div>
</div>
@endsection