<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfluencerProfile extends Model
{
    use HasFactory;

    function profile()
    {
        return $this->hasOne(User::class, 'id', 'userId');
    }

    function brand()
    {
        return $this->hasMany(Campaign::class, 'userId', 'userId');
    }

    function category()
    {
        return $this->hasOne(CategoryInfluencer::class, 'id', 'categoryId');
    }

    function portfolio()
    {
        return $this->hasMany(InfluencerPortfolio::class, 'userId', 'userId');
    }
}
