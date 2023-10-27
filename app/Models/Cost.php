<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;

    function user()
    {
        return $this->hasOne(User::class, 'id', 'userId');
    }
}
