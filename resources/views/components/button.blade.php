@props(['type' => 'submit'])

<button
    type="{{ $type }}"
    {{ $attributes->class('bg-black w-full hover:bg-gray-300 text-white font-bold py-2 px-4 rounded-full transition-colors duration-200') }}
>
    {{ $slot }}
</button>
