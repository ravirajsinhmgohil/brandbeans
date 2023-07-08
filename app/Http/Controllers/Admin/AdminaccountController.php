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
        try {

            // $account = User::role('name', '!=', 'Admin')->get();
            $account = User::whereDoesntHave('roles', function ($q) {
                $q->where('name', 'Admin');
            })->get();
            return view("adminAccount.index", compact('account'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function create()
    {
        try {
            return view("adminAccount.create");
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'loginName' => 'required',
            'password' => 'required',
        ]);

        try {
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
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function show(Account $account)
    {
    }

    public function edit($id)
    {
        try {
            $account = Account::find($id);
            return view('adminAccount.edit', compact('account'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'loginName' => 'required',
            'password' => 'required',
        ]);

        try {
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
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function destroy($id)
    {
        try {
            $account = Account::find($id);
            $account->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        } 
    }
}
