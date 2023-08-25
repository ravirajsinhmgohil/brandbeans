<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\CampaignInfluencerActivityStep;
use App\Models\CampaignStep;
use App\Models\CardsModels;
use App\Models\Category;
use App\Models\CheckApply;
use App\Models\InfluencerPortfolio;
use App\Models\InfluencerProfile;
use App\Models\Links;
use App\Models\Payment;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CampaignController extends Controller
{
    public function index()
    {
        try {
            $userId = Auth::user()->id;
            $campaign = Campaign::where('userId', '=', $userId)->orderBy('id', 'DESC')->get();
            return view('brand.campaign.index', \compact('campaign'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    public function create()
    {
        try {
            return view('brand.campaign.create');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'photo' => 'required',
            'rule' => 'required',
            'eligibleCriteria' => 'required',
            'targetGender' => 'required',
            'targetAgeGroup' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'applyForLastDate' => 'required',
            'task' => 'required',
            'maxApplication' => 'required',
        ]);

        try {
            $userId = Auth::user()->id;
            $campaign = new Campaign();
            $campaign->title = $request->title;
            $campaign->userId = $userId;
            $campaign->detail = $request->detail;
            $campaign->price = $request->price;
            $campaign->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('campaignPhoto'), $campaign->photo);
            $campaign->rule = $request->rule;
            $campaign->eligibleCriteria = $request->eligibleCriteria;
            $campaign->targetGender = $request->targetGender;
            $campaign->targetAgeGroup = $request->targetAgeGroup;
            $campaign->startDate = $request->startDate;
            $campaign->endDate = $request->endDate;
            $campaign->applyForLastDate = $request->applyForLastDate;
            $campaign->task = $request->task;
            $campaign->maxApplication = $request->maxApplication;
            $campaign->status = "Active";
            $campaign->save();

            return redirect('brand/campaign/index')->with('success', 'Campaign Added Successfully..');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    // Appliers List and Add details After Approval
    public function appliers(Request $request)
    {
        try {
            $campaignId = Auth::user()->id;

            $appliers =    DB::table('applies')
                ->crossJoin('campaigns')
                ->crossJoin('users')
                ->select('campaigns.title', 'applies.*', 'users.name')
                ->where('applies.campaignId', '=', DB::raw('campaigns.id'))
                ->where('campaigns.userId', '=',  $campaignId)
                ->where('applies.userId', '=', DB::raw('users.id'))
                ->get();

            $counter = count($appliers);

            $filer = $request->filter;

            if ($filer == "Approved") {
                $appliers =    DB::table('applies')
                    ->crossJoin('campaigns')
                    ->crossJoin('users')
                    ->select('campaigns.title', 'applies.*', 'users.name')
                    ->where('applies.campaignId', '=', DB::raw('campaigns.id'))
                    ->where('campaigns.userId', '=',  $campaignId)
                    ->where('applies.status', '=', "Approved")
                    ->where('applies.userId', '=', DB::raw('users.id'))
                    ->get();
            } else if ($filer == "On Hold") {
                $appliers =    DB::table('applies')
                    ->crossJoin('campaigns')
                    ->crossJoin('users')
                    ->select('campaigns.title', 'applies.*', 'users.name')
                    ->where('applies.campaignId', '=', DB::raw('campaigns.id'))
                    ->where('campaigns.userId', '=',  $campaignId)
                    ->where('applies.status', '=', "On Hold")
                    ->where('applies.userId', '=', DB::raw('users.id'))
                    ->get();
            } else if ($filer == "Rejected") {
                $appliers =    DB::table('applies')
                    ->crossJoin('campaigns')
                    ->crossJoin('users')
                    ->select('campaigns.title', 'applies.*', 'users.name')
                    ->where('applies.campaignId', '=', DB::raw('campaigns.id'))
                    ->where('campaigns.userId', '=',  $campaignId)
                    ->where('applies.status', '=', "Rejected")
                    ->where('applies.userId', '=', DB::raw('users.id'))
                    ->get();
            } else if ($filer == "Applied") {
                $appliers =    DB::table('applies')
                    ->crossJoin('campaigns')
                    ->crossJoin('users')
                    ->select('campaigns.title', 'applies.*', 'users.name')
                    ->where('applies.campaignId', '=', DB::raw('campaigns.id'))
                    ->where('campaigns.userId', '=',  $campaignId)
                    ->where('applies.status', '=', "Applied")
                    ->where('applies.userId', '=', DB::raw('users.id'))
                    ->get();
            }
            return view('brand.appliers.index', \compact('appliers', 'counter'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    // appliers status management Start

    public function influencerApproval($campaignId, $userId, Request $request)
    {
        try {
            $apply = Apply::where('campaignId', '=', $campaignId)
                ->where('userId', '=', $userId)
                ->first();
            $apply->status = "Approved";
            $apply->save();
            return redirect('brand/campaign/appliers')->with('success', 'Status Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    public function influencerOnHold($campaignId, $userId, Request $request)
    {
        try {
            $apply = Apply::where('campaignId', '=', $campaignId)
                ->where('userId', '=', $userId)
                ->first();
            $apply->status = "On Hold";
            $apply->save();
            return redirect('brand/campaign/appliers')->with('success', 'Status Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    public function influencerReject($campaignId, $userId, Request $request)
    {
        try {
            $apply = Apply::where('campaignId', '=', $campaignId)
                ->where('userId', '=', $userId)
                ->first();
            $apply->status = "Rejected";
            $apply->save();
            return redirect('brand/campaign/appliers')->with('success', 'Status Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    public function influencerDetail($campaignId, $userId)
    {
        try {
            $profile = InfluencerProfile::with('profile')->with('category')->where('userId', '=', $userId)->first();
            $portfolio = InfluencerPortfolio::where('userId', '=', $userId)->get();
            return view('brand.appliers.detail', \compact('profile', 'portfolio'));
            // return redirect('brand/campaign/appliers')->with('success', 'Status Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }

    public function influencerPortfolio($campaignId, $userId)
    {
        try {
            $postImage = CheckApply::where('userId', '=', $userId)->where('fileType', '=', 'Photo')->get();
            $postVideo = CheckApply::where('userId', '=', $userId)->where('fileType', '=', 'Video')->get();
            $steps  = CampaignStep::where('campaignId', '=', $campaignId)->get();
            $followedStep = CampaignInfluencerActivityStep::all();
            return view('brand.appliers.portfolio', \compact('postImage', 'postVideo', 'steps', 'followedStep'));
            // return redirect('brand/campaign/appliers')->with('success', 'Status Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }


    // influencer content management


    public function influencerContentApproval($campaignId, $userId, $id, Request $request)
    {
        try {
            $apply = CheckApply::where('campaignId', '=', $campaignId)
                ->where('userId', '=', $userId)
                ->where('id', '=', $id)
                ->first();
            $apply->status = "Approved";
            $apply->save();
            return redirect()->back()->with('success', 'Status Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function influencerContentOnHold($campaignId, $userId, $id, Request $request)
    {
        try {
            $apply = CheckApply::where('campaignId', '=', $campaignId)
                ->where('userId', '=', $userId)
                ->where('id', '=', $id)
                ->first();
            $apply->status = "Pending";
            $apply->save();
            return redirect()->back()->with('success', 'Status Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function influencerContentReject(Request $request)
    {
        try {
            $campaignId = $request->campaignId;
            $userId = $request->userId;
            $id = $request->imageId;

            $apply = CheckApply::where('campaignId', '=', $campaignId)
                ->where('userId', '=', $userId)
                ->where('id', '=', $id)
                ->first();
            $apply->status = "Rejected";
            $apply->remark = $request->remark;
            $apply->save();
            return redirect()->back()->with('success', 'Status Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    // end section

    // end Management

    // End


    public function edit($id)
    {
        try {
            $campaign = Campaign::find($id);
            return view('brand.campaign.edit', \compact('campaign'));
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'rule' => 'required',
            'eligibleCriteria' => 'required',
            'targetGender' => 'required',
            'targetAgeGroup' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'applyForLastDate' => 'required',
            'task' => 'required',
            'maxApplication' => 'required',
        ]);

        try {
            $id = $request->campaignId;

            $campaign = Campaign::find($id);
            $campaign->title = $request->title;
            $campaign->detail = $request->detail;
            $campaign->price = $request->price;
            if ($request->photo) {
                $campaign->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('campaignPhoto'), $campaign->photo);
            }
            $campaign->rule = $request->rule;
            $campaign->eligibleCriteria = $request->eligibleCriteria;
            $campaign->targetGender = $request->targetGender;
            $campaign->targetAgeGroup = $request->targetAgeGroup;
            $campaign->startDate = $request->startDate;
            $campaign->endDate = $request->endDate;
            $campaign->applyForLastDate = $request->applyForLastDate;
            $campaign->task = $request->task;
            $campaign->maxApplication = $request->maxApplication;
            $campaign->status = "Active";
            $campaign->save();
            return redirect('brand/campaign/index')->with('success', 'Campaign Updated Successfully..');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function delete($id)
    {
        try {
            Campaign::find($id)->delete();
            return redirect('brand/campaign/index')->with('success', 'Campaign Deleted Successfully..');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function RegisterBrand()
    {
        try {
            return view('new_brand');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }

    public function RegisterBrandStore(Request $request)
    {
        try {
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
                    $userData->assignRole(['Brand', 'User']);
                    $userData->save();
                    Auth::login($userData);
                    return redirect('dashboard');
                }
                Auth::login($userData);
                return redirect('dashboard');
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
                $user->assignRole(['Brand', 'User']);
                $user->package = "FREE";
                $user->save();


                $category = Category::where('name', '=', 'Individual')->first();
                $card = new CardsModels();
                $card->name = $user->name;
                $card->user_id = $user->id;
                $card->category = $category->id;
                $card->save();

                $payment = new Payment();
                $payment->card_id = $card->id;
                $payment->save();

                $links = new Links();
                $links->card_id  = $card->id;
                $links->phone1  = $user->mobileno;
                $links->save();

                Auth::login($user);
                return redirect('dashboard');
            }
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
            // return view("adminCategory.index", compact('category'));
        }
    }
}
