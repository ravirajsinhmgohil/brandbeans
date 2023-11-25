<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstaMojoPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'i_payment_id',
        'user_id',
        'amount'
    ];
}
