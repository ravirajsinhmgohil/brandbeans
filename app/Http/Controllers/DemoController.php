<?php

namespace App\Http\Controllers;

use App\Models\Brochure;
use App\Models\CardsModels;
use App\Models\User;
use App\Models\Links;
use App\Models\Cardservices;
use App\Models\Categories;
use App\Models\Cardportfoilo;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Inquiry;
use App\Models\Payment;
use App\Models\Qrcode;
use App\Models\Servicedetail;
use App\Models\Slider;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use PDF;

class DemoController extends Controller
{
    //
    public function changeemail(Request $request)
    {

        $authid = Auth::User()->id;
        $user = User::find($authid);
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success', 'Email change successfully');
    }

    public function changepassword(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required',
        ]);

        $newpassword = $request->newpassword;
        $confirmpassword = $request->confirmpassword;
        #Match The Old Password
        if (!Hash::check($request->oldpassword, auth()->user()->password)) {
            return back()->with("warning", "Old Password Doesn't match!");
        }

        if ($newpassword == $confirmpassword) {
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->newpassword)
            ]);

            return back()->with("success", "Password changed successfully!");
        } else {
            return back()->with("warning", "New password and Confirm passwor does not match!");
        }
    }
    public function cardcreate()
    {
        return view('details.create');
    }

    public function index()
    {
        return view('demo');
    }
    public function edit(Request $req)
    {

        $authid = Auth::User()->id;
        $userurl = Auth::user()->username;

        // user refer code generation start
        $referUserId = Auth::user()->id;
        $username = Auth::user()->username;
        $newStr = str_replace(' ', '', $username);
        $referCode = $newStr . $referUserId;
        $user = User::find($referUserId);
        $user->myrefer = $referCode;
        $user->save();
        // end

        $details = CardsModels::where('user_id', '=', $authid)->first();
        $id = $details->id;
        #for service details
        $servicedetail = Servicedetail::where('card_id', '=', $id)->get();
        #for payment data
        $payment = Payment::where('card_id', '=', $id)->first();

        $data1 = Cardservices::join('cards', 'cards.id', '=', 'cardservices.card_id')->where('cards.user_id', '=', $authid)
            ->where('cardservices.card_id', '=', $id)
            ->get(['cardservices.*']);

        $category = Categories::all();
        // $category = Admin::all();
        $data = User::where('id', '=', $authid)->get();
        $link = Links::join('cards', 'cards.id', '=', 'cardlinkes.card_id')
            ->where('cards.user_id', '=', $authid)
            ->where('cardlinkes.card_id', '=', $id)
            ->get(['cardlinkes.*']);

        $links = Links::where('card_id', '=', $id)->first();
        $qr = Qrcode::where('card_id', '=', $id)->get();
        $users = User::find($authid);


        $feed = Feedback::where('card_id', '=', $id)->get();
        $inq = Inquiry::where('card_id', '=', $id)->get();

        $admincategory = Category::where('isBusiness', '=', 'yes')->get();
        $cardimage = Cardportfoilo::where('cardportfoilos.card_id', '=', $id)
            ->where('type', '=', 'Photo')
            // ->orWhere('type', '=', 'Image')
            ->get('cardportfoilos.*');
        $cardvideo = Cardportfoilo::where('cardportfoilos.card_id', '=', $id)
            ->where('type', '=', 'Video')
            ->get('cardportfoilos.*');


        $bro = Brochure::where('card_id', '=', $id)->get();
        $slider = Slider::where('card_id', '=', $id)->get();

        $linkcount = Links::where('card_id', '=', $id)->count();

        $category = Category::where('isBusiness', '=', 'yes')->get();
        // if ($linkcount > 0) {
        //     return view('demo', compact('linkcount', 'inq', 'cardvideo', 'feed', 'id', 'details', 'qr', 'links', 'data1', 'category', 'cardimage', 'servicedetail', 'payment', 'admincategory', 'users'));
        // } else {
        return view('demo', compact('authid', 'userurl', 'category', 'slider', 'bro', 'linkcount', 'inq', 'cardvideo', 'feed', 'id', 'details', 'qr', 'links', 'data1', 'category', 'cardimage', 'servicedetail', 'payment', 'admincategory', 'users'));
        // }

    }

    /* card new store */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        //dd($id);
        $cards = CardsModels::where('user_id', '=', $id)->get();
        // return $cards;
        $card_id = $cards[0]->id;
        // return $card_id;
        $details =  CardsModels::find($card_id);


        // return $details;

        $details->name = $request->name;
        $details->heading = $request->heading;
        $details->companyname = $request->companyname;
        $details->city = $request->city;
        $details->state = $request->state;
        $category1 = $request->category;
        if ($category1 == 'other') {
            $categorystore = new Category();

            $categorystore->name = $request->categoryname;
            $categorystore->iconPath = "default.jpg";
            $categorystore->isBusiness = "yes";
            $categorystore->save();

            $details->category = $categorystore->id;
        } else {
            $details->category = $category1;
        }
        $details->about = $request->about;
        $details->year = $request->year;
        if ($request->logo) {
            $image = $request->logo;
            $details->logo = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('cardlogo'), $details->logo);
        }
        $details->save();

        $user = User::find($id);
        $user->mobileno = $request->mobileno;
        $user->username = $request->username;

        $image = $request->profilePhoto;
        if ($request->profilePhoto) {
            $user->profilePhoto = time() . '.' . $request->profilePhoto->extension();
            $request->profilePhoto->move(public_path('profile'), $user->profilePhoto);
        }
        $user->save();
        return redirect()->back()->with('success', 'Details Updated successfully');
    }



    public function storeimage(Request $request)
    {

        $request->validate([

            'type' => 'required',
            'image1' => 'required_if:type,==,Photo',
            'video' => 'required_if:type,==,Video',
        ]);
        $id = Auth::user()->id;
        //dd($id);
        $cards = CardsModels::where('user_id', '=', $id)->get();
        // return $cards;
        $card_id = $cards[0]->id;
        $count = Cardportfoilo::where('card_id', '=', $card_id)->count();
        // dd($count);
        if ($count < 21) {
            $image = new Cardportfoilo();
            $image->card_id = $card_id;
            $image->type = $request->type;
            //  return $image;
            $type = $request->type;
            if ($type === "Photo") {
                if ($request->image1) {
                    $image->image = time() . '.' . $request->image1->extension();
                    $request->image1->move(public_path('cardimage'),  $image->image);
                }
            } else {

                $oldurl = "https://youtu.be/";
                $newurl = "https://youtube.com/embed/";
                $input = $request->video;

                $data = str_replace($oldurl, $newurl, $input);
                // return $data;
                $image->image = $data;
            }
            $image->save();
            return \redirect()->back()->with('success', 'Image Uploaded Successfully');
        } else {
            return \redirect()->back()->with('success', "You can't add More Than 5 imahe");
        }
    }

    function destroy($id)
    {
        $link = Links::find($id);
        $link->delete();
        return redirect()->back()->with('success', "Deleted successfully");
    }
    function servicesdestroy($id)
    {
        $card = Cardservices::find($id);
        $card->delete();
        return redirect()->back()->with('success', "deleted successfully");
    }
    function photodestroy($id)
    {
        $photo = Cardportfoilo::find($id);
        // return $photo;
        $photo->delete();
        return redirect()->back()->with('success', "deleted successfully");
    }

    public function view($id, Request $req)
    {
        // $username = Auth::user()->name;
        $authid = Auth::User()->id;
        // return $id;
        // $cardshow = CardsModels::all();
        $cardshow = CardsModels::join('users', 'users.id', '=', 'cards.user_id')->where('users.id', '=', $authid)
            ->where('cards.id', '=', $id)
            ->get(['users.email', 'cards.*']);
        $link = Links::join('cards', 'cards.id', '=', 'cardlinkes.card_id')->where('cards.user_id', '=', $authid)
            ->where('cardlinkes.card_id', '=', $id)
            ->get(['cardlinkes.*']);
        $cardimage = Cardportfoilo::where('cardportfoilos.card_id', '=', $id)->get('cardportfoilos.*');

        return view('account.showcard', compact('cardshow', 'link', 'cardimage'));
    }


    public function update($id, Request $req)
    {
        $id = $req->cardid;
        $details = CardsModels::find($id);
        $details->name = $req->name;
        $details->heading = $req->heading;
        $details->companyname = $req->companyname;
        $details->category = $req->category;
        $details->city = $req->city;
        $details->state = $req->state;
        $details->about = $req->about;
        $image = $req->logo;
        $details->logo = time() . '.' . $req->logo->extension();
        $req->logo->move(public_path('cardlogo'), $details->logo);
        $details->save();

        $userid = Auth::user()->id;

        $user = User::find($userid);
        $user->mobileno = $req->mobileno;
        if ($req->profilePhoto) {
            $image = $req->profilePhoto;
            $user->profilePhoto = time() . '.' . $req->profilePhoto->extension();
            $req->profilePhoto->move(public_path('profile'), $user->profilePhoto);
        }
        $user->save();

        //     $response=Array('status'=>true,"msg"=>"inserted",'data'=>$req->all());
        // return $response; 
        //  return json_encode(array('statusCode'=>200));
        $response = array('status' => true, "msg" => "inserted", 'data' => $req->all());
        return redirect()->back()->with('success', "Updated");
    }
    function notfound()
    {
        return view('notfound');
    }

    function sliders(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        $id = $request->sliderCardId;

        $slider = new Slider();
        $slider->card_id = $id;
        $image = $request->file;
        $slider->file = time() . '.' . $request->file->extension();
        $request->file->move(public_path('slider'), $slider->file);
        $slider->save();
        return redirect()->back()->with('success', "Slider Added Successfully");
    }
}
