@extends('frontend.frontend')

@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Detail Product</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('product-rating') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $products->id }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate {{ $products->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            <input type="radio" value="1" name="product_rating" checked id="rating1">
                            <label for="rating1" class="fa fa-star"></label>
                            <input type="radio" value="2" name="product_rating" id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" value="3" name="product_rating" id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            <input type="radio" value="4" name="product_rating" id="rating4">
                            <label for="rating4" class="fa fa-star"></label>
                            <input type="radio" value="5" name="product_rating" id="rating5">
                            <label for="rating5" class="fa fa-star"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 border-right text-center my-auto">
                    <img src="{{ asset('upload/image/product/'.$products->image) }}" alt="">
                </div>
                <div class="col-md-9">
                    <h2 class="mb-0">
                        {{ $products->name }}
                        @if ($products->trending == '1')
                        <label style="font-size: 16px; border-radius: 10px"
                            class="float-right bg-danger trending_tag p-2">Trending</label>
                        @endif
                    </h2>
                    <hr>
                    <label class="mr-3">Original Price : <s>Rs {{ $products->original_price }}</s></label>
                    <label class="font-weight-bold">Selling Price : Rs {{ $products->selling_price }}</label>
                    @php
                    $ratenum = number_format($rating_value)
                    @endphp
                    <div class="rating">
                        @for ($i = 1; $i <= $ratenum; $i++) <li class="fa fa-star checked">
                            </li>
                            @endfor
                            @for ($j = $ratenum+1; $j <= 5; $j++) <li class="fa fa-star">
                                </li>
                                @endfor
                                <span>{{ $ratings->count() }} Ratings</span>
                    </div>
                    <p class="mt-2">
                        {!! $products->small_description !!}
                    </p>
                    <hr>
                    @if ($products->qty > 0)
                    <label class="badge bg-success">In stock</label>
                    @else
                    <label class="badge bg-danger">Out of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{ $products->id }}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <div class="input-group-prepend">
                                    <button class="input-group-text decrement-btn">-</button>
                                </div>
                                <input type="text" name="quantity" value="1" class="form-control qty-input text-center">
                                <div class="input-group-append">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <br>
                            @if ($products->qty > 0)
                            <button type="button" class="btn btn-primary addToCartBtn ml-3 float-left"><i
                                    class="fa fa-cart mr-1"></i>Add to Cart</button>
                            @endif
                            <button type="button" class="btn btn-success addToWishList ml-3 float-left"><i
                                    class="fa fa-heart mr-1"></i>Add to Wishlist</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <h3>Description</h3>
                <p class="mt-3">
                    {!! $products->description !!}
                </p>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Rate This Product
            </button>
        </div>
    </div>
</div>
{{-- <div class="row">
    <div class="col-lg-4">
        <div class="set-card-tile set-border-img p-4 mt-4">
            <div class="set-img-card-cate set-img-height-332">
                <img src="assets/images/card-5.png">
            </div>
            <div class="set-sm-images mt-4">
                <div class="set-org-img set-for-sm-imgs">
                    <a href="#"><img src="{{ (" frontend/assets/images/card-1.png") }}"></a>
                </div>
                <div class="set-org-img set-for-sm-imgs">
                    <a href="#"><img src="assets/images/card-5.png"></a>
                </div>
                <div class="set-org-img set-for-sm-imgs">
                    <a href="#"><img src="assets/images/card-6.png"></a>
                </div>
                <div class="set-org-img set-for-sm-imgs">
                    <a href="#"><img src="assets/images/card-1.png"></a>
                </div>
                <div class="set-org-img set-for-sm-imgs">
                    <a href="#"><img src="assets/images/card-5.png"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="set-card-tile p-4">
            <div>
                <h4 class="set-head-size set-font-15">Men's Running Pants Gym Workout Sportswear Sports Jogging Pants
                    Pure Cotton Fitness Sports Pants 2021 Spring/Summer Casual Pants</h4>
            </div>
            <div class="row">
                <div class="col-md-6 mt-2">
                    <div class="">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="f-14">(22)</span>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="text-end">
                        <small>4 Reviews</small>
                        <small>18 orders</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="set-s-price-cate set-color-red">
                        <h5 class="mb-0"><s>$199.00</s>&nbsp;&nbsp; $99.98</h5>
                    </div>
                </div>
            </div>
            <div class="set-discount-badge mt-3">
                <button class="set-purple-btn">US $2.00 off on US $2.01</button>
                <span class="f-14 c-purple">Get coupons</span>
            </div>
            <div class="row align-items-center set-border-top-bottom mt-3">
                <div class="col-md-12 mt-2 mb-2">
                    <div class="row">
                        <div class="col-4 set-text-bold-simple">
                            <span class="f-14">Monthly sales <strong>28</strong></span>
                        </div>
                        <div class="col-4 set-text-bold-simple">
                            <span class="f-14">Cumulative evaluation<strong>20</strong></span>
                        </div>
                        <div class="col-4 set-text-bold-simple">
                            <span class="f-14">Give mall Points <strong>595</strong></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="mt-4">
                    <h6>Color</h6>
                </div>
                <div class="set-sm-images set-tile-imgs">
                    <div class="set-org-img">
                        <a href="#"><img src="assets/images/card-1.png"></a>
                    </div>
                    <div class="set-org-img">
                        <a href="#"><img src="assets/images/card-5.png"></a>
                    </div>
                    <div class="set-org-img">
                        <a href="#"><img src="assets/images/card-6.png"></a>
                    </div>
                    <div class="set-org-img">
                        <a href="#"><img src="assets/images/card-1.png"></a>
                    </div>
                    <div class="set-org-img">
                        <a href="#"><img src="assets/images/card-5.png"></a>
                    </div>
                    <div class="set-org-img">
                        <a href="#"><img src="assets/images/card-6.png"></a>
                    </div>
                    <div class="set-org-img">
                        <a href="#"><img src="assets/images/card-6.png"></a>
                    </div>
                    <div class="set-org-img">
                        <a href="#"><img src="assets/images/card-6.png"></a>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="mt-4">
                    <h6>Size</h6>
                </div>
                <div class="set-sm-images set-tile-imgs">
                    <div class="set-org-img">
                        <a href="#">XS</a>
                    </div>
                    <div class="set-org-img">
                        <a href="#">S</a>
                    </div>
                    <div class="set-org-img">
                        <a href="#">M</a>
                    </div>
                    <div class="set-org-img">
                        <a href="#">L</a>
                    </div>
                    <div class="set-org-img">
                        <a href="#">XL</a>
                    </div>
                    <div class="set-org-img">
                        <a href="#">XXL</a>
                    </div>
                    <div class="set-org-img">
                        <a href="#">3XL</a>
                    </div>
                    <div class="set-org-img">
                        <a href="#">4XL</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="mt-4">
                    <h6>Quantity</h6>
                </div>
                <div class="mt-3">
                    <div class="counter">
                        <span class="down" onClick='decreaseCount(event, this)'>-</span>
                        <input type="text" value="1">
                        <span class="up" onClick='increaseCount(event, this)'>+</span>
                        <h6 class="f-14">&nbsp;&nbsp;75 pieces available </h6>
                    </div>
                </div>
            </div>
            <!-- BTNS -->
            <div class="set-btn-blue-red mt-4">
                <div class="btn-red mt-2">
                    <a href="#" class="btn-red-all-buy">Buy it Now</a>
                </div>
                <div class="btn-red mt-2 ms-2">
                    <a href="#" class="btn-blue-all-cart">Add to Cart</a>
                </div>
                <div class="mt-2 ms-4">
                    <span><i class="fa fa-heart-o"></i> 335</span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="mt-2">
                        <h6>Pledge</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-2">
                        <a href="#" class="set-font-min">
                            <h5><img src="assets/images/fast-backward.png">&nbsp; Fast refund</h5>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="set-text-view-more">
                        <a href="#">Payements&nbsp;<i class="fa fa-angle-down"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 mb-3">
        <div class="text-center mt-4">
            <small class="f-14">Watch and watch</small>
        </div>
        <div>
            <div class="set-card-1 mt-2">
                <div class="set-card-img">
                    <img src="assets/images/hud-2.png">
                </div>
                <div class="set-s-price-cate set-color-red set-font-sm mt-3 text-center">
                    <h5 class="mb-0"><s>$199.00</s>&nbsp;&nbsp; $99.98</h5>
                </div>
            </div>
            <div class="set-card-1 mt-2">
                <div class="set-card-img">
                    <img src="assets/images/hud-2.png">
                </div>
                <div class="set-s-price-cate set-color-red set-font-sm mt-3 text-center">
                    <h5 class="mb-0"><s>$199.00</s>&nbsp;&nbsp; $99.98</h5>
                </div>
            </div>
            <div class="set-card-1 mt-2">
                <div class="set-card-img">
                    <img src="assets/images/hud-2.png">
                </div>
                <div class="set-s-price-cate set-color-red set-font-sm mt-3 text-center">
                    <h5 class="mb-0"><s>$199.00</s>&nbsp;&nbsp; $99.98</h5>
                </div>
            </div>
            <div class="set-card-1 mt-2">
                <div class="set-card-img">
                    <img src="assets/images/hud-2.png">
                </div>
                <div class="set-s-price-cate set-color-red set-font-sm mt-3 text-center">
                    <h5 class="mb-0"><s>$199.00</s>&nbsp;&nbsp; $99.98</h5>
                </div>
            </div>
        </div>

    </div>
</div> --}}
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

        $('.addToWishList').click(function (e) { 
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.prod_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/add-to-wishlist",
                data: {
                    'product_id':product_id,
                },
                success: function (response) {
                    toastr.success(response.status);
                }
            });
            
        });

        $('.increment-btn').click(function (e) { 
            e.preventDefault();
            
            var inc_val = $('.qty-input').val();
            var value = parseInt(inc_val, 10);
            value = isNaN(value) ? '0' : value;
            if (value < 10)
            {
                value++;
                $('.qty-input').val(value);
            }
        });
        $('.decrement-btn').click(function (e) { 
            e.preventDefault();
            
            var dec_val = $('.qty-input').val();
            var value = parseInt(dec_val, 10);
            value = isNaN(value) ? '0' : value;
            if (value > 1)
            {
                value--;
                $('.qty-input').val(value);
            }
        });
    });
</script>
@endsection
@endsection