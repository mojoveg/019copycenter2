@props(['label', 'for'])
{{-- <div>
<label class="{{ ($required ?? false) ? 'label label-required' : 'label' }}" for="{{ $for }}">
{{ $label }}
</label>
<div>
{{ $slot }}
</div>
</div>
@error($for)
<p class="help is-danger">{{ $errors->first($for) }}</p>
@enderror --}}


<div class="mb-3">
    <label class="{{ ($required ?? false) ? 'label label-required' : 'label' }}" for="{{ $for }}">
        {{ $label }}
    </label>
    {{ $slot }}
    @error($for)
    <p class="help is-danger">{{ $errors->first($for) }}</p>
    @enderror
</div>
