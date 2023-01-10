<div class="row">
    @foreach ($data as $prod)
    <div class="col-lg-4 col-md-2 product-item product_data">
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
                <li class="quick-view"><a style="cursor: pointer;" id="quickView" onclick="quickview({{ $prod->id }})"
                        data-id="{{ $prod->id }}">+Quick View</a></li>
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