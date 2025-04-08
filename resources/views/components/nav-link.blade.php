@props(['href', 'active' => false])

<a href="{{ $href }}"
    {{ $attributes->class([
        'block px-4 py-2 rounded-lg hover:bg-gray-100 font-semibold',
        $active ? 'bg-gray-200 ' : 'text-white'
    ]) }}>
    {{ $slot }}
</a>
