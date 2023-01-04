<?php
    
namespace App\Http\Controllers\payments;
     
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Stripe\PaymentIntent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StripePaymentController extends Controller
{
    public function afterPayment()
    {
        echo 'Payment Received, Thanks you for using our services.';
    }

    public function insertStripeDataIntoDb(Request $request) {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->phone = $request->input('phone');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('cun');
        $order->pincode = $request->input('zip');
        $order->payment_mode = "Paid by Stripe";
        $order->payment_id = $request->input('payment_id');
        
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

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);
        return response()->json(['status' => "Order Placed Successfully"]);
    }
}