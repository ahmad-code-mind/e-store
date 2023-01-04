<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $category = Categories::all();
        $product = Product::all();
        $activeorder = Order::where('status',0)->get();
        $comorder = Order::where('status',1)->get();
        return view('admin.index',compact('category','product','activeorder','comorder'));
    }
}