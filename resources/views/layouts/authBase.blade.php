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
    </style>
    @yield('style')
</head>
<body>
    <div class="auth-container">
        @yield('content')
    </div>
</body>
</html>


