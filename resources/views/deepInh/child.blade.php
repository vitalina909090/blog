@extends('deepInh.parent_layout')

@section('title', 'child')

@section('meta')
    @parent

    <meta name="keywords" content="seo, optimization">
    <meta name="description" content="This is test page">
@endsection
