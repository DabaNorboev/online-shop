@extends('layouts.base')
@section('title', 'Профиль пользователя')

@section('style')
    <style>
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .form-container {
            display: flex;
            gap: 10px;
        }
        .form-container section {
            flex: 1;
            min-width: 0;
        }
        h1, h2 {
            color: #2c3e50;
        }
        .profile-section {
            margin-bottom: 40px;
        }
        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }
        .user-info {
            flex: 1;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background: #4a90e2;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
        }
        .btn:hover {
            background: #3a7bc8;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            max-width: 400px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .alert {
            color: red;
        }
        /* Общие стили секции */
        .profile-section {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .profile-section h2 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 0.5rem;
        }

        /* Стили списка заказов */
        .orders-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        /* Стили карточки заказа */
        .order-item {
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e0e0e0;
        }

        .order-item:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        /* Стили заголовка заказа */
        .order-item summary {
            padding: 1.5rem;
            cursor: pointer;
            list-style: none;
            position: relative;
        }

        .order-item summary::-webkit-details-marker {
            display: none;
        }

        .order-item summary:focus {
            outline: none;
        }

        .order-item summary h3 {
            font-size: 1.3rem;
            margin: 0;
            color: #3498db;
            display: inline;
        }

        /* Индикатор открытия/закрытия */
        .order-item summary::after {
            content: '+';
            position: absolute;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
            color: #3498db;
            transition: all 0.3s ease;
        }

        .order-item[open] summary::after {
            content: '-';
        }

        /* Краткая информация о заказе */
        .order-summary {
            display: flex;
            gap: 2rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .order-summary p {
            margin: 0.5rem 0;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
        }

        /* Стили статуса заказа */
        .order-status {
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            margin-left: 0.5rem;
        }

        .status-new { background: #f39c12; color: white; }
        .status-processing { background: #3498db; color: white; }
        .status-completed { background: #2ecc71; color: white; }
        .status-cancelled { background: #e74c3c; color: white; }

        /* Детали заказа */
        .order-details {
            padding: 0 1.5rem 1.5rem;
            background: #f9f9f9;
            border-top: 1px solid #eee;
            animation: fadeIn 0.3s ease;
        }

        .order-details h4 {
            margin: 1rem 0 0.5rem;
            color: #2c3e50;
            font-size: 1.1rem;
        }

        /* Список товаров */
        .order-details ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .order-details li {
            padding: 0.8rem;
            background: white;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            transition: all 0.2s ease;
        }

        .order-details li:hover {
            background: #f0f7ff;
            transform: translateX(5px);
        }

        /* Анимации */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
@endsection

@section('content')
<div class="container">
    <section class="profile-section">
        <div class="profile-header">
            <div class="user-info">
                <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                <p>Пользователь с {{ $user->created_at->format('d.m.Y') }}</p>
            </div>
        </div>
    </section>

    <div class="form-container">
        <section class="profile-section">
            <h2>Личные данные</h2>
            <form action="{{ route('profile.update') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="last_name">Фамилия</label>
                    <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}">
                    @error('last_name')
                    <span class="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="first_name">Имя</label>
                    <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}">
                    @error('first_name')
                    <span class="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}">
                    @error('email')
                    <span class="alert">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn">Сохранить изменения</button>
            </form>
        </section>
        <section class="profile-section">
            <h2>Безопасность</h2>
            <form action="{{ route('profile.update.password') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="old_password">Текущий пароль</label>
                    <input type="password" id="old_password" name="old_password" required>
                    @error('old_password')
                    <span class="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Новый пароль</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                    <span class="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Подтверждение пароля</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                    @error('password_confirmation')
                    <span class="alert">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn">Изменить пароль</button>
            </form>
        </section>
    </div>

    <section class="profile-section">
        <h2>Мои заказы</h2>
        <div class="orders-list">
            @foreach($orders as $order)
                <details class="order-item">
                    <summary>
                        <h3>Заказ #{{ $order->id }} от {{ $order->created_at->format('d.m.Y H:i') }}</h3>
                        <div class="order-summary">
                            <p>Количество товаров: {{ $order->orderItems->sum('quantity') }}</p>
                            <p>Сумма: {{ number_format($order->total_price, 0, '', ' ') }}₽</p>
                            <p>Статус:
                                <span class="order-status status-{{ $order->status->name }}">{{ $order->status->ru_name }}</span>
                            </p>
                        </div>
                    </summary>

                    <div class="order-details">
                        <h4>Состав заказа:</h4>
                        <ul>
                            @foreach($order->orderItems as $item)
                                <li>
                                    {{ $item->product->name }} ×
                                    {{ $item->quantity }}
                                    =
                                    {{ number_format($item->total_price, 0, '', ' ') }}₽
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </details>
            @endforeach
        </div>
    </section>
</div>
@endsection
