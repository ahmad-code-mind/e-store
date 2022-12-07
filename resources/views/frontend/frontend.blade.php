<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="UTF-8" />
  <meta name="description" />
  <meta name="keywords" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Laravel</title>

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&amp;display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">

  {{--
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css" /> --}}
  <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css" />

  <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
  <script nonce="28a80ab3-13aa-4fa9-b3a5-436eb21b028b">
    (function (w, d) {
        !(function (e, f, g, h) {
          e.zarazData = e.zarazData || {};
          e.zarazData.executed = [];
          e.zaraz = { deferred: [], listeners: [] };
          e.zaraz.q = [];
          e.zaraz._f = function (i) {
            return function () {
              var j = Array.prototype.slice.call(arguments);
              e.zaraz.q.push({ m: i, a: j });
            };
          };
          for (const k of ["track", "set", "debug"]) e.zaraz[k] = e.zaraz._f(k);
          e.zaraz.init = () => {
            var l = f.getElementsByTagName(h)[0],
              m = f.createElement(h),
              n = f.getElementsByTagName("title")[0];
            n && (e.zarazData.t = f.getElementsByTagName("title")[0].text);
            e.zarazData.x = Math.random();
            e.zarazData.w = e.screen.width;
            e.zarazData.h = e.screen.height;
            e.zarazData.j = e.innerHeight;
            e.zarazData.e = e.innerWidth;
            e.zarazData.l = e.location.href;
            e.zarazData.r = f.referrer;
            e.zarazData.k = e.screen.colorDepth;
            e.zarazData.n = f.characterSet;
            e.zarazData.o = new Date().getTimezoneOffset();
            if (e.dataLayer)
              for (const r of Object.entries(
                Object.entries(dataLayer).reduce((s, t) => ({
                  ...s[1],
                  ...t[1],
                }))
              ))
                zaraz.set(r[0], r[1], { scope: "page" });
            e.zarazData.q = [];
            for (; e.zaraz.q.length; ) {
              const u = e.zaraz.q.shift();
              e.zarazData.q.push(u);
            }
            m.defer = !0;
            for (const v of [localStorage, sessionStorage])
              Object.keys(v || {})
                .filter((x) => x.startsWith("_zaraz_"))
                .forEach((w) => {
                  try {
                    e.zarazData["z_" + w.slice(7)] = JSON.parse(v.getItem(w));
                  } catch {
                    e.zarazData["z_" + w.slice(7)] = v.getItem(w);
                  }
                });
            m.referrerPolicy = "origin";
            m.src =
              "../../cdn-cgi/zaraz/sd0d9.js?z=" +
              btoa(encodeURIComponent(JSON.stringify(e.zarazData)));
            l.parentNode.insertBefore(m, l);
          };
          ["complete", "interactive"].includes(f.readyState)
            ? zaraz.init()
            : e.addEventListener("DOMContentLoaded", zaraz.init);
        })(w, d, 0, "script");
      })(window, document);
  </script>
  <style>
    .cust:hover {
      color: #e7ab3c;
    }

    .img {
      width: 35px;
      height: 35px;
      margin-left: 10px;
      text-align: center;
      cursor: pointer;
    }
  </style>

  @yield('style')
</head>
<body>
  {{-- <div id="preloder">
    <div class="loader"></div>
  </div> --}}

  <header class="header-section">
    <div class="container">
      <div class="inner-header">
        <div class="row">
          <div class="col-lg-2 col-md-2">
            <div class="logo">
              <a href="index-2.html">
                <img src="{{ asset('frontend/img/logo.png') }}" alt="" />
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
                            <img src="{{ asset('frontend/img/select-product-1.jpg') }}" alt="" />
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
                            <img src="{{ asset('frontend/img/select-product-2.jpg') }}" alt="" />
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
              @guest
              @if (Route::has('login'))
              <li class="login-btn">
                <a href="{{ route('login') }}" style="color:#252525" class="login-panel"><i
                    class="fa fa-user"></i>Login</a>
              </li>
              @endif
              @else
              <li class="">
                <div class="btn-group img">
                  @if (Auth::user()->image && File::exists(public_path("upload/image/profile/".Auth::user()->image)))
                  <img data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle rounded-circle"
                    src="{{ asset('upload/image/profile/'.Auth::user()->image) }}" alt="" />
                  @else
                  <img data-bs-toggle="dropdown" aria-expanded="false" class="rounded-circle"
                    src="{{ asset('frontend/img/demo.png') }}" alt="" />
                  @endif
                  {{-- <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->name }}
                  </button> --}}
                  <ul class="dropdown-menu">
                    <a class="dropdown-item cust" href="{{ route('profile') }}">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item cust" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </ul>
                </div>
              </li>
              @endguest
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
              <li class="active"><a href="#">Home Appliances</a></li>
              <li><a href="#">Furniture</a></li>
              {{-- <li><a href="#">Underwear</a></li>
              <li><a href="#">Kid's Clothing</a></li>
              <li><a href="#">Brand Fashion</a></li>
              <li><a href="#">Accessories/Shoes</a></li>
              <li><a href="#">Luxury Brands</a></li>
              <li><a href="#">Brand Outdoor Apparel</a></li> --}}
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
                <li><a href="#">Home Appliances</a></li>
                <li><a href="#">Furniture</a></li>
                <li><a href="#">Clothes</a></li>
              </ul>
            </li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="{{ url('contact') }}">Contact</a></li>
            <li>
              <a href="#">More</a>
              <ul class="dropdown">
                <li><a href="blog-details.html">Blog Details</a></li>
                <li><a href="shopping-cart.html">Shopping Cart</a></li>
                <li><a href="check-out.html">Checkout</a></li>
                <li><a href="{{ url('faq') }}">Faq</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
      </div>
    </div>
  </header>

  @yield('content')

  <footer class="footer-section mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="footer-left">
            <div class="footer-logo">
              <a href="#"><img src="img/footer-logo.png" alt="" /></a>
            </div>
            <ul>
              <li>Address: Ferozpur Road 57600 Pakistan</li>
              <li>Phone: +92 311 4127829</li>
              <li>
                Email:
                <a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__"
                  data-cfemail="c3aba6afafaceda0acafacb1afaaa183a4aea2aaafeda0acae">[email&#160;protected]</a>
              </li>
            </ul>
            <div class="footer-social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-pinterest"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 offset-lg-1">
          <div class="footer-widget">
            <h5>Information</h5>
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Checkout</a></li>
              <li><a href="{{ url('contact') }}">Contact</a></li>
              <li><a href="#">Serivius</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="footer-widget">
            <h5>Account</h5>
            <ul>
              <li><a href="{{ route('profile') }}">My Account</a></li>
              <li><a href="#">Shopping Cart</a></li>
              <li><a href="#">Shop</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="newslatter-item">
            <h5>Join Our Newsletter Now</h5>
            <p>
              Get E-mail updates about our latest shop and special offers.
            </p>
            <form action="#" class="subscribe-form">
              <input type="text" placeholder="Enter Your Mail" />
              <button type="button">Subscribe</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright-reserved">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="copyright-text">
              Copyright &copy;
              <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
              </script>
              <script>
                document.write(new Date().getFullYear());
              </script>
              All rights reserved
            </div>
            <div class="payment-pic">
              <img src="img/payment-method.png" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.zoom.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.dd.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>

  <script src="https://js.stripe.com/v3/"></script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "UA-23581568-13");
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
    integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
    data-cf-beacon='{"rayId":"76e230d3cecade57","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.0","si":100}'
    crossorigin="anonymous"></script>

  {{-- Toastr --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  @if(Session('status'))
  <script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{Session('status')}}");
  </script>
  @endif
  @if(Session('error'))
  <script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error("{{Session('error')}}");
  </script>
  @endif
  {{-- @if(Session('info'))
  <script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.info("{{Session('info')}}");
  </script>
  @endif --}}
  {{-- End Toastr --}}

  @yield('script')
</body>
</html>