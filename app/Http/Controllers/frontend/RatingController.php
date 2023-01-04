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
        $product_review = $request->input('product_review');
        $prod_check = Product::where('id',$product_id)->where('status','1')->first();
        if ($prod_check)
        {
            $verified_purchase = Order::where('orders.user_id',Auth::id())
                ->join('order_items','order_id','order_items.order_id')
                ->where('order_items.prod_id',$product_id)->get();
            if($verified_purchase->count())
            {
                $existing_rating = Rating::where('user_id',Auth::id())->where('prod_id', $product_id)->first();
                if($existing_rating)
                {
                    $existing_rating->stars_rated = $rating;
                    $existing_rating->prod_review = $product_review;
                    $existing_rating->update();
                }else {
                    Rating::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $product_id,
                        'stars_rated' => $rating,
                        'prod_review' => $product_review
                    ]);
                }
                return redirect()->back()->with('status',"Thank You for Rating Product");   
            }else {
                return redirect()->back()->with('info',"You cannot rate this product without purchase");
            }
        }else {
            return redirect()->back()->with('error',"The link was broken");
        }
    }
}