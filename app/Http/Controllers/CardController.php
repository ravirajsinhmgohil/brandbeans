<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardsModels;
use App\Models\Links;
use Auth;

class CardController extends Controller
{
    // all card show
    public function index()
    {
        $id = Auth::user()->id;
        $data = CardsModels::join('users', 'users.id', '=', 'cards.user_id')->where('users.id', '=', $id)->get(['cards.*', 'users.email']);
        // return $data;
        $availcard = CardsModels::where('user_id', '=', $id)->count();
        if ($availcard > 0) {
            return view('account.card', compact('data'));
        } else {

            return view('account.card', compact('data', 'availcard'));
        }
    }
    // public function view()
    // {
    //     $id=Auth::User()->id;

    //     // $cardshow = CardsModels::all();
    //     $cardshow = CardsModels::join('users','users.id','=','cards.user_id')->where('users.id','=',$id)->get(['users.email','cards.*']);
    //     $link = Links::join('cards','cards.id','=','cardlinkes.card_id')->where('cards.user_id','=',$id)->get(['cardlinkes.*']);

    //     return view('account.showcard',compact('cardshow','link'));
    // }
    // public function list()
    // {

    //     return view('account.card',compact('data'));
    // }
    // return view('account.card',compact('data'));
    // }




}
