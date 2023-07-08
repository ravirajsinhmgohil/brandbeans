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
        try {
            return view('customer.cards');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
}
