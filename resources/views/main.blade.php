@extends('layouts.base')
@section('title', 'Главная')
@section('style')
    <style>
        .hero {
            background: linear-gradient(135deg, #4a90e2, #6a5acd);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Популярные товары */
        .featured-products {
            padding: 3rem 2rem;
            background-color: #f1f5f9;
        }

        .products-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .product-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .product-img {
            height: 200px;
            background-color: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-info h3 {
            margin-bottom: 0.5rem;
        }

        .product-price {
            font-weight: bold;
            color: #4a90e2;
            font-size: 1.2rem;
            margin: 0.5rem 0;
        }

        .product-rating {
            color: #ffc107;
            margin-bottom: 1rem;
        }

        .add-to-cart {
            width: 100%;
            padding: 0.5rem;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-to-cart:hover {
            background-color: #3a7bc8;
        }
    </style>
@endsection
@section('content')
    <!-- Герой-секция -->
    <section class="hero">
        <div class="hero-content">
            <h1>Добро пожаловать в наш магазин</h1>
            <p>Лучшие товары по доступным ценам с быстрой доставкой по всей стране</p>
            <a href="#" class="btn btn-primary" style="background-color: white; color: #4a90e2;">Перейти в каталог</a>
        </div>
    </section>

    <!-- Популярные товары -->
    <section class="featured-products">
        <div class="products-container">
            <h2 class="section-title">Популярные товары</h2>

            <div class="product-grid">
                <!-- Пример товара 1 -->
                <div class="product-card">
                    <div class="product-img">
                        <img src="images/product1.jpg" alt="Смартфон" style="max-width: 100%; max-height: 100%; object-fit: cover;">
                    </div>
                    <div class="product-info">
                        <h3>Смартфон XYZ 10 Pro</h3>
                        <div class="product-price">34 990 ₽</div>
                        <div class="product-rating">★★★★☆</div>
                        <button class="add-to-cart">В корзину</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
