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
            flex: 1;               /* Равномерное распределение ширины */
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
        .orders-list {
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }
        .order-item {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .order-item:last-child {
            border-bottom: none;
        }
        .order-status {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 14px;
        }
        .status-completed {
            background: #d4edda;
            color: #155724;
        }
        .status-processing {
            background: #fff3cd;
            color: #856404;
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
    </style>
@endsection

@section('content')
<div class="container">
    <section class="profile-section">
        <div class="profile-header">
            <div class="user-info">
                <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                <p>Пользователь с {{ $user->created_at }}</p>
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
            <div class="order-item">
                <h3>Заказ #{{ $order->id }} от {{ $order->created_at }}</h3>
                    <p>__ товара на сумму __₽</p>
                    <p>Статус: <span class="order-status status-completed">__</span></p>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
