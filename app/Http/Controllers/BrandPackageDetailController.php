<?php

namespace App\Http\Controllers;

use App\Models\BrandPackageDetail;
use App\Http\Controllers\Controller;
use App\Models\BrandPackage;
use Illuminate\Http\Request;

class BrandPackageDetailController extends Controller
{
    public function index($id)
    {
        $packageDetail = BrandPackageDetail::where('brandPackageId', $id)->get();
        return view('adminBrandPackage.brandPackageDetail.index', \compact('packageDetail'));
    }

    public function pricingView()
    {
        $pricing = BrandPackage::with('brandPackageDetails')->get();
        return view('brand.pricing', \compact('pricing'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'points' => 'required|numeric',
            'details' => 'required',
        ]);

        $package = new BrandPackageDetail();
        $package->brandPackageId = $request->brandPackageId;
        $package->points = $request->points;
        $package->details = $request->details;
        $package->save();
        return redirect()->back()->with('success', 'Package added successfully');
    }

    public function show(BrandPackageDetail $brandPackageDetail)
    {
        //
    }

    public function edit(BrandPackageDetail $brandPackageDetail)
    {
        //
    }

    public function update(Request $request, BrandPackageDetail $brandPackageDetail)
    {
        //
    }

    public function destroy(BrandPackageDetail $brandPackageDetail)
    {
        //
    }
}
