@extends('layouts.app')
@section('title', 'Главная')
@section('content')
    <!-- Hero Section -->
    <section class="hero bg-primary text-white py-5">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Добро пожаловать в наш магазин</h1>
                    <p class="lead mb-4">Лучшие товары по доступным ценам с быстрой доставкой по всей стране</p>
                    <a href="{{ route('catalog') }}" class="btn btn-light btn-lg px-4">
                        Перейти в каталог
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Популярные товары</h2>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($products as $product)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-img-top" style="height: 250px; overflow: hidden;">
                                <a href="{{ route('product', $product->id) }}">
                                    <img src="{{ $product->name }}" alt="{{ $product->name }}"
                                         class="img-fluid w-100 h-100" style="object-fit: cover;">
                                </a>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="h5 text-primary mb-0">{{ $product->price }} ₽</span>
                                        @if($product->discount > 0)
                                            <span class="badge bg-danger">-{{ $product->discount }}%</span>
                                        @endif
                                    </div>
                                    <form action="{{ route('cart.items.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-primary w-100" type="submit">
                                            В корзину
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
