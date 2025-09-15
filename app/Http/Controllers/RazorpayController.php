<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Helper\CommanHelper as CHClass;

class RazorpayController extends Controller
{
    public function index() {
        return CHClass::genrateInvoice();
        // return view('razorpay');
    }

    public function payment(Request $request) {
        $amount = $request->amount;
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $orderData = [
            'receipt' => 'order' . rand(1000, 9000),
            'amount' => $amount * 100,
            'currency' => 'INR',
            'payment_capture' => 1 
        ];

         $order = $api->order->create($orderData);
         /* echo "<pre>";
         echo $order['amount'];
        //  print_r);
         exit; */
         $response = [];
         $response['amount'] = $order['amount'];
         $response['id'] = $order['id'];
         return view('payment', $response);
    }
}
