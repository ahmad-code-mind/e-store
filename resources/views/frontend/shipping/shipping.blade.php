@extends('frontend.frontend')

@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    {{-- <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a> --}}
                    <span>Shipping</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="checkout-section spad">
    <div class="container">
        <form action="{{ route('place-order') }}" method="POST" class="checkout-form">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    {{-- <div class="checkout-content">
                        <a href="#" class="content-btn">Click Here To Login</a>
                    </div> --}}
                    <h4>Biiling Details</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name">Name<span>*</span></label>
                            <span id="name_error" class="text-danger"></span>
                            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="email">Email Address<span>*</span></label>
                            <span id="email_error" class="text-danger"></span>
                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class=" col-lg-12">
                            <label for="address1">Address 1<span>*</span></label>
                            <span id="address1_error" class="text-danger"></span>
                            <input type="text" id="address1" class="street-first" name="address1"
                                value="{{ Auth::user()->address }}">
                        </div>
                        <div class=" col-lg-12">
                            <label for="address2">Address 2<span>*</span></label>
                            <span id="address2_error" class="text-danger"></span>
                            <input type="text" id="address2" class="street-first" name="address2">
                        </div>
                        <div class="col-lg-12">
                            <label for="phone">Phone<span>*</span></label>
                            <span id="phone_error" class="text-danger"></span>
                            <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                        </div>
                        <div class=" col-lg-6">
                            <label for="city">Town / City<span>*</span></label>
                            <span id="city_error" class="text-danger"></span>
                            <input type="text" id="city" name="city" value="{{ Auth::user()->city }}">
                        </div>
                        <div class=" col-lg-6">
                            <label for="state">State<span>*</span></label>
                            <span id="state_error" class="text-danger"></span>
                            <input type="text" id="state" name="state" value="{{ Auth::user()->state }}">
                        </div>
                        <div class=" col-lg-12">
                            <label for="cun">Country<span>*</span></label>
                            <span id="cun_error" class="text-danger"></span>
                            <input type="text" id="cun" name="country" value="{{ Auth::user()->country }}">
                        </div>
                        <div class=" col-lg-12">
                            <label for="zip">Postcode / ZIP<span>*</span></label>
                            <span id="zip_error" class="text-danger"></span>
                            <input type="text" id="zip" name="pincode" value="{{ Auth::user()->zip_code }}">
                        </div>
                        {{-- <div class=" col-lg-12">
                            <div class="create-item">
                                <label for="acc-create">
                                    Create an account?
                                    <input type="checkbox" id="acc-create">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- <div class="checkout-content">
                        <input type="text" placeholder="Enter Your Coupon Code">
                    </div> --}}
                    <div class="place-order">
                        <h4>Your Order</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Product <span>Total</span></li>
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($cartitems as $items)
                                <li class="fw-normal">{{ $items->products->name }} x {{ $items->prod_qty }}
                                    <span>${{ $items->products->selling_price *
                                        $items->prod_qty }}</span>
                                </li>
                                @php
                                $total += $items->products->selling_price * $items->prod_qty;
                                @endphp
                                @endforeach
                                <li class="total-price">Total <span>${{ $total }}</span></li>
                            </ul>
                            <h5 class="mb-3">Choose Payment Method</h3>
                                <div class="payment-check">
                                    <button id='stripe' style="font-size: 20px; font-weight:bold" type="button"
                                        class="btn btn-info w-100 stripe" data-toggle="modal" data-target=""><i
                                            class='fab fa-cc-stripe' style='font-size:20px'></i>
                                        Pay
                                        with
                                        Stripe
                                    </button>
                                    <hr>
                                    {{-- <div class="order-btn">
                                        <button type="submit" class="site-btn place-btn mb-3 w-100">Place Order</button>
                                    </div>
                                    <hr> --}}
                                    <div id="paypal-button-container"></div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <div class="modal fade" id="stripeModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Stripe Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="payment-form" class="card mb-3 payment-form" style="display: none;">
                            <div class="form-group">
                                <div class="card-header">
                                    <label for="card-element">
                                        Enter your credit card information
                                    </label>
                                </div>
                                <div class="card-body">
                                    <input type="text" class="form-control mb-3" id="cardholdername"
                                        placeholder="Card Holder Name" required>
                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>
                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                    <input type="hidden" name="plan" value="" />
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button id="card-button" class="btn btn-dark w-50" type="submit"
                                    data-secret="{{ $intent }}">
                                    Pay
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script
    src="https://www.paypal.com/sdk/js?client-id=ARvcjzbz-Cehqr3TzE_w7mrm0U-3LPZc-yCOLJI2BJmNOPUG5GI4ChuxFYhQO5B3MD0fnlVlRh0LdvNj">
