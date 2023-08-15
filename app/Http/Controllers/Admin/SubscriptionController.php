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
        try {
            $type = $request->type;
            if ($type == 'free') {
                $user = User::where('package', '=', 'FREE')->orderBy('id', 'DESC')->get();
                return view("adminSubscription.index", compact('user'));
            } else if ($type == 'paid') {
                // $paiduser = User::join('razorpays', 'razorpays.user_id', '=', 'users.id')
                //     ->where('package', '!=', 'FREE')
                //     ->get(['users.*', 'razorpays.payment_id']);
                $paiduser = User::with('razor')->orderBy('id', 'DESC')->where('package', '!=', 'FREE')->get();
                return view("adminSubscription.index", compact('paiduser'));
            } else {
                $user = User::where('package', '=', 'FREE')->orderBy('id', 'DESC')->get();
                return view("adminSubscription.index", compact('user'));
            }
        } catch (\Throwable $th) {
            throw $th;
            // return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
    public function updateStatus(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user status based on the current status
        $user->status = $user->status === 'Active' ? 'Inactive' : 'Active';

        // Save the changes to the database
        $user->save();

        // Redirect back to the previous page (or any other response)
        return back()->with('success', 'User status updated successfully.');
    }

    public function create()
    {
        try {
            $account = Account::all();
            $subpack = Subscriptionpackage::all();
            return view("adminSubscription.create", \compact('account', 'subpack'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'accountId' => 'required',
            'subscriptionPackageId' => 'required',
        ]);

        try {
            $sub = new Subscription();
            $sub->accountId = $request->accountId;
            $sub->subscriptionPackageId = $request->subscriptionPackageId;
            $sub->save();
            return redirect('adminsubscription/index');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function show(Subscription $sub)
    {
    }

    public function edit($id)
    {
        try {
            $sub = Subscription::find($id);
            $account = Account::all();
            $subpack = Subscriptionpackage::all();
            return view('adminSubscription.edit', compact('sub', 'account', 'subpack'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'accountId' => 'required',
            'subscriptionPackageId' => 'required',
        ]);

        try {
            $id = $request->subid;
            $sub = Subscription::find($id);
            $sub->accountId = $request->accountId;
            $sub->subscriptionPackageId = $request->subscriptionPackageId;

            $sub->save();
            return redirect('adminsubscription/index');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function destroy($id)
    {
        try {
            $sub = Subscription::find($id);
            $sub->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
}
