@props([
    'for',
    'type' => 'text',
    'value' => ''
])

<x-inputs.group label="{{ Str::title(str_replace('_', ' ', $for)) }}" for="{{ $for }}">
    <x-inputs.text for="{{ $for }}" value="{{ $value }}"/>
</x-inputs.group>
