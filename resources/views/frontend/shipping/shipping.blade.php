@extends('frontend.frontend')

@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    {{-- <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a> --}}
                    <span>Shipping</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="checkout-section spad">
    <div class="container">
        <form action="#" class="checkout-form">
            <div class="row">
                <div class="col-lg-6">
                    {{-- <div class="checkout-content">
                        <a href="#" class="content-btn">Click Here To Login</a>
                    </div> --}}
                    <h4>Biiling Details</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="fir">Name<span>*</span></label>
                            <input type="text" id="fir">
                        </div>
                        <div class="col-lg-12">
                            <label for="email">Email Address<span>*</span></label>
                            <input type="text" id="email">
                        </div>
                        <div class="col-lg-12">
                            <label for="street">Street Address<span>*</span></label>
                            <input type="text" id="street" class="street-first">
                            <input type="text">
                        </div>
                        <div class="col-lg-6">
                            <label for="town">Town / City<span>*</span></label>
                            <input type="text" id="town">
                        </div>
                        <div class="col-lg-6">
                            <label for="phone">Phone<span>*</span></label>
                            <input type="text" id="phone">
                        </div>
                        <div class="col-lg-12">
                            <label for="cun">Country<span>*</span></label>
                            <input type="text" id="cun">
                        </div>
                        <div class="col-lg-12">
                            <label for="zip">Postcode / ZIP (optional)</label>
                            <input type="text" id="zip">
                        </div>
                        {{-- <div class="col-lg-12">
                            <div class="create-item">
                                <label for="acc-create">
                                    Create an account?
                                    <input type="checkbox" id="acc-create">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- <div class="checkout-content">
                        <input type="text" placeholder="Enter Your Coupon Code">
                    </div> --}}
                    <div class="place-order">
                        <h4>Your Order</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Product <span>Total</span></li>
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($cartitems as $items)
                                <li class="fw-normal">{{ $items->products->name }} x {{ $items->prod_qty }}
                                    <span>RS.{{ $items->products->selling_price *
                                        $items->prod_qty }}</span>
                                </li>
                                @endforeach
                                @php
                                $total += $items->products->selling_price * $items->prod_qty;
                                @endphp
                                <li class="total-price">Total <span>Rs.{{ $total }}</span></li>
                            </ul>
                            <div class="payment-check">
                                {{-- <div class="pc-item">
                                    <label for="pc-check">
                                        Cheque Payment
                                        <input type="checkbox" id="pc-check">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> --}}
                                <div class="pc-item">
                                    <label for="pc-paypal">
                                        Paypal
                                        <input type="checkbox" id="pc-paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="pc-item">
                                    <label for="pc-stripe">
                                        Stripe
                                        <input type="checkbox" id="pc-stripe">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="order-btn">
                                <button type="submit" class="site-btn place-btn">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection