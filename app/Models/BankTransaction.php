<?php

namespace App\Models;

use App\Models\Interfaces\Transaction;
use App\Rules\AccountNumberRule;
use App\Rules\AlphaAndSpaceRule;
use App\Rules\TransferDateRule;
use Database\Factories\TransactionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankTransaction extends TransactionLog implements Transaction
{
    use HasFactory;

    /**
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validate(): array
    {
        return Validator::make(
            array_merge($this->inputs, ['amount' => $this->amount()]),
            [
                'transfer_date' => ['required', new TransferDateRule],
                'customer_name' => ['required', new AlphaAndSpaceRule],
                'account_number' => ['required', new AccountNumberRule],
                'amount' => ['required', 'numeric'],
            ]
        )->validate();
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
