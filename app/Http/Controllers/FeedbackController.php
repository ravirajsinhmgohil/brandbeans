<?php

namespace App\Http\Controllers;

use App\Models\CardsModels;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $authid = Auth::User()->id;

        $details = CardsModels::where('user_id', '=', $authid)->first();
        $id = $details->id;
        $feed = Feedback::where('card_id', '=', $id)->get();
        return View('feed.feedback', \compact('feed'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        $cardid = $request->cardId;
        $qr = new Feedback();
        $qr->card_id = $cardid;
        $qr->name = $request->name;
        $qr->email = $request->email;
        $qr->message = $request->message;
        $qr->star = "5";
        $qr->save();
        return \redirect()->back()->with('success', 'Feedback Added Successfully');
    }

    public function show(Feedback $feedback)
    {
        //
    }

    public function edit(Feedback $feedback)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(Feedback $feedback)
    {
        //
    }
}
