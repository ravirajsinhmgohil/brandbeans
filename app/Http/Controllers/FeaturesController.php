<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    //
    public function index()
    {
        try {
            return view('features.index');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
}
