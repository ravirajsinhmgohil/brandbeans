<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CardsModels;
use App\Models\Category;
use App\Models\Links;
use App\Models\Payment;
use App\Models\Point;
use App\Models\Subscriptionpackage;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Twilio\Rest\Events\V1\SubscriptionPage;
use Auth;

class ResellerController extends Controller
{
    //
    public function index(Request $request)
    {
        try {
            $reseller = User::whereHas('roles', function ($query) {
                return $query->where('name', '=', 'Reseller');
            })->orderBy('id', 'DESC')->paginate(5);
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
        $this->validate($request, [
            'name' => 'required',
            'userName' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'mobileno' => 'required',
        ]);

        try {
            $new_str = str_replace(' ', '', $request['username']);

            $user = new User();
            $user->name = $request->name;
            $user->userName = $request->userName;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->pin = $request->pin;
            $user->mobileno = $request->mobileno;
            $user->pin = $request->pin;
            $profilePhoto = $request->profilePhoto;
            if ($request->profilePhoto) {
                $user->profilePhoto = time() . '.' . $request->profilePhoto->extension();
                $request->profilePhoto->move(public_path('profilePhoto'),  $user->profilePhoto);
            }
            $user->package = "FREE";
            $user->save();


            $user->assignRole(['Reseller', 'User']);
            if ($request['type'] ==  'Individual') {
                $card = new CardsModels();
                $card->user_id = $user->id;
                $card->name = $user->name;
                $type = $request['type'];
                $cat = Category::where('name', '=', $type)->get();
                $cat_id = $cat[0]->id;
                $card->category = $cat_id;
                $card->save();
            } else {
                if ($request['category'] == 'other') {
                    $category = new Category();
                    $category->name = $request['categoryname'];
                    $category->iconPath = "default.jpg";
                    $category->isBusiness = "yes";
                    $category->save();

                    $card = new CardsModels();
                    $card->user_id = $user->id;
                    $card->name = $user->name;
                    $card->category = $category->id;
                    $card->save();
                } else {
                    $card = new CardsModels();
                    $card->user_id = $user->id;
                    $card->name = $user->name;
                    $card->category = $request['category'];
                    $card->save();
                }
            }
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

            return redirect()->route('reseller.index')
                ->with('success', 'Reseller created successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
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
            'name' => 'required',
            'userName' => 'required',
            'mobileno' => 'required',
        ]);

        try {
            $new_str = str_replace(' ', '', $request['username']);

            $id = $request->id;
            $user = User::find($id);
            $user->name = $request->name;
            $user->userName = $request->userName;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->pin = $request->pin;
            $user->mobileno = $request->mobileno;
            $user->pin = $request->pin;
            $profilePhoto = $request->profilePhoto;
            if ($request->profilePhoto) {
                $user->profilePhoto = time() . '.' . $request->profilePhoto->extension();
                $request->profilePhoto->move(public_path('profilePhoto'),  $user->profilePhoto);
            }
            $user->package = "FREE";
            $user->save();

            return redirect()->route('reseller.index')
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
            return redirect()->route('users.index')
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

            $user = User::where('refer', '=', $reseller->myrefer)
                ->orderBy('id', 'DESC')->paginate(5);

            return view('reseller.user.index', compact('user'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function userCreate()
    {
        try {
            $authId = Auth::user()->id;
            $package = Subscriptionpackage::where('title', '!=', 'FREE')->get();
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
            'name' => 'required',
            'userName' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'mobileno' => 'required',
        ]);

        try {
            $new_str = str_replace(' ', '', $request['username']);

            $authId = Auth::user()->id;
            $userData = User::where('id', '=', $authId)->first();

            $user = new User();
            $user->name = $request->name;
            $user->userName = $request->userName;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->pin = $request->pin;
            $user->mobileno = $request->mobileno;
            $user->pin = $request->pin;
            $profilePhoto = $request->profilePhoto;
            if ($request->profilePhoto) {
                $user->profilePhoto = time() . '.' . $request->profilePhoto->extension();
                $request->profilePhoto->move(public_path('profilePhoto'),  $user->profilePhoto);
            }
            $user->package = $request->package;
            $user->refer = $userData->myrefer;
            // return $user;

            $user->save();


            $user->assignRole(['User']);
            if ($request['type'] ==  'Individual') {
                $card = new CardsModels();
                $card->user_id = $user->id;
                $card->name = $user->name;
                $type = $request['type'];
                $cat = Category::where('name', '=', $type)->get();
                $cat_id = $cat[0]->id;
                $card->category = $cat_id;
                $card->save();
            } else {
                if ($request['category'] == 'other') {
                    $category = new Category();
                    $category->name = $request['categoryname'];
                    $category->iconPath = "default.jpg";
                    $category->isBusiness = "yes";
                    $category->save();

                    $card = new CardsModels();
                    $card->user_id = $user->id;
                    $card->name = $user->name;
                    $card->category = $category->id;
                    $card->save();
                } else {
                    $card = new CardsModels();
                    $card->user_id = $user->id;
                    $card->name = $user->name;
                    $card->category = $request['category'];
                    $card->save();
                }
            }
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

            return redirect('reseller/user/index')
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
            $package = Subscriptionpackage::where('title', '!=', 'FREE')->get();

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
            'name' => 'required',
            'userName' => 'required',
            'mobileno' => 'required',
        ]);

        try {
            $new_str = str_replace(' ', '', $request['username']);
            $id = $request->id;

            $authId = Auth::user()->id;
            $userData = User::where('id', '=', $authId)->first();

            $user = User::find($id);
            $user->name = $request->name;
            $user->userName = $request->userName;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->pin = $request->pin;
            $user->mobileno = $request->mobileno;
            $user->pin = $request->pin;
            $image = $request->profilePhoto;
            if ($request->profilePhoto) {
                $user->profilePhoto = time() . '.' . $request->profilePhoto->extension();
                $request->profilePhoto->move(public_path('profilePhoto'),  $user->profilePhoto);
            }
            $user->package = $request->package;
            $user->refer = $userData->myrefer;

            $user->save();

            return redirect('reseller/user/index')
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
            User::find($id)->delete();
            return redirect()->route('reseller.user.index')
                ->with('success', 'User Deleted Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
}
