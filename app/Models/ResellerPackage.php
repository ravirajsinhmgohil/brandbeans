<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResellerPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'packageId',
        'amount',
    ];
}
