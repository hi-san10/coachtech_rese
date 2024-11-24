@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reservation_confirm.css') }}">
@endsection

@section('content')
<div class="rese-reservation_confirm">
    <div class="reservation_confirm__container">
        @foreach($reservations as $reservation)
        <div class="reservation_confirm__content">
            <div class="content__inner">
                <p></p>
            </div>
            <div class="content__inner">
                <p>{{ $reservation->date }}</p>
            </div>
            <div class="content__inner">
                <p>{{ substr($reservation->time, 0, 5) }}</p>
            </div>
            <div class="content__inner">
                <p>{{ $reservation->number_of_people }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection