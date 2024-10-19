@extends('layouts.app')

@section('title', 'Добро пожаловать')

@section('content')
    <div class="text-center">
        <h1 class="m-5">Добро пожаловать</h1>
        <a href="{{ route('login') }}" class="btn btn-primary me-2">Логин</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Регистрация</a>
    </div>
@endsection
