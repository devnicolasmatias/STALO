@props([
    'type' => 'text',
    'name',
    'id' => null,
    'label' => null,
    'placeholder' => '',
    'icon' => null,
    'value' => null,
    'labelClass' => 'text-gray-700',
])

@php
    $inputClasses = 'block w-full pr-3 py-2 border border-gray-300 rounded-lg
                    focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                    placeholder-gray-400 ' . ($icon ? 'pl-10' : 'pl-3');
    $id = $id ?? $name;
    $label = $label ?? ucfirst($name);
@endphp

<div class="space-y-2">
    <label for="{{ $id }}" class="block text-sm font-medium {{ $labelClass }}">
        {{ $label }}
    </label>

    <div class="relative">
        @if ($icon)
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                {!! $icon !!}
            </div>
        @endif

        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $id }}"
            value="{{ $value ?? old($name) }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes->merge(['class' => $inputClasses]) }}
        />
    </div>
</div>
