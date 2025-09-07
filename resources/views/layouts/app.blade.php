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
            align-items: center;
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
            align-items: center;
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

        /* Стили для корзины */
        .cart-icon {
            position: relative;
            margin-left: 1rem;
        }

        .cart-icon a {
            display: flex;
            align-items: center;
            color: #555;
            text-decoration: none;
        }

        .cart-icon svg {
            width: 24px;
            height: 24px;
            fill: currentColor;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #ff4757;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        .cart-icon:hover a {
            color: #4a90e2;
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

            <div class="cart-icon">
                <a href="{{ route('cart') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                    <span class="cart-count">{{ $cartCount ?? 0 }}</span>
                </a>
            </div>
        </div>

        <div class="auth-buttons">
            <a href="{{ route('logout') }}" class="btn btn-outline">Выйти</a>
        </div>
    </nav>
</header>
@yield('content')
</body>
</html>
