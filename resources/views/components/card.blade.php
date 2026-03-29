@props([
    'title',
    'subtitle' => null,
    'image' => null,
    'footer' => null,
])

<article {{ $attributes->class(['card', 'shadow-sm', 'mb-4']) }}>
    <div class="card-body">

        @if($image)
            <img style="max-width: 400px;" src="{{ $image }}" class="card-img-top" alt="{{ $title }}">
        @endif

        @if($title)
            <h2 class="card-title">{{ $title }}</h2>
        @endif

        @if($subtitle)
            <p class="text-muted">{{ $subtitle }}</p>
        @endif

        {{ $slot }}
    </div>
    @if($footer)
        <div class="card-footer bg-dark">
            {{ $footer }}
        </div>
    @endif
</article>
