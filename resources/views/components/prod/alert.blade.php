
@props([
    'type' => 'info',
    'message',
    'dismissible' => false,
])

<div {{ $attributes->merge([ 'class' => "alert alert-{$type} alert-dismissible fade show" ]) }}
     role="alert"
>
    @if($type === 'success')
        <i class="bi bi-check-circle-fill me-2"></i>
    @elseif($type === 'danger' || $type === 'error')
        <i class="bi bi-radioactive"></i>
    @elseif($type === 'warning')
        <i class="bi bi-exclamation-diamond-fill"></i>
    @else
        <i class="bi bi-info-circle-fill"></i>
    @endif

    {{ $message }}

    @if($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @else

    @endif
</div>
