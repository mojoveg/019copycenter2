<div class="field">
@if($label ?? null)
<label class="{{ ($required ?? false) ? 'label label-required' : 'label' }}" for="{{ $name }}">
    {{ $label }}
</label>
    @endif
  <div class="control">
    <input
        autocomplete="off"
        type="{{ $type ?? 'text' }}"
        name="{{ $name }}"
        id="{{ $name }}"
        class="input"
        placeholder="{{ $placeholder ?? '' }}"
        value="{{ old($name, $value ?? '') }}"
        @error("{{ $name }}") is-danger @enderror
{{--         {{ ($required ?? false) ? 'required' : '' }} --}}
    >
    @error($name)
      <p class="help is-danger">{{ $errors->first($name) }}</p>
    @enderror

  </div>
</div>


