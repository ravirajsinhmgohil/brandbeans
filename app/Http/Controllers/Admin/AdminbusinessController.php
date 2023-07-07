<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Business;
use Illuminate\Http\Request;

class AdminbusinessController extends Controller
{
    public function index()
    {
        $business = Business::join('accounts', 'accounts.id', '=', 'businesses.accountId')
            ->get([
                'businesses.*',
                'accounts.loginName'
            ]);
        return view("adminBusiness.index", compact('business'));
    }

    public function create()
    {
        $account = Account::all();
        return view("adminBusiness.create", compact('account'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'accountId' => 'required',
            'businessName' => 'required',
            'detail1' => 'required',
            'detail2' => 'required',
        ]);

        $business = new Business();
        $business->accountId = $request->accountId;
        $business->businessName = $request->businessName;
        $business->detail1 = $request->detail1;
        $business->detail2 = $request->detail2;
        $business->save();
        return redirect('adminbusiness/index');
    }

    public function show(Business $business)
    {
    }

    public function edit($id)
    {
        $account = Account::all();
        $business = Business::find($id);
        return view('adminBusiness.edit', compact('business', 'account'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'accountId' => 'required',
            'businessName' => 'required',
            'detail1' => 'required',
            'detail2' => 'required',
        ]);
        $id = $request->businessid;
        $business = Business::find($id);
        $business->accountId = $request->accountId;
        $business->businessName = $request->businessName;
        $business->detail1 = $request->detail1;
        $business->detail2 = $request->detail2;
        $business->save();
        return redirect('adminbusiness/index');
    }

    public function destroy($id)
    {
        $business = Business::find($id);
        $business->delete();
        return redirect()->back();
    }
}
