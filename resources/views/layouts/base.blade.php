<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интернет-магазин - Главная</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        /* Шапка */
        header {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #4a90e2;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
        }

        .nav-links a {
            color: #555;
            text-decoration: none;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #4a90e2;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-outline {
            border: 1px solid #4a90e2;
            color: #4a90e2;
        }

        .btn-outline:hover {
            background-color: #4a90e2;
            color: white;
        }

        .btn-primary {
            background-color: #4a90e2;
            color: white;
            border: 1px solid #4a90e2;
        }

        .btn-primary:hover {
            background-color: #3a7bc8;
            border-color: #3a7bc8;
        }
    </style>
    @yield('style')
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="{{ route('main') }}" class="logo">InternetShop</a>

            <div class="nav-links">
                <a href="{{ route('main') }}">Главная</a>
                <a href="{{ route('catalog') }}">Каталог</a>
                <a href="{{ route('about') }}">О нас</a>
                <a href="{{ route('profile') }}">Профиль</a>
            </div>

            <div class="auth-buttons">
                <a href="{{ route('logout') }}" class="btn btn-outline">Выйти</a>
            </div>
        </nav>
    </header>
    @yield('content')
</body>

