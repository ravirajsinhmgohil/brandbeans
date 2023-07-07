<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriptionpackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriptiondetail;

class SubscriptionpackageController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:subscriptionpackage-list|subscriptionpackage-create|subscriptionpackage-edit|subscriptionpackage-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:subscriptionpackage-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:subscriptionpackage-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:subscriptionpackage-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $subpack = Subscriptionpackage::all();
        return view("adminSubPack.index", compact('subpack'));
    }

    public function create()
    {
        return view("adminSubPack.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subscriptionType' => 'required',
            'priceType' => 'required',
            'details' => 'required',
        ]);
        if ($request->priceType == "Paid") {
            $this->validate($request, [
                'price' => 'required',
                'discount' => 'required',
            ]);
        }
        $subpack = new Subscriptionpackage();
        $subpack->title = $request->title;
        $subpack->subscriptionType = $request->subscriptionType;
        $subpack->priceType = $request->priceType;
        if ($request->priceType == "Paid") {
            $subpack->price = $request->price;
            $subpack->discount = $request->discount;
        }
        $subpack->details = $request->details;

        $subpack->save();
        return redirect('adminsubscriptionpackage/index');
    }

    public function show(Subscriptionpackage $subpack)
    {
    }

    public function edit($id)
    {
        //
        $subpack = Subscriptionpackage::find($id);
        return view('adminSubPack.edit', compact('subpack'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subscriptionType' => 'required',
            'priceType' => 'required',
            'details' => 'required',
        ]);
        if ($request->priceType == "Paid") {
            $this->validate($request, [
                'price' => 'required',
                'discount' => 'required',
            ]);
        }
        $id = $request->subpackid;
        $subpack = Subscriptionpackage::find($id);
        $subpack->title = $request->title;
        $subpack->subscriptionType = $request->subscriptionType;
        $subpack->priceType = $request->priceType;
        if ($request->priceType == "Paid") {
            $subpack->price = $request->price;
            $subpack->discount = $request->discount;
        }
        $subpack->details = $request->details;
        $subpack->save();
        return redirect('adminsubscriptionpackage/index');
    }

    public function destroy($id)
    {
        $subpack = Subscriptionpackage::find($id);
        $subpack->delete();
        return redirect()->back();
    }

    public function packagedetail($id)
    {
        $subpack = Subscriptionpackage::find($id);
        $details = Subscriptiondetail::where('packageId', '=', $id)->get();
        return view('adminSubPack.subscriptiondetails', \compact('subpack', 'details'));
    }

    public function packagedetailstore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $id = $request->packageId;
        $subddetail = new Subscriptiondetail();
        $subddetail->packageId = $id;
        $subddetail->title = $request->title;
        $subddetail->save();
        return redirect()->back()->with('success', 'Title Added Successfully');
    }

    public function detaildelete($id)
    {
        $subpackdet = Subscriptiondetail::find($id);
        $subpackdet->delete();
        return redirect()->back();
    }
}
