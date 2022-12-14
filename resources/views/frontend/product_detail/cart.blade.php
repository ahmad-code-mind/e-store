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
                                <th><i class="ti-close"></i></th>
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
                            <tr>
                                <td class="cart-pic"><img
                                        src="{{ asset('upload/image/product/'.$items->products->image) }}" alt=""
                                        width="170" height="170"></td>
                                <input type="hidden" value="{{ $items->prod_id }}" class="prod_id">
                                <td class="cart-title">
                                    <h5>{{ $items->products->name }}</h5>
                                </td>
                                <td class="p-price" id="p-price">RS.{{ $items->products->selling_price }}</td>
                                <td class="qua-col">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" class="prod_qty" value="{{ $items->prod_qty }}">
                                        </div>
                                    </div>
                                </td>
                                @php
                                $subTotal = $items->products->selling_price * $items->prod_qty;
                                @endphp
                                <td class="total-price" id="p-total-p">RS.{{ $subTotal }}</td>
                                <td class="close-td delete-cart-item"><i class="ti-close"></i></td>
                            </tr>
                            @php
                            $total += $items->products->selling_price * $items->prod_qty;
                            @endphp
                            @endforeach
                            {{-- <tr>
                                <td class="cart-pic first-row"><img src="img/cart-page/product-1.jpg" alt=""></td>
                                <td class="cart-title first-row">
                                    <h5>Pure Pineapple</h5>
                                </td>
                                <td class="p-price first-row">$60.00</td>
                                <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row">$60.00</td>
                                <td class="close-td first-row"><i class="ti-close"></i></td>
                            </tr> --}}
                            {{-- <tr>
                                <td class="cart-pic"><img src="img/cart-page/product-2.jpg" alt=""></td>
                                <td class="cart-title">
                                    <h5>American lobster</h5>
                                </td>
                                <td class="p-price">$60.00</td>
                                <td class="qua-col">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price">$60.00</td>
                                <td class="close-td"><i class="ti-close"></i></td>
                            </tr>
                            <tr>
                                <td class="cart-pic"><img src="img/cart-page/product-3.jpg" alt=""></td>
                                <td class="cart-title">
                                    <h5>Guangzhou sweater</h5>
                                </td>
                                <td class="p-price">$60.00</td>
                                <td class="qua-col">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price">$60.00</td>
                                <td class="close-td"><i class="ti-close"></i></td>
                            </tr> --}}
                        </tbody>
                    </table>
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
                            <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $('.qtybtn').click(function (e) { 
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.prod_qty').val();

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
            },
            success: function (response) {
                window.location.reload();
            },
        });
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
</script>
@endsection