<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;

class AdminaccountController extends Controller
{
    public function index()
    {
        // $account = User::role('name', '!=', 'Admin')->get();
        $account = User::whereDoesntHave('roles', function ($q) {
            $q->where('name', 'Admin');
        })->get();
        return view("adminAccount.index", compact('account'));
    }

    public function create()
    {
        return view("adminAccount.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'loginName' => 'required',
            'password' => 'required',
        ]);

        $account = new Account();
        $account->loginName = $request->loginName;
        $account->password = $request->password;

        if ($request->isCompany) {
            $account->isCompany = "yes";
        } else {
            $account->isCompany = "no";
        }
        $account->save();
        return redirect('adminAccount/index');
    }

    public function show(Account $account)
    {
    }

    public function edit($id)
    {
        //
        $account = Account::find($id);
        return view('adminAccount.edit', compact('account'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'loginName' => 'required',
            'password' => 'required',
        ]);
        $id = $request->accountid;
        $account = Account::find($id);
        $account->loginName = $request->loginName;
        $account->password = $request->password;

        if ($request->isCompany) {
            $account->isCompany = "yes";
        } else {
            $account->isCompany = "no";
        }
        $account->save();
        return redirect('adminAccount/index');
    }

    public function destroy($id)
    {
        $account = Account::find($id);
        $account->delete();
        return redirect()->back();
    }
}
