@extends('layouts.auth')
@section('style')
    <style>
        .register-btn {
            width: 100%;
            padding: 0.75rem;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 1rem;
            transition: background-color 0.3s;
        }

        .register-btn:hover {
            background-color: #3e8e41;
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
        }

        .login-link a {
            color: #4a90e2;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .form-row {
            display: flex;
            gap: 1rem;
        }

        .form-row .form-group {
            flex: 1;
        }
    </style>
@endsection
@section('content')
    <div class="auth-header">
        <h1>Регистрация</h1>
        <p>Создайте аккаунт для совершения покупок</p>
    </div>
    <form class="auth-form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-row">
            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="text" id="first_name" name="first_name" required autofocus maxlength="255">
                @error('first_name')
                <span class="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" id="last_name" name="last_name" required maxlength="255">
                @error('last_name')
                <span class="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required maxlength="255">
            @error('email')
            <span class="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required maxlength="255">
            @error('password')
            <span class="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Подтвердите пароль</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required maxlength="255">
            @error('password_confirmation')
            <span class="alert">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="register-btn">Зарегистрироваться</button>
    </form>

    <div class="login-link">
        Уже есть аккаунт? <a href="{{ route('login.form') }}">Войти</a>
    </div>
@endsection
