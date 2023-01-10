<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrdersController extends Controller
{
    public function index()
    {
        if (Gate::allows('order.view'))
        {
            $orders = Order::where('status','0')->get();
            return view('admin.order.index', compact('orders'));
        } else {
            abort(403, "You don't have permission to access");
        }
    }

    public function view($id)
    {
        if (Gate::allows('order.viewdetail'))
        {
            $orders = Order::where('id', $id)->first();
            return view("admin.order.view", compact('orders'));
        } else {
            abort(403, "You don't have permission to access");
        }   
    }

    public function update(Request $request ,$id)
    {
        if (Gate::allows('order.update'))
        {
            $orders = Order::find($id);
            $orders->status = $request->input('order_status');
            $orders->update();
            return redirect('admin/order')->with('status',"Order Updated Successfully");
        } else {
            abort(403, "You don't have permission to access");
        }
    }

    public function orderhistory()
    {
        if (Gate::allows('order.history'))
        {
            $orders = Order::where('status','1')->get();
            return view('admin.order.history', compact('orders'));
        } else {
            abort(403, "You don't have permission to access");
        }
    }
}