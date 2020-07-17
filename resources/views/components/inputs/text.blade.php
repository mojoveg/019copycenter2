@props([
    'for',
    'type' => 'text',
    'value' => ''
])
<div>
    <input class="form-control"
        type="{{ $type }}"
        {{ $attributes->merge(['class' => '']) }}
        id="{{ $for }}"
        name="{{ $for }}"
        value="{{ old($for, $value ?? '') }}"
        />
</div>


