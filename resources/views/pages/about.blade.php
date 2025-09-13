@extends('layouts.app')
@section('title', 'О нас')
@section('content')
    <div class="container py-5">
        <!-- About Section -->
        <section class="mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mb-4">О нас</h2>
                    <p class="lead">Мы предлагаем широкий ассортимент товаров по доступным ценам с быстрой доставкой по всей стране.</p>
                </div>
            </div>
        </section>

        <!-- Principles Section -->
        <section class="mb-5">
            <h2 class="text-center mb-4">Наши принципы</h2>
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Качество товаров</h5>
                            <p class="card-text">Качество товаров - наш приоритет</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Честные цены</h5>
                            <p class="card-text">Честные цены без скрытых платежей</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Быстрая доставка</h5>
                            <p class="card-text">Быстрая и надежная доставка</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Поддержка</h5>
                            <p class="card-text">Профессиональная поддержка клиентов</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section>
            <h2 class="text-center mb-4">Наша команда</h2>
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card text-center border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Иван Иванов</h5>
                            <p class="card-text text-muted">Основатель и директор</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card text-center border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Константин Константинов</h5>
                            <p class="card-text text-muted">Менеджер по продажам</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card text-center border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Пётр Петров</h5>
                            <p class="card-text text-muted">Технический специалист</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card text-center border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Олег Олегов</h5>
                            <p class="card-text text-muted">Служба поддержки</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
