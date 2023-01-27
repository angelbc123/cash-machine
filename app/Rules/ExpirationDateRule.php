<?php

namespace App\Rules;

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
        }
    }
}
