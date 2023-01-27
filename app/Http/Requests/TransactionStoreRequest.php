<?php

namespace App\Http\Requests;

use App\Models\TransactionLog;
use Illuminate\Foundation\Http\FormRequest;

class TransactionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'total_amount' => ['numeric', 'max:' . config('cash-machine.amount_limit')]
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $totalAmount = TransactionLog::select('amount')
            ->sum('amount');

        $this->merge([
            'total_amount' => $totalAmount,
        ]);
    }
}
