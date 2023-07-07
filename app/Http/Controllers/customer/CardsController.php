<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CardsModels;

class CardsController extends Controller
{
    //
    function cards()
    {
        return view('customer.cards');
    }
    
}
