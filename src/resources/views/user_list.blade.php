@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/user_list.css') }}">
@endsection

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="rese-user_list">
    <div class="rese-user_list__content">
        @foreach($users as $user)
        <div class="content_inner">
            <p>{{ $user->name }}</p>
            <p>{{ $user->email }}</p>
        </div>
        @endforeach
        {{ $users->links()}}
    </div>
</div>
@endsection