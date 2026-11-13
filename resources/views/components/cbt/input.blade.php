@props([
    'label' => null,
    'name',
    'type' => 'text',
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'readonly' => false,
    'hint' => null,
])

<div class="space-y-1.5">
    @if ($label)
        <label for="{{ $name }}" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">
            {{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
            {{ $readonly ? 'readonly' : '' }}
            {{ $attributes->merge([
                'class' => 'form-input w-full' . ($errors->has($name) ? ' border-danger focus-visible:ring-danger/20' : '')
            ]) }}
        >
    </div>

    @if ($hint && ! $errors->has($name))
        <p class="text-xs text-default-400 mt-1">{{ $hint }}</p>
    @endif

    @error($name)
        <p class="text-xs text-danger font-medium mt-1">{{ $message }}</p>
    @enderror
</div>
