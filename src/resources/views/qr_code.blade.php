@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/qr_code.css') }}">
@endsection

@section('content')
<div class="rese-qr_code">
    <div class="rese-qr_code__content">
        {!! $qr_code !!}
    </div>
</div>
@endsection