</script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    function validateForm()
    {
        var name = $("#name").val();
        var email = $("#email").val();
        var address1 = $("#address1").val();
        var address2 = $("#address2").val();
        var phone = $("#phone").val();
        var city = $("#city").val();
        var state = $("#state").val();
        var cun = $("#cun").val();
        var zip = $("#zip").val();

        if(!name) 
        {
            var name_error = "Name is required";
            $("#name_error").html("");
            $("#name_error").html(name_error);
        }
        else
        {
            name_error = "";
            $("#name_error").html("");
        }

        if (!email) {
            var email_error = "Email is required";
            $("#email_error").html("");
            $("#email_error").html(email_error);
        } else {
            email_error = "";
            $("#email_error").html("");
        }

        if (!address1) {
            var address1_error = "Address is required";
            $("#address1_error").html("");
            $("#address1_error").html(address1_error);
        } else {
            address1_error = "";
            $("#address1_error").html("");
        }

        if (!address2) {
            var address2_error = "Address-2 is required";
            $("#address2_error").html("");
            $("#address2_error").html(address2_error);
        } else {
            address2_error = "";
            $("#address2_error").html("");
        }

        if (!phone) {
            var phone_error = "Phone is required";
            $("#phone_error").html("");
            $("#phone_error").html(phone_error);
        } else {
            phone_error = "";
            $("#phone_error").html("");
        }

        if (!city) {
            var city_error = "City is required";
            $("#city_error").html("");
            $("#city_error").html(city_error);
        } else {
            city_error = "";
            $("#city_error").html("");
        }

        if (!state) {
            var state_error = "State is required";
            $("#state_error").html("");
            $("#state_error").html(state_error);
        } else {
            state_error = "";
            $("#state_error").html("");
        }

        if (!cun) {
            var cun_error = "Country is required";
            $("#cun_error").html("");
            $("#cun_error").html(cun_error);
        } else {
            cun_error = "";
            $("#cun_error").html("");
        }

        if (!zip) {
            var zip_error = "Pincode is required";
            $("#zip_error").html("");
            $("#zip_error").html(zip_error);
        } else {
            zip_error = "";
            $("#zip_error").html("");
        }
    }
    var actionStatus;
    paypal.Buttons({
        onInit:  function(data, actions) {
            actions.disable();
            actionStatus = actions;
        },

        onClick : function(){
            let val =  validateForm(); //returns status from your Custom Validation Checkpoint
            if(val){
                actionStatus.disable();
            }else {
                actionStatus.enable();
            }
        },
            // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return actions.order.create({
            purchase_units: [{
                amount: {
                value: '{{ $total }}' // Can also reference a variable or function
                }
            }]
            });
        },
    // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            console.log(`Transaction ${transaction.status}: ${transaction.id}`);
                var name = $("#name").val();
                var email = $("#email").val();
                var address1 = $("#address1").val();
                var address2 = $("#address2").val();
                var phone = $("#phone").val();
                var city = $("#city").val();
                var state = $("#state").val();
                var cun = $("#cun").val();
                var zip = $("#zip").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    type: "POST",
                    url: '{{ route("place-order") }}',
                    data: {
                        'name':name,
                        'email':email,
                        'address1':address1,
                        'address2':address2,
                        'phone':phone,
                        'city':city,
                        'state':state,
                        'country':cun,
                        'pincode':zip,
                        'payment_mode':'Paid by PayPal',
                        'payment_id':transaction.id,
                    },
                    success: function (response) {
                        toastr.success(response.status);
                        window.location.href = "/order-detail";
                    },
                });
                // When ready to go live, remove the alert and show a success message within this page. For example:
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }
    }).render('#paypal-button-container');

