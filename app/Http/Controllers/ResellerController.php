<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CardsModels;
use App\Models\Category;
use App\Models\Links;
use App\Models\Passbook;
use App\Models\Payment;
use App\Models\Point;
use App\Models\ResellerPackage;
use App\Models\Subscriptiondetail;
use App\Models\Subscriptionpackage;
use App\Models\User;
use Illuminate\Http\Request;
use Twilio\Rest\Events\V1\SubscriptionPage;
use Auth;
use Illuminate\Support\Facades\Hash;

class ResellerController extends Controller
{
    //
    public function index(Request $request)
    {
        try {
            $reseller = User::whereHas('roles', function ($query) {
                return $query->where('name', '=', 'Reseller');
            })->orderBy('id', 'DESC')->paginate(20);

            return view('reseller.index', compact('reseller'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
        // return view('reseller.index', compact('reseller'));
    }

    public function create()
    {
        try {
            return view('reseller.create');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function store(Request $request)
    {
        $existUser = User::where('mobileno', '=', $request->mobileno)
            ->first();

        if ($existUser) {

            $oldUser = User::find($existUser->id);
            $oldUser->assignRole(['Reseller']);
            $oldUser->save();
            return redirect()->back()
                ->with('success', 'Reseller created successfully');
        } else {

            $this->validate($request, [
                'mobileno' => 'required',
            ]);

            try {
                $new_str = str_replace(' ', '', $request['name']);

                $user = new User();
                $user->mobileno = $request->mobileno;
                $user->password = Hash::make('123456');
                $user->package = "FREE";
                $user->save();


                $user->assignRole(['Reseller', 'User']);
                $type = 'Individual';
                $card = new CardsModels();
                $card->user_id = $user->id;
                $cat = Category::where('name', '=', $type)->first();
                $cat_id = $cat->id;
                $card->category = $cat_id;
                $card->save();

                $payment = new Payment();
                $payment->card_id = $card->id;
                $payment->save();

                $links = new Links();
                $links->card_id  = $card->id;
                $links->phone1  = $request['mobileno'];
                $links->save();

                $id = $user->id;
                $name = $request->name;
                $mycode = $new_str . $name . $id;
                $userUpdate = User::find($id);
                $userUpdate->myrefer = $mycode;
                $userUpdate->save();

                $code = $user->refer;
                if ($code) {

                    $pointableUser = User::where('myrefer', '=', $code)->first();

                    $userPoint = new Point();
                    $userPoint->userId = $pointableUser->id;
                    $userPoint->point = 50;
                    $userPoint->save();
                }

                return redirect()->back()
                    ->with('success', 'Reseller created successfully');
            } catch (\Throwable $th) {
                // throw $th;
                return view('servererror');
                // return view("adminCategory.index", compact('category'));
            }
        }
    }

    public function edit($id)
    {
        try {
            $user = User::find($id);
            // $package = Subscriptionpackage::where('title', '!=', 'FREE')->get();

            return view('reseller.edit', compact('user'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'mobileno' => 'required',
        ]);

        try {

            $id = $request->id;
            $user = User::find($id);
            $user->mobileno = $request->mobileno;
            $user->save();

            return redirect()->back()
                ->with('success', 'Reseller Updated successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            return redirect()->back()
                ->with('success', 'User deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    /* Reseller Side Add User */
    public function userIndex()
    {
        try {
            $reseller = Auth::user();

            $user = User::join('subscriptionpackages', 'subscriptionpackages.title', '=', 'users.package')
                ->where('users.refer', '=', $reseller->myrefer)
                ->orderBy('users.id', 'DESC')
                ->paginate(
                    10,
                    [
                        'users.*',
                        'subscriptionpackages.title',
                        'subscriptionpackages.price',
                        'subscriptionpackages.details'
                    ]
                );

            return view('reseller.user.index', compact('user'));
        } catch (\Throwable $th) {
            throw $th;
            // return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function userCreate()
    {
        try {
            $authId = Auth::user()->id;
            $package = Subscriptionpackage::all();
            $userData = User::where('id', '=', $authId)->get();

            return view('reseller.user.create', compact('package', 'userData'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function userStore(Request $request)
    {
        $this->validate($request, [
            'mobileno' => 'required',
        ]);

        try {
            $new_str = str_replace(' ', '', $request['username']);

            $authId = Auth::user();

            $user = new User();
            $user->mobileno = $request->mobileno;
            $user->refer = $authId->myrefer;
            $user->password = Hash::make('123456');
            $user->package = $request->package;
            $user->save();



            $user->assignRole(['User']);
            $type = 'Individual';
            $card = new CardsModels();
            $card->user_id = $user->id;
            $cat = Category::where('name', '=', $type)->first();
            $cat_id = $cat->id;
            $card->category = $cat_id;
            $card->save();

            $payment = new Payment();
            $payment->card_id = $card->id;
            $payment->save();

            $links = new Links();
            $links->card_id  = $card->id;
            $links->phone1  = $request['mobileno'];
            $links->save();


            $id = $user->id;
            $name = $request->name;
            $mycode = $new_str . $name . $id;
            $userUpdate = User::find($id);
            $userUpdate->myrefer = $mycode;
            $userUpdate->save();

            $code = $user->refer;
            if ($code) {

                $pointableUser = User::where('myrefer', '=', $code)->first();

                $userPoint = new Point();
                $userPoint->userId = $pointableUser->id;
                $userPoint->point = 50;
                $userPoint->save();
            }

            return redirect()->back()
                ->with('success', 'User Created Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function userEdit($id)
    {
        try {
            $user = User::find($id);
            $package = Subscriptionpackage::all();

            return view('reseller.user.edit', compact('user', 'package'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function userUpdate(Request $request)
    {
        $this->validate($request, [
            'mobileno' => 'required',
        ]);

        try {
            $id = $request->userId;
            $authId = Auth::user();

            $user = User::find($id);
            $user->mobileno = $request->mobileno;
            $user->package = $request->package;
            $user->save();

            return redirect()->back()
                ->with('success', 'User Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }


    public function userdestroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return redirect()->back()
                ->with('success', 'User Deleted Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function passbook()
    {
        $passbook  = Passbook::all();
        return view('reseller.passbook', \compact('passbook'));
    }


    public function resellerAddAmount($userId)
    {
        $package = Subscriptionpackage::all();
        return view('reseller.addAmount', \compact('userId', 'package'));
    }
    public function resellerPackageStore(Request $request)
    {
        $userId = $request->userId;
        $packageId = $request->packageId;
        $amount = $request->amount;
        for ($i = 0; $i < count($packageId); $i++) {
            $rePackage = new ResellerPackage();
            $rePackage->userId = $userId;
            $rePackage->packageId = $packageId[$i];
            $rePackage->amount = $amount[$i];
            $rePackage->save();
        }


        return redirect()->back();
    }
}
