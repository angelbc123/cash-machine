<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class AccountNumberRule implements InvokableRule
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
        //value should be 6 alphanumeric chars
        if(!preg_match('/^[a-zA-Z0-9]{6}$/', $value)) {
            $fail('The :attribute must be 6 alpha numeric chars!');
        }
    }
}
