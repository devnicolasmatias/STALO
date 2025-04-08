@php
    $active = request()->routeIs([
        'welcome', 'transactions.index'
    ]);
@endphp

<aside class="w-64 h-screen bg-[#000121]  fixed top-0 left-0 flex flex-col justify-between">
    <div class="p-6">
        <h2 class="text-xl font-bold text-white mb-8">STALO</h2>

        <nav class="space-y-2">
            <x-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                <div class="flex items-center gap-2">
                    <x-heroicon-o-home class="w-5 h-5" />
                    Boas-vindas
                </div>
            </x-nav-link>

            <x-nav-link href="{{ route('transactions.index') }}" :active="request()->routeIs('transactions.index')">
                <div class="flex items-center gap-2">
                    <x-heroicon-o-currency-dollar class="w-5 h-5" />
                    Transações
                </div>
            </x-nav-link>
        </nav>

    </div>

    <div class="p-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-button class="bg-red-500">
                Sair
            </x-button>
        </form>
    </div>
</aside>
