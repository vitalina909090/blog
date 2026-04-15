@props([
    'logo' => 'My Blog',
])

<nav {{ $attributes->class(['navbar', 'navbar-expand-lg', 'navbar-dark', 'bg-dark', 'mb-4']) }}>
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ $logo }}</a>

        <div class="navbar-nav me-auto">
            <a class="nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}"
               href="{{ route('posts.index') }}">Posts</a>

            @auth
                <a class="nav-link {{ request()->routeIs('posts.myposts') ? 'active' : '' }}"
                   href="{{ route('posts.myposts') }}">My Posts</a>

                <a class="nav-link {{ request()->routeIs('posts.drafts') ? 'active' : '' }}"
                   href="{{ route('posts.drafts') }}">Drafts</a>
            @endauth

            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
               href="{{ route('about') }}">About</a>

            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
               href="{{ route('contact') }}">Contact</a>
        </div>

        <div class="navbar-nav ms-auto align-items-center gap-2">
            @auth
                <span class="navbar-text text-white">
                    Здравствуйте, {{ Auth::user()->name }}!
                </span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Выйти</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
                    Войти в аккаунт
                </a>
            @endauth
        </div>
    </div>
</nav>