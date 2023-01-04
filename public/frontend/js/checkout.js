// $(document).ready(function () {
//     $("#card-button").click(function (e) {
//         e.preventDefault();

//         var name = $("#name").val();
//         var email = $("#email").val();
//         var address1 = $("#address1").val();
//         var address2 = $("#address2").val();
//         var phone = $("#phone").val();
//         var city = $("#city").val();
//         var state = $("#state").val();
//         var cun = $("#cun").val();
//         var zip = $("#zip").val();

//         if (!name) {
//             var name_error = "Name is required";
//             $("#name_error").html("");
//             $("#name_error").html(name_error);
//         } else {
//             name_error = "";
//             $("#name_error").html("");
//         }

//         if (!email) {
//             var email_error = "Email is required";
//             $("#email_error").html("");
//             $("#email_error").html(email_error);
//         } else {
//             email_error = "";
//             $("#email_error").html("");
//         }

//         if (!address1) {
//             var address1_error = "Address is required";
//             $("#address1_error").html("");
//             $("#address1_error").html(address1_error);
//         } else {
//             address1_error = "";
//             $("#address1_error").html("");
//         }

//         if (!address2) {
//             var address2_error = "Address-2 is required";
//             $("#address2_error").html("");
//             $("#address2_error").html(address2_error);
//         } else {
//             address2_error = "";
//             $("#address2_error").html("");
//         }

//         if (!phone) {
//             var phone_error = "Phone is required";
//             $("#phone_error").html("");
//             $("#phone_error").html(phone_error);
//         } else {
//             phone_error = "";
//             $("#phone_error").html("");
//         }

//         if (!city) {
//             var city_error = "City is required";
//             $("#city_error").html("");
//             $("#city_error").html(city_error);
//         } else {
//             city_error = "";
//             $("#city_error").html("");
//         }

//         if (!state) {
//             var state_error = "State is required";
//             $("#state_error").html("");
//             $("#state_error").html(state_error);
//         } else {
//             state_error = "";
//             $("#state_error").html("");
//         }

//         if (!cun) {
//             var cun_error = "Country is required";
//             $("#cun_error").html("");
//             $("#cun_error").html(cun_error);
//         } else {
//             cun_error = "";
//             $("#cun_error").html("");
//         }

//         if (!zip) {
//             var zip_error = "Pincode is required";
//             $("#zip_error").html("");
//             $("#zip_error").html(zip_error);
//         } else {
//             zip_error = "";
//             $("#zip_error").html("");
//         }

//         if (
//             name_error != "" ||
//             email_error != "" ||
//             address1_error != "" ||
//             address2_error != "" ||
//             phone_error != "" ||
//             city_error != "" ||
//             state_error != "" ||
//             cun_error != "" ||
//             zip_error != ""
//         ) {
//             return false;
//         } else {
//             var data = {
//                 name: name,
//                 email: email,
//                 address1: address1,
//                 address2: address2,
//                 phone: phone,
//                 city: city,
//                 state: state,
//                 cun: cun,
//                 zip: zip,
//                 payment_mode: "Paid by Stripe",
//             };
//             $.ajaxSetup({
//                 headers: {
//                     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
//                         "content"
//                     ),
//                 },
//             });
//             $.ajax({
//                 type: "POST",
//                 url: "{{ route('place-order') }}",
//                 data: data,
//                 success: function (response) {
//                     toastr.success(response.status);
//                     window.location.href = "/order-detail";
//                 },
//             });
//         }
//     });
// });
