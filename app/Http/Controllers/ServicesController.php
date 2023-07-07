<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categories;
use App\Models\User;
use App\Models\Cardservices;

use Auth;


class ServicesController extends Controller
{
    //

    // public function Create()
    // {
    //     $id=Auth::User()->id;
    //     // $data = Cardservices::all();
    //     $data = Cardservices::join('cards','cards.id','=','cardservices.card_id')->where('cards.user_id','=',$id)->get(['cardservices.*','cards.*']);
    //     $category = Categories::all();
    //     return view('services.create',compact('data','category'));
    // }
    // function delete($id)
    // {
    //     $card = Cardservices::find($id);
    //     $card->delete();
        
    //     return redirect()->back()->with('success',"deleted successfully");
    // }

    function demo()
    {
        return view('demo');
    }
    
}
