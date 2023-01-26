<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CashTransaction extends TransactionLog implements Transaction
{
    use HasFactory;

    public function validate(Request $request): \Illuminate\Validation\Validator
    {
        return Validator::make($request->all(), [
            'banknote_1' => 'required',
            'banknote_5' => 'required',
            'banknote_10' => 'required',
            'banknote_50' => 'required',
            'banknote_100' => 'required',
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
