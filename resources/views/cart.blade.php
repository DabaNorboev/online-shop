@extends('layouts.base')

@section('title', 'Корзина')

@section('style')
    <style>
        a {
            text-decoration: none;
            color: black;
            font-size: large;
            font-weight: bold;
            text-align: center;
        }
        .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 0 20px;
        }
        h1, h2, h3 {
        color: #2c3e50;
        }
        .cart-container {
        display: flex;
        gap: 30px;
        margin-top: 20px;
        }
        .cart-items {
        flex: 2;
        }
        .cart-summary {
        flex: 1;
        background: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
        height: fit-content;
        }
        .cart-item {
        display: flex;
        gap: 20px;
        padding: 15px 0;
        border-bottom: 1px solid #eee;
        }
        .item-image {
        width: 100px;
        height: 100px;
        background: #f5f5f5;
        display: flex;
        align-items: center;
        justify-content: center;
        }
        .item-details {
        flex: 1;
        }
        .item-price {
        font-weight: bold;
        margin: 5px 0;
        }
        .item-actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
        }
        .quantity-control {
        display: flex;
        align-items: center;
        gap: 5px;
        }
        .quantity-btn {
        width: 25px;
        height: 25px;
        background: #ddd;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        }
        .quantity-input {
        width: 40px;
        text-align: center;
        padding: 3px;
        }
        .remove-btn {
        color: #d32f2f;
        background: none;
        border: none;
        cursor: pointer;
        font-weight: normal;
        font-size: medium;
        }
        .summary-row {
        display: flex;
        justify-content: space-between;
        margin: 10px 0;
        }
        .total-row {
        font-weight: bold;
        font-size: 1.2em;
        border-top: 1px solid #ddd;
        padding-top: 10px;
        margin-top: 15px;
        }
        .btn {
        padding: 12px 24px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        cursor: pointer;
        display: inline-block;
        text-align: center;
        width: 100%;
        box-sizing: border-box;
        }
        .btn-primary {
        background: #4a90e2;
        color: white;
        border: none;
        margin-top: 15px;
        }
        .btn-primary:hover {
        background: #3a7bc8;
        }
        .btn-outline {
        background: white;
        border: 1px solid #4a90e2;
        color: #4a90e2;
        margin-top: 10px;
        }
        .btn-outline:hover {
        background: #f0f7ff;
        }
        .empty-cart {
        text-align: center;
        padding: 50px 0;
        }
        .continue-shopping {
        margin-top: 20px;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <h1>Корзина</h1>
    @if($userProducts->isNotEmpty())
        <div class="cart-container">
            @foreach($userProducts as $userProduct)
                <div class="cart-items">
                    <div class="cart-item">
                        <div class="item-image">
                            <div>{{ $userProduct->product->name }}</div>
                        </div>
                        <div class="item-details">
                            <h3>{{ $userProduct->product->name }}</h3>
                            <div class="item-price">{{ $userProduct->getTotalDiscountedPrice() }} ₽</div>
                            <div class="item-actions">
                                <div class="quantity-control">
                                    <form action="{{ route('cart.decrease', $userProduct) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button class="quantity-btn" type="submit">-</button>
                                    </form>
                                    <input type="text" class="quantity-input" value="{{ $userProduct->quantity }}">
                                    <form action="{{ route('cart.increase', $userProduct) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button class="quantity-btn" type="submit">+</button>
                                    </form>
                                </div>
                                <form action="{{ route('cart.delete', $userProduct->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="remove-btn">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="cart-summary">
                <h3>Ваш заказ</h3>

                <div class="summary-row">
                    <span>Товары ({{ $totalQuantity }})</span>
                    <span>{{ $totalPrice }} ₽</span>
                </div>
                <div class="summary-row">
                    <span>Скидка</span>
                    <span style="color: #388e3c;">- {{ $totalDiscount }}₽</span>
                </div>

                <div class="summary-row total-row">
                    <span>Итого</span>
                    <span>{{ $discountedTotalPrice }} ₽</span>
                </div>

                <a href="#" class="btn btn-primary">Оформить заказ</a>
                <a href="{{ route('catalog') }}" class="btn btn-outline">Продолжить покупки</a>
            </div>
        </div>

    @else
        <div class="empty-cart">
            <h2>Ваша корзина пуста</h2>
            <p>Добавьте товары из каталога, чтобы продолжить</p>
            <a href="{{ route('catalog') }}" class="btn btn-primary continue-shopping">Перейти в каталог</a>
        </div>
    @endif
</div>
@endsection
