@props(['title' => ''])

<div x-data="{ verModal: false }">
    <button @click="verModal = true" title="{{ $title }}">
        <x-heroicon-s-eye class="w-5 h-5" style="color: #000121;" />
    </button>

    <div
        x-show="verModal"
        x-transition
        x-cloak
        @click.self="verModal = false"
        class="fixed inset-0 z-50 flex items-center justify-center "
    >
        <div class="bg-[#000121] p-6 rounded-lg shadow-xl w-full max-w-lg text-white">
            <h2 class="text-xl font-semibold mb-4">{{ $title }}</h2>

            <div class="space-y-4">
                {{ $slot }}
            </div>

            <div class="flex justify-end mt-6">
                <button @click="verModal = false" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-gray-500">Fechar</button>
            </div>
        </div>
    </div>
</div>
