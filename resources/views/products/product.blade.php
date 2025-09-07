@extends('layouts.app')

@section('title', 'sdff')

@section('style')
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .breadcrumbs a {
            color: #4a90e2;
            text-decoration: none;
        }

        .product-container {
            display: flex;
            margin: 20px 0 40px;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .product-gallery {
            width: 50%;
            padding-right: 20px;
        }

        .main-image {
            width: 100%;
            height: 400px;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            border: 1px solid #eee;
        }

        .thumbnails {
            display: flex;
            gap: 10px;
        }

        .thumbnail {
            width: 70px;
            height: 70px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            cursor: pointer;
        }

        .product-info {
            width: 50%;
            padding-left: 20px;
        }

        .product-title {
            font-size: 24px;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .rating {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .stars {
            color: #ffc107;
            margin-right: 10px;
        }

        .reviews-link {
            color: #4a90e2;
            text-decoration: none;
            font-size: 14px;
        }

        .price-container {
            margin: 20px 0;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
        }

        .current-price {
            font-size: 28px;
            font-weight: bold;
            color: #d32f2f;
        }

        .price {
            font-size: 28px;
            font-weight: bold;
        }


        .old-price {
            text-decoration: line-through;
            color: #777;
            margin-left: 10px;
        }

        .availability {
            color: #388e3c;
            font-weight: bold;
            margin: 10px 0;
        }

        .not-availability {
            color: #b80707;
            font-weight: bold;
            margin: 10px 0;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin: 20px 0;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            font-size: 16px;
        }

        .btn-primary {
            background: #4a90e2;
            color: white;
            flex: 2;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            margin: 15px 0;
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            background: #f0f0f0;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        .quantity-input {
            width: 50px;
            height: 30px;
            text-align: center;
            margin: 0 5px;
            border: 1px solid #ddd;
        }

        .tabs {
            margin: 30px 0;
        }

        .tab-header {
            display: flex;
            border-bottom: 1px solid #ddd;
        }

        .tab-btn {
            padding: 10px 20px;
            cursor: pointer;
            background: none;
            border: none;
            border-bottom: 3px solid transparent;
        }

        .tab-btn.active {
            border-bottom-color: #4a90e2;
            font-weight: bold;
        }

        .tab-content {
            padding: 20px 0;
            display: none;
        }

        .tab-content.active {
            display: block;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="product-container">
            <div class="product-gallery">
                <div class="main-image">
                    [Основное фото товара]
                </div>
                <div class="thumbnails">
                    <div class="thumbnail"></div>
                    <div class="thumbnail"></div>
                    <div class="thumbnail"></div>
                    <div class="thumbnail"></div>
                </div>
            </div>

            <div class="product-info">
                <h1 class="product-title">{{ $product->name }}</h1>

                <div class="rating">
                    <div class="stars">★★★★☆</div>
                    <a href="#reviews" class="reviews-link">42 отзыва</a>
                </div>

                <div class="price-container">
                    @if($product->discount > 0)
                        <div class="current-price">{{number_format($product->calculateDiscountedPrice(), 0, '', ' ')}}
                            ₽
                        </div>
                        <span class="old-price">{{ number_format($product->price, 0, '', ' ') }} ₽</span>
                    @else
                        <div class="price">{{number_format($product->calculateDiscountedPrice(), 0, '', ' ')}} ₽</div>
                    @endif
                    @if($product->stock_quantity > 0)
                        <div class="availability">В наличии</div>
                    @else
                        <div class="not-availability">Нет в наличии</div>
                    @endif

                </div>

                <div class="item-actions">
                    <div class="quantity-control">
                        <form action="{{ route('cart.items.add', $product->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Количество:</label>
                                <input type="number" value="1" min="1" max="{{ $product->stock_quantity }}" required
                                       id="quantity" name="quantity" class="quantity-input"
                                       style="width: 100px; margin-bottom: 20px;">
                            </div>
                            <button class="btn btn-primary" type="submit">Добавить в корзину</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="tabs">
            <div class="tab-header">
                <button class="tab-btn active">Описание</button>
                <button class="tab-btn">Отзывы</button>
            </div>

            <div class="tab-content active">
                <h3>Описание товара</h3>
                <p>XYZ 10 Pro - это флагманский смартфон с самым современным набором функций. Мощный процессор
                    Snapdragon 888 обеспечивает молниеносную работу любых приложений, а AMOLED-экран с частотой
                    обновления 120 Гц дарит невероятно плавную картинку.</p>
                <p>Тройная камера с основным сенсором на 108 Мп позволяет делать профессиональные фотографии в любых
                    условиях. Большой аккумулятор на 5000 мАч обеспечивает до 2 дней работы без подзарядки.</p>
            </div>

            <div class="tab-content" id="reviews">
                <h3>Отзывы о товаре</h3>
                <p>Здесь будут отображаться отзывы покупателей</p>
            </div>

            <div class="tab-content">
                <h3>Доставка и оплата</h3>
                <p>Информация о способах доставки и оплаты</p>
            </div>
        </div>
    </div>
@endsection
