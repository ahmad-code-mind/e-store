@extends('frontend.frontend')

@section('content')
<style>
    .product_view .modal-dialog {
        max-width: 1000px;
        width: 100%;
    }

    .pre-cost {
        text-decoration: line-through;
        color: #a5a5a5;
    }

    .space-ten {
        padding: 10px 0;
    }

    /* .fa-heart:hover {
        color: red;
    } */

    .red {
        color: red;
    }
</style>
<section class="featured-banner">
    <div class="container">
        <div class="row">
            <h2 class="mb-4">Featured Products</h2>
            <div class="product-slider owl-carousel">
                @foreach ($featured_products as $prod)
                <div class="product-item product_data">
                    <div class="pi-pic">
                        <a href="{{ url('product/'.$prod->slug) }}">
                            <img src="{{ asset('upload/image/product/'.$prod->image) }}" alt="" />
                        </a>
                        <input type="hidden" value="{{ $prod->id }}" class="prod_id">
                        <div class="sale">Sale</div>
                        <div class="icon" data-productid="{{ $prod->id }}">
                            @if($prod->wishlist == null)
                            <i class="far fa-heart addToWishList"></i>
                            @else
                            <i class="fas fa-heart delete-wishlist-item" style="color: red;"></i>
                            @endif
                        </div>
                        <ul>
                            {{-- <li class="w-icon active">
                                <a href="#"><i class="icon_bag_alt"></i></a>
                            </li> --}}
                            {{-- @dd($prod->id) --}}
                            <li class="quick-view"><a style="cursor: pointer;" id="quickView"
                                    onclick="quickview({{ $prod->id }})" data-id="{{ $prod->id }}">+
                                    Quick
                                    View</a></li>
                            {{-- <li class="w-icon">
                                <a href="#"><i class="fa fa-random"></i></a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">{{ $prod->category->name }}</div>
                        <a href="#">
                            <h5>{{ $prod->name }}</h5>
                        </a>
                        <div class="product-price">
                            RS.{{ $prod->selling_price }}
                            <span>RS.{{ $prod->original_price }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="featured-banner">
    <div class="container">
        <div class="row">
            <h2 class="mb-4">Categories</h2>
            <div class="product-slider owl-carousel">
                @foreach ($featured_products as $prod)
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{ asset('upload/image/product/'.$prod->image) }}" alt="" />
                        <div class="sale">Sale</div>
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active">
                                <a href="#"><i class="icon_bag_alt"></i></a>
                            </li>
                            <li class="quick-view"><a href="#">+ Quick View</a></li>
                            <li class="w-icon">
                                <a href="#"><i class="fa fa-random"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        @foreach ($category as $cat)
                        <div class="catagory-name">{{ $cat->name }}</div>
                        @endforeach
                        <a href="#">
                            <h5>{{ $prod->name }}</h5>
                        </a>
                        <div class="product-price">
                            RS.{{ $prod->selling_price }}
                            <span>RS.{{ $prod->original_price }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<div class="modal fade product_view p-5" id="product_view">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> --}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 product_img">
                        <img id="product_img" src="" class="img-responsive">
                    </div>
                    <div class="col-md-6 product_content">
                        <h4 id="product_title" class="mb-3"></h4>
                        <p id="product_descrip" class="mb-3"></p>
                        <h3 class="cost" style="color: #e7ab3c"><span id="product_selling_price"></span>
                            <span><small class="pre-cost" id="product_original_price"></span></small>
                        </h3>
                        {{-- <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <select class="form-control" name="select">
                                    <option value="" selected="">Color</option>
                                    <option value="black">Black</option>
                                    <option value="white">White</option>
                                    <option value="gold">Gold</option>
                                    <option value="rose gold">Rose Gold</option>
                                </select>
                            </div>
                            <!-- end col -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <select class="form-control" name="select">
                                    <option value="">Capacity</option>
                                    <option value="">16GB</option>
                                    <option value="">32GB</option>
                                    <option value="">64GB</option>
                                    <option value="">128GB</option>
                                </select>
                            </div>
                            <!-- end col -->
                            <div class="col-md-4 col-sm-12">
                                <select class="form-control" name="select">
                                    <option value="" selected="">QTY</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </div>
                            <!-- end col -->
                        </div> --}}
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                            <button type="button" class="btn btn-success ml-3 addToCartBtn float-left"><i
                                    class="fa fa-heart mr-1"></i>Add to Wishlist</button>
                            <button type="button" class="btn btn-success ml-3 float-left"><i
                                    class="fa fa-cart mr-1"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="{{ asset('frontend/img/banner-1.jpg') }}" alt="" />
                    <div class="inner-text">
                        <h4>Men’s</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="{{ asset('frontend/img/banner-2.jpg') }}" alt="" />
                    <div class="inner-text">
                        <h4>Women’s</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="{{ asset('frontend/img/banner-3.jpg') }}" alt="" />
                    <div class="inner-text">
                        <h4>Kid’s</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="{{ asset('frontend/img/products/women-large.jpg') }}">
                    <h2>Women’s</h2>
                    <a href="#">Discover More</a>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                        <li class="active">Clothings</li>
                        <li>HandBag</li>
                        <li>Shoes</li>
                        <li>Accessories</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-1.jpg" alt="" />
                            <div class="sale">Sale</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active">
                                    <a href="#"><i class="icon_bag_alt"></i></a>
                                </li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon">
                                    <a href="#"><i class="fa fa-random"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Coat</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $14.00
                                <span>$35.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-2.jpg" alt="" />
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active">
                                    <a href="#"><i class="icon_bag_alt"></i></a>
                                </li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon">
                                    <a href="#"><i class="fa fa-random"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Shoes</div>
                            <a href="#">
                                <h5>Guangzhou sweater</h5>
                            </a>
                            <div class="product-price">$13.00</div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-3.jpg" alt="" />
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active">
                                    <a href="#"><i class="icon_bag_alt"></i></a>
                                </li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon">
                                    <a href="#"><i class="fa fa-random"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">$34.00</div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-4.jpg" alt="" />
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active">
                                    <a href="#"><i class="icon_bag_alt"></i></a>
                                </li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon">
                                    <a href="#"><i class="fa fa-random"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Converse Shoes</h5>
                            </a>
                            <div class="product-price">$34.00</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="deal-of-week set-bg spad mb-5" data-setbg="{{ asset('frontend/img/time-bg.jpg') }}">
    <div class="container">
        <div class="col-lg-6 text-center">
            <div class="section-title">
                <h2>Deal Of The Week</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br />
                    do ipsum dolor sit amet, consectetur adipisicing elit
                </p>
                <div class="product-price">
                    $35.00
                    <span>/ HanBag</span>
                </div>
            </div>
            <div class="countdown-timer" id="countdown">
                <div class="cd-item">
                    <span>56</span>
                    <p>Days</p>
                </div>
                <div class="cd-item">
                    <span>12</span>
                    <p>Hrs</p>
                </div>
                <div class="cd-item">
                    <span>40</span>
                    <p>Mins</p>
                </div>
                <div class="cd-item">
                    <span>52</span>
                    <p>Secs</p>
                </div>
            </div>
            <a href="#" class="primary-btn">Shop Now</a>
        </div>
    </div>
</section> --}}

