{{--<div class="alert">--}}
{{--    {{ $slot }}--}}
{{--</div>--}}


{{--<div class="card">--}}
{{--    <div class="card-header">--}}
{{--        {{ $header }}--}}
{{--    </div>--}}

{{--    <div class="card-body">--}}
{{--        {{ $slot }}--}}
{{--    </div>--}}

{{--    <div class="card-footer">--}}
{{--        {{ $footer }}--}}
{{--    </div>--}}
{{--</div>--}}



@props([
    'heading',
    'footer'
])

<div {{ $attributes->class('border') }}>
    <h1 {{ $heading->attributes->class(['text-lg']) }}>
        {{ $heading }}
    </h1>

    {{ $slot }}

    <div {{ $footer->attributes->class(['text-gray-700']) }}>
        {{ $footer }}
    </div>


</div>
