<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransctionRequest;
use App\Http\Requests\TransactionStoreRequest;
use App\Models\CardTransaction;
use App\Models\CashMachine;
use App\Models\TransactionTypes;
use Database\Factories\TransactionFactory;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create(Request $request)
    {
        return view('pages/' . $request->input('transaction') . '-transaction');
    }

    public function store(TransactionStoreRequest $request, CashMachine $cashMachine)
    {
        $transaction = TransactionFactory::make(
            $request->input('type'),
            $request
        );

        return $cashMachine->store($transaction);
    }
}
