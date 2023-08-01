<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //
    public function homepage()
    {

        return view('wcard.homepage');
    }

    function about()
    {

        return view('otherpages.about');
    }
    function contact()
    {

        return view('otherpages.contact');
    }
    function privacy()
    {

        return view('otherpages.privacy');
    }
    function refund()
    {

        return view('otherpages.refund');
    }
    function term()
    {

        return view('otherpages.terms');
    }

    function gallery()
    {
        $collection = Category::all();

        return view('account.gallery', \compact('collection'));
    }
}
