@props([
    'type' => 'text',
    'label' => null,
    'id' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'size' => null,
    'state' => null,
    'feedback' => null,
    'helperText' => null,
    'prepend' => null,
    'append' => null,
    'disabled' => false,
    'readonly' => false,
    'required' => false,
    'autofocus' => false,
    'autocomplete' => null,
    'min' => null,
    'max' => null,
    'minlength' => null,
    'maxlength' => null,
    'step' => null,
    'pattern' => null,
    'multiple' => false,
    'floatingLabel' => false,
])

@php
    $inputClass = implode(' ', array_filter([
        'form-control',
        $size ? "form-control-{$size}" : null,
        $state === 'valid' ? 'is-valid' : null,
        $state === 'invalid' ? 'is-invalid' : null,
    ]));

    $inputAttrs = $attributes->except(['class', 'style'])->merge([
        'type' => $type,
        'id' => $id,
        'name' => $name,
        'placeholder' => $placeholder,
        'value' => $value,
        'disabled' => $disabled,
        'readonly' => $readonly,
        'required' => $required,
        'autofocus' => $autofocus,
        'autocomplete' => $autocomplete,
        'min' => $min,
        'max' => $max,
        'minlength' => $minlength,
        'maxlength' => $maxlength,
        'step' => $step,
        'pattern' => $pattern,
        'multiple' => $multiple,
    ])->class([$inputClass]);
@endphp

@if($floatingLabel && $label)
    <div {{ $attributes->only(['class', 'style'])->class(['form-floating', 'mb-3']) }}>
        <input {{ $inputAttrs->merge(['placeholder' => $placeholder ?? $label]) }}>
        <label @if($id) for="{{ $id }}" @endif>
            {{ $label }}
            @if($required)<span class="text-danger">*</span>@endif
        </label>
    </div>
@else
    <div {{ $attributes->only(['class', 'style'])->class(['mb-3']) }}>
        @if($label)
            <label @if($id) for="{{ $id }}" @endif class="form-label">
                {{ $label }}
                @if($required)<span class="text-danger">*</span>@endif
            </label>
        @endif

        @if($prepend || $append)
            <div class="input-group{{ $size ? ' input-group-' . $size : '' }}">
                @if($prepend)
                    <span class="input-group-text">{{ $prepend }}</span>
                @endif

                <input {{ $inputAttrs }}>

                @if($append)
                    <span class="input-group-text">{{ $append }}</span>
                @endif
            </div>
        @else
            <input {{ $inputAttrs }}>
        @endif

        @if($feedback)
            <div class="{{ $state === 'valid' ? 'valid-feedback' : 'invalid-feedback' }}">
                {{ $feedback }}
            </div>
        @endif

        @if($helperText)
            <div class="form-text">{{ $helperText }}</div>
        @endif
    </div>
@endif
