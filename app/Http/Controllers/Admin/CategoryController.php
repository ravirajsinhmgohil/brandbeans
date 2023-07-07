<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $category = Category::all();
        return view("adminCategory.index", compact('category'));
    }

    public function create()
    {
        return view("adminCategory.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        if ($request->iconPath) {
            $image = $request->iconPath;
            $category->iconPath = time() . '.' . $request->iconPath->extension();
            $request->iconPath->move(public_path('categoryimg'), $category->iconPath);
        }
        if ($request->type) {
            if ($request->type == "isFestival") {
                $category->isFestival = "yes";
                $category->startDate = $request->startDate;
                $category->endDate = $request->endDate;
                $category->isBusiness = "no";
            } else {
                $category->isBusiness = "yes";
                $category->isFestival = "no";
            }
        }

        $category->sequence = $request->sequence;
        $category->save();
        return redirect('admincategory/index');
    }

    public function show(Category $category)
    {
    }

    public function edit($id)
    {
        //
        $category = Category::find($id);
        return view('adminCategory.edit', compact('category'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $id = $request->id;
        $category = Category::find($id);
        $category->name = $request->name;
        if ($request->iconPath) {
            $image = $request->iconPath;
            $category->iconPath = time() . '.' . $request->iconPath->extension();
            $request->iconPath->move(public_path('categoryimg'), $category->iconPath);
        }
        if ($request->type) {
            if ($request->type == "isFestival") {
                $category->isFestival = "yes";
                $category->startDate = $request->startDate;
                $category->endDate = $request->endDate;
                $category->isBusiness = "no";
            } else {
                $category->isBusiness = "yes";
                $category->isFestival = "no";
            }
        }
        $category->sequence = $request->sequence;
        $category->save();
        return redirect('admincategory/index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
