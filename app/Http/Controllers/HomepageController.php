<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Story;
use App\Models\User;
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

    public function influencer()
    {
        return view('layout.influencer');
    }
    public function brandStory()
    {
        $story = Story::inRandomOrder()->limit(5)->get();
        $stories = Story::all();
        $startup = Story::take(3)->get();
        return view('layout.brandStory', \compact('story', 'stories', 'startup'));
    }
}
