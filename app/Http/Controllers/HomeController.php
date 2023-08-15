<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardsModels;
use App\Models\User;
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
        try {
            if (Auth::user()->hasRole(['Admin', 'Writer', 'Designer', 'Influencer', 'Brand'])) {
                $users = User::count();
                $paidUsers = User::where('package', '!=', 'FREE')->count();
                $freeUsers = User::where('package', '=', 'FREE')->count();
                $influencer = User::whereHas(
                    'roles',
                    function ($q) {
                        $q->where('name', 'Influencer');
                    }
                )->count();
                $brand = User::whereHas(
                    'roles',
                    function ($q) {
                        $q->where('name', 'Brand');
                    }
                )->count();
                $reseller = User::whereHas(
                    'roles',
                    function ($q) {
                        $q->where('name', 'Reseller');
                    }
                )->count();
                $writer = User::whereHas(
                    'roles',
                    function ($q) {
                        $q->where('name', 'Writer');
                    }
                )->count();
                $designer = User::whereHas(
                    'roles',
                    function ($q) {
                        $q->where('name', 'Designer');
                    }
                )->count();
                return view('home', \compact('users', 'paidUsers', 'freeUsers', 'influencer', 'brand', 'reseller', 'writer', 'designer'));
            } else {
                $id = Auth::user()->id;
                $data = CardsModels::join('users', 'users.id', '=', 'cards.user_id')->where('users.id', '=', $id)->get(['cards.*', 'users.email']);
                // return $data;
                return view('account.card', compact('data'));
            }
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function home2()
    {
        try {
            // $homecard = CardsModels::all();
            $id = Auth::User()->id;
            $cardshow = CardsModels::join('users', 'users.id', '=', 'cards.user_id')->where('users.id', '=', $id)->get(['users.email', 'cards.*']);
            $link = Links::join('cards', 'cards.id', '=', 'cardlinkes.card_id')->where('cards.user_id', '=', $id)->get(['cardlinkes.*']);
            // return $cardshow;
            return view('layout.home1', compact('cardshow', 'link'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
}
