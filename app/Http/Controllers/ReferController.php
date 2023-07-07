<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferController extends Controller
{
    //
    function index(Request $request)
    {
        $id = Auth::user()->id;

        $refer = User::find($id);
        $refer_code = $refer->myrefer;
        $user = User::where('refer', '=', $refer_code)->get();
        // return $user;


        $type = $request->type;
        if ($type == 'free') {
            $refer_code = $refer->myrefer;
            $user = User::where('refer', '=', $refer_code)
                ->where('package', '=', 'FREE')
                ->get();
            return view('refer.index', \compact('user'));
        } else if ($type == 'paid') {
            $user = User::where('refer', '=', $refer_code)
                ->where('package', '!=', 'FREE')
                ->get();
            return view('refer.index', \compact('user'));
        } else {
            $user = User::where('refer', '=', $refer_code)->get();
            return view('refer.index', \compact('user'));
        }
    }
}
