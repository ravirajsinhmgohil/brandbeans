<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //

    public function create()
    {
        $authid = Auth::User()->id;
        $user = User::find($authid);

        return view('account.account', \compact('user'));
    }
}
