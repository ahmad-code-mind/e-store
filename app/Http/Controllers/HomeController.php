<?php

namespace App\Http\Controllers;

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
        $featured_products = Product::where('trending','1')->take(5)->get();
        return view('frontend.content.content', compact('featured_products'));
    }
    public function contact()
    {
        return view('frontend.contact.contact');
    }
}