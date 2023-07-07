<?php

namespace App\Http\Controllers;

use App\Models\Influencer;
use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Campaign;
use App\Models\CardsModels;
use App\Models\Category;
use App\Models\CategoryInfluencer;
use App\Models\CheckApply;
use App\Models\InfluencerPortfolio;
use App\Models\InfluencerProfile;
use App\Models\Links;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InfluencerController extends Controller
{
    public function influencerProfile()
    {
        $id = Auth::user()->id;
        $profile = InfluencerProfile::with('profile')->with('category')->where('userId', '=', $id)->first();
        return view('influencer.influencerProfile.index', \compact('profile'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function brands()
    {
        $brand = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Brand');
            }
        )->with('brand')->get();

        return view('influencer.brandView.index', \compact('brand'));
    }

    public function campaigns($id)
    {
        $userId = Auth::user()->id;
        $campaign = Campaign::where('userId', '=', $id)->get();
        foreach ($campaign as $campaignId) {
            $campaignCountData = Apply::where('userId', '=', $userId)
                ->where('campaignId', '=', $campaignId->id)
                ->get()
                ->count();
            $campaignCount = $campaignCountData;
        }

        return view('influencer.campaignView.index', \compact('campaign', 'campaignCount'));
    }

    public function campaignApply(Request $request)
    {
        $userId = Auth::user()->id;
        $apply = new Apply();
        $apply->campaignId = $request->campaignId;
        $apply->userId = $userId;
        $apply->save();

        return redirect()->back()->with('success', 'Applied Successfully');
    }

    public function campaignApplyList(Request $request)
    {
        $userId = Auth::user()->id;

        $campaignList = Apply::with('campaign')->where('userId', '=', $userId)->get();
        // $campaignList = Apply::join('campaigns', 'campaigns.id', '=', 'applies.campaignId')
        //     ->where('applies.userId', '=', $userId)
        //     ->get();

        return view('influencer.campaignView.show', \compact('campaignList'));
    }


    // brand Applied list and code
    public function appliersCreate($campaignId, $userId)
    {
        $appliers = Apply::with(['campaign' => function ($query) use ($userId) {
            $query->where('userId', '=', $userId);
        }])->where('campaignId', '=', $campaignId)->first();

        $checkApplyData = CheckApply::with(['campaign' => function ($query) use ($userId) {
            $query->where('userId', '=', $userId);
        }])->where('campaignId', '=', $campaignId)->get();

        return view('influencer.applies.create', \compact('appliers', 'checkApplyData'));
    }


    public function appliersCreateStore(Request $request)
    {
        $appliers = new CheckApply();
        $appliers->campaignId = $request->campaignId;
        $appliers->userId = $request->userId;
        $appliers->file = time() . '.' . $request->file->extension();
        $request->file->move(public_path('checkApplyFile'), $appliers->file);
        $appliers->fileType = $request->fileType;
        $appliers->save();

        $campaignId = $request->campaignId;
        $userId = $request->userId;
        $appliers = Apply::with(['campaign' => function ($query) use ($userId) {
            $query->where('userId', '=', $userId);
        }])->where('campaignId', '=', $campaignId)->first();
        return redirect('influencer/campaignApplyList')->with('success', 'Details Added Successfully..');
    }

    // End

    public function edit($id)
    {
        $category = CategoryInfluencer::all();
        $profile = InfluencerProfile::find($id);
        $user = Auth::user();
        return view('influencer.influencerProfile.edit', \compact('profile', 'category', 'user'));
    }

    public function update(Request $request)
    {
        // $this->validate($request, [
        //     'contactNo' => 'required',
        //     '' => 'required',
        // ]);
        $id = $request->profileId;
        $profile =  InfluencerProfile::find($id);
        $profile->contactNo = $request->contactNo;
        $profile->address = $request->address;
        $profile->categoryId = $request->categoryId;
        $profile->status = "Active";
        $profile->save();

        $userId = $profile->userId;
        $user = User::find($userId);
        if ($request->profilePhoto) {
            $user->profilePhoto = time() . '.' . $request->profilePhoto->extension();
            $request->profilePhoto->move(public_path('profile'), $user->profilePhoto);
        }
        $user->mobileno = $profile->contactNo;
        $user->save();

        return redirect('influencer/profile')->with('success', 'Update Successfully..');
    }

    public function destroy()
    {
        //
    }

    public function RegisterInfluencer()
    {
        return view('new_influencer');
    }

    public function RegisterInfluencerStore(Request $request)
    {
        $mobileno = $request->mobileno;
        $email = $request->email;
        $usercount = User::where('mobileno', '=', $mobileno)->get()->count();
        $useremailcount = User::where('email', '=', $email)->get()->count();
        if ($useremailcount > 0) {

            $user = User::where('email', '=', $email)->first();
            $userId  = $user->id;
            $userData = User::find($userId);
            $userData->mobileno = $mobileno;
            $userData->save();
            if ($usercount > 0) {
                $user = User::where('mobileno', '=', $mobileno)->first();

                $userData = User::find($userId);
                $userData->mobileno = $mobileno;
                $userData->assignRole(['Influencer', 'User']);
                $userData->save();
                return redirect('login');
            }
            return redirect('login');
        } else {
            $this->validate($request, [
                'name' => 'required',
                'username' => ['required', 'string', 'max:255'],
                'email' => 'required|email',
                'mobileno' => 'required',
                'password' => 'required|same:confirm-password',
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->mobileno = $request->mobileno;
            $user->password = Hash::make($request->password);
            $user->assignRole(['Influencer', 'User']);
            $user->package = "FREE";
            $user->save();


            $category = Category::where('name', '=', 'Individual')->first();
            $card = new CardsModels();
            $card->name = $user->name;
            $card->user_id = $user->id;
            $card->category = $category->id;
            $card->save();

            // profile
            $profile = new InfluencerProfile();
            $profile->userId = $user->id;
            $profile->contactNo = $user->mobileno;
            $profile->status = "Active";
            $profile->save();


            $payment = new Payment();
            $payment->card_id = $card->id;
            $payment->save();

            $links = new Links();
            $links->card_id  = $card->id;
            $links->phone1  = $user->mobileno;
            $links->save();

            return redirect('login');
        }
    }
}
