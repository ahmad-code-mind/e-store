<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('status','0')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->first();
        return view("admin.order.view", compact('orders'));
    }

    public function update(Request $request ,$id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('admin/order')->with('status',"Order Updated Successfully");
    }

    public function orderhistory()
    {
        $orders = Order::where('status','1')->get();
        return view('admin.order.history', compact('orders'));
    }
}
