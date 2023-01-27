<?php

namespace Database\Factories;

use App\Models\BankTransaction;
use App\Models\CardTransaction;
use App\Models\CashTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TransactionFactory
{
    const CASH_TYPE = 'cash';
    const CARD_TYPE = 'card';
    const BANK_TYPE = 'bank';

    /**
     * @param string $type
     * @param Request $request
     * @return Transaction
     * @throws \Exception
     */
    public static function make(string $type, Request $request): Transaction
    {
        return match ($type) {
            self::BANK_TYPE => self::handleBankTransaction($request),
            self::CARD_TYPE => self::handleCardTransaction($request),
            self::CASH_TYPE => self::handleCashTransaction($request),
            default => throw new \Exception('No valid Transaction model')
        };
    }

    /**
     * @param Request $request
     * @return BankTransaction
     */
    protected static function handleBankTransaction(Request $request): BankTransaction
    {
        return BankTransaction::factory()->make([
            'amount' => (float) $request->input('amount'),
            'inputs' => $request->only(['transfer_date', 'customer_name', 'account_number'])
        ]);
    }

    /**
     * @param Request $request
     * @return CardTransaction
     */
    protected static function handleCardTransaction(Request $request): CardTransaction
    {
        return CardTransaction::factory()->make([
            'amount' => (float) $request->input('amount'),
            'inputs' => $request->only(['card_number', 'expiration_date', 'card_holder', 'cvv'])
        ]);
    }

    /**
     * @param Request $request
     * @return CashTransaction
     */
    protected static function handleCashTransaction(Request $request): CashTransaction
    {
        $amount = 0;
        $banknotesData = $request->only(
            ['banknote_1', 'banknote_5', 'banknote_10', 'banknote_50', 'banknote_100']
        );

        Arr::map($banknotesData, function($value, $key) use (&$amount) {
            $amount += ((int) str_replace('banknote_', '', $key)) * $value;
        });

        return CashTransaction::factory()->make([
            'amount' => (float) $amount,
            'inputs' => $banknotesData
        ]);
    }
}
