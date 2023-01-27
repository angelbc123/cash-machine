<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property float $amount
 * @property array $inputs
 */
class TransactionLog extends Model
{
    use HasFactory;

    protected $table = 'transaction_logs';

    protected $guarded = [
        'id'
    ];
    protected $casts = [
        'inputs' => 'array'
    ];
}
