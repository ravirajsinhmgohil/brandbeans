<?php

namespace App\Http\Controllers\Admin;

use App\Models\Templatemaster;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class TemplatemasterController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:templatemaster-list|templatemaster-create|templatemaster-edit|templatemaster-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:templatemaster-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:templatemaster-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:templatemaster-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        try {
            $template = Templatemaster::orderBy('id', 'DESC')->get();
            return view("adminTemplate.index", compact('template'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    public function create()
    {
        try {
            return view("adminTemplate.create");
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required',
        ]);

        try {
            $template = new Templatemaster();
            $image = $request->photo;
            $template->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('templateimages'), $template->photo);
            $template->save();
            return redirect('admintemplatemaster/index');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    public function show(Templatemaster $template)
    {
    }

    public function edit($id)
    {
        try {
            $template = Templatemaster::find($id);
            return view('adminTemplate.edit', compact('template'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }
    public function update(Request $request)
    {

        $this->validate($request, [
            'photo' => 'required',
        ]);

        try {
            $id = $request->templateid;
            $template = Templatemaster::find($id);
            $image = $request->photo;
            $template->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('templateimages'), $template->photo);
            $template->save();
            return redirect('admintemplatemaster/index');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    public function destroy($id)
    {
        try {
            $template = Templatemaster::find($id);
            $template->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }
}
