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

        if(!preg_match('/^[0-1][0-9]{1,2}\/[0-3][0-9]{1,2}\/[0-9]{4}$/', $value)) {
            $fail('The :attribute must be in (MM/DD/YYYY) format.');
            return;
        }

        $date = Carbon::parse($value);
        if($date->lessThan(Carbon::today())) {
            $fail('The :attribute can not be older than current date!');
        }
    }
}
