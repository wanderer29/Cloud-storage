@extends('layouts.app')

@section('title', 'Авторизация')

@section('header_title', 'Логин')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-6">
            <div class="card-header">
                <h2>Вход в аккаунт</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="login">Логин:</label>
                        <input class="form-control" type="text" id="login" name="login" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Пароль:</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                    </div>
                    <button class="btn btn-primary" type="submit">
                        Логин
                    </button>
                    <a href="{{ route('register') }}" class="btn btn-link">Регистрация</a>
                    <a href="{{ route('welcome') }}" class="btn btn-secondary">На главную</a>
                </form>
                @if (session('error'))
                    <div class="alert alert-danger m-3">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success m-3">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
