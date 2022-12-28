<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function rating(Request $request)
    {
        $rating = $request->input('product_rating');
        $product_id = $request->input('product_id');
        // $prod_check = Product::where('id',$product_id)->where('status','0')->first();
        // dd($prod_check);

        $existing_rating = Rating::where('user_id',Auth::id())->where('prod_id', $product_id)->first();
                if($existing_rating)
                {
                    $existing_rating->$rating = $rating;
                    $existing_rating->update();
                }else {
                    Rating::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $product_id,
                        'stars_rated' => $rating
                    ]);
                }
                return redirect()->back()->with('status',"Thank You for Rating Product");
        // $prod_check = Product::where('id',$product_id)->where('status','0')->first();
        // if ($prod_check)
        // {
        //     $verified_purchase = Order::where('order.user_id',Auth::id())
        //         ->join('order_items','order_id','order_items.order_id')
        //         ->where('order_items.prod_id',$product_id)->get();
        //     if($verified_purchase)
        //     {
                
        //     }else {
        //         return redirect()->back()->with('info',"You cannot rate this product without purchase");
        //     }
        // }else {
        //     return redirect()->back()->with('error',"The link was broken");
        // }
    }
}