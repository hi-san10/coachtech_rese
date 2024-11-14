@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/restaurant_owner.css') }}">
@endsection

@section('content')
<div class="rese-restaurant_owner">
    <div class="restaurant_owner__content">
        <div class="create_restaurant"><img src="{{ asset('storage/sushi.jpg') }}" alt=""></div>
        <div class="update_restaurant"></div>
        <div class="reservation_confirm"></div>
        <div class="owner_setting"></div>
    </div>
</div>
@endsection