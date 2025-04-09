@props(['transaction'])

<div x-data="{ editModal: false }">
    <button @click="editModal = true" title="Editar">
        <x-heroicon-s-pencil class="w-5 h-5" style="color: #000121;" />
    </button>

    <div
        x-show="editModal"
        x-transition
        x-cloak
        @click.self="editModal = false"
        class="fixed inset-0 z-50 flex items-center justify-center "
    >
        <div class="bg-[#000121] p-6 rounded-lg shadow-xl w-full max-w-lg text-white">
            <h2 class="text-xl font-semibold mb-4">Editar Transação</h2>

            <form method="POST" action="{{ route('transactions.update', $transaction) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <x-input
                        name="value"
                        label="Valor"
                        placeholder="Digite o valor"
                        :value="$transaction->value"
                        labelClass="text-white"
                    />
                </div>

                <div class="mb-4" x-data="{
                    cpf: '{{ $transaction->cpf }}',
                    formatarCPF() {
                        this.cpf = this.cpf
                            .replace(/\D/g, '')
                            .slice(0, 11)
                            .replace(/(\d{3})(\d)/, '$1.$2')
                            .replace(/(\d{3})(\d)/, '$1.$2')
                            .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                    }
                }">
                    <label class="block text-sm font-medium text-white mb-1">CPF</label>
                    <input
                        x-model="cpf"
                        @input="formatarCPF"
                        name="cpf"
                        type="text"
                        maxlength="14"
                        placeholder="000.000.000-00"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-white"
                    >
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-white mb-1">Status</label>
                    <select name="status" class="w-full border border-gray-300  rounded px-3 py-2 text-gray-400">
                        <option  value="Aprovada" {{ $transaction->status === 'Aprovada' ? 'selected' : '' }}>Aprovada</option>
                        <option  value="Negada" {{ $transaction->status === 'Negada' ? 'selected' : '' }}>Negada</option>
                        <option  value="Em processamento" {{ $transaction->status === 'Em processamento' ? 'selected' : '' }}>Em processamento</option>
                    </select>
                </div>

                <div class="flex justify-end space-x-2 mt-6">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
                    <button type="button" @click="editModal = false" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-gray-500">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
