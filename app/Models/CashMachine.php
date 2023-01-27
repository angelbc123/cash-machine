<?php

namespace App\Models;

use App\Models\Interfaces\Transaction;

class CashMachine
{
    /**
     * @param Transaction $transaction
     */
    public function store(Transaction $transaction)
    {
        $transaction->validate();
        $transaction->save();
    }
}
