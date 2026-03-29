@extends('stack.stack_layout')

@section('title', 'stack')

@section('content')
    <h1>Stack</h1>
@endsection

@push('styles')
    {{--    <link rel="stylesheet" href="/css/stack.css">--}}
    @vite('resources/css/stack.css')

    <style>
        body {
            color: white;
        }
    </style>
@endpush

@push('scripts')
    <script>
        console.log('hello from stack')
    </script>
@endpush
