/*  ---------------------------------------------------
    Template Name: Fashi
    Description: Fashi eCommerce HTML Template
    Author: Colorlib
    Author URI: https://colorlib.com/
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

"use strict";

(function ($) {
    loadcart();
    loadwishlist();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    function loadcart() {
        $.ajax({
            type: "GET",
            // url: "{{ route('cart-count') }}",
            url: "/load-cart-count",
            success: function (response) {
                $(".cart-count").html("");
                $(".cart-count").html(response.count);
            },
        });
    }
    $(".addToCartBtn").click(function (e) {
        e.preventDefault();

        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();
        var product_qty = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                product_qty: product_qty,
            },
            success: function (response) {
                if (response.status) {
                    toastr.success(response.status);
                } else if (response.error) {
                    toastr.error(response.error);
                }
                loadcart();
            },
        });
    });
    function loadwishlist() {
        $.ajax({
            type: "GET",
            // url: "{{ route('wishlist-count') }}",
            url: "/wishlist-count",
            success: function (response) {
                $(".wishlist-count").html("");
                $(".wishlist-count").html(response.count);
            },
        });
    }
    $(".addToWishListde").click(function (e) {
        e.preventDefault();

        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "POST",
            url: "/add-to-wishlist",
            data: {
                product_id: product_id,
            },
            success: function (response) {
                toastr.success(response.status);
                loadwishlist();
            },
        });
    });
    /*------------------
      Wishlist Home Page
    --------------------*/
    // $('.addToWishList').click(function (e) {
    //     e.preventDefault();
    //     var product_id = $(this).closest('.product_data').find('.prod_id').val();
    //     var value = document.getElementById("wishlist-count").innerHTML;
    //     value = isNaN(value) ? 0 : value;
    //     value++;
    //     document.getElementById('wishlist-count').innerHTML = value;

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     $.ajax({
    //         type: "POST",
    //         url: "/add-to-wishlist",
    //         data: {
    //             'product_id': product_id,
    //         },
    //         success: function (response) {
    //             $('.icon[data-productid=' + product_id + ']').html(`<i class="fas fa-heart" style="color: red;"></i>`);
    //             // toastr.success(response.status);
    //         }
    //     });
    // });
    // $('.delete-wishlist-item').click(function (e) {
    //     e.preventDefault();

    //     var prod_id = $(this).closest('.product_data').find('.prod_id').val();
    //     var value = document.getElementById("wishlist-count").innerHTML;
    //     value = isNaN(value) ? 0 : value;
    //     value--;
    //     document.getElementById('wishlist-count').innerHTML = value;

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     $.ajax({
    //         type: "POST",
    //         url: "/delete-wishlist-item",
    //         data: {
    //             'prod_id': prod_id,
    //         },
    //         success: function (response) {
    //             // toastr.success(response.status);
    //             $('.icon[data-productid=' + product_id + ']').html(`<i class="fas fa-heart addToWishList"></i>`);
    //         },
    //     });
    // });
    $('.icon').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var value = document.getElementById("wishlist-count").innerHTML;
        value = isNaN(value) ? 0 : value;
        $.ajax({
            type: "POST",
            url: "/update-wishlist",
            data: {
                prod_id: product_id,
            },
            success: function (response) {
                if (response.action == 'add') {
                    $('.icon[data-productid=' + product_id + ']').html(`<i class="fas fa-heart"></i>`);
                    toastr.success(response.status);
                    value++;
                    document.getElementById('wishlist-count').innerHTML = value;
                    // console.log(response);
                } else if (response.action == 'remove') {
                    $('.icon[data-productid=' + product_id + ']').html(`<i class="far fa-heart"></i>`);
                    toastr.success(response.status);
                    value--;
                    document.getElementById('wishlist-count').innerHTML = value;
                    // console.log(response);
                }
            }
        });
    });
    /*------------------
     Increment Decrement
    --------------------*/
    $(".increment-btn").click(function (e) {
        e.preventDefault();

        var inc_val = $(".qty-input").val();
        var value = parseInt(inc_val, 10);
        value = isNaN(value) ? "0" : value;
        if (value < 10) {
            value++;
            $(".qty-input").val(value);
        }
    });
    $(".decrement-btn").click(function (e) {
        e.preventDefault();

        var dec_val = $(".qty-input").val();
        var value = parseInt(dec_val, 10);
        value = isNaN(value) ? "0" : value;
        if (value > 1) {
            value--;
            $(".qty-input").val(value);
        }
    });
    /*------------------
        Preloader
    --------------------*/
    $(window).on("load", function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $(".set-bg").each(function () {
        var bg = $(this).data("setbg");
        $(this).css("background-image", "url(" + bg + ")");
    });

    /*------------------
        Navigation
    --------------------*/
    $(".mobile-menu").slicknav({
        prependTo: "#mobile-menu-wrap",
        // allowParentLinks: true,
    });
    /*------------------
        Wishlist
    --------------------*/
    $.ajax({
        type: "GET",
        url: "/load-cart-data",
        data: "data",
        dataType: "dataType",
        success: function (response) { },
    });

    /*------------------
        Hero Slider
    --------------------*/
    $(".hero-items").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: false,
        animateOut: "fadeOut",
        animateIn: "fadeIn",
        navText: [
            '<i class="ti-angle-left"></i>',
            '<i class="ti-angle-right"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*------------------
        Product Slider
    --------------------*/
    $(".product-slider").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        items: 4,
        dots: true,
        navText: [
            '<i class="ti-angle-left"></i>',
            '<i class="ti-angle-right"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 4,
            },
        },
    });

    /*------------------
        Featured Slider
    --------------------*/
    $(".featured-carousel").owlCarousel({
        loop: true,
        margin: 10,
        items: 4,
        nav: true,
        dots: true,
        navText: [
            '<i class="ti-angle-left"></i>',
            '<i class="ti-angle-right"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 3,
            },
        },
    });

    /*------------------
       logo Carousel
    --------------------*/
    $(".logo-carousel").owlCarousel({
        loop: false,
        margin: 30,
        nav: false,
        items: 5,
        dots: false,
        navText: [
            '<i class="ti-angle-left"></i>',
            '<i class="ti-angle-right"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        mouseDrag: false,
        autoplay: true,
        responsive: {
            0: {
                items: 3,
            },
            768: {
                items: 5,
            },
        },
    });

    /*-----------------------
       Product Single Slider
    -------------------------*/
    $(".ps-slider").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        items: 3,
        dots: false,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*------------------
        CountDown
    --------------------*/
    // For demo preview
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, "0");
    var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
    var yyyy = today.getFullYear();

    if (mm == 12) {
        mm = "01";
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, "0");
    }
    var timerdate = mm + "/" + dd + "/" + yyyy;
    // For demo preview end

    console.log(timerdate);

    // Use this for real timer date
    /* var timerdate = "2020/01/01"; */

    $("#countdown").countdown(timerdate, function (event) {
        $(this).html(
            event.strftime(
                "<div class='cd-item'><span>%D</span> <p>Days</p> </div>" +
                "<div class='cd-item'><span>%H</span> <p>Hrs</p> </div>" +
                "<div class='cd-item'><span>%M</span> <p>Mins</p> </div>" +
                "<div class='cd-item'><span>%S</span> <p>Secs</p> </div>"
            )
        );
    });

    /*----------------------------------------------------
     Language Flag js 
    ----------------------------------------------------*/
    $(document).ready(function (e) {
        //no use
        try {
            var pages = $("#pages")
                .msDropdown({
                    on: {
                        change: function (data, ui) {
                            var val = data.value;
                            if (val != "") window.location = val;
                        },
                    },
                })
                .data("dd");

            var pagename = document.location.pathname.toString();
            pagename = pagename.split("/");
            pages.setIndexByValue(pagename[pagename.length - 1]);
            $("#ver").html(msBeautify.version.msDropdown);
        } catch (e) {
            // console.log(e);
        }
        $("#ver").html(msBeautify.version.msDropdown);

        //convert
        $(".language_drop").msDropdown({ roundedBorder: false });
        $("#tech").data("dd");
    });
    /*-------------------
        Range Slider
    --------------------- */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data("min"),
        maxPrice = rangeSlider.data("max");
    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minPrice, maxPrice],
        slide: function (event, ui) {
            minamount.val("$" + ui.values[0]);
            maxamount.val("$" + ui.values[1]);
        },
    });
    minamount.val("$" + rangeSlider.slider("values", 0));
    maxamount.val("$" + rangeSlider.slider("values", 1));

    /*-------------------
        Radio Btn
    --------------------- */
    $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").on(
        "click",
        function () {
            $(
                ".fw-size-choose .sc-item label, .pd-size-choose .sc-item label"
            ).removeClass("active");
            $(this).addClass("active");
        }
    );

    /*-------------------
        Nice Select
    --------------------- */
    $(".sorting, .p-show").niceSelect();

    /*------------------
        Single Product
    --------------------*/
    $(".product-thumbs-track .pt").on("click", function () {
        $(".product-thumbs-track .pt").removeClass("active");
        $(this).addClass("active");
        var imgurl = $(this).data("imgbigurl");
        var bigImg = $(".product-big-img").attr("src");
        if (imgurl != bigImg) {
            $(".product-big-img").attr({ src: imgurl });
            $(".zoomImg").attr({ src: imgurl });
        }
    });

    $(".product-pic-zoom").zoom();
})(jQuery);
