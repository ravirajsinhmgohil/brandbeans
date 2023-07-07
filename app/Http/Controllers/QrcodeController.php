<?php

namespace App\Http\Controllers;

use App\Models\CardsModels;
use App\Models\Qrcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QrcodeController extends Controller
{
    public function index()
    {
        $qr = Qrcode::all();
        return \view('demo', \compact('qr'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'number' => 'required',
            'code' => 'required',
        ]);

        $id = Auth::user()->id;
        //dd($id);
        $cards = CardsModels::where('user_id', '=', $id)->get();
        // return $cards;
        $cardid = $cards[0]->id;

        $qr = new Qrcode();
        $qr->card_id = $cardid;
        $qr->type = $request->type;
        $qr->number = $request->number;
        $image = $request->code;
        $qr->code = time() . '.' . $request->code->extension();
        $request->code->move(public_path('QRcodes'), $qr->code);
        $qr->save();
        return \redirect()->back()->with('success', 'QR Code Added Successfully');
    }

    public function show(Qrcode $qrcode)
    {
        //
    }


    public function edit(Qrcode $qrcode)
    {
        //
    }

    public function update(Request $request, Qrcode $qrcode)
    {
        //
    }

    public function destroy($id)
    {
        $qr = Qrcode::find($id);
        $qr->delete();
        return \redirect()->back()->with('success', 'QR Code Deleted Successfully');
    }
}
