<?php

namespace App\Models;

class CashMachine
{

    /**
     * @param Transaction $transaction
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function store(Transaction $transaction)
    {
        $validator = $transaction->validate();

        if($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $transaction->save();

        return view('pages/success-submission', [
            'transaction' => $transaction
        ]);
    }
}
