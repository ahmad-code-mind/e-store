@extends('frontend.frontend')

@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    {{-- <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a> --}}
                    <span>Order Details</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="order spad">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="order-table">
                    <table class="table table-bordered my-auto">
                        <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td class="t-num">{{ $order->tracking_no }}</td>
                                <td class="p-price">{{ $order->total_price }}</td>
                                <td class="p-status">{{ $order->status == '0' ? 'pending' : 'completed'}}</td>
                                <td>
                                    <a href="{{ route('view-order',$order->id) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection