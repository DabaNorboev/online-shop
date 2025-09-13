@extends('layouts.app')
@section('title', 'Корзина')
@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Корзина</h1>

        @if($userProducts->isNotEmpty())
            <div class="row">
                <!-- Список товаров -->
                <div class="col-lg-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            @foreach($userProducts as $userProduct)
                                <div class="row align-items-center mb-4 pb-4 border-bottom">
                                    <!-- Изображение товара -->
                                    <div class="col-3 col-md-2">
                                        <a href="{{ route('product', $userProduct->product->id) }}">
                                            <img src="{{ $userProduct->product->name }}"
                                                 alt="{{ $userProduct->product->name }}"
                                                 class="img-fluid rounded">
                                        </a>
                                    </div>

                                    <!-- Информация о товаре -->
                                    <div class="col-5 col-md-4">
                                        <h5 class="card-title">
                                            <a href="{{ route('product', $userProduct->product->id) }}"
                                               class="text-decoration-none text-dark">
                                                {{ $userProduct->product->name }}
                                            </a>
                                        </h5>
                                        <p class="text-primary fw-bold mb-0">
                                            {{ $userProduct->getTotalDiscountedPrice() }} ₽
                                        </p>
                                    </div>

                                    <!-- Управление количеством -->
                                    <div class="col-4 col-md-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <form action="{{ route('cart.items.decrease', $userProduct->id) }}" method="POST" class="me-2">
                                                @csrf @method('PATCH')
                                                <button class="btn btn-outline-secondary btn-sm" type="submit">-</button>
                                            </form>

                                            <!-- Input для прямого ввода количества -->
                                            <form action="{{ route('cart.items.update', $userProduct->id) }}" method="POST" class="mx-2">
                                                @csrf @method('PATCH')
                                                <input type="number" class="form-control form-control-sm"
                                                       value="{{ $userProduct->quantity }}"
                                                       name="quantity" min="1"
                                                       max="{{ $userProduct->product->stock_quantity }}"
                                                       onchange="this.form.submit()"
                                                       style="width: 60px; text-align: center;">
                                            </form>

                                            <form action="{{ route('cart.items.increase', $userProduct->id) }}" method="POST" class="ms-2">
                                                @csrf @method('PATCH')
                                                <button class="btn btn-outline-secondary btn-sm" type="submit">+</button>
                                            </form>
                                        </div>

                                        <!-- Удаление товара -->
                                        <form action="{{ route('cart.items.delete', $userProduct->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                                Удалить
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Итоговая информация -->
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">Ваш заказ</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Товары ({{ $totalQuantity }})</span>
                                <span>{{ $totalPrice }} ₽</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3 text-success">
                                <span>Скидка</span>
                                <span>- {{ $totalDiscount }}₽</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4 fw-bold fs-5">
                                <span>Итого</span>
                                <span>{{ $discountedTotalPrice }} ₽</span>
                            </div>

                            <a href="#" class="btn btn-primary w-100 mb-2">Оформить заказ</a>
                            <a href="{{ route('catalog') }}" class="btn btn-outline-primary w-100 mb-2">
                                Продолжить покупки
                            </a>
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger w-100">
                                    Очистить корзину
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Пустая корзина -->
            <div class="text-center py-5">
                <div class="mb-4">
                    <i class="bi bi-cart-x" style="font-size: 4rem; color: #6c757d;"></i>
                </div>
                <h2 class="mb-3">Ваша корзина пуста</h2>
                <p class="text-muted mb-4">Добавьте товары из каталога, чтобы продолжить</p>
                <a href="{{ route('catalog') }}" class="btn btn-primary btn-lg">
                    Перейти в каталог
                </a>
            </div>
        @endif
    </div>
@endsection
