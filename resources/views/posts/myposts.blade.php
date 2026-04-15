@extends('layouts.app')

@php
    $pageTitle = 'Ваши посты';
@endphp

@section('title', $pageTitle)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>{{ $pageTitle }}</h1>

                @auth
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">
                        Создать пост
                    </a>
                @endauth
            </div>
        </div>

        @if(session('alert'))
            <x-prod.alert
                type="{{ session('alert.type') }}"
                message="{{ session('alert.message') }}"
                :dismissible="true"
            />
        @endif

        @if($posts->isEmpty())
            <div class="alert alert-info">
                У вас пока нет опубликованных постов.
                <a href="{{ route('posts.create') }}">Создать пост</a>
            </div>
        @else
            @foreach($posts as $post)
                <x-prod.post-card :post="$post" />
            @endforeach
        @endif
    </div>
@endsection