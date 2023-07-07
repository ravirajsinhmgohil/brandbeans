<?php

namespace App\Http\Controllers;

use App\Models\Typedetail;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypedetailRequest;
use App\Http\Requests\UpdateTypedetailRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypedetailController extends Controller
{

    public function index()
    {
        $typedetail = Typedetail::join('types', 'types.id', '=', 'typedetails.typeId')->get(['typedetails.*', 'types.title']);
        return view('typedetail.index', compact('typedetail'));
    }

    public function create()
    {
        $type  = Type::all();
        return view('typedetail.create', compact('type'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'typeId' => 'required',
            'photo' => 'required',
            'photoHeight' => 'required',
            'photoWidth' => 'required',
            'message' => 'required',
            'messageTop' => 'required',
            'messageBottom' => 'required',
            'messageColor' => 'required',
            'messageFontFamily' => 'required',
            'messageFontSize' => 'required',
            'poster' => 'required',
            'posterHeight' => 'required',
            'posterWidth' => 'required',
        ]);

        $type = new Typedetail();
        $type->typeId = $request->typeId;
        $image = $request->photo;
        $type->photo = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('typedetailphoto'), $type->photo);
        $type->photoHeight = $request->photoHeight;
        $type->photoWidth = $request->photoWidth;
        $type->message = $request->message;
        $type->messageTop = $request->messageTop;
        $type->messageBottom = $request->messageBottom;
        $type->messageColor = $request->messageColor;
        $type->messageFontFamily = $request->messageFontFamily;
        $type->messageFontSize = $request->messageFontSize;
        $image = $request->poster;
        $type->poster = time() . '.' . $request->poster->extension();
        $request->poster->move(public_path('typedetailposter'), $type->poster);
        $type->posterHeight = $request->posterHeight;
        $type->posterWidth = $request->posterWidth;
        $type->save();

        return redirect('typedetail/index')->with('success', 'Detail Added Successfully');
    }

    public function edit($id)
    {
        $type = Type::all();
        $typedetail = Typedetail::find($id);
        return view('typedetail.edit', compact('type', 'typedetail'));
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'photoHeight' => 'required',
            'photoWidth' => 'required',
            'message' => 'required',
            'messageTop' => 'required',
            'messageBottom' => 'required',
            'messageColor' => 'required',
            'messageFontFamily' => 'required',
            'messageFontSize' => 'required',
            'posterHeight' => 'required',
            'posterWidth' => 'required',
        ]);
        $id = $request->typedetailId;
        $type =  Typedetail::find($id);
        if ($request->photo) {
            $image = $request->photo;
            $type->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('typedetailphoto'), $type->photo);
        }
        $type->photoHeight = $request->photoHeight;
        $type->photoWidth = $request->photoWidth;
        $type->message = $request->message;
        $type->messageTop = $request->messageTop;
        $type->messageBottom = $request->messageBottom;
        $type->messageColor = $request->messageColor;
        $type->messageFontFamily = $request->messageFontFamily;
        $type->messageFontSize = $request->messageFontSize;
        if ($request->poster) {
            $image = $request->poster;
            $type->poster = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('typedetailposter'), $type->poster);
        }
        $type->posterHeight = $request->posterHeight;
        $type->posterWidth = $request->posterWidth;
        $type->save();

        return redirect('typedetail/index')->with('success', 'Detail Updated Successfully');
    }



    public function destroy($id)
    {
        $data = Typedetail::find($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
