<?php

namespace App\Http\Controllers;

use App\Models\Brochure;
use App\Models\Cardportfoilo;
use App\Models\CardsModels;
use App\Models\Counter;
use App\Models\Feedback;
use App\Models\Links;
use App\Models\Payment;
use App\Models\Qrcode;
use App\Models\Servicedetail;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Console\View\Components\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ViewcardController extends Controller
{
    //
    public function index($name = 0)
    {
        $userEmail = User::where('username', '=', $name)
            ->count();
        // return $userEmail;
        if ($userEmail) {
            $userEmail1 = User::where('username', '=', $name)
                ->get();
            $id = $userEmail1[0]->id;
        }
        // return $name;

        // return $userEmail;
        if ($userEmail > 0) {
            // $userID = $userEmail[0]->id;

            $userfind = CardsModels::where('user_id', '=', $id)->count();

            // return $userfind->id;
            // $userfind = $userfind1[0]->id;
            // return $userfind;
            if ($userfind > 0) {
                $userfind1 = CardsModels::where('user_id', '=', $id)->get();
                $username = $userfind1[0]->name;
            } else {
                return view('notfound');
            }
            // $userId = Auth::user()->id;
            $card_id1 = $userfind1[0]->id;
            // return $card_id1;

            // $checkCard1 = User::where('email', '=', $card_id1)->get();
            $checkCard1 = CardsModels::where('id', '=', $card_id1)->get();
            $card_id = $checkCard1[0]->id;
            $checkCard = CardsModels::where('id', '=', $card_id)->count();

            // return $checkCard;
            if ($checkCard == 0) {
                return view('notfound');
            } else {

                // counter code
                $counter = Counter::where('card_id', '=', $card_id)->count();
                if ($counter < 1) {
                    $totalcounter = new Counter();
                    $totalcounter->card_id = $card_id;
                    $totalcounter->counter = "1";
                    $totalcounter->save();
                } else {

                    $counter = Counter::where('card_id', '=', $card_id)->first();
                    //get counter values & count id  from database
                    $dbcounter = $counter->counter;
                    $counter_id = $counter->id;

                    //update count values
                    $countinc = Counter::find($counter_id);
                    $countinc->counter = $dbcounter + 1;
                    $countinc->save();
                }

                // get counter  value  
                $count = Counter::where('card_id', '=', $card_id)->first();

                //

                $cards = CardsModels::where('id', '=', $card_id)->first();
                $user_id = $cards->user_id;

                // return $cards;

                // dd($user_id);
                $card = CardsModels::join('admincategories', 'admincategories.id', '=', 'cards.category')
                    ->where('cards.id', '=', $card_id)
                    ->first(['cards.*', 'admincategories.name as catName']);


                $user = DB::table('cards')
                    ->crossJoin('users')
                    ->select('cards.*', 'users.mobileno', 'users.email', 'users.profilePhoto')
                    ->where('users.id', '=', DB::raw('cards.user_id'))
                    ->where('users.id', '=', $user_id)
                    ->first();

                $servicelist = Servicedetail::where('card_id', '=', $card_id)->get();
                $links = Links::where('card_id', '=', $card_id)->first();
                $web = Links::where('card_id', '=', $card_id)->first();
                // dd($links);
                $service = Servicedetail::where('card_id', '=', $card_id)->get();
                // dd($payment1);
                $payment = Payment::where('card_id', '=', $card_id)->get();
                $gallery = Cardportfoilo::where('card_id', '=', $card_id)->get();
                $gallery1 = Cardportfoilo::where('card_id', '=', $card_id)->get();
                $qrno = Qrcode::where('card_id', '=', $card_id)->get();
                $qrcod = Qrcode::where('card_id', '=', $card_id)->get();
                $feed = Feedback::where('card_id', '=', $card_id)->get();
                $feed1 = Feedback::where('card_id', '=', $card_id)->get();
                $bro = Brochure::where('card_id', '=', $card_id)->get();
                $slider = Slider::where('card_id', '=', $card_id)->get();

                return view('account.viewcard', compact('count', 'bro', 'cards', 'card', 'service', 'servicelist',  'links', 'web', 'payment', 'gallery', 'gallery1', 'qrno', 'qrcod', 'feed', 'user', 'feed1', 'user_id', 'slider'));
            }
        } else {
            return view('notfound');
        }
    }

    function whatsapp(Request $request)
    {
        $whatsapp = $request->whatsapp;
        $url = $request->url;
        return redirect()->to("https://wa.me/$whatsapp?text=$url");
    }
}
