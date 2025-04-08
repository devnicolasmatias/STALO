<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Transaction;

class TransactionActions extends Component
{
    public Transaction $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function render()
    {
        return view('components.transaction-actions');
    }
}
