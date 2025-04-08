@if ($errors->any())
    <div class="bg-red-50 border-l-4 border-red-400 text-red-700 p-4 rounded-lg mb-6 flex gap-3 items-start">
        <x-heroicon-s-x-circle class="h-5 w-5 text-red-400 flex-shrink-0 mt-0.5" />

        <div class="text-sm text-inherit flex-1">
            @if ($errors->count() === 1)
                <p>{{ $errors->first() }}</p>
            @else
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endif
