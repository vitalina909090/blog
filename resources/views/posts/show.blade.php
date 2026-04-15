@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('posts.index')}}">Все посты</a>
                    </li>
                    <li class="breadcrumb-item active">
                        {{Str::limit($post->title, 20)}}
                    </li>
                </ol>
            </nav>

            @if(session('alert'))
                <x-prod.alert>
                    type="{{ session('alert.type') }}"
                    message="{{ session('alert.message') }}"
                    :dismissible="true"
                </x-prod.alert>
            @endif

            <article class="card">
                <div class="card-body">
                    <h1 class="card-title">{{$post->title}}</h1>

                    <div class="mb-3">
                        <span class="badge bg-{{$post->is_published? 'success' : 'secondary'}}">
                            {{$post->is_published? 'Опубликовано' : 'Черновик'}}
                        </span>
                        <span class="text-muted">
                            {{ $post->created_at->format('d.m.Y H:m') }}
                        </span>
                    </div>

                    <div class="card-text">
                        {!! nl2br(e(str_replace('\n', "\n", $post->content))) !!}
                    </div>

{{--                    TODO: доделать комаентарии--}}
                    <hr class="my-4">
                    <div class="text-muted">
                        <p><strong>Автор: {{$post->author->name ?? 'Аноним'}}</strong></p>
                        <p><strong>Комментариев: {{17}}</strong></p>

                    </div>

                </div>
            </article>

            <div class="d-flex gap-2 mt-3">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('posts.index') }}">
                   Назад к списку
                </a>

                <a class="btn btn-sm btn-outline-info" href="{{ route('posts.edit', $post->id) }}">
                    Изменить
                </a>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Вы уверены?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        Удалить
                    </button>
                </form>
            </div>


        </div>
    </div>



@endsection
