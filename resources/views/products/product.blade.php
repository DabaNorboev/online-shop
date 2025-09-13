@extends('layouts.app')
@section('title', $product->name)
@section('content')
    <div class="container py-4">
        <!-- Хлебные крошки -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('catalog') }}">Каталог</a></li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Галерея товара -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="mb-3" style="height: 400px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                            [Основное фото товара]
                        </div>
                        <div class="d-flex gap-2 justify-content-center">
                            <div style="width: 70px; height: 70px; background: #f8f9fa; border: 1px solid #dee2e6;"></div>
                            <div style="width: 70px; height: 70px; background: #f8f9fa; border: 1px solid #dee2e6;"></div>
                            <div style="width: 70px; height: 70px; background: #f8f9fa; border: 1px solid #dee2e6;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Информация о товаре -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="h2 mb-3">{{ $product->name }}</h1>

                        <!-- Рейтинг -->
                        <div class="d-flex align-items-center mb-3">
                            <div class="text-warning me-2">
                                ★★★★☆
                            </div>
                            <a href="#reviews" class="text-decoration-none small">42 отзыва</a>
                        </div>

                        <!-- Цена и наличие -->
                        <div class="bg-light p-3 rounded mb-4">
                            @if($product->discount > 0)
                                <div class="d-flex align-items-center mb-2">
                                    <span class="h3 text-danger me-3">
                                        {{ number_format($product->calculateDiscountedPrice(), 0, '', ' ') }}₽
                                    </span>
                                    <span class="text-muted text-decoration-line-through">
                                        {{ number_format($product->price, 0, '', ' ') }}₽
                                    </span>
                                </div>
                            @else
                                <div class="h3 text-primary mb-2">
                                    {{ number_format($product->calculateDiscountedPrice(), 0, '', ' ') }}₽
                                </div>
                            @endif

                            @if($product->stock_quantity > 0)
                                <span class="badge bg-success">В наличии</span>
                            @else
                                <span class="badge bg-danger">Нет в наличии</span>
                            @endif
                        </div>

                        <!-- Форма добавления в корзину -->
                        <form action="{{ route('cart.items.add', $product->id) }}" method="POST">
                            @csrf
                            <div class="row g-3 align-items-end mb-4">
                                <div class="col-auto">
                                    <label for="quantity" class="form-label">Количество:</label>
                                    <input type="number" value="1" min="1" max="{{ $product->stock_quantity }}"
                                           required id="quantity" name="quantity"
                                           class="form-control" style="width: 100px;">
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary w-100" type="submit"
                                        {{ $product->stock_quantity == 0 ? 'disabled' : '' }}>
                                        {{ $product->stock_quantity > 0 ? 'Добавить в корзину' : 'Нет в наличии' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Табы с дополнительной информацией -->
        <div class="mt-5">
            <ul class="nav nav-tabs" id="productTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                            data-bs-target="#description" type="button" role="tab">
                        Описание
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                            data-bs-target="#reviews" type="button" role="tab">
                        Отзывы
                    </button>
                </li>
            </ul>

            <div class="tab-content p-4 border border-top-0 rounded-bottom">
                <div class="tab-pane fade show active" id="description" role="tabpanel">
                    <h3>Описание товара</h3>
                    <p>XYZ 10 Pro - это флагманский смартфон с самым современным набором функций. Мощный процессор
                        Snapdragon 888 обеспечивает молниеносную работу любых приложений, а AMOLED-экран с частотой
                        обновления 120 Гц дарит невероятно плавную картинку.</p>
                    <p>Тройная камера с основным сенсором на 108 Мп позволяет делать профессиональные фотографии в любых
                        условиях. Большой аккумулятор на 5000 мАч обеспечивает до 2 дней работы без подзарядки.</p>
                </div>

                <div class="tab-pane fade" id="reviews" role="tabpanel">
                    <h3>Отзывы о товаре</h3>
                    <p>Здесь будут отображаться отзывы покупателей</p>
                </div>
            </div>
        </div>
    </div>
@endsection
