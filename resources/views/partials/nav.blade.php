<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">My Blog</a>
        <div class="navbar-nav">
            @foreach($navLinks as $link)
                <a class="nav-link {{ request()->routeIs($link['route']) ? 'active' : '' }}" href="{{ route($link['route']) }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</nav>
