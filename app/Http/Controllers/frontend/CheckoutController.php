<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if (!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.shipping.shipping', compact('cartitems'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->phone = $request->input('phone');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        // Calculate Total
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
            $total += $prod->products->selling_price;
        }
        
        $order->total_price = $total;
        $order->tracking_no = rand(1111,9999);
        
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $items)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $items->prod_id,
                'qty' => $items->prod_qty,
                'price' => $items->products->selling_price,
            ]);

            $prod = Product::where('id',$items->prod_id)->first();
            $prod->qty = $prod->qty - $items->prod_qty;
            $prod->update();
        }

        return redirect('/')->with('status',"Order Placed Successfully");
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