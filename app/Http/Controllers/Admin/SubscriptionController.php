<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Subscriptionpackage;
use App\Models\User;

class SubscriptionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:subscription-list|subscription-create|subscription-edit|subscription-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:subscription-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:subscription-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:subscription-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $type = $request->type;
        if ($type == 'free') {
            $user = User::where('package', '=', 'FREE')->get();
            return view("adminSubscription.index", compact('user'));
        } else if ($type == 'paid') {
            $paiduser = User::join('razorpays', 'razorpays.user_id', '=', 'users.id')
                ->where('package', '!=', 'FREE')
                ->get(['users.*', 'razorpays.payment_id']);
            return view("adminSubscription.index", compact('paiduser'));
        } else {
            $user = User::where('package', '=', 'FREE')->get();
            return view("adminSubscription.index", compact('user'));
        }
    }

    public function create()
    {
        $account = Account::all();
        $subpack = Subscriptionpackage::all();
        return view("adminSubscription.create", \compact('account', 'subpack'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'accountId' => 'required',
            'subscriptionPackageId' => 'required',
        ]);

        $sub = new Subscription();
        $sub->accountId = $request->accountId;
        $sub->subscriptionPackageId = $request->subscriptionPackageId;
        $sub->save();
        return redirect('adminsubscription/index');
    }

    public function show(Subscription $sub)
    {
    }

    public function edit($id)
    {
        $sub = Subscription::find($id);
        $account = Account::all();
        $subpack = Subscriptionpackage::all();
        return view('adminSubscription.edit', compact('sub', 'account', 'subpack'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'accountId' => 'required',
            'subscriptionPackageId' => 'required',
        ]);
        $id = $request->subid;
        $sub = Subscription::find($id);
        $sub->accountId = $request->accountId;
        $sub->subscriptionPackageId = $request->subscriptionPackageId;

        $sub->save();
        return redirect('adminsubscription/index');
    }

    public function destroy($id)
    {
        $sub = Subscription::find($id);
        $sub->delete();
        return redirect()->back();
    }
}
