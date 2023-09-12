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
        try {
            $business = Business::join('accounts', 'accounts.id', '=', 'businesses.accountId')
                ->orderBy('id', 'DESC')
                ->get([
                    'businesses.*',
                    'accounts.loginName'
                ]);
            return view("adminBusiness.index", compact('business'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function create()
    {
        try {
            $account = Account::all();
            return view("adminBusiness.create", compact('account'));
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
            'businessName' => 'required',
            'detail1' => 'required',
            'detail2' => 'required',
        ]);

        try {
            $business = new Business();
            $business->accountId = $request->accountId;
            $business->businessName = $request->businessName;
            $business->detail1 = $request->detail1;
            $business->detail2 = $request->detail2;
            $business->save();
            return redirect('adminbusiness/index');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function show(Business $business)
    {
    }

    public function edit($id)
    {
        try {
            $account = Account::all();
            $business = Business::find($id);
            return view('adminBusiness.edit', compact('business', 'account'));
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
            'businessName' => 'required',
            'detail1' => 'required',
            'detail2' => 'required',
        ]);

        try {
            $id = $request->businessid;
            $business = Business::find($id);
            $business->accountId = $request->accountId;
            $business->businessName = $request->businessName;
            $business->detail1 = $request->detail1;
            $business->detail2 = $request->detail2;
            $business->save();
            return redirect('adminbusiness/index');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function destroy($id)
    {
        try {
            $business = Business::find($id);
            $business->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
}
