<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TransactionStatus extends Component
{
    public $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function render()
    {
        return view('components.transaction-status');
    }
}
