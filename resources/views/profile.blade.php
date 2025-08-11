@extends('layouts.base')
@section('title', 'Профиль пользователя')

@section('style')
    <style>
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 0 20px;
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
        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #555;
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
    </style>
@endsection

@section('content')
<div class="container">
    <section class="profile-section">
        <div class="profile-header">
            <div class="avatar">ИИ</div>
            <div class="user-info">
                <h2>Иван Иванов</h2>
                <p>Пользователь с 15.03.2023</p>
            </div>
        </div>
    </section>

    <section class="profile-section">
        <h2>Личные данные</h2>
        <form>
            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" id="last_name" value="last_name">
            </div>
            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="text" id="first_name" value="first_name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" value="email@email.com">
            </div>
            <button type="submit" class="btn">Сохранить изменения</button>
        </form>
    </section>

    <section class="profile-section">
        <h2>Мои заказы</h2>
        <div class="orders-list">
            <div class="order-item">
                <h3>Заказ #12345 от 12.04.2023</h3>
                <p>3 товара на сумму 12 450 ₽</p>
                <p>Статус: <span class="order-status status-completed">Выполнен</span></p>
            </div>
            <div class="order-item">
                <h3>Заказ #12340 от 28.03.2023</h3>
                <p>1 товар на сумму 5 990 ₽</p>
                <p>Статус: <span class="order-status status-processing">В обработке</span></p>
            </div>
        </div>
    </section>

    <section class="profile-section">
        <h2>Безопасность</h2>
        <a href="change-password.html" class="btn">Изменить пароль</a>
    </section>
</div>
@endsection
