@extends('layouts.auth')
@section('style')
    <style>
        .login-btn {
            width: 100%;
            padding: 0.75rem;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 1rem;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: #3a7bc8;
        }

        .register-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
        }

        .register-link a {
            color: #4a90e2;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
@endsection
@section('content')
    <div class="auth-header">
        <h1>Вход в магазин</h1>
        <p>Пожалуйста, авторизуйтесь для продолжения</p>
    </div>

    <form class="auth-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="login-btn">Войти</button>
    </form>

    <div class="register-link">
        Нет аккаунта? <a href="{{ route('register.form') }}">Зарегистрироваться</a>
    </div>
@endsection
