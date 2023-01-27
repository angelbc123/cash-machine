<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionStoreRequest;
use App\Models\CashMachine;
use Database\Factories\TransactionFactory;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create(Request $request)
    {
        return view('pages/' . $request->input('transaction') . '-transaction');
    }

    /**
     * @param TransactionStoreRequest $request
     * @param CashMachine $cashMachine
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(
        TransactionStoreRequest $request,
        CashMachine $cashMachine
    )
    {
        $transaction = $this->getTransactionContext($request);

        $cashMachine->store($transaction);

        return redirect()
            ->route('success-submission')
            ->with([
                'transaction' => $transaction
            ]);
    }

    /**
     * @param TransactionStoreRequest $request
     * @return \App\Models\Interfaces\Transaction
     * @throws \Exception
     */
    protected function getTransactionContext(TransactionStoreRequest $request): \App\Models\Interfaces\Transaction
    {
        return TransactionFactory::make(
            $request->input('type'),
            $request
        );
    }
}
