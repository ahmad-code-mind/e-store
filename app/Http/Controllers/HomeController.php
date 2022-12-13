<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
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
    
    public function featured_products()
    {
        $category = Categories::all();
        $featured_products = Product::where('trending','1')->take(5)->get();
        return view('frontend.content.content', compact('featured_products','category'));
    }
    // public function modelView($prod_slug)
    // {
    //     if(Product::where('slug', $prod_slug)->exists())
    //     {
    //         $modelProd = Product::where('slug', $prod_slug)->first();  
    //         return view('frontend.content.content', compact('modelProd')); 
    //     }
    // }
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
            return view('frontend.product_detail.detail', compact('products')); 
        } else {
            return redirect('/')->with('error',"The link was broken");
        }
    }
}