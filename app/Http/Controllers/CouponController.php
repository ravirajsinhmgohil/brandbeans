<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Http\Controllers\Controller;
use App\Models\Subscriptionpackage;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        try {
            $coupon = Coupon::with('package')->orderBy('id', 'DESC')->get();
            return view('coupon.index', \compact('coupon'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function create()
    {
        try {
            $package = Subscriptionpackage::where('title', '!=', 'FREE')->get();
            return view('coupon.create', \compact('package'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'couponCode' => 'required',
            'discount' => 'required',
            'validUpto' => 'required',
            'couponFor' => 'required',
        ]);

        try {
            $coupon = new Coupon();
            $coupon->title = $request->title;
            $coupon->couponCode = $request->couponCode;
            $coupon->discount = $request->discount;
            $coupon->validUpto = $request->validUpto;
            $coupon->couponFor = $request->couponFor;
            $coupon->save();

            return redirect('coupon/index')->with('success', 'Coupon Added Successfully..');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function show(Coupon $coupon)
    {
        //
    }

    public function edit(Coupon $coupon)
    {
        //
    }

    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    public function delete($id)
    {
        try {
            $coupon = Coupon::find($id)->delete();
            return redirect('coupon/index')->with('success', 'Coupon Delete Successfully..');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
}
