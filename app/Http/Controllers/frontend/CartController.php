<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('frontend.product_detail.detail');
    }

    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            $prod_check = Product::where('id', $product_id)->first();
            if($prod_check)
            {
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $prod_check->name." Already Added to Cart"]);
                }
                else
                {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name." Added to Cart"]);
                }
            }
        }
        else
        {
            return response()->json([
                'error' => "Login to Continue"
            ]);
        }
    }

    public function viewCart()
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.product_detail.cart', compact('cartitems'));
    }

    public function updatecart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
        $product_price = $request->input('selling_price');

        if(Auth::check())
        {
            $cart = Cart::where('prod_id', $prod_id)->where('user_id',Auth::user()->id)->first();
            if($cart)
            {
                $cart->prod_qty = $product_qty;
                $cart->update();
                $qty = number_format((int)$product_qty);
                $price = number_format((int)$product_price);
                $total = $qty * $price;

                return response()->json([
                    'status' => "Quantity Updated",
                    'total' => ''.$total.''
                ]);
            }
        }
    }

    public function deleteproduct(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Cart::where('prod_id', $prod_id)->where('user_id',Auth::id())->exists())
            {
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json([
                    'status' => "Product Deleted"
                ]);
            }
        } else {
            return response()->json([
                'status' => "Login to Continue"
            ]);
        }
    }

    public function cartcount()
    {
        $cartcount = Cart::where('user_id',Auth::id())->count();
        return response()->json(['count' => $cartcount]);
    }
}