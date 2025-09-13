@extends('layouts.app')
@section('title', 'Профиль пользователя')
@section('content')
    <div class="container py-4">
        <!-- Profile Header -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h1 class="h2">{{ $user->first_name }} {{ $user->last_name }}</h1>
                        <p class="text-muted">Пользователь с {{ $user->created_at->format('d.m.Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Forms -->
        <div class="row g-4">
            <!-- Personal Data Form -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0">Личные данные</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Фамилия</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                       id="last_name" name="last_name" value="{{ $user->last_name }}">
                                @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="first_name" class="form-label">Имя</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                       id="first_name" name="first_name" value="{{ $user->first_name }}">
                                @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ $user->email }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Security Form -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0">Безопасность</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.password.update') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="old_password" class="form-label">Текущий пароль</label>
                                <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                                       id="old_password" name="old_password" required>
                                @error('old_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Новый пароль</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       id="password" name="password" required>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                       id="password_confirmation" name="password_confirmation" required>
                                @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Изменить пароль</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0">Мои заказы</h5>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="ordersAccordion">
                            @foreach($orders as $order)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $order->id }}">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $order->id }}"
                                                aria-expanded="false" aria-controls="collapse{{ $order->id }}">
                                            <div class="d-flex justify-content-between w-100 me-3">
                                                <span>Заказ #{{ $order->id }} от {{ $order->created_at->format('d.m.Y H:i') }}</span>
                                                <span class="badge bg-{{ $order->status->name === 'completed' ? 'success' : ($order->status->name === 'cancelled' ? 'danger' : 'warning') }}">
                                                    {{ $order->status->ru_name }}
                                                </span>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $order->id }}" class="accordion-collapse collapse"
                                         aria-labelledby="heading{{ $order->id }}" data-bs-parent="#ordersAccordion">
                                        <div class="accordion-body">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <strong>Количество товаров:</strong> {{ $order->orderItems->sum('quantity') }}
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Сумма:</strong> {{ number_format($order->total_price, 0, '', ' ') }}₽
                                                </div>
                                            </div>
                                            <h6>Состав заказа:</h6>
                                            <div class="list-group">
                                                @foreach($order->orderItems as $item)
                                                    <div class="list-group-item">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <a href="{{ route('product', $item->product->id) }}" class="text-decoration-none">
                                                                {{ $item->product->name }}
                                                            </a>
                                                            <span>
                                                                × {{ $item->quantity }} = {{ number_format($item->total_price, 0, '', ' ') }}₽
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
