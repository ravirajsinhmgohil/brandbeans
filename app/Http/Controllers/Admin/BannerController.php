<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:banner-list|banner-create|banner-edit|banner-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:banner-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:banner-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:banner-delete', ['only' => ['destroy']]);
    }
    function index()
    {
        try {
            $banner = Banner::orderBy('id', 'DESC')->get();
            return view('banner.index', \compact('banner'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
    function create()
    {
        try {
            return view('banner.create');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
    function store(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required',
            'sequence' => 'required',
        ]);

        try {
            $banner = new Banner();

            $image = $request->photo;
            $banner->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('bannerphoto'), $banner->photo);
            $banner->sequence = $request->sequence;
            $banner->save();
            return redirect('banner/index')->with('success', 'Banner Inserted Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
    function destory($id)
    {
        try {
            $banner = Banner::find($id);
            $banner->delete();
            return redirect('banner/index')->with('success', 'Banner Deleted Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
}
