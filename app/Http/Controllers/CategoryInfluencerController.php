<?php

namespace App\Http\Controllers;

use App\Models\CategoryInfluencer;
use App\Http\Controllers\Controller;
use App\Models\InfluencerProfile;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryInfluencerController extends Controller
{
    public function index()
    {
        try {
            $influencerCategory = CategoryInfluencer::orderBy('id', 'DESC')->get();

            return view('influencer.category.index', \compact('influencerCategory'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function create()
    {
        try {
            return view('influencer.category.create');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'categoryIcon' => 'required',
        ]);

        try {
            $category = new CategoryInfluencer();
            $category->name = $request->name;
            $category->categoryIcon = time() . '.' . $request->categoryIcon->extension();
            $request->categoryIcon->move(public_path('influencerCategory'), $category->categoryIcon);
            $category->save();

            return redirect('influencer/category/index')->with('success', 'Category Added Successfully..');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function list()
    {
        $influencer = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Influencer');
            }
        )->get();
        return view('influencer.list', \compact('influencer'));
    }
    public function singleView($id)
    {
        $profile = InfluencerProfile::with('profile')
            ->with('incategory')
            ->where('userId', '=', $id)
            ->orderBy('id', 'DESC')
            ->first();
        return view('influencer.listView', \compact('profile'));
    }

    public function edit($id)
    {
        try {
            $category = CategoryInfluencer::find($id);
            return view('influencer.category.edit', \compact('category'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        try {
            $id = $request->influencerCategoryId;
            $category = CategoryInfluencer::find($id);
            $category->name = $request->name;
            if ($request->categoryIcon) {
                $category->categoryIcon = time() . '.' . $request->categoryIcon->extension();
                $request->categoryIcon->move(public_path('influencerCategory'), $category->categoryIcon);
            }
            $category->save();

            return redirect('influencer/category/index')->with('success', 'Category Updated Successfully..');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function destroy($id)
    {
        try {
            CategoryInfluencer::find($id)->delete();
            return redirect('influencer/category/index')->with('success', 'Category deleted Successfully..');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
}
