<?php

namespace App\Http\Controllers;

use App\Models\CardsModels;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    public function index()
    {
        $authid = Auth::User()->id;

        $details = CardsModels::where('user_id', '=', $authid)->first();
        $id = $details->id;
        $inq = Inquiry::where('card_id', '=', $id)->get();
        return \view('feed.inquiry', \compact('inq'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $cardid = $request->cardId;
        $inq = new Inquiry();
        $inq->card_id = $cardid;
        $inq->name = $request->name;
        $inq->email = $request->email;
        $inq->phone = $request->phone;
        $inq->message = $request->message;
        $inq->save();
        return \redirect()->back();
    }

    public function show(Inquiry $inquiry)
    {
        //
    }

    public function edit(Inquiry $inquiry)
    {
        //
    }

    public function update(Request $request, Inquiry $inquiry)
    {
        //
    }

    public function destroy(Inquiry $inquiry)
    {
        //
    }
}
