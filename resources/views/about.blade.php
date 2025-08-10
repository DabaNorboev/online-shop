@extends('layouts.base')

@section('title', 'О нас')

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
        .about-section {
            margin-bottom: 40px;
        }
        .team {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .team-member {
            width: calc(50% - 10px);
            margin-bottom: 20px;
        }
        @media (max-width: 600px) {
            .team-member {
                width: 100%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <section class="about-section">
            <h2>О нас</h2>
            <p>Мы предлагаем широкий ассортимент товаров по доступным ценам с быстрой доставкой по всей стране.</p>
        </section>

        <section class="about-section">
            <h2>Наши принципы</h2>
            <ul>
                <li>Качество товаров - наш приоритет</li>
                <li>Честные цены без скрытых платежей</li>
                <li>Быстрая и надежная доставка</li>
                <li>Профессиональная поддержка клиентов</li>
            </ul>
        </section>

        <section class="about-section">
            <h2>Наша команда</h2>
            <div class="team">
                <div class="team-member">
                    <h3>Иван Иванов</h3>
                    <p>Основатель и директор</p>
                </div>
                <div class="team-member">
                    <h3>Константин Константинов</h3>
                    <p>Менеджер по продажам</p>
                </div>
                <div class="team-member">
                    <h3>Пётр Петров</h3>
                    <p>Технический специалист</p>
                </div>
                <div class="team-member">
                    <h3>Олег Олегов</h3>
                    <p>Служба поддержки</p>
                </div>
            </div>
        </section>
    </div>
@endsection
