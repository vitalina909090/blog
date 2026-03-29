@props([
//    'size' => 'md',
//    'count' => 0,
//    'tags' => [],
//    'callback' => null,


    'type' => 'info',
    'message',
    'dismissible' => false,
    'qty' => 0,
])

<div {{ $attributes->merge([ 'class' => "alert alert-{$type} d-flex align-items-center alert-dismissible fade show" ]) }} role="alert">

    {{--    @if($type === 'success')--}}
    {{--        <i class="bi bi-check-circle-fill me-2"></i>--}}
    {{--    @elseif($type === 'danger')--}}
    {{--        <i class="bi bi-radioactive"></i>--}}
    {{--    @else--}}
    {{--        <i class="bi bi-airplane-engines-fill"></i>--}}
    {{--    @endif--}}

    {{--    TODO: icon size???--}}
    @if($type === 'success')
        <svg class="bi me-2 shrink-0" role="img">
            <use xlink:href="#check-circle-fill" />
        </svg>
    @elseif($type === 'danger')
        <svg class="bi me-2 shrink-0" role="img">
            <use xlink:href="#radioactive" />
        </svg>
    @else
        <svg class="bi me-2" role="img">
            <use xlink:href="#airplane-engines-fill" />
        </svg>
    @endif


    {{ $message }}


    @if($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @else

    @endif
</div>
