@extends('layouts.app')

@section('content')
@php
    $tdClass = 'px-6 py-4';
    $headers = ['Data/Hora', 'Valor', 'CPF', 'Status', 'Comprovante', 'Ações'];
    $statusStyles = [
        'Em processamento' => ['color' => 'text-yellow-500', 'bg' => 'bg-yellow-300'],
        'Aprovada' => ['color' => 'text-green-700', 'bg' => 'bg-green-500'],
        'Negada' => ['color' => 'text-red-700', 'bg' => 'bg-red-500'],
    ];
@endphp

<div class="flex min-h-screen bg-gray-100">
    <main class="flex-1 p-10">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-[#000121]">Lista de Transações</h1>
            <a href="{{ route('transactions.create') }}" class="bg-[#000121] text-white px-4 py-2 rounded-full hover:bg-gray-800 transition">
                + Nova Transação
            </a>
        </div>

        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <table class="min-w-full table-auto text-left">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-semibold">
                    <tr>
                        @foreach ($headers as $header)
                            <th class="{{ $tdClass }}">{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
                    @forelse ($transactions as $transaction)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="{{ $tdClass }}">{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                            <td class="{{ $tdClass }} font-semibold text-gray-800">
                                R$ {{ number_format($transaction->value, 2, ',', '.') }}
                            </td>
                            <td class="{{ $tdClass }}">{{ $transaction->cpf }}</td>
                            <td class="{{ $tdClass }}">
                                @php
                                    $style = $statusStyles[$transaction->status] ?? ['color' => 'text-gray-700', 'bg' => 'bg-gray-400'];
                                @endphp
                                <div class="flex items-center space-x-2">
                                    <span class="inline-block w-3 h-3 rounded-full {{ $style['bg'] }}"></span>
                                    <span class="text-sm font-medium {{ $style['color'] }}">{{ $transaction->status }}</span>
                                </div>
                            </td>
                            <td class="{{ $tdClass }}">
                                <a href="{{ asset('pdfs/Comprovante-de-Pagamento.pdf') }}" target="_blank"
                                   class="flex items-center text-[#000121] ;hover:underline" title="Ver comprovante fixo">
                                    <x-heroicon-o-document-text class="w-5 h-5 mr-1" />
                                    PDF
                                </a>
                            </td>
                            <td class="{{ $tdClass }}">
                                <div class="flex space-x-4 items-center">
                                    <a href="{{ route('transactions.show', $transaction) }}" title="Ver">
                                        <x-heroicon-s-eye class="w-5 h-5" style="color: #000121;" />
                                    </a>
                                    <a href="{{ route('transactions.edit', $transaction) }}" title="Editar">
                                        <x-heroicon-s-pencil class="w-5 h-5" style="color: #000121;" />
                                    </a>
                                    <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Excluir">
                                            <x-heroicon-o-trash class="w-5 h-5" style="color: #dc2626;" />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($headers) }}" class="text-center py-6 text-gray-500">
                                Nenhuma transação encontrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
