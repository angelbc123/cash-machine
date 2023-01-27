<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CashTransaction extends TransactionLog implements Transaction
{
    use HasFactory;

    public function validate(): \Illuminate\Validation\Validator
    {
        return Validator::make(
            array_merge($this->inputs, ['amount' => $this->amount()]),
            [
                'banknote_1' => ['required', 'numeric'],
                'banknote_5' => ['required', 'numeric'],
                'banknote_10' => ['required', 'numeric'],
                'banknote_50' => ['required', 'numeric'],
                'banknote_100' => ['required', 'numeric'],
                'amount' => ['required', 'numeric', 'max:10000']
            ]
        );
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
