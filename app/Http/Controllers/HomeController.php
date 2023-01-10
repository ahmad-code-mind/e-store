<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

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
        $cartitems = Cart::where('user_id',Auth::id())->get();
        $products = Product::where('status','1')->with('wishlist')->with('category')->get();
        $featured_products = Product::where('trending','1')->with('wishlist')->with('category')->take(5)->get();
        return view('frontend.content.content', compact('featured_products','cartitems','products'));
    }

    public function category(Request $request)
    {
        $cate_id = $request->cate_id;
        $data = Product::with('category')->where('products.category_id',$cate_id)->with('wishlist')->get();
        return view('frontend.category.index', ['data' => $data]);
    }

    public function productView($prod_slug)
    {
        $category = Categories::all();
        if(Product::where('slug', $prod_slug)->exists())
        {
            $products = Product::where('slug', $prod_slug)->first();  
            $rt = Rating::where('prod_id',$products->id);
            $ratings = $rt->get();
            $rating_sum = $rt->sum('stars_rated');
            $user_rating = $rt->where('user_id',Auth::id())->first();
            $user_review = Rating::where('prod_id',$products->id)->get();
            if ($ratings->count() > 0)
            {
                $rating_value = $rating_sum/$ratings->count();
            }else {
                $rating_value = 0;
            }
            return view('frontend.product_detail.detail', compact('products','ratings','rating_value','user_rating','user_review','category')); 
        } else {
            return redirect('/')->with('error',"The link was broken");
        }
    }
    
    public function quickView(Request $request)
    {
        $quickView = Product::find($request->id);
        return response()->json(["data" => $quickView]);
    }

    public function productlist()
    {
        $products = Product::select('name')->where('status',1)->get();
        $data = [];

        foreach ($products as $item)
        {
            $data[] = $item['name'];
        }
        return $data;
    }

    public function searchproduct(Request $request)
    {
        $search_product = $request->product_name;

        if ($search_product != "")
        {
            $product = Product::where('name',"LIKE","%$search_product%")->first();
            if($product){
                return redirect('/product'.'/'.$product->slug);
            }
        } else {
            return redirect()->back('status',"No Product Match your Search");
        }
    }

    public function contact()
    {
        return view('frontend.contact.contact');
    }
    
    public function faq()
    {
        return view('frontend.faq.faq');
    }
}