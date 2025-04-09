@php
    $dados = [
        'Valor' => 'R$ ' . number_format($transaction->value, 2, ',', '.'),
        'CPF' => $transaction->cpf,
        'Status' => $transaction->status,
        'Data' => $transaction->created_at->format('d/m/Y H:i'),
    ];
@endphp

@foreach ($dados as $label => $valor)
    <div>
        <span class="text-sm font-medium">{{ $label }}:</span>
        <p class="{{ $label === 'Valor' ? 'text-lg font-semibold' : '' }}">
            {{ $valor }}
        </p>
    </div>
@endforeach

<div>
    <span class="text-sm font-medium">Comprovante:</span>
    <a href="{{ asset('pdfs/Comprovante-de-Pagamento.pdf') }}" target="_blank" class="underline text-blue-400">
        Ver PDF
    </a>
</div>
