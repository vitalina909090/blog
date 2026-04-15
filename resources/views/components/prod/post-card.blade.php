@props([
    'post'
])

<div class="card mb-3 shadow-sm">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none">
                {{ $post->title }}
            </a>
        </h5>

        <p class="card-text">{{ Str::limit($post->content, 150) }}</p>

        <div class="card-text">
            <small class="text-muted">
                {{--                TODO: add author name--}}
                Автор: {{ 'Аноним' }}
                {{ $post->created_at->format('d.m.Y H:m') }}

                @if($post->is_published)
                    <span class="badge bg-success">Опубликовано</span>
                @else
                    <span class="badge bg-secondary">Черновик</span>
                @endif

            </small>
        </div>

        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-outline-primary">
                Просмотр
            </a>

            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-info">
                Редактировать
            </a>
        </div>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Вы уверены?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">
                Удалить
            </button>
        </form>
    </div>
</div>
