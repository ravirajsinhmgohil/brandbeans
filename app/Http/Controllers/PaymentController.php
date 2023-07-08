<?php

namespace App\Http\Controllers;

use App\Models\CardsModels;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show(Payment $payment)
    {
        //
    }

    public function edit(Payment $payment)
    {
        //
    }
    public function update(Request $request)
    {

        try {
            $id = Auth::user()->id;
            //dd($id);
            $cards = CardsModels::where('user_id', '=', $id)->get();
            // return $cards;
            $cardid = $cards[0]->id;
            $payment1 = Payment::where('card_id', '=', $cardid)->first();
            $id = $payment1->id;

            $payment = Payment::find($id);

            $payment->bankName = $request->bankName;
            $payment->accountHolderName = $request->accountHolderName;
            $payment->accountNumber = $request->accountNumber;
            $payment->accountType = $request->accountType;
            $payment->ifscCode = $request->ifscCode;
            $payment->upidetail = $request->upidetail;
            $payment->save();
            return \redirect()->back()->with('success', 'Payment Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
    public function destroy(Payment $payment)
    {
        //
    }
}
