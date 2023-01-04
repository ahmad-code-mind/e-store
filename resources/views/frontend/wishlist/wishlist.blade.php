@extends('frontend.frontend')

@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    {{-- <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a> --}}
                    <span>Wishlist</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="wishlist spad">
    <div class="container">
        @if ($wishlist->count() > 0)
        <div class="row">
            <div class="col-lg-12">
                <div class="wishlist-table product_data">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th class="addtocart">Cart</th>
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
                            @foreach ($wishlist as $items)
                            <tr class="product_data">
                                <td class="wishlist-pic"><img
                                        src="{{ asset('upload/image/product/'.$items->products->image) }}" alt=""
                                        width="170" height="170"></td>
                                <input type="hidden" value="{{ $items->prod_id }}" class="prod_id">
                                <td class="wishlist-title">
                                    <h5>{{ $items->products->name }}</h5>
                                </td>
                                <td class="p-price" id="p-price">${{ $items->products->selling_price }}.00</td>
                                <td class="mx-auto"><button type="button" class="btn btn-primary addToCartBtn ml-3"><i
                                            class="fa fa-cart mr-1"></i>Add to Cart</button></td>
                                <td class="close-td delete-wishlist-item"><i class="ti-close"></i></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-body">
                <h3 class="bg-info p-3 text-center">No Product in Wishlist</h3>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.addToCartBtn').click(function (e) { 
            e.preventDefault();
            
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id':product_id,
                    'product_qty':product_qty,
                },
                success: function (response) {
                    if (response.status)
                    {
                        toastr.success(response.status);
                    } else if (response.error){
                        toastr.error(response.error);
                    }
                }
            });
        });
        $('.delete-wishlist-item').click(function (e) { 
            e.preventDefault();
            
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
    
            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
                type: "POST",
                url: "/delete-wishlist-item",
                data: {
                    'prod_id':prod_id,
                },
                success: function (response) {
                    window.location.reload();
                    toastr.success(response.status);
                },
            });
        });
    });
</script>
@endsection