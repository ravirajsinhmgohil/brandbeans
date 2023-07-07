<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index()
    {
        $type = Type::all();
        return view('type.index', compact('type'));
    }

    public function create()
    {
        return view('type.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $type = new Type();
        $type->title = $request->title;
        $type->save();

        return redirect('type/index')->with('success', 'Type Created Successfully');
    }

    public function edit($id)
    {
        $type = Type::find($id);
        return view('type.edit', \compact('type'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $id = $request->typeId;
        $type =  Type::find($id);
        $type->title = $request->title;
        $type->save();

        return redirect('type/index')->with('success', 'Type Created Successfully');
    }

    public function destroy($id)
    {
        $type = Type::find($id)->delete();

        return redirect()->back()->with('success', 'Delete Successfully');
    }
}
