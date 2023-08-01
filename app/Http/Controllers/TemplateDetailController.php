<?php

namespace App\Http\Controllers;

use App\Models\TemplateDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplateDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $tempDetail = TemplateDetail::with(['Template' => function ($query) use ($id) {
            $query->where('id', '=', $id);
        }])->where('templateId', '=', $id)->get();
        return view('adminTemplateDetail.index', \compact('tempDetail'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'icon' => 'required',
            'bottom' => 'required',
            'left' => 'required',
            'height' => 'required',
            'width' => 'required',
            'fontSize' => 'required',
            'textColor' => 'required',
        ]);

        try {
            $id = $request->templateId;
            $template = new TemplateDetail();
            $template->templateId = $id;
            $template->title = $request->title;
            $image = $request->icon;
            $template->icon = time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('templateIcon'), $template->icon);
            $template->bottom = $request->bottom;
            $template->left = $request->left;
            $template->height = $request->height;
            $template->width = $request->width;
            $template->fontSize = $request->fontSize;
            $template->textColor = $request->textColor;
            $template->save();
            return redirect()->back()->with('success', 'Added successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    public function show(TemplateDetail $templateDetail)
    {
        //
    }

    public function edit($id)
    {
        $template = TemplateDetail::find($id);
        return view('adminTemplateDetail.edit', \compact('template'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'bottom' => 'required',
            'left' => 'required',
            'height' => 'required',
            'width' => 'required',
            'fontSize' => 'required',
            'textColor' => 'required',
        ]);

        try {
            $id = $request->templateDetailId;
            $templateId = $request->templateId;
            $template = TemplateDetail::find($id);
            $template->title = $request->title;
            if ($request->icon) {
                $image = $request->icon;
                $template->icon = time() . '.' . $request->icon->extension();
                $request->icon->move(public_path('templateIcon'), $template->icon);
            }
            $template->bottom = $request->bottom;
            $template->left = $request->left;
            $template->height = $request->height;
            $template->width = $request->width;
            $template->fontSize = $request->fontSize;
            $template->textColor = $request->textColor;
            $template->save();
            return redirect()->back()->with('success', 'Update successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    public function destroy($id)
    {
        $template = TemplateDetail::find($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
