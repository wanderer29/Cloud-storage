@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="text-center">
        <h1 class="m-3">Welcome</h1>
        <a href="{{ route('login') }}" class="btn btn-primary me-2">Логин</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Регистрация</a>
    </div>
@endsection
