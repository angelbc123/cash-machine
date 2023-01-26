<?php

namespace Database\Factories;

use App\Models\BankTransaction;
use App\Models\CardTransaction;
use App\Models\CashTransaction;
use App\Models\Transaction;
use Illuminate\Support\Arr;

class TransactionFactory
{
    /**
     * @param string $transactionModel
     * @param array $data
     * @return Transaction
     * @throws \Exception
     */
    public static function make(string $transactionModel, array $data): Transaction
    {
        if($transactionModel === BankTransaction::class) {
            $formattedData = Arr::only(
                $data,
                ['transfer_date', 'customer_name', 'account_number']
            );

            return BankTransaction::factory()->make([
                'amount' => data_get($data, 'amount'),
                'inputs' => $formattedData
            ]);
        }

        if($transactionModel === CardTransaction::class) {
            $formattedData = Arr::only(
                $data,
                ['card_number', 'expiration_date', 'card_holder', 'cvv']
            );

            return CardTransaction::factory()->make([
                'amount' => data_get($data, 'amount'),
                'inputs' => $formattedData
            ]);
        }

        if($transactionModel === CashTransaction::class) {
            $formattedData = Arr::only(
                $data,
                ['banknote_1', 'banknote_5', 'banknote_10', 'banknote_50', 'banknote_100']
            );

            return CashTransaction::factory()->make([
                'amount' => array_sum($formattedData),
                'inputs' => $formattedData
            ]);
        }

        throw new \Exception('No valid Transaction model');
    }

}
