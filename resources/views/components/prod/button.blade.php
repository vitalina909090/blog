
@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'disabled' => false,
])

<button
    {{ $attributes->merge([
        'type' => $type,
        'class' => "btn btn-{$variant} btn-{$size}",
        'disabled' => $disabled
    ]) }}
>
    {{ $slot }}
</button>
