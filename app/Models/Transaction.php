<?php

namespace App\Models;

use Illuminate\Http\Request;

interface Transaction
{
    /**
     * Validate Inputs
     */
    public function validate();

    /**
     * Return total amount*/
    public function amount();

    /**
     * Return Inputs
     */
    public function inputs();
}
