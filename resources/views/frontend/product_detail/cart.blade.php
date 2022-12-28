@extends('frontend.frontend')

@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    {{-- <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a> --}}
                    <span>Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            @foreach ($cartitems as $items)
            <div class="row product_data mb-5">
                <div class="col-md-2">
                    <img src="{{ asset('upload/image/product/'.$items->products->image) }}" class="text-center" alt="">
                </div>
                <div class="col-md-5">
                    <h6>
                        {{ $items->products->name }}
                    </h6>
                </div>
                <div class="col-md-3">
                    <input type="hidden" value="{{ $items->id }}" class="prod_id">
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3">
                        <div class="input-group-prepend">
                            <button class="input-group-text qtybtn decrement-btn">-</button>
                        </div>
                        <input type="text" name="quantity" value="{{ $items->prod_qty }}"
                            class="form-control qty-input text-center">
                        <div class="input-group-append">
                            <button class="input-group-text qtybtn increment-btn">+</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> --}}
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table product_data">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="first-row"></td>
                                <td class="first-row"></td>
                                <td class="first-row"></td>
                                <td class="first-row"></td>
                                <td class="first-row"></td>
                                <td class="first-row"></td>
                            </tr>
                            @php
                            $total = 0;
                            @endphp
                            @foreach ($cartitems as $items)
                            <tr class="product_data">
                                <td class="cart-pic"><img
                                        src="{{ asset('upload/image/product/'.$items->products->image) }}" alt=""
                                        width="170" height="170"></td>
                                <input type="hidden" value="{{ $items->products->id }}" class="prod_id">
                                <td class="cart-title">
                                    <h5>{{ $items->products->name }}</h5>
                                </td>
                                <td class="p-price" id="p-price">RS.{{ $items->products->selling_price }}</td>
                                @if ($items->products->qty >= $items->prod_qty)
                                <td class="qua-col">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <span class="dec qtybtn">-</span>
                                            <input id="qty" type="text" name="quantity" class="qty-input"
                                                value="{{ $items->prod_qty }}">
                                            <span class="inc qtybtn">+</span>
                                        </div>
                                    </div>
                                </td>
                                @php
                                $total += $items->products->selling_price * $items->prod_qty;
                                @endphp
                                <td class="total-price" id="s-total">RS.{{ $items->products->selling_price *
                                    $items->prod_qty }}</td>
                                @else
                                <td><label class="badge bg-danger p-2">Out of stock</label></td>
                                <td class="total-price" id="s-total">0</td>
                                @endif
                                <td class="close-td delete-cart-item"><i class="ti-close"></i></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div data-aos="fade-down" id="msg" class="bg-danger p-2" data-aos-easing="linear"
                        data-aos-duration="1000" style="cursor: pointer; display: none;"> !
                        No
                        Product To
                        Proceed
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                            <a href="#" class="primary-btn up-cart">Update cart</a>
                        </div>
                        <div class="discount-coupon">
                            <h6>Discount Codes</h6>
                            <form action="#" class="coupon-form">
                                <input type="text" placeholder="Enter your codes">
                                <button type="submit" class="site-btn coupon-btn">Apply</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Subtotal <span>$240.00</span></li>
                                <li class="cart-total">Total <span>Rs.{{ $total }}</span></li>
                            </ul>
                            @if ( $total == '0')
                            <a id="btn-proceed">PROCEED TO CHECK OUT</a>
                            @else
                            <a href="{{ route('cart.checkout') }}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@section('script')
<script>
    AOS.init();
    $(document).ready(function () {
        $('.inc').click(function (e) { 
            e.preventDefault();
            
            var inc_val = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(inc_val, 10);
            value = isNaN(value) ? '0' : value;
            if (value < 10)
            {
                value++;
                var set = $(this).closest('.product_data').find('.qty-input').val(value);
                console.log(set);
            }
        });
        $('.dec').click(function (e) { 
            e.preventDefault();

            var dec_val = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(dec_val, 10);
            value = isNaN(value) ? '0' : value;
            if (value > 1)
            {
                value--;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });
        $('.qtybtn').click(function (e) { 
            e.preventDefault();
            setTimeout(() => {
                var prod_id = $(this).closest('.product_data').find('.prod_id').val();
                var qty = $(this).closest('.product_data').find('.qty-input').val();
                var price = $(this).closest('.product_data').find('.p-price').html();;

                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        
                $.ajax({
                    type: "POST",
                    url: "/update-cart",
                    data: {
                        'prod_id':prod_id,
                        'prod_qty':qty,
                        'original_price':price,
                    },
                    success: function (response) {
                        // console.log(response.tprice);
                        window.location.reload();
                        // $(this).closest('.product_data').find('.total-price').text(response.tprice);
                    },
                });    
            }, 1000);
        });
        $('.delete-cart-item').click(function (e) { 
            e.preventDefault();
            
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
    
            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
                type: "POST",
                url: "/delete-cart-item",
                data: {
                    'prod_id':prod_id,
                },
                success: function (response) {
                    window.location.reload();
                    toastr.success(response.status);
                },
            });
        });

        $("#msg").click(function(){
            $(this).hide();
        });

        $("#btn-proceed").click(function(){ 
            $("#msg").css("display", "block");
        });
    });
</script>
@endsection
@endsection