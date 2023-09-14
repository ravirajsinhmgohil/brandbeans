<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryInfluencer;
use App\Models\InfluencerProfile;
use App\Models\Story;
use App\Models\User;
use Carbon\Carbon;
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
        try {
            $influencers = User::whereHas(
                'roles',
                function ($q) {
                    $q->where('name', 'Influencer');
                }
            )->with('influencer')->get();
            $category = CategoryInfluencer::all();
            return view('layout.influencer', \compact('influencers', 'category'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function influencerProfileView($id)
    {
        try {
            $profile = InfluencerProfile::with('profile')
                ->with('incategory')
                ->where('userId', '=', $id)
                ->orderBy('id', 'DESC')
                ->first();

            return view('influencerprofile', \compact('profile'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function brandStory()
    {
        try {
            $story = Story::orderBy('id', 'desc')->get();
            $stories = Story::all();
            $startup = Story::take(3)->get();
            $currentTime = Carbon::now();
            return view('layout.brandStory', \compact('story', 'stories', 'startup', 'currentTime'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
