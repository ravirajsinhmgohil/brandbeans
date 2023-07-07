<?php

namespace App\Http\Controllers\Admin;


use App\Models\Accountpost;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Business;
use App\Models\CardsModels;
use App\Models\Media;
use App\Models\Mymedia;
use App\Models\User;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\DB;

class AccountpostController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:accountpost-list|accountpost-create|accountpost-edit|accountpost-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:accountpost-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:accountpost-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:accountpost-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {

        $type = $request->type;
        if ($type == 'Free') {
            $user = User::where('package', '=', 'FREE')->orderBy('id', 'DESC')->paginate(10);
        } else if ($type == 'Paid') {
            $user = User::where('package', '=', 'SILVER')->orderBy('id', 'DESC')->paginate(10);
        } else {
            $user = User::orderBy('id', 'DESC')->paginate(10);
        }
        return view("adminAccountPost.index", compact('user'));
    }

    public function create()
    {
        $account = Account::all();
        $business = Business::all();
        $media = Media::all();
        return view("adminAccountPost.create", \compact('account', 'business', 'media'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'accountId' => 'required',
            'businessId' => 'required',
            'mediaId' => 'required',
        ]);

        $accountpost = new Accountpost();
        $accountpost->accountId = $request->accountId;
        $accountpost->businessId = $request->businessId;
        $accountpost->mediaId = $request->mediaId;
        $accountpost->save();
        return redirect('accountpost/index');
    }

    public function show($id)
    {
        $user = User::find($id);

        $card = CardsModels::join('admincategories', 'admincategories.id', '=', 'cards.category')
            ->where('user_id', '=', $id)
            ->first(['cards.*', 'admincategories.name as categoryName']);

        $totalDownload = Mymedia::where('userId', '=', $id)->count();
        $media = Mymedia::select('date', DB::raw('count(*) as total'))
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->where('userId', '=', $id)
            ->get();
        // $media = Mymedia::orderBy('date')->get();
        return view('adminAccountPost.show', \compact('user', 'card', 'media', 'totalDownload'));
    }

    public function edit($id)
    {
        $accountpost = Accountpost::find($id);
        $account = Account::all();
        $business = Business::all();
        $media = Media::all();
        return view('adminAccountPost.edit', compact('accountpost', 'account', 'business', 'media'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'accountId' => 'required',
            'businessId' => 'required',
            'mediaId' => 'required',
        ]);
        $id = $request->accountpostid;
        $accountpost = Accountpost::find($id);
        $accountpost->accountId = $request->accountId;
        $accountpost->businessId = $request->businessId;
        $accountpost->mediaId = $request->mediaId;
        $accountpost->save();
        return redirect('accountpost/index');
    }

    public function destroy($id)
    {
        $accountpost = Accountpost::find($id);
        $accountpost->delete();
        return redirect()->back();
    }
}
