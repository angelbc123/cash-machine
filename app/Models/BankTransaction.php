<?php

namespace App\Models;

use Database\Factories\TransactionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankTransaction extends TransactionLog implements Transaction
{
    use HasFactory;

    public function validate(Request $request): \Illuminate\Validation\Validator
    {
        return Validator::make($request->all(), [
            'transfer_date' => 'required',
            'customer_name' => 'required',
            'account_number' => 'required',
            'amount' => 'required',
        ]);
    }

    public function amount(): float
    {
        return $this->amount;
    }

    public function inputs(): array
    {
        return $this->inputs;
    }
}
