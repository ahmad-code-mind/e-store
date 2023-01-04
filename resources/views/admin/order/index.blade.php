@extends('admin.admin')

@section('content')
<div class="btn-group float-right">
    <ol class="breadcrumb hide-phone p-0 m-0">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Order</li>
    </ol>
</div>
<section class="order spad">
    <div class="container">
        <div class="card ">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between;margin-bottom: 10px;">
                    <h2 class="mb-2">Order</h2>
                    <a href="{{ route('order-history') }}">
                        <button class="btn btn-outline-primary float-right">Order History</button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="order-table">
                            <table class="table table-bordered my-auto">
                                <thead>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Tracking Number</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td class="t-num">{{ date('d-m-y',strtotime($order->created_at)) }}</td>
                                        <td class="t-num">{{ $order->tracking_no }}</td>
                                        <td class="p-price">{{ $order->total_price }}</td>
                                        <td class="p-status">{{ $order->status == '0' ? 'pending' : 'completed'}}</td>
                                        <td>
                                            <a href="{{ route('admin.order-view',$order->id) }}"
                                                class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection