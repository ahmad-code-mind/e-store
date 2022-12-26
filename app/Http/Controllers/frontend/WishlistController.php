<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist.wishlist', compact('wishlist'));
    }
    public function add(Request $request)
    {
        $product_id = $request->input('product_id');
        dd($product_id);
        if(Auth::check())
        {
            $prod_check = Product::where('id', $product_id)->first();
            if($prod_check)
            {
                if(Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => "Already Added to Wishlist"]);
                }else{
                    $wish = new Wishlist();
                    $wish->prod_id = $product_id;
                    $wish->user_id = Auth::id();
                    $wish->save();
                    return response()->json(['status' => "Product added to Wishlist"]);
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

    public function deleteitem(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Wishlist::where('prod_id', $prod_id)->where('user_id',Auth::id())->exists())
            {
                $cartItem = Wishlist::where('prod_id', $prod_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json([
                    'status' => "Item Removed from Wishlist"
                ]);
            }
        } else {
            return response()->json([
                'status' => "Login to Continue"
            ]);
        }
    }
}