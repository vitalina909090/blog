<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('posts.show', $post->id) }}">
                {{ $post->title }}
            </a>
        </h5>
        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
        <p class="card-text">
            <small>
                {{ $post->created_at->format('d.m.Y') }}
            </small>
        </p>
    </div>
</div>
