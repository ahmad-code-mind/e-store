<header class="header-section">
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="index-2.html">
                            <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-lg-7">
                    <div class="advanced-search">
                        <button type="button" class="category-btn">
                            All Categories
                        </button>
                        <form action="#" class="input-group">
                            <input type="text" placeholder="What do you need?" />
                            <button type="button"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-lg-3">
                    <ul class="nav-right">
                        <li class="heart-icon">
                            <a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li>
                        <li class="cart-icon">
                            <a href="#">
                                <i class="icon_bag_alt"></i>
                                <span>3</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="si-pic">
                                                    <img src="img/select-product-1.jpg" alt="" />
                                                </td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>$60.00 x 1</p>
                                                        <h6>Kabino Bedside Table</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="si-pic">
                                                    <img src="img/select-product-2.jpg" alt="" />
                                                </td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>$60.00 x 1</p>
                                                        <h6>Kabino Bedside Table</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5>$120.00</h5>
                                </div>
                                <div class="select-button">
                                    <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                        <li class="login-btn">
                            <a href="{{ route('login') }}" class="login-panel"><i class="fa fa-user"></i>Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All departments</span>
                    <ul class="depart-hover">
                        <li class="active"><a href="#">Women’s Clothing</a></li>
                        <li><a href="#">Men’s Clothing</a></li>
                        <li><a href="#">Underwear</a></li>
                        <li><a href="#">Kid's Clothing</a></li>
                        <li><a href="#">Brand Fashion</a></li>
                        <li><a href="#">Accessories/Shoes</a></li>
                        <li><a href="#">Luxury Brands</a></li>
                        <li><a href="#">Brand Outdoor Apparel</a></li>
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li><a href="index-2.html">Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li>
                        <a href="#">Collection</a>
                        <ul class="dropdown">
                            <li><a href="#">Men's</a></li>
                            <li><a href="#">Women's</a></li>
                            <li><a href="#">Kid's</a></li>
                        </ul>
                    </li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li>
                        <a href="#">Pages</a>
                        <ul class="dropdown">
                            <li><a href="blog-details.html">Blog Details</a></li>
                            <li><a href="shopping-cart.html">Shopping Cart</a></li>
                            <li><a href="check-out.html">Checkout</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="login.html">Login</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>

@section('script')
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $(".mobile-menu").slicknav({
    prependTo: "#mobile-menu-wrap",
    allowParentLinks: true,
});
</script>
@endsection