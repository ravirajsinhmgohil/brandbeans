<?php

namespace App\Http\Controllers;

use App\Models\UserTemplateMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTemplateMasterController extends Controller
{
    public function index()
    {

        try {
            $userTemplateMaster = UserTemplateMaster::all();
            return view('UserTemplate.index', compact('userTemplateMaster'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function create()
    {
        try {
            return view('UserTemplate.create');
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
            $template = new UserTemplateMaster();
            $template->userId = Auth::user()->id;
            $image = $request->photo;
            $template->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('userTemplateImages'), $template->photo);
            $template->save();
            return redirect()->back()->with('success', 'template created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function edit($id)
    {
        try {
            $userTemplateMaster = UserTemplateMaster::find($id);
            return view('UserTemplate.edit', compact('userTemplateMaster'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function update(Request $request)
    {
        try {
            return redirect()->back()->with('success', 'template Updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function destroy($id)
    {
        try {
            $userTemplateMaster = UserTemplateMaster::find($id);
            $userTemplateMaster->delete();
            return redirect()->back()->with('success', 'template deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
