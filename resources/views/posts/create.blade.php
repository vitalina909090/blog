@extends('layouts.app')

@section('title', 'Создать пост')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Создать пост</h1>
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Назад</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Введите заголовок"
                    >
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Контент</label>
                    <textarea
                        class="form-control @error('content') is-invalid @enderror"
                        id="content"
                        name="content"
                        rows="10"
                        placeholder="Введите содержимое"
                    >{{ old('content') }}</textarea>
                    @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <d-flex class="gap-2">
                    <x-prod.button type="submit">
                        Создать пост
                    </x-prod.button>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Отмена</a>
                </d-flex>

            </form>
        </div>
    </div>


@endsection
