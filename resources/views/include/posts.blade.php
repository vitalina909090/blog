@extends('layouts.app')

@section('title', 'Posts cards')

@section('content')

    <h1>ALl posts</h1>

    @each('partials.post-card', $posts, 'post')

    {{--    @foreach($posts as $post)--}}
    {{--        @include('partials.post-card', ['post' => $post])--}}
    {{--    @endforeach--}}

@endsection
