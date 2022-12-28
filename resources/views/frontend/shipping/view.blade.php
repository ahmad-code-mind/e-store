@extends('frontend.frontend')

@section('content')
<style>
    .title,
    p.bold {
        font-weight: 700;
    }

    .order-total {
        border: 2px solid #ebebeb;
        background: #f3f3f3;
        padding-left: 25px;
        padding-right: 25px;
        padding-top: 16px;
        padding-bottom: 20px;
    }

    .order-total h4 {
        font-size: 16px;
        font-weight: 700;
        color: #252525;
        text-transform: uppercase;
        overflow: hidden;
    }

    .order-total h4 span {
        float: right
    }

    .order-total h4.ot-total {
        padding-top: 10px;
    }

    .order-total h4 span {
        color: #e7ab3c;
    }
</style>
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    {{-- <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a> --}}
                    <span>Order View</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 20px">
    <div class="card">
        <div class="card-header p-3">
            <div style="display: flex; justify-content: space-between;margin-bottom: 10px;">
                <h4 class="title">Order View</h4>
                <a href="{{ route('order-detail') }}">
                    <button class="btn btn-outline-primary">Back</button>
                </a>
            </div>
        </div>
        <div class="card-body p-3">
            <div class="row">
                <div class="col-lg-6">
                    <h4>Shipping Details</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0 bold">Name</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">{{ $orders->name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0 bold">Email</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">{{ $orders->email }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0 bold">Phone</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">{{ $orders->phone }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0 bold">Shipping Address</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">{{ $orders->address1 }},{{ $orders->address1 }},{{ $orders->city
                                }}
                                {{ $orders->state }} {{ $orders->country }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0 bold">Zip Code</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">{{ $orders->pincode }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>Order Details</h4>
                    <hr>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders->orderItems as $order)
                            <tr>
                                <td>{{ $order->products->name }}</td>
                                <td>{{ $order->qty }}</td>
                                <td>{{ $order->price }}</td>
                                <td><img src="{{asset('upload/image/product/'.$order->products->image)}}" width="50"
                                        height="50"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="order-total">
                        <h4 class="ot-price">Total <span>Rs.{{ $orders->total_price }}</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection