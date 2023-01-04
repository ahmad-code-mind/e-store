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

    public static function wishlistCount(Request $request) {
        $wishlistcount = Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count' => $wishlistcount]);
    }

    public function updateWishlist(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            $countWishlist = Wishlist::where('user_id',Auth::id())->where('prod_id',$data['prod_id'])->count();

            $wishlist = new Wishlist();
            if ($countWishlist == 0)
            {
                $wishlist->prod_id = $data['prod_id'];
                $wishlist->user_id = Auth::id();
                $wishlist->save();
                return response()->json(['action' => 'add', 'status' => "Product added to Wishlist"]);
            }else {
                Wishlist::where('user_id', Auth::id())->where('prod_id', $data['prod_id'])->delete();
                return response()->json(['action' => 'remove', 'status' => "Item Removed from Wishlist"]);
            }
        }
    }
}