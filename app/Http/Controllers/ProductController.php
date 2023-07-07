<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('product.index', \compact('product'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'points' => 'required',
            'photo' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->points = $request->points;
        $image = $request->photo;
        $product->photo = time() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('product'), $product->photo);

        $product->save();
        return redirect()->back()->with('success', 'Product Add Successfully');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', \compact('product'));
    }

    public function update(Request $request)
    {

        $id = $request->productId;
        $product = Product::find($id);
        $product->name = $request->name;
        $product->points = $request->points;

        $image = $request->photo;
        $product->photo = time() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('product'), $product->photo);

        $product->save();
        return redirect('product/index')->with('success', 'Product Update Successfully');
    }

    public function destory($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
