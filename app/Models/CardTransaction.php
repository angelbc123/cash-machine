<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardTransaction extends TransactionLog implements Transaction
{
    use HasFactory;


    public function validate(Request $request): \Illuminate\Validation\Validator
    {
        return Validator::make($request->all(), [
            'card_number' => 'required',
            'expiration_date' => 'required',
            'card_holder' => 'required',
            'cvv' => 'required',
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
