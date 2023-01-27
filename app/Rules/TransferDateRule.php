<?php

namespace App\Rules;

use App\Models\CardTransaction;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\InvokableRule;

class TransferDateRule implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {

        // check value format - it should be MM/DD/YYYY
        if(!preg_match('/^[0-1][0-9]{1,2}\/[0-3][0-9]{1,2}\/[0-9]{4}$/', $value)) {
            $fail('The :attribute must be in (MM/DD/YYYY) format!');
            return;
        }

        $transferDate = Carbon::parse($value);

        // transfer date should be older than today
        if($transferDate->lessThan(Carbon::today())) {
            $fail('The :attribute can not be older than current date!');
        }
    }
}
