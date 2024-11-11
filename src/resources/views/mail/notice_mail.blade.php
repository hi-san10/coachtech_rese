@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="">
@endsection

@section('content')
{{ $email['mail_txt'] }}
@endsection