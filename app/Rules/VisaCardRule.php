<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class VisaCardRule implements InvokableRule
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
        // value should be 16 digits starts with "4"
        if(!preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/', $value)) {
            $fail('The :attribute must be 16 digits starts with "4"!');
        }
    }
}
