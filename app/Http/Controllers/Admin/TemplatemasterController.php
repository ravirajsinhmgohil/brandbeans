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
            $template = Templatemaster::all();
            return view("adminTemplate.index", compact('template'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function create()
    {
        try {
            return view("adminTemplate.create");
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
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
            $template->logoLeft = $request->logoLeft;
            $template->logoBottom = $request->logoBottom;
            $template->mobileLeft = $request->mobileLeft;
            $template->mobileBottom = $request->mobileBottom;
            $template->mobileFontsize = $request->mobileFontsize;
            $template->mobileFontfamily = $request->mobileFontfamily;
            $template->webLeft = $request->webLeft;
            $template->webBottom = $request->webBottom;
            $template->webFontsize = $request->webFontsize;
            $template->webFontfamily = $request->webFontfamily;
            $template->emailLeft = $request->emailLeft;
            $template->emailBottom = $request->emailBottom;
            $template->emailFontsize = $request->emailFontsize;
            $template->emailFontfamily = $request->emailFontfamily;
            $template->locationLeft = $request->locationLeft;
            $template->locationBottom = $request->locationBottom;
            $template->locationFontsize = $request->locationFontsize;
            $template->locationFontfamily = $request->locationFontfamily;
            $template->save();
            return redirect('admintemplatemaster/index');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
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
            // return view("adminCategory.index", compact('category'));
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
            $template->logoLeft = $request->logoLeft;
            $template->logoBottom = $request->logoBottom;
            $template->mobileLeft = $request->mobileLeft;
            $template->mobileBottom = $request->mobileBottom;
            $template->mobileFontsize = $request->mobileFontsize;
            $template->mobileFontfamily = $request->mobileFontfamily;
            $template->webLeft = $request->webLeft;
            $template->webBottom = $request->webBottom;
            $template->webFontsize = $request->webFontsize;
            $template->webFontfamily = $request->webFontfamily;
            $template->emailLeft = $request->emailLeft;
            $template->emailBottom = $request->emailBottom;
            $template->emailFontsize = $request->emailFontsize;
            $template->emailFontfamily = $request->emailFontfamily;
            $template->locationLeft = $request->locationLeft;
            $template->locationBottom = $request->locationBottom;
            $template->locationFontsize = $request->locationFontsize;
            $template->locationFontfamily = $request->locationFontfamily;
            $template->save();
            return redirect('admintemplatemaster/index');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
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
            // return view("adminCategory.index", compact('category'));
        }
    }
}
