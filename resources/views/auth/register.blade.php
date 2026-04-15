
@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-6">Регистрация</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Имя</label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Введите Имя"
                                required
                            >
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Введите Email"
                                required
                            >
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                placeholder="Введите пароль"
                                required
                            >
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Минимум 8 символов</div>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Повторите пароль</label>
                            <input
                                type="password"
                                class="form-control"
                                id="password_confirmation"
                                name="password_confirmation"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                    </form>

                    <div class="mt-3">
                        <p class="mb-0">
                            Уже есть аккаунт?
                            <a href="{{ route('login') }}">Войти</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
