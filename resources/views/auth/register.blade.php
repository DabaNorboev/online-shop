@extends('layouts.auth')
@section('title', 'Регистрация')
@section('style')
    <style>
        .auth-header {
            margin-bottom: 1.5rem;
        }
    </style>
@endsection
@section('content')
    <div class="auth-header text-center">
        <h1 class="h3 mb-2 fw-normal">Регистрация</h1>
        <p class="text-muted">Создайте аккаунт для совершения покупок</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row g-2 mb-2">
            <div class="col">
                <div class="form-floating">
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                           id="first_name" name="first_name" placeholder="Имя"
                           value="{{ old('first_name') }}" required autofocus maxlength="255">
                    <label for="first_name">Имя</label>
                    @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-floating">
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                           id="last_name" name="last_name" placeholder="Фамилия"
                           value="{{ old('last_name') }}" required maxlength="255">
                    <label for="last_name">Фамилия</label>
                    @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-floating mb-2">
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                   id="email" name="email" placeholder="name@example.com"
                   value="{{ old('email') }}" required maxlength="255">
            <label for="email">Email</label>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-2">
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                   id="password" name="password" placeholder="Пароль" required maxlength="255">
            <label for="password">Пароль</label>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                   id="password_confirmation" name="password_confirmation"
                   placeholder="Подтвердите пароль" required maxlength="255">
            <label for="password_confirmation">Подтвердите пароль</label>
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="w-100 btn btn-lg btn-success">Зарегистрироваться</button>
    </form>

    <div class="text-center mt-3">
        <p class="text-muted">Уже есть аккаунт?
            <a href="{{ route('login.form') }}" class="text-decoration-none">Войти</a>
        </p>
    </div>
@endsection
