@props([
    'label' => null,
    'name',
    'value' => null,
    'rows' => 3,
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
        <textarea
            id="{{ $name }}"
            name="{{ $name }}"
            rows="{{ $rows }}"
            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
            {{ $readonly ? 'readonly' : '' }}
            {{ $attributes->merge([
                'class' => 'form-textarea w-full max-w-full' . ($errors->has($name) ? ' border-danger focus-visible:ring-danger/20' : '')
            ]) }}
        >{{ old($name, $value ?? $slot) }}</textarea>
    </div>

    @if ($hint && ! $errors->has($name))
        <p class="text-xs text-default-400 mt-1">{{ $hint }}</p>
    @endif

    @error($name)
        <p class="text-xs text-danger font-medium mt-1">{{ $message }}</p>
    @enderror
</div>

