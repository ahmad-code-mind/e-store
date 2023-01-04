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
                <input type="hidden" name="product_id" value="{{ $products->id }}" />
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Rate {{ $products->name }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            @if ($user_rating)
                            @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                <input type="radio" value="{{ $i }}" name="product_rating" checked
                                    id="rating{{ $i }}" />
                                <label for="rating{{ $i }}" class="fa fa-star"></label>
                                @endfor
                                @for ($j = $user_rating->stars_rated+1; $j
                                <= 5; $j++) <input type="radio" value="{{ $j }}" name="product_rating"
                                    id="rating{{ $j }}" />
                                <label for="rating{{ $j }}" class="fa fa-star"></label>
                                @endfor
                                @else
                                <input type="radio" value="1" name="product_rating" checked id="rating1" />
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2" />
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3" />
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4" />
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5" />
                                <label for="rating5" class="fa fa-star"></label>
                                @endif
                        </div>
                    </div>
                    <textarea class="form-control" name="product_review" cols="10" rows="5"
                        placeholder="Leave a review here" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
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
                    <img src="{{ asset('upload/image/product/'.$products->image) }}" alt="" />
                </div>
                <div class="col-md-9">
                    <h2 class="mb-0">
                        {{ $products->name }}
                        @if ($products->trending == '1')
                        <label style="font-size: 16px; border-radius: 10px"
                            class="float-right bg-danger trending_tag p-2">Trending</label>
                        @endif
                    </h2>
                    <hr />
                    <label class="mr-3">Original Price :
                        <s>${{ $products->original_price }}.00</s></label>
                    <label class="font-weight-bold">Selling Price : ${{ $products->selling_price


                        }}.00</label>
                    @php $ratenum = number_format($rating_value) @endphp
                    <div class="rating">
                        @for ($i = 1; $i <= $ratenum; $i++) <li class="fa fa-star checked">
                            </li>
                            @endfor
                            @for ($j = $ratenum+1; $j <= 5; $j++) <li class="fa fa-star">
                                </li>
                                @endfor
                                <span>
                                    @if ($ratings->count() > 0)
                                    {{ $ratings->count() }} Ratings
                                    @else
                                    No Ratings
                                    @endif
                                </span>
                    </div>
                    <p class="mt-2">{!! $products->small_description !!}</p>
                    <hr />
                    @if ($products->qty > 0)
                    <label class="badge bg-success">In stock</label>
                    @else
                    <label class="badge bg-danger">Out of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{ $products->id }}" class="prod_id" />
                            <label for="Quantity">Quantity</label>
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
                        <div class="col-md-9">
                            <br />
                            @if ($products->qty > 0)
                            <button type="button" class="btn btn-primary addToCartBtn ml-3 float-left">
                                <i class="fa fa-cart mr-1"></i>Add to Cart
                            </button>
                            @endif
                            <button type="button" class="btn btn-success addToWishListde ml-3 float-left">
                                <i class="fa fa-heart mr-1"></i>Add to Wishlist
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr />
                <h3>Description</h3>
                <p class="mt-3">{!! $products->description !!}</p>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Rate This Product
            </button>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Product Reviews
        </div>
        @if (!count($user_review))
        <h6 class="p-4">No Reviews</h6>
        @else
        @foreach ($user_review as $review)
        <div class="card-body">
            <div class="rating">
                @php $user_rated = $review->stars_rated @endphp
                @for ($i = 1; $i <= $user_rated; $i++) <li class="fa fa-star checked">
                    </li>
                    @endfor
                    @for ($j = $user_rated+1; $j <= 5; $j++) <li class="fa fa-star">
                        </li>
                        @endfor
                        <p class="text-secondary float-right">{{ $review->created_at->format('Y-m-d') }}</p>
            </div>
            <div class="name">
                <p class="text-secondary text-capitalize">by {{ $review->users->name }}</p>
            </div>
            <div class="review">
                <p class="lead">
                    {{ $review->prod_review }}
                </p>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection