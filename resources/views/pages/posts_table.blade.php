@extends('layouts.app')

@section('title', 'Posts Table')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Posts</h1>

        @if($posts->isEmpty())
            <div class="alert alert-info">No posts found.</div>
        @else
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                <tr>
                    <th>№</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Author</th>
                    <th>Published</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->author->name }}</td>
                        <td>
                            @if($post->is_published)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td>{{ $post->created_at?->format('d.m.Y H:i') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
