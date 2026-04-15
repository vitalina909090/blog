@props([
    'logo' => 'My Blog',
    'links' => [
        ['route' => 'posts.index', 'label' => 'Posts'],
//        ['route' => 'posts.posts_table', 'label' => 'Table'],
        ['route' => 'about', 'label' => 'About'],
        ['route' => 'contact', 'label' => 'Contact'],
    ],
])

<nav {{ $attributes->class(['navbar', 'navbar-expand-lg', 'navbar-dark', 'bg-dark', 'mb-4']) }}>
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ $logo }}</a>

        <div class="navbar-nav">
            @foreach($links as $link)
                <a class="nav-link {{ request()->routeIs($link['route']) ? 'active' : '' }}" href="{{ route($link['route']) }}">
                {{ $link['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</nav>
