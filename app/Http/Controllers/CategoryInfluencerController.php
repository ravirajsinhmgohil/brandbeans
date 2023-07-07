<?php

namespace App\Http\Controllers;

use App\Models\CategoryInfluencer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryInfluencerController extends Controller
{
    public function index()
    {
        $influencerCategory = CategoryInfluencer::all();
        return view('influencer.category.index', \compact('influencerCategory'));
    }

    public function create()
    {
        return view('influencer.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'categoryIcon' => 'required',
        ]);

        $category = new CategoryInfluencer();
        $category->name = $request->name;
        $category->categoryIcon = time() . '.' . $request->categoryIcon->extension();
        $request->categoryIcon->move(public_path('influencerCategory'), $category->categoryIcon);
        $category->save();

        return redirect('influencer/category/index')->with('success', 'Category Added Successfully..');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $category = CategoryInfluencer::find($id);
        return view('influencer.category.edit', \compact('category'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $id = $request->influencerCategoryId;
        $category = CategoryInfluencer::find($id);
        $category->name = $request->name;
        if ($request->categoryIcon) {
            $category->categoryIcon = time() . '.' . $request->categoryIcon->extension();
            $request->categoryIcon->move(public_path('influencerCategory'), $category->categoryIcon);
        }
        $category->save();

        return redirect('influencer/category/index')->with('success', 'Category Updated Successfully..');
    }

    public function destroy($id)
    {
        CategoryInfluencer::find($id)->delete();
        return redirect('influencer/category/index')->with('success', 'Category deleted Successfully..');
    }
}
