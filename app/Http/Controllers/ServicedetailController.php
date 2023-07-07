<?php

namespace App\Http\Controllers;

use App\Models\CardsModels;
use App\Models\Payment;
use App\Models\Servicedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicedetailController extends Controller
{
    public function index()
    {
        $servicedetail = Servicedetail::all();
        return $servicedetail;
        return view('demo', compact('servicedetail'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'required',
            'description' => 'required',
        ]);

        $id = Auth::user()->id;
        //dd($id);
        $cards = CardsModels::where('user_id', '=', $id)->get();
        // return $cards;
        $cardid = $cards[0]->id;


        $servicedetail = new Servicedetail();
        $servicedetail->card_id = $cardid;
        $servicedetail->title = $request->title;
        $servicedetail->description = $request->description;
        $image = $request->photo;
        $servicedetail->photo = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('servicedetailimg'), $servicedetail->photo);
        $servicedetail->save();
        return redirect()->back()->with('success', 'Service Details Added');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $servicedetail = Servicedetail::find($id);
        return view('servicedetails.edit', compact('servicedetail'));
    }
    public function update(Request $request)
    {
        $id =  $request->serviceid;

        $service = Servicedetail::find($id);
        $service->title = $request->title;
        if ($request->photo) {
            $image = $request->photo;
            $service->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('servicedetailimg'), $service->photo);
        }
        $service->description = $request->description;
        $service->save();

        return \redirect('dashboard')->with('success', 'Service Details update Successfully');
    }

    public function destroy($id)
    {
        $service = Servicedetail::find($id);
        $service->delete();
        return \redirect()->back()->with('success', 'Service Detail Deleted Successfully');
    }
}
