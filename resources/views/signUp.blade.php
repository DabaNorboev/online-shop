<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация в интернет-магазине</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .auth-container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .auth-header h1 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .auth-form .form-group {
            margin-bottom: 1rem;
        }

        .auth-form label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-size: 0.9rem;
        }

        .alert {
            color: red;
        }

        .auth-form input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .auth-form input:focus {
            outline: none;
            border-color: #4a90e2;
        }

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
</head>
<body>
<div class="auth-container">
    <div class="auth-header">
        <h1>Регистрация</h1>
        <p>Создайте аккаунт для совершения покупок</p>
    </div>
    <form class="auth-form" method="POST" action="{{ route('signup.form') }}">
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
</div>
</body>
</html>