{{-- <section class="man-banner spad">
    <div class="container">
        <div class="row">
            <div class="product-slider owl-carousel">
                @foreach ($featured_products as $prod)
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{ asset('upload/image/product/'.$prod->image) }}" alt="" />
                        <div class="sale">Sale</div>
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active">
                                <a href="#"><i class="icon_bag_alt"></i></a>
                            </li>
                            <li class="quick-view"><a href="#">+ Quick View</a></li>
                            <li class="w-icon">
                                <a href="#"><i class="fa fa-random"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">Coat</div>
                        <a href="#">
                            <h5>Pure Pineapple</h5>
                        </a>
                        <div class="product-price">
                            ${{ $prod->selling_price }}
                            <span>${{ $prod->original_price }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section> --}}

{{-- <div class="instagram-photo">
    <div class="insta-item set-bg" data-setbg="{{ asset('frontend/img/insta-1.jpg') }}">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{ asset('frontend/img/insta-2.jpg') }}">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{ asset('frontend/img/insta-3.jpg') }}">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{ asset('frontend/img/insta-4.jpg') }}">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{ asset('frontend/img/insta-5.jpg') }}">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{ asset('frontend/img/insta-6.jpg') }}">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
</div>

<section class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="{{ asset('frontend/img/latest-1.jpg') }}" alt="" />
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                May 4,2019
                            </div>
                            <div class="tag-item">
                                <i class="fa fa-comment-o"></i>
                                5
                            </div>
                        </div>
                        <a href="#">
                            <h4>The Best Street Style From London Fashion Week</h4>
                        </a>
                        <p>
                            Sed quia non numquam modi tempora indunt ut labore et dolore
                            magnam aliquam quaerat
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="{{ asset('frontend/img/latest-2.jpg') }}" alt="" />
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                May 4,2019
                            </div>
                            <div class="tag-item">
                                <i class="fa fa-comment-o"></i>
                                5
                            </div>
                        </div>
                        <a href="#">
                            <h4>Vogue's Ultimate Guide To Autumn/Winter 2019 Shoes</h4>
                        </a>
                        <p>
                            Sed quia non numquam modi tempora indunt ut labore et dolore
                            magnam aliquam quaerat
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="{{ asset('frontend/img/latest-3.jpg') }}" alt="" />
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                May 4,2019
                            </div>
                            <div class="tag-item">
                                <i class="fa fa-comment-o"></i>
                                5
                            </div>
                        </div>
                        <a href="#">
                            <h4>How To Brighten Your Wardrobe With A Dash Of Lime</h4>
                        </a>
                        <p>
                            Sed quia non numquam modi tempora indunt ut labore et dolore
                            magnam aliquam quaerat
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="benefit-items">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="{{ asset('frontend/img/icon-1.png') }}" alt="" />
                        </div>
                        <div class="sb-text">
                            <h6>Free Shipping</h6>
                            <p>For all order over 99$</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="{{ asset('frontend/img/icon-2.png') }}" alt="" />
                        </div>
                        <div class="sb-text">
                            <h6>Delivery On Time</h6>
                            <p>If good have prolems</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="{{ asset('frontend/img/icon-1.png') }}" alt="" />
                        </div>
                        <div class="sb-text">
                            <h6>Secure Payment</h6>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@section('script')
<script>
    function quickview(id) {
        // alert(id);
        $.ajax({
            type: "GET",
            url: "{{ url('/') }}/product",
            data: {
                "id": id,
            },
            success: function (response) {
                document.getElementById("product_img").src = "upload/image/product/" + response.data.image;
                document.getElementById("product_title").innerText = response.data.name;
                document.getElementById("product_descrip").innerText = response.data.description;
                document.getElementById("product_selling_price").innerText = (response.data.selling_price);
                document.getElementById("product_original_price").innerText = response.data.original_price;
                $("#product_view").modal('show');
            },
        });
    }

    $(document).ready(function () {
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
                    $('.icon[data-productid='+product_id+']').html(`<i class="fas fa-heart" style="color: red;"></i>`);
                    toastr.success(response.status);
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
                    toastr.success(response.status);
                    $('.icon[data-productid='+product_id+']').html(`<i class="far fa-heart addToWishList" style="color: black;"></i>`);
                },
            });
        });
    });
</script>
@endsection
@endsection