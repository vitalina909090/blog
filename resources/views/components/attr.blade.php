@props([
    'type' => 'info'
])

{{--<div {{ $attributes }}>--}}
{{--   {{ $slot }}--}}
{{--</div>--}}

{{--<div {{ $attributes->merge(['class' => 'alert']) }}>--}}
{{--    Content--}}
{{--</div>--}}

{{-----------------------}}

{{--<div>--}}
{{--    {{ $attributes->get('class') }}--}}
{{--    {{ $attributes->get('id', 'default') }}--}}
{{--</div>--}}

{{--<div>--}}
{{--    {{ $attributes->has('class') }}--}}
{{--</div>--}}

{{--<div>--}}
{{--    {{ $attributes->only(['class', 'id']) }}--}}
{{--</div>--}}

{{--<div>--}}
{{--    {{ $attributes->except(['class', 'id']) }}--}}
{{--</div>--}}

{{--<div>--}}
{{--    {{ $attributes->whereStartsWith('data-') }}--}}
{{--</div>--}}

{{--<div>--}}
{{--    {{ $attributes->filter(fn($value, $key) => $key === 'class' ) }}--}}
{{--</div>--}}

{{-------------------------------}}


{{--<div {{ $attributes->class([--}}
{{--    'alert',--}}
{{--    'alert-success' => $type === 'success',--}}
{{--    'alert-danger' => $type === 'danger',--}}
{{--    'mb-4'--}}
{{--]) }}>--}}
{{--    {{ $slot }}--}}
{{--</div>--}}


{{-------------------------------}}

<div {{ $attributes->class(['p-4'])->merge(['type' => 'button']) }}>
    {{ $slot }}
</div>
