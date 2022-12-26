<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        // foreach($old_cartitems as $item)
        // {
        //     if (!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
        //     {
        //         $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
        //         $removeItem->delete();
        //     }
        // }
        // $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.shipping.shipping', compact('cartitems'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->name = $request->input('name');
    }

//     public function checkout()
//     {   
//         // Enter Your Stripe Secret
//         \Stripe\Stripe::setApiKey('sk_test_51M9lIkJiRBCGoE6wY9j3ppIhw5UzGO4UNnPrzDxVW7pzEL2P0wCR2vYziRWLknqOSj24aroCs4tA8lFUkrgLHBwW006JqG5W9K');

        		
// 		$amount = 100;
// 		$amount *= 100;
//         $amount = (int) $amount;
        
//         $payment_intent = PaymentIntent::create([
// 			'description' => 'Stripe Test Payment',
// 			'amount' => $amount,
// 			'currency' => 'AUD',
// 			'description' => 'Payment From All About Laravel',
// 			'payment_method_types' => ['card'],
// 		]);
// 		$intent = $payment_intent->client_secret;

// 		return view('frontend.payment.stripe',compact('intent'));

//     }
}