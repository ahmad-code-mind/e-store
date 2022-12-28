<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // dd('1');
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.frontend');
    }
    
    public function featured_products(Request $request)
    {
        $category = Categories::all();
        $featured_products = Product::where('trending','1')->with('wishlist')->with('category')->take(5)->get();
        return view('frontend.content.content', compact('featured_products','category'));
    }
    public function contact()
    {
        return view('frontend.contact.contact');
    }
    public function productlistAjax()
    {
        $products = Product::select('name')->where('status','0')->get();
        $data = [];

        foreach($products as $item)
        {
            $data[] = $item['name'];
        }
        return $data;
    }
    public function productView($prod_slug)
    {
        if(Product::where('slug', $prod_slug)->exists())
        {
            $products = Product::where('slug', $prod_slug)->first();  
            $ratings = Rating::where('prod_id',$products->id)->get();
            $rating_sum = Rating::where('prod_id',$products->id)->sum('stars_rated');
            if ($ratings->count() > 0)
            {
                $rating_value = $rating_sum/$ratings->count();
            }else {
                $rating_value = 0;
            }
            return view('frontend.product_detail.detail', compact('products','ratings','rating_value')); 
        } else {
            return redirect('/')->with('error',"The link was broken");
        }
    }
    public function quickView(Request $request)
    {
        $quickView = Product::find($request->id);
        return response()->json(["data" => $quickView]);
    }
}