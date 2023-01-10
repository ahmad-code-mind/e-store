<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index(){
        if (Gate::allows('admin.view'))
        {
            $category = Categories::all();
            $product = Product::all();
            $activeorder = Order::where('status',0)->get();
            $comorder = Order::where('status',1)->get();
            return view('admin.index',compact('category','product','activeorder','comorder'));
        } else {
            abort(404);
        }
    }
}