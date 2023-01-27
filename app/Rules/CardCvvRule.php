<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class CardCvvRule implements InvokableRule
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
        // value can contains only 3 digits
        if(!preg_match('/^[0-9]{3}$/', $value)) {
            $fail('The :attribute can contains only 3 digits!');
        }
    }
}
