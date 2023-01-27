<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\InvokableRule;

class ExpirationDateRule implements InvokableRule
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
        if(!preg_match('/^[0-1][0-9]{1,2}\/[0-9]{4}$/', $value)) {
            $fail('The :attribute must be in (MM/YYYY) format.');
            return;
        }

        $expirationDate = Carbon::createFromFormat('m/Y', $value)->floorMonth();
        if($expirationDate->lessThan(Carbon::today()->floorMonth()->addMonths(2))) {
            $fail('The :attribute must be at least 2 months bigger than current month!');
        }
    }
}
