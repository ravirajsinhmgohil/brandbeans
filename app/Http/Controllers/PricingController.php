<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Subscriptiondetail;
use App\Models\Subscriptionpackage;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use Illuminate\Support\Facades\Auth;



class PricingController extends Controller
{
    public $api;
    public function __construct()
    {
        $this->api = new Api('rzp_test_ksGNEDh4WbYkD6', 'Gd7aXmMyUND34jePTTZEHSgb');
    }
    public function index()
    {
        // return $freepack;
        $subpack = Subscriptionpackage::all();
        $user = User::where('id', '=', Auth::user()->id)->first();
        return view('pricing.index', compact('user', 'subpack'));
    }

    public function payment()
    {
        return view('pricing.payment');
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'amount' => 'required',
        ]);
        $payId = rand(111, 999);
        $user = User::where('id', '=', Auth::user()->id)->first();
        $paymentDate = [
            'receipt' => 'rcptid_11',
            'amount' => ($request->amount * 100),
            'currency' => 'INR',
            'notes' => [
                'order_id' => $payId,
                'name' => $user->name,
            ]
        ];
        // $user->package = "Silver";
        // $user->save();


        $razorPayment = $this->api->order->create($paymentDate);
        // dd($razorPayment);

        return view('pricing.confirmation', \compact('razorPayment', 'payId', 'user'));
        // code..
        // $input = $request->all();

        // $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        // $payment = $api->payment->fetch($input['razorpay_payment_id']);

        // if (count($input)  && !empty($input['razorpay_payment_id'])) {
        //     try {
        //         $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
        //     } catch (Exception $e) {
        //         return  $e->getMessage();
        //         Session::put('error', $e->getMessage());
        //         return redirect()->back();
        //     }
        // }

        // Session::put('success', 'Payment successful');
        // return redirect()->back();
    }


    public function paymentSubmit(Request $request)
    {


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/v2/payment_requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer y70kak2K0Rg7J4PAL8sdW0MutnGJEl'));


        $payload = array(
            'purpose' => 'FIFA 16',
            'amount' => '2500',
            'buyer_name' => 'John Doe',
            'email' => 'rudrika@gmail.com',
            'phone' => '9999999999',
            'redirect_url' => 'http://www.example.com/redirect/',
            'send_email' => 'True',
            'webhook' => 'http://www.example.com/webhook/',
            'allow_repeated_payments' => 'False',
        );

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);


        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, 'https://api.instamojo.com/v2/payment_requests/');
        // curl_setopt($ch, CURLOPT_HEADER, FALSE);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        // curl_setopt(
        //     $ch,
        //     CURLOPT_HTTPHEADER,
        //     // array('Authorization: Bearer y70kak2K0Rg7J4PAL8sdW0MutnGJEl'));
        //     array(
        //         'X-Api-Key: 79d03ab566c6cecf245c42ca3cff96a5',
        //         'X-Auth-Token: 26619d1358d84f3db3fc6e2991ec0508',
        //     )
        // );

        // $payload = array(
        //     'purpose' => 'FIFA 16',
        //     'amount' => '2500',
        //     'buyer_name' => 'John Doe',
        //     'email' => 'jaydeep@aspireotech.com',
        //     'phone' => '9999999999',
        //     'redirect_url' => 'http://www.example.com/redirect/',
        //     'send_email' => 'True',
        //     'webhook' => 'http://www.example.com/webhook/',
        //     'allow_repeated_payments' => 'False',
        // );

        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        // $response = curl_exec($ch);
        // curl_close($ch);
        $response = \json_encode($response);
        echo "<pre>";
        print_r($response);
    }

    public function redirect()
    {
        echo "<pre>";
        print_r($_GET);
    }
}
