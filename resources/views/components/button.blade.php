@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'disabled' => false,
    'loading' => false,
])

<button
    {{ $attributes->merge([
        'type' => $type,
        'disabled' => $disabled || $loading
    ])->class([
        'btn' => true,
        "btn-{$variant}" => true,
        "btn-{$size}" => true,
        'disabled' => $disabled,
        'opacity-50' => $loading
    ]) }}
>
    @if($loading)
        <span class="spinner-border spinner-border-sm me-2" aria-hidden="true"></span>
    @endif

    {{ $slot }}

</button>
