@extends('layouts.base')
@section('title', 'Каталог')

@section('style')
    <style>
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        h1, h2, h3 {
            color: #2c3e50;
        }
        .catalog-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .categories {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .category {
            padding: 8px 16px;
            background: #f0f0f0;
            border-radius: 20px;
            text-decoration: none;
            color: #333;
        }
        .category.active {
            background: #4a90e2;
            color: white;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .product-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            transition: box-shadow 0.3s;
        }
        .product-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .product-image {
            height: 180px;
            background: #f5f5f5;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
        }
        .product-price {
            font-weight: bold;
            font-size: 1.2em;
            color: #2c3e50;
            margin: 10px 0;
        }
        .product-actions {
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-primary {
            background: #4a90e2;
            color: white;
            border: none;
            flex: 1;
        }
        .btn-primary:hover {
            background: #3a7bc8;
        }
        .btn-outline {
            background: white;
            border: 1px solid #4a90e2;
            color: #4a90e2;
        }
        .btn-outline:hover {
            background: #f0f7ff;
        }
        .search-sort {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        .search-box {
            flex: 1;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .sort-select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }
        .page-link {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #333;
        }
        .page-link.active {
            background: #4a90e2;
            color: white;
            border-color: #4a90e2;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="catalog-header">
        <h2>Все товары</h2>
        <div>Найдено товаров {{ $counter }}</div>
    </div>

    <div class="search-sort">
        <input type="text" class="search-box" placeholder="Поиск товаров...">
        <select class="sort-select">
            <option>Сортировка: по популярности</option>
            <option>По цене (сначала дешевые)</option>
            <option>По цене (сначала дорогие)</option>
            <option>По новизне</option>
        </select>
    </div>

    <div class="categories">
        <a href="{{ route('catalog') }}" class="category {{ $categoryName === null ? 'active' : ''}}">Все</a>
        @foreach($categories as $category)
        <a href="{{ route('catalog', $category->name) }}" class="category {{$categoryName === $category->name ? 'active' : ''}}">{{ $category->ru_name }}</a>
        @endforeach
    </div>

    <div class="products-grid">
        <!-- Товар 1 -->
        @foreach($products as $product)
        <div class="product-card">
            <div class="product-image">{{ $product->name }}</div>
            <h3>{{ $product->name }}</h3>
            <div class="product-price">{{ $product->price }} ₽</div>
            <div class="product-price">{{ $product->discount }} %</div>
            <div class="product-actions">
                <button class="btn btn-primary">В корзину</button>
                <button class="btn btn-outline">Подробнее</button>
            </div>
        </div>
        @endforeach
    </div>

    <div class="pagination">
        <a href="#" class="page-link">1</a>
        <a href="#" class="page-link active">2</a>
        <a href="#" class="page-link">3</a>
        <a href="#" class="page-link">4</a>
        <a href="#" class="page-link">5</a>
        <a href="#" class="page-link">→</a>
    </div>
</div>
@endsection
