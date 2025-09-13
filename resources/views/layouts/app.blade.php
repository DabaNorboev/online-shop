<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .cart-icon {
            width: 24px;
            height: 24px;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-light py-3">
        <div class="container">
            <!-- Бренд/логотип -->
            <a href="{{ route('main') }}" class="navbar-brand me-4">InternetShop</a>

            <!-- Кнопка для мобильного меню -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Основное меню -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{ route('main') }}" class="nav-link">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('catalog') }}" class="nav-link">Каталог</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profile') }}" class="nav-link">Профиль</a>
                    </li>
                </ul>

                <!-- Правая часть с корзиной и выходом -->
                <div class="d-flex align-items-center">
                    <!-- Корзина -->
                    <a href="{{ route('cart') }}" class="btn btn-outline-primary position-relative me-3">
                        <i class="bi bi-cart3 cart-icon"></i>
                        @if(($cartCount ?? 0) > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    <!-- Кнопка выхода -->
                    <a href="{{ route('logout') }}" class="btn btn-outline-primary">Выйти</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<main class="container my-4">
    @yield('content')
</main>

<!-- Футер -->
<footer class="bg-light py-4 mt-5">
    <div class="container text-center">
        <p class="mb-0">© 2024 InternetShop. Все права защищены.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
