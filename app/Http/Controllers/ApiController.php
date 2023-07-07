<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Mail\ForgotMail;
use App\Models\Banner;
use App\Models\Brochure;
use App\Models\Cardportfoilo;
use App\Models\CardsModels;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Links;
use App\Models\Media;
use App\Models\Mymedia;
use App\Models\Otp;
use App\Models\Payment;
use App\Models\Point;
use App\Models\Qrcode;
use App\Models\Razorpay;
use App\Models\Servicedetail;
use App\Models\Subscriptionpackage;
use App\Models\Templatemaster;
use App\Models\User;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Order;
use App\Models\Addtocart;
use App\Models\Orderdetail;
use App\Models\Offerdetail;
use App\Models\Offer;
use App\Models\Type;
use App\Models\Notification;
use App\Models\Typedetail;
use App\Models\Coupon;
use App\Models\CategoryInfluencer;
use App\Models\InfluencerProfile;
use App\Models\InfluencerPortfolio;
use App\Models\CheckApply;
use App\Models\Apply;
use Carbon\Carbon;
use Validator;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use Razorpay\Api\Test\RazorpayTest;
use SebastianBergmann\Template\Template;

class ApiController extends Controller
{
    //login Api
    function login(Request $request)
    {
        $user = User::where('email', $request->email)
            ->first();
        $card = CardsModels::where('user_id', '=', $user->id)->get();

        // print_r($data);
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('my-app-token')->plainTextToken;

            $role = $user->getRoleNames();
            $response = [
                'User Data' => $user,
                'CardData' => $card,
                'token' => $token,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
    }
    function sendotp(Request $request)
    {
        $apiKey = urlencode('0c5ff664-819f-48f1-a22c-d5894e9fba3b');

        // Message details
        $otp = random_int(100000, 999999);
        $numbers = $request->mobile;
        $sender = urlencode('DGSAPI');
        $message = "Your One Time Verification Password is {$otp}.";
        $username = "BrandBeans";
        $smstype = "TRANS";

        // Prepare data for POST request
        $data = array(
            'apikey' => $apiKey,
            'numbers' => $numbers,
            "sender" => $sender,
            "message" => $message,
            "username" => $username,
            "sendername" => $sender,
            "smstype" => $smstype,
        );

        // Send the POST request with cURL
        $ch = curl_init('http://sms.hspsms.com/sendSMS');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $time = Carbon::now()->toTimeString();
        $otps = new Otp();
        $otps->otp = $otp;
        $otps->mobileno = $request->mobile;
        $otps->time = $time;
        $otps->save();

        // Process your response here
        return $response;

        // old code
        // $rules = array(
        //     'name'  => "required",
        //     'email' => "required|required|email|unique:users,email",
        //     'password' => '',
        //     "category" => "required"
        // );

        // if ($request->category == 0) {
        //     $rules = array(
        //         "categorytext" => "required"
        //     );
        // }
        // $validator = Validator::make($request->all(), $rules);
        // if ($validator->fails()) {
        //     return $validator->errors();
        // }

        // $otp =  random_int(100000, 999999);
        // $time = Carbon::now()->toTimeString();
        // $otps = new Otp();
        // $otps->otp = $otp;
        // $otps->email = $request->email;
        // $otps->time = $time;
        // $otps->save();
        // $email = $request->email;

        // $mail = Mail::to($email)->send(new OtpMail($otp));
        // if ($email) {
        //     $response = [
        //         'Message' => "OTP SEND SUCCESSFULLY CHECK YOUR EMAIL..",
        //     ];

        //     return response($response, 201);
        // } else {
        //     return response([
        //         'message' => ['No Data Found']
        //     ], 404);
        // }
    }
    function checkotp(Request $request)
    {
        // new code
        $rules = array(
            'mobile'  => "required",
            'otp'  => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $mobile = $request->mobile;
        $otp = $request->otp;

        $otps = Otp::where('mobileno', $mobile)->where('otp', $otp)->first();
        $user = User::where('mobileno', '=', $mobile)->first();
        $usercount = User::where('mobileno', '=', $mobile)->get()->count();
        $link = Links::where('phone1', '=', $mobile)->orWhere('phone2', '=', $mobile)->first();
        $linkcount = Links::where('phone1', '=', $mobile)->orWhere('phone2', '=', $mobile)->get()->count();
        if ($otps) {
            if ($linkcount > 0) {
                $card_id = $link->card_id;

                $cardData = CardsModels::where('id', '=', $card_id)->first();
                $userData = User::where('id', '=', $cardData->user_id)->first();
                $userId = $cardData->user_id;

                $token = $userData->createToken('my-app-token')->plainTextToken;

                $card = CardsModels::where('user_id', '=', $userId)->get();

                $response = [
                    'User Data' => $userData,
                    'Card Data' => $card,
                    'token' => $token,
                ];

                return response($response, 200);
            } else if ($usercount > 0) {

                $card = CardsModels::where('user_id', '=', $user->id)->get();
                $token = $user->createToken('my-app-token')->plainTextToken;
                $response = [
                    'User Data' => $user,
                    'Card Data' => $card,
                    'token' => $token,
                ];

                return response($response, 200);
            } else {
                return response([
                    'message' => ['User Data does not exist']
                ], 404);
            }
        } else {
            return response([
                'message' => ['Otp does not exist']
            ], 404);
        }



        // old code

        // $email = $request->email;
        // $otp = $request->otp;
        // $user = User::where('email', '=', $email)->first();
        // $card = CardsModels::where('user_id', '=', $user->id)->get();
        // $otps = Otp::where('email', '=', $email)->where('otp', '=', $otp)->first();

        // // print_r($data);

        // // return $otp;
        // if ($user && $otps) {
        //     $token = $user->createToken('my-app-token')->plainTextToken;
        //     //send mail + random number   code here 
        //     $role = $user->getRoleNames();
        //     $response = [
        //         'User Data' => $user,
        //         'CardData' => $card,
        //         'token' => $token,
        //     ];

        //     return response($response, 201);
        // } else {
        //     return response([
        //         'message' => ['These credentials do not match our records.']
        //     ], 404);
        // }
    }

    function otpapi(Request $request)
    {
        // $rules = array(
        //     'mobile'  => "required",
        // );

        // $validator = Validator::make($request->all(), $rules);
        // if ($validator->fails()) {
        //     return $validator->errors();
        // }

        // $mobile = $request->mobile;

        // $user = User::where('mobileno', '=', $mobile)->first();

        // if ($user) {
        //     $token = $user->createToken('my-app-token')->plainTextToken;

        //     $card = CardsModels::where('user_id', '=', $user->id)->get();

        //     $response = [
        //         'User Data' => $user,
        //         'Card Data' => $card,
        //         'token' => $token,
        //     ];

        //     return response($response, 200);
        // } else {
        //     return response([
        //         'message' => ['User does not exist']
        //     ], 404);
        // }
    }


    // function login(Request $request)
    // {
    //     $user = User::where('email', $request->email)->first();

    //     if ($user) {
    //         $otp =  random_int(100000, 999999);
    //         $time = Carbon::now()->toTimeString();
    //         $otps = new Otp();
    //         $otps->otp = $otp;
    //         $otps->email = $request->email;
    //         $otps->time = $time;
    //         $otps->save();
    //         $email = $request->email;
    //         $mail = Mail::to($email)->send(new OtpMail($otp));
    //         $response = [
    //             'User Data' => $user,
    //             'OTP' => $otps->otp,
    //         ];

    //         return response($response, 201);
    //     } else {
    //         return response([
    //             'message' => ['These credentials do not match our records.']
    //         ], 404);
    //     }
    // }

    // Register
    function register(Request $request)
    {
        $rules = array(
            'name' => "required",
            'email' => "required|required|email|unique:users,email",
            'password' => ['required', 'string', 'min:6'],
            'username' => "required|required|unique:users,username",
            "category" => "required",
            "mobileno" => "required",
        );

        if ($request->category == 0) {
            $rules = array(
                "categorytext" => "required"
            );
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->package = 'FREE';
        $user->mobileno = $request->mobileno;
        $user->assignRole('User');
        $user->save();

        if ($request->category == 0) {
            $category = new Category();
            $category->name = $request->categoryname;
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
            $card->category = $request->category;
            $card->save();
        }

        $payment = new Payment();
        $payment->card_id = $card->id;
        $payment->save();

        $links = new Links();
        $links->card_id = $card->id;
        $links->save();


        if ($user) {
            $token = $user->createToken('my-app-token')->plainTextToken;
            //send mail + random number code here
            $role = $user->getRoleNames();
            $response = [
                'User Data' => $user,
                'CardData' => $card,
                'token' => $token,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
    }

    function register1(Request $request)
    {
        $rules = array(
            'name'  => "required",
            // 'email' => "required|required|email|unique:users,email",
            // 'username' => "required|required|unique:users,username",
            'type'  => "required",
        );

        if ($request->type == "Business") {
            $rules = array(
                'name'  => "required",
                // 'email' => "required|required|email|unique:users,email",
                // 'username' => "required|required|unique:users,username",
                'type'  => "required",
                "category" => "required",
                "mobileno" => "required"
            );
            if ($request->category == 0) {
                $rules = array(
                    'name'  => "required",
                    // 'email' => "required|required|email|unique:users,email",
                    // 'username' => "required|required|unique:users,username",
                    'type'  => "required",
                    "category" => "required",
                    "categorytext" => "required",
                    "mobileno" => "required",
                );
            }
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        if ($request->type == "Business") {


            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->package = 'FREE';
            $user->refer = $request->refer;
            $user->mobileno = $request->mobileno;
            $user->password = Hash::make(123456);
            $user->assignRole('User');
            $user->save();

            // refer generate
            $username = $user->username;
            $userId = $user->id;
            $newStr = str_replace(' ', '', $username);
            $referCode = $newStr . $userId;
            $user = User::find($userId);
            $user->myrefer = $referCode;
            $user->save();

            $code = $user->refer;
            if ($code) {

                $pointableUser = User::where('myrefer', '=', $code)->first();

                $userPoint = new Point();
                $userPoint->userId = $pointableUser->id;
                $userPoint->point = 100;
                $userPoint->save();
            }

            if ($request->category == 0) {
                $category = new Category();
                $category->name = $request->categorytext;
                $category->iconPath = "default.jpg";
                $category->isBusiness = "yes";
                $category->isFestival = "no";
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
                $card->category = $request->category;
                $card->save();
            }
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = Hash::make(123456);
            $user->package = 'FREE';
            $user->assignRole('User');
            $user->refer = $request->refer;
            $user->save();
            // refer generate
            $username = $user->username;
            $userId = $user->id;
            $newStr = str_replace(' ', '', $username);
            $referCode = $newStr . $userId;
            $user = User::find($userId);
            $user->myrefer = $referCode;
            $user->save();

            $code = $user->refer;
            if ($code) {

                $pointableUser = User::where('myrefer', '=', $code)->first();

                $userPoint = new Point();
                $userPoint->userId = $pointableUser->id;
                $userPoint->point = 100;
                $userPoint->save();
            }
            $card = new CardsModels();
            $card->user_id = $user->id;
            $card->name = $user->name;
            $type = $request->type;
            $cat = Category::where('name', '=', $type)->get();
            $cat_id = $cat[0]->id;
            $card->category = $cat_id;
            $card->save();
        }
        $payment = new Payment();
        $payment->card_id = $card->id;
        $payment->save();

        $links = new Links();
        $links->card_id  = $card->id;
        $links->phone1  = $request->mobileno;
        $links->phone2  = $request->mobileno;
        $links->save();


        if ($user) {
            $token = $user->createToken('my-app-token')->plainTextToken;

            //send mail + random number   code here 
            $role = $user->getRoleNames();
            $response = [
                'User Data' => $user,
                'CardData' => $card,
                'token' => $token,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
    }



    // function register(Request $request)
    // {
    //     $rules = array(
    //         'name'  => "required",
    //         'email' => "required|required|email|unique:users,email",
    //         'username' => "required|required|unique:users,username",
    //         "category" => "required",
    //         "otp" => "required"
    //     );

    //     if ($request->category == 0) {
    //         $rules = array(
    //             "categorytext" => "required"
    //         );
    //     }
    //     $validator = Validator::make($request->all(), $rules);
    //     if ($validator->fails()) {
    //         return $validator->errors();
    //     }
    //     $email = $request->email;
    //     $otp = $request->otp;
    //     $otps = Otp::where('email', '=', $email)->where('otp', '=', $otp)->first();
    //     if ($otps) {
    //         $name = $request->name;
    //         $username = $request->username;
    //         $password = 123456;
    //         $category = $request->category;
    //         if ($category == 0) {
    //             $categorytext = $request->categorytext;
    //             $categoryins = new Category();
    //             $categoryins->name = $categorytext;
    //             $categoryins->iconPath = "default.jpg";
    //             $categoryins->isBusiness = "yes";
    //             $categoryins->save();

    //             $category = $categoryins->id;
    //         }
    //         $userins =  new User();
    //         $userins->name = $name;
    //         $userins->email = $email;
    //         $userins->username = $username;
    //         $userins->password = $password;

    //         $userins->save();

    //         $token = $userins->createToken('my-app-token')->plainTextToken;

    //         $card = new CardsModels();
    //         $card->user_id = $userins->id;
    //         $card->name = $userins->name;
    //         $card->category = $category;
    //         $card->save();

    //         $payment = new Payment();
    //         $payment->card_id = $card->id;
    //         $payment->save();

    //         $links = new Links();
    //         $links->card_id  = $card->id;
    //         $links->save();

    //         if ($userins) {
    //             $response = [
    //                 'User Data' => $userins,
    //                 'CardData' => $card,
    //                 'token' => $token,
    //             ];

    //             return response($response, 201);
    //         } else {
    //             return response([
    //                 'message' => ['User Not Found']
    //             ], 404);
    //         }
    //     } else {
    //         return response([
    //             'message' => ['OTP not Match']
    //         ], 404);
    //     }
    // }

    // Login Withb Pin

    function loginWithPin(Request $request)
    {
        $user = User::where('mobileno', $request->mobileno)
            ->first();
        $card = CardsModels::where('user_id', '=', $user->id)->get();

        // print_r($data);
        if ($user && $request->pin == $user->pin) {
            $token = $user->createToken('my-app-token')->plainTextToken;

            $role = $user->getRoleNames();
            $response = [
                'User Data' => $user,
                'Card Data' => $card,
                'token' => $token,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
    }

    //forgetpassword && changepassword

    function changepassword(Request $req)
    {
        $rules = array(
            'user_id' => 'required',
            'oldpassword' => 'required',
            'newpassword' => 'required',
        );
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $user_id = $req->user_id;

        $newpassword = Hash::make($req->newpassword);

        $user = User::where('users.id', '=', $user_id)
            ->get();

        if (count($user) > 0) {

            if (Hash::check($req->oldpassword, $user[0]->password)) {

                $userpassword = User::find($user_id);
                $userpassword->password = $newpassword;
                $userpassword->save();

                //    return $userpassword;
                return response('Password Change Successfully', 201);
            } else {
                return response('Old Password does not match', 404);
            }
        } else {
            return response('Username does not match', 501);
        }
    }

    function forgotpassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $email = $request->email;
        $user = User::where('users.email', '=', $email)
            ->get('users.*');
        if ($user) {
            $email = $request->email;

            // $password = $user[0]->password;
            $bytes = random_bytes(4);
            $password = bin2hex($bytes);

            $id = $user[0]->id;
            $userupdate = User::find($id);
            $userupdate->password =  Hash::make($password);
            $userupdate->save();

            $mail = Mail::to($email)->send(new ForgotMail($password, $email));


            return response()->json([
                'message' => 'Email has been sent.'
            ], 200);
        }
        return "mail send successfully";
    }


    // function updatepassword(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
    //     $email = $request->email;
    //     $user = User::where('users.email', '=', $email)->first();
    //     $id = $user->id;
    //     if ($user) {
    //         $userupdate = User::find($id);
    //         $userupdate->password =  Hash::make($request->password);
    //         $userupdate->save();
    //         if ($userupdate) {
    //             $response = [
    //                 'User Data' => "User Updated Successfully",
    //             ];

    //             return response($response, 201);
    //         } else {
    //             return response([
    //                 'message' => ['No Data Found']
    //             ], 404);
    //         }
    //     } else {
    //         return response([
    //             'message' => ['User Not Found']
    //         ], 404);
    //     }
    // }

    function updateProfile(Request $request)
    {
        $userId = $request->userId;

        $user = User::find($userId);
        if ($request->name) {
            $user->name = $request->name;
        }
        if ($request->mobileno) {
            $user->mobileno = $request->mobileno;
        }
        if ($request->profilePhoto) {
            $image = $request->profilePhoto;
            $user->profilePhoto = time() . '.' . $request->profilePhoto->extension();
            $request->profilePhoto->move(public_path('profile'), $user->profilePhoto);
        }
        $user->save();

        if ($user) {
            $response = [
                'User Data' => $user,
            ];
            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }


    // category list

    function categorylist()
    {
        $category = Category::where('isBusiness', '=', 'yes')->get();
        if ($category) {
            $response = [
                'category Data' => $category,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }


    // Card
    function cardView($id)
    {
        $card = CardsModels::all();
        if ($id > 0) {
            $card = CardsModels::find($id);
        }
        if ($card) {
            $response = [
                'Card Data' => $card,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }

    function cardedit(Request $request)
    {
        $cardId = $request->card_id;

        $card = CardsModels::find($cardId);
        $card->name = $request->name;
        $card->heading = $request->heading;
        $card->companyname = $request->companyname;
        $card->city = $request->city;
        $card->state = $request->state;
        $card->about = $request->about;
        $card->year = $request->year;

        if ($request->logo) {
            $image = $request->logo;
            $card->logo = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('cardlogo'), $card->logo);
        }
        $card->save();

        // $image_info = getimagesize('cardlogo/' . $card->logo);
        // return $width = $image_info[0];

        $user_id = $card->user_id;
        $user = User::find($user_id);

        if ($request->profilePhoto) {
            $image = $request->profilePhoto;
            $user->profilePhoto = time() . '.' . $request->profilePhoto->extension();
            $request->profilePhoto->move(public_path('profile'), $user->profilePhoto);
        }
        $user->save();
        if ($card) {
            $response = [
                'Card Data' => [$card, $user],
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }

    // Portfolio

    function portfolioView($id)
    {
        $card = CardsModels::find($id);
        $port = Cardportfoilo::where('card_id', '=', $card->id)->get();

        if ($port) {
            $response = [
                'portfolio Data' => $port,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }

    function portfoliostore(Request $request)
    {
        $cardId = $request->card_id;
        $count = Cardportfoilo::where('card_id', '=', $cardId)->count();
        // dd($count);
        if ($count < 21) {
            $port = new Cardportfoilo;
            $port->card_id = $cardId;
            $port->type = $request->type;
            //  return $image;
            $type = $request->type;
            if ($type === "Image" || $type === "image" || $type === "Photo" || $type === "photo") {
                if ($request->image) {
                    $image = $request->image;
                    $port->image = time() . '.' . $request->image->extension();
                    $request->image->move(public_path('cardimage'),  $port->image);
                }
            } else {

                $oldurl = "https://youtu.be/";
                $newurl = "https://youtube.com/embed/";
                $input = $request->image;

                $data = str_replace($oldurl, $newurl, $input);
                $port->image = $data;
            }
            $port->save();
            if ($port) {
                $response = [
                    'Portfolio Data' => $port,
                ];

                return response($response, 201);
            } else {
                return response([
                    'message' => ['No Data Found']
                ], 404);
            }
        } else {
            return response([
                'message' => ["you can't upload more than 20"]
            ], 200);
        }
    }

    function portfoliodelete($id)
    {
        $port = Cardportfoilo::find($id);
        $port->delete();

        return response([
            'message' => ['Deleted'],
            $port
        ], 200);
    }


    // Service details

    function serviceview($id)
    {
        $card = CardsModels::find($id);
        $service = Servicedetail::where('card_id', '=', $card->id)->get();
        if ($service) {
            $response = [
                'service Data' => $service,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }

    function servicestore(Request $request)
    {
        $this->validate($request, [
            'card_id' => 'required',
            'title' => 'required',
            'photo' => 'required',
            'description' => 'required',
        ]);
        $service = new  Servicedetail();
        $service->card_id = $request->card_id;
        $service->title = $request->title;
        $image = $request->photo;
        $service->photo = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('servicedetailimg'), $service->photo);
        $service->description = $request->description;
        $service->save();

        if ($service) {
            $response = [
                'Service Details ' => $service,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }
    function serviceedit($id, Request $request)
    {
        $service = Servicedetail::find($id);
        $service->title = $request->title;
        if ($request->photo) {
            $image = $request->photo;
            $service->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('servicedetailimg'), $service->photo);
        }
        $service->description = $request->description;
        $service->save();
        if ($service) {
            $response = [
                'service Data' => $service,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }

    function servicedelete($id)
    {
        $service = Servicedetail::find($id);
        $service->delete();
        return response([
            'message' => ['Deleted'],
            $service
        ], 200);
    }


    //Social Links
    function linksview($id)
    {
        $card = CardsModels::find($id);
        $links = Links::where('card_id', '=', $card->id)->get();
        if ($links) {
            $response = [
                'Social Links' => $links,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }
    function linksedit(Request $request)
    {

        $cardId = $request->card_id;
        $links = Links::where('card_id', '=', $cardId)->first();
        $id = $links->id;
        $link = Links::find($id);
        $link->phone1 = $request->phone1;
        $link->phone2 = $request->phone2;
        $link->email = $request->email;
        $link->skype = $request->skype;
        $link->facebook = $request->facebook;
        $link->instagram = $request->instagram;
        $link->twitter = $request->twitter;
        $link->youtube = $request->youtube;
        $link->linkedin = $request->linkedin;
        $link->website = $request->website;
        $link->paypal = $request->paypal;
        $link->save();

        if ($link) {
            $response = [
                'Link Data' => $link,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }
    function linksdelete($id)
    {
        $links = Links::find($id);
        $links->delete();
        return response([
            'message' => ['Deleted'],
            $links
        ], 200);
    }


    //Payment
    function paymentview($id)
    {
        $card = CardsModels::find($id);
        $payment = Payment::where('card_id', '=', $card->id)->get();
        if ($payment) {
            $response = [
                'Payment' => $payment,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }
    function paymentedit(Request $request)
    {
        $card_id = $request->card_id;
        $data = Payment::where('card_id', '=', $card_id)->first();
        $id = $data->id;
        $payment = Payment::find($id);
        $payment->bankName = $request->bankName;
        $payment->accountHolderName = $request->accountHolderName;
        $payment->accountNumber = $request->accountNumber;
        $payment->accountType = $request->accountType;
        $payment->ifscCode = $request->ifscCode;
        $payment->upidetail = $request->upidetail;
        $payment->save();

        if ($payment) {
            $response = [
                'Payment Data' => $payment,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }

    function qrview($id)
    {
        $card = CardsModels::find($id);
        $qr = Qrcode::where('card_id', '=', $card->id)->get();
        if ($qr) {
            $response = [
                'QR Code Data' => $qr,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }
    function qrstore(Request $request)
    {
        $cardId = $request->card_id;

        $qr = new Qrcode();
        $qr->card_id = $cardId;
        $qr->type = $request->type;
        $qr->number = $request->number;
        $image = $request->code;
        $qr->code = time() . '.' . $request->code->extension();
        $request->code->move(public_path('QRcodes'), $qr->code);
        $qr->save();

        if ($qr) {
            $response = [
                'qr Data' => $qr,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }

    function qrdelete($id)
    {
        $qr = Qrcode::find($id);
        $qr->delete();
        return response([
            'message' => ['Deleted'],
            $qr
        ], 200);
    }

    // Brochure
    function broview($id)
    {
        $card = CardsModels::find($id);
        $bro = Brochure::where('card_id', '=', $card->id)->get();
        if ($bro) {
            $response = [
                'Brochure Data' => $bro,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }
    function brostore(Request $request)
    {
        $rules = array(
            'cardId' => 'required',
            'brochure' => 'required|max:10000',
        );


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $cardId = $request->cardId;
        $count = Brochure::where('card_id', '=', $cardId)->count();
        // dd($count);
        if ($count < 3) {
            $bro = new Brochure();
            $bro->card_id = $cardId;
            $file = $request->brochure;
            $bro->file = time() . '.' . $request->brochure->extension();
            $request->brochure->move(public_path('brofile'), $bro->file);
            $bro->save();

            if ($bro) {
                $response = [
                    'bro Data' => $bro,
                ];
                return response($response, 201);
            }
        } else {
            return response([
                'message' => ["You can't Upload More than 2 Brochure"]
            ], 404);
        }
    }

    function brodelete($id)
    {
        $bro = Brochure::find($id);
        $bro->delete();
        return response([
            'message' => ['Deleted'],
            $bro
        ], 200);
    }


    function nonebusinesscategorywithpaginate(Request $request)
    {
        // pagination for category list
        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 5;
        }
        $date = Carbon::now()->toDateString();
        if ($request->paginate) {
            // data with pagination
            $category = Category::where('isBusiness', '=', 'no')
                ->where('startDate', '>=', $date)
                ->where('endDate', '>=', $date)

                ->paginate($perPage);
            if ($category) {
                $response = [
                    'Category Data' => $category,
                ];

                return response($response, 200);
            } else {
                return response([
                    'message' => ['No Data Found']
                ], 404);
            }
        } else {
            $category = Category::where('isBusiness', '=', 'no')
                ->where('startDate', '<', $date)
                ->where('endDate', '>', $date)
                ->get();
            if ($category) {
                $response = [
                    'Category Data' => $category,
                ];

                return response($response, 200);
            } else {
                return response([
                    'message' => ['No Data Found']
                ], 404);
            }
        }
    }
    // without Pagination
    function nonebusinesscategory(Request $request)
    {
        $date = Carbon::now()->toDateString();
        $category = Category::where('isBusiness', '=', 'no')
            ->where('startDate', '>=', $date)
            ->where('endDate', '>=', $date)
            ->get();
        if ($category) {
            $response = [
                'Category Data' => $category,
            ];

            return response($response, 200);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }

    function nonebusinesscategorysearch(Request $request)
    {

        $rules = array(
            "category" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $categorydata = $request->category;


        $category = Category::where('isBusiness', '=', 'no')
            ->where('name', '=', $categorydata)
            ->get();
        if ($category) {
            $response = [
                'Category Data' => $category,
            ];

            return response($response, 200);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }
    // with pagination
    function isbusinesscategorywithpaginate(Request $request)
    {
        $rules = array(
            "category" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $category = $request->category;

        // pagination for category list
        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 5;
        }

        if ($request->paginate) {
            // data with pagination
            $category = Category::where('isBusiness', '=', 'yes')
                ->orderBy('sequence', 'ASC')
                ->paginate($perPage);
            if ($category) {
                $response = [
                    'Category Data' => $category,
                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['No Data Found']
                ], 404);
            }
        } else {
            // data without pagination
            $category = Category::where('isBusiness', '=', 'yes')
                ->orderBy('sequence', 'ASC')
                ->get();
            if ($category) {
                $response = [
                    'Category Data without Paginate' => $category,
                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['No Data Found']
                ], 404);
            }
        }
    }
    function isbusinesscategory(Request $request)
    {
        $rules = array(
            "category" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $category = $request->category;

        $category = Category::where('isBusiness', '=', 'yes')
            ->orderBy('sequence', 'ASC')
            ->get();
        if ($category) {
            $response = [
                'Category Data' => $category,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }

    function categorylistdatenull()
    {
        $category = Category::whereNull('startDate')
            ->whereNull('endDate')
            ->where('isBusiness', '=', 'no')
            ->orderBy('sequence', 'ASC')
            ->get();
        if ($category) {
            $response = [
                'Category Data' => $category,
            ];

            return response($response, 200);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }
    // with pagination
    function categorylistdatenullwithpagination(Request $request)
    {
        // pagination for category list
        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 5;
        }

        if ($request->paginate) {
            // data with pagination
            $category = Category::whereNull('startDate')
                ->whereNull('endDate')
                ->where('isBusiness', '=', 'no')
                ->orderBy('sequence', 'ASC')
                ->paginate($perPage);
            if ($category) {
                $response = [
                    'Category Data' => $category,
                ];

                return response($response, 200);
            } else {
                return response([
                    'message' => ['No Data Found']
                ], 404);
            }
        } else {
            // data without pagination
            $category = Category::whereNull('startDate')
                ->whereNull('endDate')
                ->where('isBusiness', '=', 'no')
                ->orderBy('sequence', 'ASC')
                ->get();
            if ($category) {
                $response = [
                    'Category  Data' => $category,
                ];

                return response($response, 200);
            } else {
                return response([
                    'message' => ['No Data Found']
                ], 404);
            }
        }
    }

    function categorymedia(Request $request)
    {
        $date = carbon::now()->toDateString();
        // return $date;
        $category = $request->category;
        // $checkcat = Category::find($category);
        // return $checkcat;
        $media1 = Media::where('category', '=', $category)
            ->get();
        if (count($media1) > 0) {
            $startDate = $media1[0]->startDate;
            $endDate = $media1[0]->endDate;
            if ($startDate == null || $endDate == null) {
                $media = Media::where('category', '=', $category)
                    ->orderBy('sequence', 'ASC')
                    ->get();
            } else {

                $media = Media::where('category', '=', $category)
                    ->where('startDate', '<=', $date)
                    ->where('endDate', '>=', $date)
                    ->orderBy('sequence', 'ASC')
                    ->get();
            }
            if ($media) {
                // return $mediaa;
                if ($media->count() > 0) {

                    $response = [
                        'Media Data' => $media,
                    ];
                    return response($response, 200);
                } else {
                    return response([
                        'message' => ['No Data Found']
                    ], 404);
                }
            } else {
                return response([
                    'message' => ['No Data Found']
                ], 404);
            }
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }
    function categorymediaWithPaginate(Request $request)
    {
        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 5;
        }

        $date = carbon::now()->toDateString();
        $rules = array(
            "category" => "required",
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $category = $request->category;

        if ($request->paginate) {

            $media1 = Media::where('category', '=', $category)
                ->orderBy('sequence', 'ASC')
                ->get();
            $startDate = $media1[0]->startDate;
            $endDate = $media1[0]->endDate;
            if ($startDate == null || $endDate == null) {
                $media = Media::where('category', '=', $category)
                    ->orderBy('sequence', 'ASC')
                    ->paginate($perPage);
            } else {
                $media = Media::where('category', '=', $category)
                    ->where('startDate', '=', $date)
                    ->where('endDate', '>=', $date)
                    ->orderBy('sequence', 'ASC')
                    ->paginate($perPage);
            }

            if ($media->count() > 0) {
                $response = [
                    'Media Data with page' => $media,
                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['No Data Found']
                ], 404);
            }
        } else {
            $media1 = Media::where('category', '=', $category)
                ->orderBy('sequence', 'ASC')
                ->get();
            $startDate = $media1[0]->startDate;
            $endDate = $media1[0]->endDate;
            if ($startDate == null || $endDate == null) {
                $media = Media::where('category', '=', $category)
                    ->orderBy('sequence', 'ASC')
                    ->get();
            } else {
                $media = Media::where('category', '=', $category)
                    ->where('startDate', '=', $date)
                    ->where('endDate', '>=', $date)
                    ->orderBy('sequence', 'ASC')
                    ->get();
            }

            if ($media->count() > 0) {
                $response = [
                    'Media Data' => $media,
                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['No Data Found']
                ], 404);
            }
        }
    }


    function templateview()
    {
        $template = Templatemaster::all();

        if ($template) {
            $response = [
                'Template Data' => $template,
            ];

            return response($response, 200);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }



    // Feedback
    function feedview($id)
    {
        $card = CardsModels::find($id);
        $feed = Feedback::where('card_id', '=', $card->id)->get();

        if ($feed) {
            $response = [
                'feed Data' => $feed,
            ];

            return response($response, 200);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }
    function feedstore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        $cardid = $request->card_id;
        $feed = new Feedback();
        $feed->card_id = $cardid;
        $feed->name = $request->name;
        $feed->email = $request->email;
        $feed->message = $request->message;
        $feed->star = "5";
        $feed->save();
        if ($feed) {
            $response = [
                'Feedback Data' => $feed,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }

    //media 

    function storemedia(Request $request)
    {
        $rules = array(
            'userId'  => "required",
            'categoryId' => "required",
            'media' => "required",
            'date' => "required",
            'type' => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $userId = $request->userId;
        $categoryId = $request->categoryId;
        $date = $request->date;

        $user = User::find($userId);
        $userpack = $user->package;
        if ($userpack == 'FREE') {

            $count = Mymedia::where('date', '=', $date)
                ->where('userId', '=', $userId)

                ->count();
            if ($count < 6) {
                $media = new Mymedia();
                $media->userId = $userId;
                $media->categoryId = $categoryId;
                $image = $request->media;
                $media->media = time() . '.' . $request->media->extension();
                $request->media->move(public_path('mymedia'), $media->media);
                $media->date = $date;
                $media->type = $request->type;
                $media->save();

                if ($media) {
                    $response = [
                        'Media Data' => $media,
                    ];

                    return response($response, 201);
                } else {
                    return response([
                        'message' => ['No Data Found']
                    ], 404);
                }
            } else {
                return response([
                    'message' => ["You have reached max limit"]
                ], 220);
            }
        } else {

            $count = Mymedia::where('date', '=', $date)
                ->where('userId', '=', $userId)
                ->where('categoryId', '=', $categoryId)
                ->count();


            if ($count < 6) {
                $media = new Mymedia();
                $media->userId = $userId;
                $media->categoryId = $categoryId;
                $image = $request->media;
                $media->media = time() . '.' . $request->media->extension();
                $request->media->move(public_path('mymedia'), $media->media);
                $media->date = $date;
                $media->type = $request->type;
                $media->save();

                if ($media) {
                    $response = [
                        'Media Data' => $media,
                    ];

                    return response($response, 201);
                } else {
                    return response([
                        'message' => ['No Data Found']
                    ], 404);
                }
            } else {
                return response([
                    'message' => ["You have reached max limit"]
                ], 220);
            }
        }
    }

    public function mediaDownload(Request $request)
    {
        $userId = $request->userId;
        $media = Mymedia::where('mymedia.userId', '=', $userId)
            ->get();
        if ($media) {
            $response = [
                'Category Data' => $media,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }
    public function categorywithoutbussiness(Request $request)
    {
        $category = $request->category;
        $category = Media::join('admincategories', 'admincategories.id', '=', 'media.category')
            ->where('admincategories.isBusiness', '=', 'no')
            ->where('admincategories.isFestival', '=', 'no')
            ->where('media.category', '=', $category)
            ->get();
        if ($category) {
            $response = [
                'Category Data' => $category,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }
    public function festivalCategory(Request $request)
    {
        $category = $request->category;
        $date = date("Y-m-d");
        // return $date;
        $category = Media::join('admincategories', 'admincategories.id', '=', 'media.category')
            ->where('admincategories.isBusiness', '=', 'no')
            ->where('admincategories.isFestival', '=', 'yes')
            ->where('admincategories.startDate', '>=', $date)
            ->where('admincategories.endDate', '>=', $date)

            ->get();
        if ($category) {
            $response = [
                'Category Data' => $category,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }
    public function subscriptiondetail()
    {
        $package = Subscriptionpackage::where('priceType', '!=', 'FREE')->get();

        if ($package) {
            $response = [
                'package Data' => $package,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }

    public function getImage(Request $request)
    {
        $cardId = $request->cardId;

        $card = CardsModels::find($cardId);
        $logo = $card->logo;
        return $logo;
        if ($card) {
            $response = [
                'card Data' => $card,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Data Found']
            ], 404);
        }
    }
    public function userpackage(Request $request)
    {
        $rules = array(
            "userId" => "required"
        );


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $id = $request->userId;
        $user = User::find($id);
        $new_str = str_replace(' ', '', $user->username);
        $mycode = $new_str . $id;
        $userUpdate = User::find($id);
        $userUpdate->myrefer = $mycode;
        $userUpdate->save();

        if ($user) {
            $userc = $user->count();
            // return $user
            if ($userc > 0) {
                $response = [
                    'User Data' => $user,
                ];
            } else {
                return response([
                    'message' => ['No User Found']
                ], 404);
            }
            return response($response, 200);
        }
    }
    public function  categorymaster(Request $request)
    {
        if ($request->keyword) {
            $keyword = $request->keyword;
            if ($keyword === 'Business') {
                $category = Category::Where('isBusiness', '=', 'yes')->get();
                if ($category) {
                    $cat = count($category);
                    if ($cat != 0) {
                        $response = [
                            'category Data' => $category,
                        ];
                        return response($response, 200);
                    } else {
                        return response([
                            'message' => ['No Business category available']
                        ], 404);
                    }
                } else {
                    return response([
                        'message' => ['No category Found']
                    ], 404);
                }
            }
            // festival category
            if ($keyword === 'Festival') {
                $date = Carbon::now()->toDateString();
                $category = Category::Where('isFestival', '=', 'yes')
                    ->where('startDate', '<', $date)
                    ->where('endDate', '>', $date)
                    ->get();
                if ($category) {
                    $cat = count($category);
                    if ($cat != 0) {
                        $response = [
                            'category Data' => $category,
                        ];
                        return response($response, 200);
                    } else {
                        return response([
                            'message' => ['No Festival category available']
                        ], 404);
                    }
                } else {
                    return response([
                        'message' => ['No category Found']
                    ], 404);
                }
            }
            //other category
            if ($keyword === 'Other' || $keyword === 'other') {

                $category = Category::Where('isFestival', '=', 'no')
                    ->where('isBusiness', '=', 'no')
                    ->get();
                if ($category) {
                    $cat = count($category);
                    if ($cat != 0) {
                        $response = [
                            'category Data' => $category,
                        ];
                        return response($response, 200);
                    } else {
                        return response([
                            'message' => ['No Other category available']
                        ], 404);
                    }
                } else {
                    return response([
                        'message' => ['No category Found']
                    ], 404);
                }
            }
            if ($keyword === 'Trending' || $keyword === 'trending') {

                // check start date and end here
                $category = Category::Where('name', '=', 'Trending')
                    ->where('isBusiness', '=', 'no')
                    ->get();
                if ($category) {
                    $cat = count($category);
                    if ($cat != 0) {
                        $response = [
                            'category Data' => $category,
                        ];
                        return response($response, 200);
                    } else {
                        return response([
                            'message' => ['No Trending category available']
                        ], 404);
                    }
                } else {
                    return response([
                        'message' => ['No category Found']
                    ], 404);
                }
            }
        }
    }

    public function today(Request $request)
    {
        $name = $request->name;
        $category = Category::where('name', '=', $name)->get();
        $cat_id = $category[0]->id;
        $date =  Carbon::now()->toDateString();
        // $date = '2023-02-17';
        $media  = Media::where('category', '=', $cat_id)
            ->where('startDate', '<=', $date)
            ->where('endDate', '=', $date)
            ->get();
        return $media;
        if ($media) {
            $cat = count($media);
            if ($cat != 0) {
                $response = [
                    'media Data' => $media,
                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['No Todays Special media available']
                ], 404);
            }
        } else {
            return response([
                'message' => ['No media Found']
            ], 404);
        }
    }

    function updateUser(Request $request)
    {
        $rules = array(
            'userId'  => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $userId = $request->userId;
        $website = $request->website;
        $mobileno = $request->mobileno;
        $logo = $request->logo;

        $cardId = CardsModels::where('user_id', '=', $userId)->get();


        $card = CardsModels::find($cardId[0]->id);
        if ($logo) {
            $image = $request->logo;
            $card->logo = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('cardlogo'), $card->logo);
        }
        $card->save();

        $linkid = Links::where('card_id', '=', $cardId[0]->id)->get();
        $link = Links::find($linkid[0]->id);
        if ($website) {
            $link->website = $website;
        }
        if ($mobileno) {
            $link->phone1 = $mobileno;
        }
        $link->save();

        if ($card) {
            $response = [
                'card Data' => $card, $link,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No card Found']
            ], 404);
        }
    }

    function paymentDetails(Request $request)
    {
        $userId = $request->userId;
        $paymentId = $request->paymentId;
        $amount = $request->amount;
        $rules = array(
            'userId'  => "required",
            'paymentId'  => "required",
            'amount'  => "required",
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $pay = new Razorpay();
        $pay->payment_id = $paymentId;
        $pay->user_id = $userId;
        $pay->amount = $amount;
        $pay->save();

        $currdate = date("Y-m-d");
        $date = date_create($currdate);
        date_add($date, date_interval_create_from_date_string("365 days"));
        $user = User::find($userId);
        $user->package = "SILVER";
        $user->validity =  date_format($date, "Y-m-d");
        $user->save();

        if ($pay && $user) {
            $response = [
                'Payment Data' => $pay,
                'User Data' => $user,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No card Found']
            ], 404);
        }
    }

    function banner()
    {
        $banner = Banner::orderBy('sequence', 'ASC')->get();
        // $image = $banner[0]->photo;

        if ($banner) {
            $response = [
                'Banners' => $banner,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No card Found']
            ], 404);
        }
    }
    function bannerstore(Request $request)
    {
        $rules = array(
            "photo" => "required",
            "sequence" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $banner = new Banner();
        $image = $request->photo;
        $banner->photo = time() . '.' . $request->photo->extension();
        $path = $request->photo->move(public_path('bannerphoto'), $banner->photo);

        // $imgsizes = $path->getSize();
        // $data = getimagesize($path);
        // $width = $data[0];
        // $height = $data[1];

        $banner->sequence = $request->sequence;
        $banner->save();
        if ($banner) {
            $response = [
                'Banners' => $banner,
                // 'Image height' => $height,
                // 'Image width' => $width,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No card Found']
            ], 404);
        }
    }
    function mediavideo()
    {
        $media = Media::where('mediaType', '=', 'Video')->get();
        if ($media) {
            $response = [
                'Video' => $media,
                // 'Image height' => $height,
                // 'Image width' => $width,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No card Found']
            ], 404);
        }
    }

    // Refer and earn 

    function refer(Request $request)
    {
        $rules = array(
            "userId" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $user_id = $request->userId;
        $type = $request->type;

        $refer = User::find($user_id);
        if ($refer) {
            $refer_code = $refer->myrefer;
            $user = User::where('refer', '=', $refer_code)->get();
            $response = [
                'Reffered User' => $user,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No user Found']
            ], 404);
        }
    }


    function homeCategorySlider(Request $request)
    {
        $date = carbon::now()->toDateString();
        $category = Category::with(['media'])
            ->orderBy('sequence', 'desc')
            ->limit(5)
            ->where('startDate', '=', null)
            ->where('endDate', '=', null)
            ->get();

        // return $media = Media::with('category')->get();

        if ($category) {
            $response = [
                'category' => $category,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No user Found']
            ], 404);
        }
    }

    function productView()
    {
        $product = Product::all();
        if ($product) {
            $response = [
                'product' => $product,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No user Found']
            ], 404);
        }
    }

    function referpoints(Request $request)
    {
        $id = $request->userId;
        $points = Point::where('userId', '=', $id)->get();


        $total = 0;
        foreach ($points as $point) {
            $total = $total +  $point->point;
        }

        if ($points) {
            $response = [
                'point' => $points,
                'total' => $total,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Point Found']
            ], 404);
        }
    }

    function slider()
    {
        $slider = Slider::all();
        if ($slider) {
            $response = [
                'slider' => $slider,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Slider Found']
            ], 404);
        }
    }

    function sliderstore(Request $request)
    {
        $rules = array(
            "card_id" => "required",
            "file" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $slider = new Slider();
        $slider->card_id = $request->card_id;
        $image = $request->file;
        $slider->file = time() . '.' . $request->file->extension();
        $path = $request->file->move(public_path('slider'), $slider->file);
        $slider->save();

        if ($slider) {
            $response = [
                'slider' => $slider,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Slider Found']
            ], 404);
        }
    }

    // ORDER

    function order(Request $request)
    {
        $order = Order::all();
        if ($order) {
            $response = [
                'order' => $order,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Order Found']
            ], 404);
        }
    }
    function orderstore(Request $request)
    {
        $rules = array(
            "name" => "required",
            "address" => "required",
            "city" => "required",
            "contact" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $order = new Order();
        $order->name = $request->name;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->contact = $request->contact;
        $order->save();
        $order_id = $order->id;
        $card_id = $request->card_id;
        $carts = Addtocart::where('card_id', '=', $card_id)->get();
        $cartlenght  = count($carts);
        if ($cartlenght > 0) {
            foreach ($carts  as $cart) {
                $id =  $cart->id;
                $product_id =  $cart->product_id;
                $ordermaster  =  new Orderdetail();
                $ordermaster->order_id = $order_id;
                $ordermaster->product_id = $product_id;
                $ordermaster->card_id = $card_id;
                $ordermaster->save();

                Addtocart::find($id)->delete();
            }
            if ($order) {
                $response = [
                    'order' => $order,
                    'orderdetail' => $ordermaster,
                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['No Order Found']
                ], 404);
            }
        } else {
            return response([
                'message' => ['No Cart data Found']
            ], 404);
        }
    }

    function viewcart(Request $request)
    {
        $rules = array(
            "card_id" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $card_id = $request->card_id;
        $cart = Addtocart::join('products', 'products.id', '=', 'addtocarts.product_id')
            ->where('addtocarts.card_id', '=', $card_id)
            ->get(['addtocarts.*', 'products.name', 'products.points']);
        if ($cart) {
            $response = [
                'Cart' => $cart,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Product Found']
            ], 404);
        }
    }

    function addtocart(Request $request)
    {
        $rules = array(
            "card_id" => "required",
            "product_id" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $cart = new Addtocart();
        $cart->card_id = $request->card_id;
        $cart->product_id = $request->product_id;
        $cart->save();

        if ($cart) {
            $response = [
                'Cart' => $cart,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Product Found']
            ], 404);
        }
    }

    function removecart(Request $request)
    {
        $rules = array(
            "cartId" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $id = $request->cartId;
        $cart = Addtocart::find($id)->delete();
        if ($cart) {
            return response([
                'message' => ['Item Deleted Successfully']
            ], 200);
        } else {
            return response([
                'message' => ['No item Found']
            ], 404);
        }
    }

    function offerView()
    {

        $offers = Offer::all();


        $allData = [];
        foreach ($offers as $offer) {

            $offerDetails = OfferDetail::where('offerId', $offer->id)->get();
            $data  = [];

            if (count($offerDetails) > 0) {
                $data['offer'] = $offer;
                $data['details'] = $offerDetails;
                $allData[] = $data;
            }
        }

        $response = [
            'status' => true,
            'Data' => $allData
        ];
        return response($response, 200);
    }

    /* type view api*/
    function typeView(Request $request)
    {
        $type = Type::all();
        if ($type) {
            $response = [
                'type' => $type,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Type Found']
            ], 404);
        }
    }


    /* notification api store*/
    function notificationstore(Request $request)
    {
        $rules = array(
            "userId" => "required",
            "contactName" => "required",
            "contactNumber" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $notification = new Notification();
        $notification->userId = $request->userId;
        $notification->contactName = $request->contactName;
        $notification->contactNumber = $request->contactNumber;
        $notification->birthdate = $request->birthdate;
        if ($request->birthdayphoto) {
            $image = $request->birthdayphoto;
            $notification->birthdayphoto = time() . '.' . $request->birthdayphoto->extension();
            $request->birthdayphoto->move(public_path('notificationbirthdayphoto'), $notification->birthdayphoto);
        }

        $notification->anniversaryDate = $request->anniversaryDate;
        if ($request->anniversaryPhoto) {
            $image = $request->anniversaryPhoto;
            $notification->anniversaryPhoto = time() . '.' . $request->anniversaryPhoto->extension();
            $request->anniversaryPhoto->move(public_path('notificationanniversaryphoto'), $notification->anniversaryPhoto);
        }
        $notification->save();

        if ($notification) {
            $response = [
                'notification' => $notification,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Notification Found']
            ], 404);
        }
    }

    /* notification view */
    function notificationView($id = 0)
    {
        $notification = Notification::where('userId', '=', $id)->get();

        if ($notification) {
            $response = [
                'notification' => $notification,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Notification Found']
            ], 404);
        }
    }

    /* typedetails view */
    function typedetailview($id = 0)
    {
        $typedetail = Typedetail::where('typeId', '=', $id)->get();

        if ($typedetail) {
            $response = [
                'typedetail' => $typedetail,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Type Detail Found']
            ], 404);
        }
    }

    // Home screen Category view

    function homescreencategory()
    {
        // $date = Carbon::now()->toDateString();
        $date = Carbon::now()->tz('Asia/Kolkata')->format('Y-m-d');

        // $categories = Category::where('isFestival', '!=', 'yes')
        //     ->where('iconPath', '!=', Null)
        //     ->get();

        // $allData = [];
        // foreach ($categories as $category) {

        //     $media = Media::where('category', $category->id)
        //         ->take(5)->get();
        //     $data  = [];

        //     if (count($media) > 0) {
        //         $data['Category'] = $category;
        //         $data['media'] = $media;
        //         $allData[] = $data;
        //     }
        // }

        // $response = [
        //     'status' => true,
        //     'Data' => $allData
        // ];


        $data = Category::orderBy('sequence', 'DESC')
            ->where('iconPath', '!=', Null)
            ->get();

        $items = array();
        foreach ($data as $data) {
            // $items->push(['Category' => $data]);
            $mediadata = Media::whereDate('startDate', '<=', $date)
                ->whereDate('endDate', '>=', $date)
                ->where('category', '=', $data->id)
                ->get();

            array_push($items, ['Category' => $data, "media" => $mediadata]);
        }

        $response = [
            'status' => true,
            'Data' => $items
        ];

        return response($response, 200);
    }

    /* notification tabel data store */
    function notificationdata(Request $request)
    {
        $rules = array(
            "name" => "required",
            "contact" => "required",
            "type" => "required",
            "date" => "required",
            "photo" => "required",
            "userId" => "required",


        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $notification = new Notification();
        $notification->name = $request->name;
        $notification->contact = $request->contact;
        $notification->typeId = $request->type;
        $notification->userId = $request->userId;
        $notification->date = $request->date;
        $image = $request->photo;
        $notification->photo = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('notification'), $notification->photo);
        $notification->save();

        if ($notification) {
            $response = [
                'notification' => $notification,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Notification Found']
            ], 404);
        }
    }


    /* view notificationdetail  */
    function notificationdataview(Request $request)
    {

        $userId = $request->userId;
        $Today = carbon::now()->toDateString();
        $date1 = Carbon::parse($Today)->format('d-m');
        $date2 = substr($date1, 0);

        $notification = Notification::where('userId', '=', $userId)
            ->where('birthdate', '=', $date2)
            ->orWhere('anniversaryDate', '=', $date2)
            ->get();


        if ($notification) {
            $response = [
                'notification' => $notification,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Type Detail Found']
            ], 404);
        }
    }

    function coupon()
    {
        $coupon = Coupon::all();

        if ($coupon) {
            $response = [
                'coupon' => $coupon,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Coupon Found']
            ], 404);
        }
    }

    function couponApply(Request $request)
    {
        $rules = array(
            "code" => "required",
            "userId" => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }


        $code  = $request->code;
        $userId  = $request->userId;
        $packageId  = $request->packageId;
        $date  = Carbon::now()->todateString();
        $user = User::find($userId);
        $coupon = Coupon::with('package')->where('couponCode', '=', $code)
            ->where('validUpto', '>=', $date)
            ->first();
        if ($coupon) {

            // $userPackageUpdate = User::find($userId);
            // $userPackageUpdate->package = 'SILVER';
            // $userPackageUpdate->save();

            $response = [
                'coupon' => $coupon,
                'user' => $user,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No Coupon Found']
            ], 404);
        }
    }

    function packageCheck(Request $request)
    {
        $packageId = $request->packageId;
        $couponId = $request->couponId;

        $package = Subscriptionpackage::find($packageId);

        $coupon = Coupon::where('id', '=', $couponId)
            ->where('couponFor', '=', $packageId)
            ->get();

        if (count($coupon) > 0) {

            $response = [
                'message' => 'Valid',
                'coupon' => $coupon,
                'package' => $package,

            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['Invalid Coupon']
            ], 404);
        }
    }


    // Influencer

    public function influencerCategoryList()
    {
        $category = CategoryInfluencer::all();
        if ($category) {

            $response = [
                'status' => 200,
                'category' => $category,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['Not found']
            ], 404);
        }
    }

    public function categoryWiseInfluencerList()
    {
        $category = CategoryInfluencer::with('Influencer.profile')->get();
        if ($category) {

            $response = [
                'status' => 200,
                'category' => $category,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['Not found']
            ], 404);
        }
    }

    public function influencerPortfolio($id)
    {
        // $category = CategoryInfluencer::with('Influencer.portfolio')->get();
        $influencer = InfluencerProfile::with('profile')
            ->with('profile.portfolio')
            ->where('userId', '=', $id)
            ->get();
        if ($influencer) {

            $response = [
                'status' => 200,
                'Influencer' => $influencer,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['Invalid Coupon']
            ], 404);
        }
    }
    public function influencerProfile(Request $request, $id)
    {

        $rules = array(
            'mobileno'  => "required",
            'categoryId'  => "required",
            'profilePhoto'  => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $user = User::find($id);
        $user->mobileno = $request->mobileno;
        $user->profilePhoto = time() . '.' . $request->profilePhoto->extension();
        $request->profilePhoto->move(public_path('profile'), $user->profilePhoto);
        $user->save();
        $influencer = InfluencerProfile::where('userId', '=', $user->id)->with('profile')->first();
        if ($influencer) {
            $influencer->contactNo = $user->mobileno;
            $influencer->address = $request->address;
            $influencer->categoryId = $request->categoryId;
            $influencer->save();


            $response = [
                'status' => 200,
                'Influencer' => $influencer,
                // 'Influencer' => $influencer->with('influencer')->get(),
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['User Not found']
            ], 404);
        }
    }

    public function influencerPortfolioStore(Request $request)
    {

        $rules = array(
            'userId'  => "required",
            'title'  => "required",
            'photo'  => "required",
            'type'  => "required",
            'details'  => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $influencer = new InfluencerPortfolio();
        if ($influencer) {
            $influencer->userId = $request->userId;
            $influencer->title = $request->title;
            $influencer->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('portfolioPhoto'), $influencer->photo);
            $influencer->type = $request->type;
            $influencer->details = $request->details;
            $influencer->save();


            $response = [
                'status' => 200,
                'Influencer' => $influencer,
                // 'Influencer' => $influencer->with('influencer')->get(),
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['User Not found']
            ], 404);
        }
    }

    function BrandListWithCampaign()
    {
        $brands = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Brand');
            }
        )->with('campaign')->get();


        if ($brands) {

            $response = [
                'status' => 200,
                'Brands' => $brands,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['User Not found']
            ], 404);
        }
    }


    function campaignApplied(Request $request)
    {

        $rules = array(
            'userId'  => "required",
            'campaignId'  => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $apply = new Apply();
        $apply->campaignId = $request->campaignId;
        $apply->userId = $request->userId;
        $apply->status = "Applied";
        $apply->save();

        if ($apply) {

            $response = [
                'status' => 200,
                'data' => $apply,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['somthing went wrong']
            ], 404);
        }
    }

    function campaignAppliedList($id)
    {
        $apply = Apply::with('campaign')->where('userId', '=', $id)->get();
        if ($apply) {


            $response = [
                'status' => 200,
                'data' => $apply,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No List Found']
            ], 404);
        }
    }

    function addContentforCampaign(Request $request)
    {
        $rules = array(
            'campaignId'  => "required",
            'userId'  => "required",
            'file'  => "required",
            'fileType'  => "required",
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $appliers = new CheckApply();
        $appliers->campaignId = $request->campaignId;
        $appliers->userId = $request->userId;
        $appliers->file = time() . '.' . $request->file->extension();
        $request->file->move(public_path('checkApplyFile'), $appliers->file);
        $appliers->fileType = $request->fileType;
        $appliers->status = "Pending";

        $appliers->save();

        if ($appliers) {
            $response = [
                'status' => 200,
                'data' => $appliers,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No List Found']
            ], 404);
        }
    }
    function influencerContentforCampaignView($id)
    {

        $appliers = CheckApply::where('userId', '=', $id)->get();

        if ($appliers) {
            $response = [
                'status' => 200,
                'data' => $appliers,
            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['No List Found']
            ], 404);
        }
    }

    function BrandInfluencerList()
    {
        $items = array();
        $brand = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Brand');
            }
        )->get();

        $influencer = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Influencer');
            }
        )->get();

        array_push($items, ['Brand' => $brand, "Influencer" => $influencer]);

        $response = [
            'status' => true,
            'Data' => $items
        ];

        return response($response, 200);
    }
}
