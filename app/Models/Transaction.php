<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $transaction)
 */
class Transaction extends Model
{
    use Uuids;

    protected $guarded = [];
}
