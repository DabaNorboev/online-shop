@extends('layouts.app')
@section('title', 'Каталог')
@section('content')
    <div class="container py-4">
        <!-- Заголовок -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Все товары</h2>
            <span class="text-muted">Найдено товаров {{ $counter }}</span>
        </div>

        <!-- Поиск и фильтрация (заглушки для будущей реализации) -->
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Поиск товаров...">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <select class="form-select">
                    <option>Сортировка: по популярности</option>
                    <option>По цене (сначала дешевые)</option>
                    <option>По цене (сначала дорогие)</option>
                    <option>По новизне</option>
                </select>
            </div>
        </div>

        <!-- Категории -->
        <div class="d-flex flex-wrap gap-2 mb-4">
            <a href="{{ route('catalog') }}"
               class="btn {{ $categoryName === null ? 'btn-primary' : 'btn-outline-primary' }}">
                Все
            </a>
            @foreach($categories as $category)
                <a href="{{ route('catalog', $category->name ) }}"
                   class="btn {{ $categoryName === $category->name ? 'btn-primary' : 'btn-outline-primary' }}">
                    {{ $category->ru_name }}
                </a>
            @endforeach
        </div>

        <!-- Сетка товаров -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
            @foreach($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <!-- Изображение товара -->
                        <div style="height: 200px; overflow: hidden;">
                            <a href="{{ route('product', $product->id) }}">
                                <img src="{{ $product->name }}" alt="{{ $product->name }}"
                                     class="card-img-top h-100" style="object-fit: cover;">
                            </a>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <!-- Название товара -->
                            <h5 class="card-title">
                                <a href="{{ route('product', $product->id) }}"
                                   class="text-decoration-none text-dark">
                                    {{ $product->name }}
                                </a>
                            </h5>

                            <!-- Цена и скидка -->
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="h5 text-primary mb-0">
                                        {{ number_format($product->calculateDiscountedPrice(), 0, '', ' ') }}₽
                                    </span>
                                    @if($product->discount > 0)
                                        <span class="badge bg-danger">-{{ $product->discount }}%</span>
                                    @endif
                                </div>

                                <!-- Кнопки действий -->
                                <div class="d-flex gap-2">
                                    <form action="{{ route('cart.items.add', $product->id) }}" method="POST" class="flex-grow-1">
                                        @csrf
                                        <button class="btn btn-primary w-100">В корзину</button>
                                    </form>
                                    <a href="{{ route('product', $product->id) }}"
                                       class="btn btn-outline-primary">→</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Пагинация (заглушка для будущей реализации) -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Предыдущая</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Следующая</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
