<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Http\Controllers\Controller;
use App\Models\Offerdetail;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    public function index()
    {
        $offer = Offer::all();
        return view('offer.index', \compact('offer'));
    }


    public function create()
    {
        return view('offer.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'poster' => 'required',
            'fontSize' => 'required',
            'fontFamily' => 'required',
            'fontColor' => 'required',
            'noOfProduct' => 'required',
            'posterHeight' => 'required',
            'posterWidth' => 'required',
            'titlePositionTop' => 'required',
            'titlePositionLeft' => 'required',
        ]);

        $offer = new Offer();
        $offer->title = $request->title;
        $image = $request->poster;
        $offer->poster = time() . '.' . $request->poster->extension();
        $request->poster->move(public_path('poster'), $offer->poster);

        $offer->fontSize = $request->fontSize;
        $offer->fontFamily = $request->fontFamily;
        $offer->fontColor = $request->fontColor;
        $offer->noOfProduct = $request->noOfProduct;
        $offer->posterHeight = $request->posterHeight;
        $offer->posterWidth = $request->posterWidth;
        $offer->titlePositionTop = $request->titlePositionTop;
        $offer->titlePositionLeft = $request->titlePositionLeft;
        $offer->save();

        return redirect('offer/index')->with('success', 'Offer Created Successfully');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $offer = Offer::find($id);
        return view('offer.edit', \compact('offer'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'fontSize' => 'required',
            'fontFamily' => 'required',
            'fontColor' => 'required',
            'noOfProduct' => 'required',
            'posterHeight' => 'required',
            'posterWidth' => 'required',
            'titlePositionTop' => 'required',
            'titlePositionLeft' => 'required',
        ]);

        $id = $request->offerId;
        $offer =  Offer::find($id);
        $offer->title = $request->title;
        if ($request->poster) {
            $image = $request->poster;
            $offer->poster = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('poster'), $offer->poster);
        }

        $offer->fontSize = $request->fontSize;
        $offer->fontFamily = $request->fontFamily;
        $offer->fontColor = $request->fontColor;
        $offer->noOfProduct = $request->noOfProduct;
        $offer->posterHeight = $request->posterHeight;
        $offer->posterWidth = $request->posterWidth;
        $offer->titlePositionTop = $request->titlePositionTop;
        $offer->titlePositionLeft = $request->titlePositionLeft;
        $offer->save();

        return redirect('offer/index')->with('success', 'Offer Update Successfully');
    }

    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        $offerdetail = Offerdetail::where('offerId', '=', $id)->delete();
        return redirect()->back()->with('success', 'Offer deleted Successfully');
    }

    public function offerdetail($id)
    {
        $offerData = Offerdetail::where('offerId', '=', $id)->get();
        $offerId  = $id;
        return view('offer.offerdetails', \compact('offerId', 'offerData'));
    }

    function offerdetailstore(Request $request)
    {
        $this->validate($request, [
            'positionLeft' => 'required',
            'positionBottom' => 'required',
            'imageHeight' => 'required',
            'imageWidth' => 'required',
        ]);

        $offer = new Offerdetail();
        $offer->offerId = $request->offerId;
        $offer->positionLeft = $request->positionLeft;
        $offer->positionBottom = $request->positionBottom;
        $offer->imageHeight = $request->imageHeight;
        $offer->imageWidth = $request->imageWidth;
        $offer->save();

        return redirect()->back()->with('success', 'Offer detail Created Successfully');
    }

    function offerdetailedit($id)
    {
        $offerdetails = Offerdetail::find($id);
        return view('offer.offerdetailedit', \compact('offerdetails'));
    }

    function offerdetailupdate(Request $request)
    {
        $id = $request->offerdetailId;
        $offer = Offerdetail::find($id);
        $offer->positionLeft = $request->positionLeft;
        $offer->positionBottom = $request->positionBottom;
        $offer->imageHeight = $request->imageHeight;
        $offer->imageWidth = $request->imageWidth;
        $offer->save();

        return redirect()->back()->with('success', 'Offer detail Update Successfully');
    }

    function offerdetaildelete($id)
    {
        $offerdetail = Offerdetail::find($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
