<?php

namespace App\Models;

use App\Models\Interfaces\Transaction;
use App\Rules\AlphaAndSpaceRule;
use App\Rules\CardCvvRule;
use App\Rules\ExpirationDateRule;
use App\Rules\VisaCardRule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CardTransaction extends TransactionLog implements Transaction
{
    use HasFactory;

    /**
     * @return array
     * @throws ValidationException
     */
    public function validate(): array
    {
        return Validator::make(
            array_merge($this->inputs, ['amount' => $this->amount()]),
            [
                'card_number' => ['required', new VisaCardRule],
                'expiration_date' => ['required', new ExpirationDateRule],
                'card_holder' => ['required', new AlphaAndSpaceRule],
                'cvv' => ['required', new CardCvvRule],
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