</script>
<script>
    $('.stripe').click(function (e) { 
        e.preventDefault();
        $('.payment-form').css("display",'block');
    });
</script>
<script>
    // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        
        const stripe = Stripe('{{ env('STRIPE_PUBLISHABLE_KEY') }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        
        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
        
        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        
        // Handle form submission.
        var form = document.getElementById('payment-form');
        
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            
            var cardholdername = document.getElementById('cardholdername');
            stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    billing_details: { 
                        name: cardholdername.value
                    }
                }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    $.ajax({
                        type: "POST",
                        url: "{{ route('stript-insert') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "name"      : $("#name").val(),
                            "email"     : $("#email").val(),
                            "address1"  : $("#address1").val(),
                            "address2"  : $("#address2").val(),
                            "phone"     : $("#phone").val(),
                            "city"      : $("#city").val(),
                            "state"     : $("#state").val(),
                            "cun"       : $("#cun").val(),
                            "zip"       : $("#zip").val(),
                            "payment_id": result.paymentIntent.id,
                        },
                        success: function (response) {
                            window.location.href = "/order-detail";
                            toastr.success(response.status);
                        }
                    });
                    // form.submit();        
                }
            });
        });
</script>
<script>
    $('#stripe').click(function () { 
        var name = $("#name").val();
        var email = $("#email").val();
        var address1 = $("#address1").val();
        var address2 = $("#address2").val();
        var phone = $("#phone").val();
        var city = $("#city").val();
        var state = $("#state").val();
        var cun = $("#cun").val();
        var zip = $("#zip").val();

        if (!name) {
            var name_error = "Name is required";
            $("#name_error").html("");
            $("#name_error").html(name_error);
        } else {
            name_error = "";
            $("#name_error").html("");
        }

        if (!email) {
            var email_error = "Email is required";
            $("#email_error").html("");
            $("#email_error").html(email_error);
        } else {
            email_error = "";
            $("#email_error").html("");
        }

        if (!address1) {
            var address1_error = "Address is required";
            $("#address1_error").html("");
            $("#address1_error").html(address1_error);
        } else {
            address1_error = "";
            $("#address1_error").html("");
        }

        if (!address2) {
            var address2_error = "Address-2 is required";
            $("#address2_error").html("");
            $("#address2_error").html(address2_error);
        } else {
            address2_error = "";
            $("#address2_error").html("");
        }

        if (!phone) {
            var phone_error = "Phone is required";
            $("#phone_error").html("");
            $("#phone_error").html(phone_error);
        } else {
            phone_error = "";
            $("#phone_error").html("");
        }

        if (!city) {
            var city_error = "City is required";
            $("#city_error").html("");
            $("#city_error").html(city_error);
        } else {
            city_error = "";
            $("#city_error").html("");
        }

        if (!state) {
            var state_error = "State is required";
            $("#state_error").html("");
            $("#state_error").html(state_error);
        } else {
            state_error = "";
            $("#state_error").html("");
        }

        if (!cun) {
            var cun_error = "Country is required";
            $("#cun_error").html("");
            $("#cun_error").html(cun_error);
        } else {
            cun_error = "";
            $("#cun_error").html("");
        }

        if (!zip) {
            var zip_error = "Pincode is required";
            $("#zip_error").html("");
            $("#zip_error").html(zip_error);
        } else {
            zip_error = "";
            $("#zip_error").html("");
        }

        if (
            name_error != "" ||
            email_error != "" ||
            address1_error != "" ||
            address2_error != "" ||
            phone_error != "" ||
            city_error != "" ||
            state_error != "" ||
            cun_error != "" ||
            zip_error != ""
        ) {
            return false;
        } else {
            $('#stripe').attr('data-target','#stripeModel');
        }
    });
</script>
@endsection