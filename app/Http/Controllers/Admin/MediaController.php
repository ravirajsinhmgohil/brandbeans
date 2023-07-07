<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Mymedia;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MediaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:media-list|media-create|media-edit|media-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:media-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:media-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:media-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $category = Category::all();
        $submit = $request->submit;
        $name = $request->category;
        if (isset($name)) {
            // return "hehre";

            $media = Media::join('admincategories', 'admincategories.id', '=', 'media.category')
                ->where('admincategories.name', '=', $name)
                ->paginate(10, ['media.*', 'admincategories.name']);
        } else {
            $media = Media::join('admincategories', 'admincategories.id', '=', 'media.category')
                ->paginate(10, ['media.*', 'admincategories.name']);
        }
        return view("adminMedia.index", compact('media', 'category'));
    }


    public function create()
    {
        $category = Category::select('id', 'name')->get();
        return view("adminMedia.create", \compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'mediaType' => 'required',
            'category' => 'required',
            'sourcePath' => 'required',
            'title' => 'required',
            'previewPath' => 'required',
        ]);

        if ($request->mediaType == "Video")
            $this->validate($request, [
                'sourcePath' => 'required|file|mimetypes:video/mp4',
            ]);

        $media = new Media();
        $media->mediaType = $request->mediaType;
        $media->category = $request->category;

        $media->startDate = $request->startDate;
        if ($request->endDate) {
            $media->endDate = $request->endDate;
        } else {
            $date1 = Carbon::now();
            $date1 = $date1->addDays(1)->toDateString();
            $media->endDate = $date1;
        }

        $image = $request->sourcePath;
        $media->sourcePath = time() . '.' . $request->sourcePath->extension();
        $request->sourcePath->move(public_path('mediasourceimg'), $media->sourcePath);

        $media->title = $request->title;
        $media->sequence = $request->sequence;

        $image = $request->previewPath;
        $media->previewPath = time() . '.' . $request->previewPath->extension();
        $request->previewPath->move(public_path('mediapreviewimg'), $media->previewPath);

        if ($request->isPremium) {
            $media->isPremium = "yes";
        } else {
            $media->isPremium = "no";
        }
        $media->save();
        return redirect('adminMedia/index');
    }

    public function show(Media $media)
    {
    }

    public function edit($id)
    {
        $media = Media::find($id);
        $category = Category::all();
        return view('adminMedia.edit', compact('media', 'category'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'mediaType' => 'required',
            'category' => 'required',
            'title' => 'required',

        ]);
        $id = $request->mediaid;
        $media = Media::find($id);
        $media->mediaType = $request->mediaType;
        $media->category = $request->category;
        if ($request->sourcePath) {
            $image = $request->sourcePath;
            $media->sourcePath = time() . '.' . $request->sourcePath->extension();
            $request->sourcePath->move(public_path('mediasourceimg'), $media->sourcePath);
        }
        $media->title = $request->title;
        $media->sequence = $request->sequence;
        $media->startDate = $request->startDate;
        if ($request->endDate) {
            $media->endDate = $request->endDate;
        } else {
            $date1 = Carbon::now();
            $date1 = $date1->addDays(1)->toDateString();
            $media->endDate = $date1;
        }
        if ($request->previewPath) {
            $image = $request->previewPath;
            $media->previewPath = time() . '.' . $request->previewPath->extension();
            $request->previewPath->move(public_path('mediapreviewimg'), $media->previewPath);
        }

        if ($request->isPremium) {
            $media->isPremium = "yes";
        } else {
            $media->isPremium = "no";
        }
        $media->save();
        return redirect('adminMedia/index');
    }

    public function destroy($id)
    {
        $media = Media::find($id);
        $media->delete();
        return redirect()->back();
    }

    public function downloads(Request $request)
    {

        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $submit = $request->submit;
        $date = Carbon::now()->toDateString();
        // return [$startDate, $endDate];
        if (isset($startDate) || isset($endDate)) {
            $mymedia = Mymedia::join('admincategories', 'admincategories.id', '=', 'mymedia.categoryId')
                ->join('users', 'users.id', '=', 'mymedia.userId')
                ->whereBetween('mymedia.date', [$startDate, $endDate])
                ->get(['mymedia.*', 'admincategories.name as categoryname', 'users.name as username']);
        } else {
            // return $date;
            $mymedia = Mymedia::join('admincategories', 'admincategories.id', '=', 'mymedia.categoryId')
                ->join('users', 'users.id', '=', 'mymedia.userId')
                ->where('mymedia.date', '=', $date)
                ->get(['mymedia.*', 'admincategories.name as categoryname', 'users.name as username']);
        }

        return view('adminMedia.downloads', \compact('mymedia'));
    }
}
