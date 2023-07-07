<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\CardsModels;
use App\Models\Users;
use App\Models\Links;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hasRole(['Admin', 'Writer', 'Designer', 'Influencer', 'Brand'])) {
            return view('home');
        } else {
            $id = Auth::user()->id;
            $data = CardsModels::join('users', 'users.id', '=', 'cards.user_id')->where('users.id', '=', $id)->get(['cards.*', 'users.email']);
            // return $data;
            return view('account.card', compact('data'));
        }
    }

    public function home2()
    {
        // $homecard = CardsModels::all();
        $id = Auth::User()->id;
        $cardshow = CardsModels::join('users', 'users.id', '=', 'cards.user_id')->where('users.id', '=', $id)->get(['users.email', 'cards.*']);
        $link = Links::join('cards', 'cards.id', '=', 'cardlinkes.card_id')->where('cards.user_id', '=', $id)->get(['cardlinkes.*']);
        // return $cardshow;
        return view('layout.home1', compact('cardshow', 'link'));
    }
}
