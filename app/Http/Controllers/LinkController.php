<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Links;
use App\Models\User;
use App\Models\CardsModels;

use Auth;

class LinkController extends Controller
{
    //

    // public function Create(Request $request)
    // {
    //     $id=Auth::User()->id;
    //     $data = User::where('id','=',$id)->get();
    //     $link = Links::join('cards','cards.id','=','cardlinkes.card_id')->where('cards.user_id','=',$id)->get(['cardlinkes.*']);
    //     return view('link.create',compact('data','link'));
    // }

    function delete($id)
    {
        $detail = Links::find($id);
        $detail->delete();
        return redirect()->back()->with('success', "deleted successfully");
    }


    public function update(Request $request)
    {


        $id = Auth::user()->id;
        //dd($id);
        $cards = CardsModels::where('user_id', '=', $id)->get();
        // return $cards;
        $cardid = $cards[0]->id;

        $links = Links::where('card_id', '=', $cardid)->first();
        $id = $links->id;

        $link = Links::find($id);
        $link->phone1 = $request->phone1;
        $link->phone2 = $request->phone2;
        $link->email = $request->email;
        $link->skype = $request->skype;
        $link->facebook = $request->facebook;
        $link->instagram = $request->instagram;
        $link->twitter = $request->twitter;
        $link->youtube = $request->youtube;
        $link->linkedin = $request->linkedin;
        $link->website = $request->website;
        $link->paypal = $request->paypal;
        $link->save();

        // $card_id = $cards[0]->user_id;
        // $user = User::find($card_id);
        // $user->mobileno = $link->phone1;
        // $user->save();

        return \redirect()->back()->with('success', 'Links Updated Successfully');
    }
}
