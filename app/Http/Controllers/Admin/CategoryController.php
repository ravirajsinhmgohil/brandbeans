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
        try {
            //code...
            $category = Category::all();
            return view("adminCategory.indx", compact('category'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('https://www.google.com/search?q=cabcbdc&sxsrf=AB5stBhUfMiaRBULFBXIh6cIBfAeUYsPgw%3A1688728121594&source=hp&ei=OfKnZPyeIeDL2roPjfOb0AY&iflsig=AD69kcEAAAAAZKgASQEwvWn_7u11_Gt3yB7tMuFfjIDg&ved=0ahUKEwi8n7q-uvz_AhXgpVYBHY35BmoQ4dUDCAk&uact=5&oq=cabcbdc&gs_lcp=Cgdnd3Mtd2l6EAMyBwgAEA0QgAQyBwgAEA0QgAQyBwgAEA0QgAQyBwgAEA0QgAQyBwgAEA0QgAQyBwgAEA0QgAQyBwgAEA0QgAQyBwgAEA0QgAQyBwgAEA0QgAQyBwgAEA0QgAQ6BwgjEOoCECc6BAgjECc6BwgjEIoFECc6CAgAEIoFEJECOgsIABCABBCxAxCDAToRCC4QgAQQsQMQgwEQxwEQ0QM6CAgAEIAEELEDOgsILhCABBCxAxCDAToFCAAQgAQ6EAgAEIAEELEDELEDELEDEAo6DQgAEIAEELEDEIMBEAo6CggAEIAEELEDEAo6BwgAEIAEEAo6DQguEIAEEMcBENEDEAo6BwguEIAEEAo6CQgAEA0QgAQQClD-A1iSB2CUCWgBcAB4AIAB5gGIAcoJkgEFMC42LjGYAQCgAQGwAQo&sclient=gws-wiz');
            // return view("adminCategory.index", compact('category'));
        }
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
