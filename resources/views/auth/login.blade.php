@extends('layouts.auth')
@section('title', 'Вход в аккаунт')
@section('style')
    <style>
        .auth-header {
            margin-bottom: 1.5rem;
        }
    </style>
@endsection
@section('content')
    <div class="auth-header text-center">
        <h1 class="h3 mb-2 fw-normal">Вход в магазин</h1>
        <p class="text-muted">Пожалуйста, авторизуйтесь для продолжения</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-floating mb-2">
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                   id="email" name="email" placeholder="name@example.com"
                   value="{{ old('email') }}" required autofocus>
            <label for="email">Email</label>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                   id="password" name="password" placeholder="Пароль" required>
            <label for="password">Пароль</label>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="w-100 btn btn-lg btn-primary">Войти</button>
    </form>

    <div class="text-center mt-3">
        <p class="text-muted">Нет аккаунта?
            <a href="{{ route('register.form') }}" class="text-decoration-none">Зарегистрироваться</a>
        </p>
    </div>
@endsection
