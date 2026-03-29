<div
    {{ $attributes->merge(['class' => "alert {$getColorClass()} alert-dismissible fade show" ]) }}
    role="alert"
>
    <i class="bi {{ $getIconClass() }} me-2"></i>

    {{ $message }}

    @if ($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif

</div>
