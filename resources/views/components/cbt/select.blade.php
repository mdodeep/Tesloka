@props([
    'label' => null,
    'name',
    'value' => null,
    'required' => false,
    'disabled' => false,
    'hint' => null,
    'placeholder' => null,
])

<div class="space-y-1.5">
    @if ($label)
        <label for="{{ $name }}" class="block text-xs font-semibold text-default-700">
            {{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        <select
            id="{{ $name }}"
            name="{{ $name }}"
            {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            {{ $attributes->merge([
                'class' => 'form-select w-full max-w-full' . ($errors->has($name) ? ' border-danger focus-visible:ring-danger/20' : '')
            ]) }}
        >
            @if($placeholder)
                <option value="">{{ $placeholder }}</option>
            @endif
            {{ $slot }}
        </select>
    </div>

    @if ($hint && ! $errors->has($name))
        <p class="text-xs text-default-400 mt-1">{{ $hint }}</p>
    @endif

    @error($name)
        <p class="text-xs text-danger font-medium mt-1">{{ $message }}</p>
    @enderror
</div>
