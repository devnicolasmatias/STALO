<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|numeric|min:0',
            'cpf' => 'required|string|max:14',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'status' => 'required|in:Em processamento,Aprovada,Negada',
        ]);

        $path = $request->file('document')?->store('documents', 'public');

        Transaction::create([
            'value' => $request->value,
            'cpf' => $request->cpf,
            'document_path' => $path,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transação cadastrada com sucesso!');
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {

        $request->validate([
            'value' => 'required|numeric|min:0',
            'cpf' => 'required|string|max:14',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'status' => 'required|in:Em processamento,Aprovada,Negada',
        ]);

        if ($request->hasFile('document')) {
            if ($transaction->document_path) {
                Storage::disk('public')->delete($transaction->document_path);
            }
            $transaction->document_path = $request->file('document')->store('documents', 'public');
        }

        $transaction->update($request->only('value', 'cpf', 'status'));

        return redirect()->route('transactions.index')->with('success', 'Transação atualizada com sucesso!');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transação excluída com sucesso!');
    }
}
