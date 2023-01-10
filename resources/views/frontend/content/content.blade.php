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

    .far:hover {
        font-size: 24px;
        color: red;
    }

    .fas:hover {
        font-size: 24px;
        color: #a5a5a5;
    }

    .fas {
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
                            @if(Auth::check())
                            @if($prod->wishlist > '0')
                            <i class="fas fa-heart"></i>
                            @else
                            <i class="far fa-heart"></i>
                            @endif
                            @else
                            <i class="far fa-heart"></i>
                            @endif
                        </div>
                        <ul>
                            <li class="w-icon active">
                                <a href="#"><i class="icon_bag_alt"></i></a>
                            </li>
                            <li class="quick-view"><a style="cursor: pointer;" id="quickView"
                                    onclick="quickview({{ $prod->id }})" data-id="{{ $prod->id }}">+Quick View</a></li>
                            <li class="w-icon">
                                <a href="#"><i class="fa fa-random"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">{{ $prod->category->name }}</div>
                        <a href="#">
                            <h5>{{ $prod->name }}</h5>
                        </a>
                        <div class="product-price">
                            ${{ $prod->selling_price }}.00
                            <span>${{ $prod->original_price }}.00</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Category Sidebar-->
<div class="container mt-3">
    <h2 class="mb-4" id="shop">Categories</h2>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-4">
            <div class="card p-3">
                <div class="widget-wrapper">
                    <h4><b>Shop</b></h4>
                    <hr>
                    <ul class="category-list">
                        @foreach (App\Models\Categories::all() as $cate)
                        <li value="{{ $cate->id }}" class="get-category{{ $cate->id }}"><a>
                                {{-- <i class="fa fa-square-o mr-2"></i> --}}
                                {{ $cate->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-8">
            <div class="card p-3">
                <div class="show-category">
                    <div class="row">
                        @foreach ($products as $prod)
                        <div class="col-lg-4 col-md-6 col-sm-12 product-item product_data">
                            <div class="pi-pic">
                                <a href="{{ url('product/'.$prod->slug) }}">
                                    <img src="{{ asset('upload/image/product/'.$prod->image) }}" alt="" />
                                </a>
                                <input type="hidden" value="{{ $prod->id }}" class="prod_id">
                                <div class="icon" data-productid="{{ $prod->id }}">
                                    @if (Auth::check())
                                    @if($prod->wishlist > '0')
                                    <i class="fas fa-heart"></i>
                                    @else
                                    <i class="far fa-heart"></i>
                                    @endif
                                    @else
                                    <i class="far fa-heart"></i>
                                    @endif
                                </div>
                                <ul>
                                    <li class="w-icon active">
                                        <a href="#"><i class="icon_bag_alt"></i></a>
                                    </li>
                                    <li class="quick-view"><a style="cursor: pointer;" id="quickView"
                                            onclick="quickview({{ $prod->id }})" data-id="{{ $prod->id }}">+Quick
                                            View</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{ $prod->category->name }}</div>
                                <a href="#">
                                    <h5>{{ $prod->name }}</h5>
                                </a>
                                <div class="product-price">
                                    ${{ $prod->selling_price }}.00
                                    <span>${{ $prod->original_price }}.00</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.Sidebar-->

<div class="modal fade product_view p-5 product_data" id="product_view">
    <input type="hidden" id="qv_id" class="prod_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 product_img">
                        <img id="product_img" src="" class="img-responsive">
                    </div>
                    <div class="col-md-6 product_content">
                        <h4 id="product_title" class="mb-3"></h4>
                        <p id="product_descrip" class="mb-3"></p>
                        <h3 class="cost" style="color: #e7ab3c; font-size: 24px"><span
                                id="product_selling_price"></span>
                            <span><small class="pre-cost" id="product_original_price"></span></small>
                        </h3>
                        <div class="w-25 mt-3">
                            <div class="input-group text-center mb-3">
                                <div class="input-group-prepend">
                                    <button class="input-group-text decrement-btn">
                                        -
                                    </button>
                                </div>
                                <input type="text" name="quantity" value="1"
                                    class="form-control qty-input text-center" />
                                <div class="input-group-append">
                                    <button class="input-group-text increment-btn">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>
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
                            <button type="button" class="btn btn-success addToCartBtn float-left"><i
                                    class="fa fa-cart mr-1"></i>Add to Cart</button>
                            {{-- <button type="button" class="btn btn-success addToWishListde ml-3 float-left"><i
                                    class="fa fa-heart mr-1"></i>Add to Wishlist</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function quickview(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('/') }}/product",
            data: {
                "id": id,
            },
            success: function (response) {
                document.getElementById("qv_id").value = response.data.id;
                document.getElementById("product_img").src = "upload/image/product/" + response.data.image;
                document.getElementById("product_title").innerText = response.data.name;
                document.getElementById("product_descrip").innerText = response.data.description;
                document.getElementById("product_selling_price").innerText = "$" + (response.data.selling_price) + ".00";
                document.getElementById("product_original_price").innerText = "$" + (response.data.original_price) + ".00";
                $("#product_view").modal('show');
            },
        });
    }
    $(document).ready(function () {
        @foreach (App\Models\Categories::all() as $cate)
            $(".get-category{{ $cate->id }}").click(function (e) { 
                e.preventDefault();
                var category = $(".get-category{{ $cate->id }}").val();
                
                $.ajax({
                    type: "GET",
                    url: "/cateProducts",
                    data: "cate_id=" + category,
                    dataType: "html",
                    success: function (response) {
                        $('.show-category').html(response);
                    }
                });
            });
        @endforeach
    });
</script>
@endsection