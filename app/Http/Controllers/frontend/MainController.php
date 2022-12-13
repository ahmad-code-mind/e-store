<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending','1')->take(15)->get();
        return view('frontend.frontend', compact('featured_products'));
    }
    public function profile()
    {
        if (Auth::check())
        {
            return redirect('login')->with('error', 'Please First Login');
        }
        else
        {
            return view('frontend.profile.profile');
        }
    }
    public function edit()
    {
        return view('frontend.profile.edit');
    }
    public function contact()
    {
        return view('frontend.contact.contact');
    }
}