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
        <form action="{{ route('place-order') }}" method="POST" class="checkout-form">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    {{-- <div class="checkout-content">
                        <a href="#" class="content-btn">Click Here To Login</a>
                    </div> --}}
                    <h4>Biiling Details</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="fir">Name<span>*</span></label>
                            <input type="text" id="fir" name="name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="email">Email Address<span>*</span></label>
                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class=" col-lg-12">
                            <label for="street">Address 1<span>*</span></label>
                            <input type="text" id="street" class="street-first" name="address1"
                                value="{{ Auth::user()->address }}">
                        </div>
                        <div class=" col-lg-12">
                            <label for="street">Address 2<span>*</span></label>
                            <input type="text" id="street" class="street-first" name="address2">
                        </div>
                        <div class="col-lg-12">
                            <label for="phone">Phone<span>*</span></label>
                            <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                        </div>
                        <div class=" col-lg-6">
                            <label for="town">Town / City<span>*</span></label>
                            <input type="text" id="town" name="city" value="{{ Auth::user()->city }}">
                        </div>
                        <div class=" col-lg-6">
                            <label for="town">State<span>*</span></label>
                            <input type="text" id="town" name="state" value="{{ Auth::user()->state }}">
                        </div>
                        <div class=" col-lg-12">
                            <label for="cun">Country<span>*</span></label>
                            <input type="text" id="cun" name="country" value="{{ Auth::user()->country }}">
                        </div>
                        <div class=" col-lg-12">
                            <label for="zip">Postcode / ZIP</label>
                            <input type="text" id="zip" name="pincode" value="{{ Auth::user()->zip_code }}">
                        </div>
                        {{-- <div class=" col-lg-12">
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