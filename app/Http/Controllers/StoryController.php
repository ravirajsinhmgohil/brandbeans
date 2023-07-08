<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $story = Story::all();
            return view('story.index', compact('story'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('story.create');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'required',
            'description' => 'required',
        ]);

        try {
            $userId = Auth::user()->id;

            $story = new Story();
            $story->userId = $userId;
            $story->title = $request->title;
            $story->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('storyImg'), $story->photo);
            $story->description = $request->description;
            $story->save();
            return redirect()->back()->with('success', 'story added successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $story = Story::find($id);
            return view('story.edit', compact('story'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoryRequest  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        try {
            $id = $request->storyId;
            $story = Story::find($id);
            $story->title = $request->title;
            if ($request->photo) {
                $story->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('storyImg'), $story->photo);
            }
            $story->description = $request->description;
            $story->save();
            return redirect()->back()->with('success', 'story updated successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            $story = Story::find($id)->delete();
            return redirect()->back()->with('success', 'story deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
}
