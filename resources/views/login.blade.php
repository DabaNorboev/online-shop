<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Войти в аккаунт</title>
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
</head>
<body>
    <div class="auth-container">
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
            Нет аккаунта? <a href="{{ route('signup.form') }}">Зарегистрироваться</a>
        </div>
    </div>
</body>
</html>
