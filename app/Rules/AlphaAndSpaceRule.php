<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class AlphaAndSpaceRule implements InvokableRule
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
        if(!preg_match('/^[a-z\s]+$/i', $value)) {
            $fail('The :attribute can contains only leters and spaces');
        }
    }
}
