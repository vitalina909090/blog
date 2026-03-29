@props([
    'title',
    'count' => 0
])

<h1>{{ $title }}</h1>
<p>Count: {{ $count }}</p>

@if($count > 0)
    <span class="badge bg-secondary">{{ $count }}</span>
@endif

@for($i = 0; $i < $count; ++$i)
    <div>Item_{{ $i }}</div>
@endfor

<x-alert message="Hello from props" :qty="$count"/>
