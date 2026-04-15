<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'P32 Blog')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


</head>
<body>
@include('components.icons')

<x-nav />

<main class="container">
    @yield('content')
</main>

<footer class="mt-5 py-3 bg-light">
    <div class="container text-center">
        <p>&copy; {{ date('Y') }} P32 Blog</p>
    </div>
</footer>

</body>
</html>
