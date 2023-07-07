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

class ResellerController extends Controller
{
    //
    public function index(Request $request)
    {

        $reseller = User::whereHas('roles', function ($query) {
            return $query->where('name', '=', 'Reseller');
        })->orderBy('id', 'DESC')->paginate(5);
        return view('reseller.index', compact('reseller'));

        // return view('reseller.index', compact('reseller'));
    }

    public function create()
    {

        return view('reseller.create');
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

        $new_str = str_replace(' ', '', $request['username']);

        $user = new User();
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
            $request->profilePhoto->move(public_path('gallery'),  $user->profilePhoto);
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
        $mycode = $new_str . $id;
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
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    /* Reseller Side Add User */
    public function userIndex()
    {
        $user = User::whereHas('roles', function ($query) {
            return $query->where('name', '=', 'User');
        })->orderBy('id', 'DESC')->paginate(5);
        return view('reseller.user.index', compact('user'));
    }

    public function userCreate()
    {
        $package = Subscriptionpackage::where('title', '!=', 'FREE')->get();
        return view('reseller.user.create', compact('package'));
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
        $new_str = str_replace(' ', '', $request['username']);
        $id = $user->id;
        $mycode = $new_str . $id;

        $user = new User();
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
        $user->refer = $request->mycode;

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
        $mycode = $new_str . $id;
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
    }

    public function userEdit($id)
    {
        $user = User::find($id);
        $package = Subscriptionpackage::where('title', '!=', 'FREE')->get();

        return view('reseller.user.edit', compact('user', 'package'));
    }

    public function userUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'userName' => 'required',
            'mobileno' => 'required',
        ]);

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
        $image = $request->profilePhoto;
        if ($request->profilePhoto) {
            $user->profilePhoto = time() . '.' . $request->profilePhoto->extension();
            $request->profilePhoto->move(public_path('profilePhoto'),  $user->profilePhoto);
        }
        $user->package = $request->package;
        $user->save();

        return redirect('reseller/user/index')
            ->with('success', 'User Updated Successfully');
    }


    public function userdestroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('reseller.user.index')
            ->with('success', 'User Deleted Successfully');
    }
}
