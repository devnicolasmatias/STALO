<div x-data="{ modalAberto: false }">
    <x-button @click="modalAberto = true">
        Nova Transação
    </x-button>

    <div
        x-show="modalAberto"
        x-transition
        x-cloak
        @click.self="modalAberto = false"
        class="fixed inset-0 z-50 flex items-center justify-center "
    >
        <div class="bg-[#000121] p-6 rounded-xl shadow-2xl w-full max-w-lg">
            <h2 class="text-xl font-semibold mb-4 text-white">Nova Transação</h2>

            <form method="POST" action="{{ route('transactions.store') }}">
                @csrf
                <div class="mb-4 text-white">
                    <x-input name="value" label="Valor" placeholder="Digite o valor" labelClass="text-white"/>
                </div>

                <div class="mb-4" x-data="{
                    cpf: '',
                    formatarCPF() {
                        this.cpf = this.cpf
                            .replace(/\D/g, '')
                            .slice(0, 11)
                            .replace(/(\d{3})(\d)/, '$1.$2')
                            .replace(/(\d{3})(\d)/, '$1.$2')
                            .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                    }
                }">
                    <x-input
                        name="cpf"
                        label="CPF"
                        placeholder="000.000.000-00"
                        labelClass="text-white"
                        x-model="cpf"
                        @input="formatarCPF"
                        maxlength="14"
                        class="text-white"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-white mb-1">Status</label>
                    <select name="status" class="w-full border text-gray-400 border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-white">
                        <option value="Aprovada">Aprovada</option>
                        <option value="Negada">Negada</option>
                        <option value="Em processamento">Em processamento</option>
                    </select>
                </div>

                <div class="flex justify-end space-x-2 mt-6">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
                    <button type="button" @click="modalAberto = false" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
