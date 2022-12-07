<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!--            Toastr      -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">


  {{-- Styles --}}
  {{--
  <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('assets/css/material-dashboard.css?v=2.2.2') }}">
  <link rel="stylesheet" href="{{ asset('assets/demo/demo.css') }}">

  {{-- End Styles --}}

  <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
  @yield('style')
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body>
  <div class="wrapper ">
    @include('admin.sidebar')
    <div class="main-panel">
      @include('admin.navbar')

      <div class="content">
        @yield('content')
      </div>

      @include('admin.footer')
      {{-- @include('admin.fixedplugin') --}}
    </div>
  </div>



  {{-- Core Files --}}
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{ asset('assets/js/plugins/sweetalert2.js') }}"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ asset('assets/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js') }}"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.js') }}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ asset('assets/js/plugins/jasny-bootstrap.min.js') }}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{ asset('assets/js/plugins/jquery-jvectormap.js') }}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('assets/js/plugins/nouislider.min.js') }}"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{ asset('assets/js/plugins/arrive.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script type="text/javascript" src="{{ asset('assets/js/material-dashboard.js?v=2.2.2') }}"></script>

  {{-- Internal script --}}
  <script>
    $(document).ready(function () {
          $().ready(function () {
            $sidebar = $(".sidebar");
    
            $sidebar_img_container = $sidebar.find(".sidebar-background");
    
            $full_page = $(".full-page");
    
            $sidebar_responsive = $("body > .navbar-collapse");
    
            window_width = $(window).width();
    
            fixed_plugin_open = $(
              ".sidebar .sidebar-wrapper .nav li.active a p"
            ).html();
    
            if (window_width > 767 && fixed_plugin_open == "Dashboard") {
              if ($(".fixed-plugin .dropdown").hasClass("show-dropdown")) {
                $(".fixed-plugin .dropdown").addClass("open");
              }
            }
    
            $(".fixed-plugin a").click(function (event) {
              // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
              if ($(this).hasClass("switch-trigger")) {
                if (event.stopPropagation) {
                  event.stopPropagation();
                } else if (window.event) {
                  window.event.cancelBubble = true;
                }
              }
            });
    
            $(".fixed-plugin .active-color span").click(function () {
              $full_page_background = $(".full-page-background");
    
              $(this).siblings().removeClass("active");
              $(this).addClass("active");
    
              var new_color = $(this).data("color");
    
              if ($sidebar.length != 0) {
                $sidebar.attr("data-color", new_color);
              }
    
              if ($full_page.length != 0) {
                $full_page.attr("filter-color", new_color);
              }
    
              if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.attr("data-color", new_color);
              }
            });
    
            $(".fixed-plugin .background-color .badge").click(function () {
              $(this).siblings().removeClass("active");
              $(this).addClass("active");
    
              var new_color = $(this).data("background-color");
    
              if ($sidebar.length != 0) {
                $sidebar.attr("data-background-color", new_color);
              }
            });
    
            $(".fixed-plugin .img-holder").click(function () {
              $full_page_background = $(".full-page-background");
    
              $(this).parent("li").siblings().removeClass("active");
              $(this).parent("li").addClass("active");
    
              var new_image = $(this).find("img").attr("src");
    
              if (
                $sidebar_img_container.length != 0 &&
                $(".switch-sidebar-image input:checked").length != 0
              ) {
                $sidebar_img_container.fadeOut("fast", function () {
                  $sidebar_img_container.css(
                    "background-image",
                    'url("' + new_image + '")'
                  );
                  $sidebar_img_container.fadeIn("fast");
                });
              }
    
              if (
                $full_page_background.length != 0 &&
                $(".switch-sidebar-image input:checked").length != 0
              ) {
                var new_image_full_page = $(".fixed-plugin li.active .img-holder")
                  .find("img")
                  .data("src");
    
                $full_page_background.fadeOut("fast", function () {
                  $full_page_background.css(
                    "background-image",
                    'url("' + new_image_full_page + '")'
                  );
                  $full_page_background.fadeIn("fast");
                });
              }
    
              if ($(".switch-sidebar-image input:checked").length == 0) {
                var new_image = $(".fixed-plugin li.active .img-holder")
                  .find("img")
                  .attr("src");
                var new_image_full_page = $(".fixed-plugin li.active .img-holder")
                  .find("img")
                  .data("src");
    
                $sidebar_img_container.css(
                  "background-image",
                  'url("' + new_image + '")'
                );
                $full_page_background.css(
                  "background-image",
                  'url("' + new_image_full_page + '")'
                );
              }
    
              if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.css(
                  "background-image",
                  'url("' + new_image + '")'
                );
              }
            });
    
            $(".switch-sidebar-image input").change(function () {
              $full_page_background = $(".full-page-background");
    
              $input = $(this);
    
              if ($input.is(":checked")) {
                if ($sidebar_img_container.length != 0) {
                  $sidebar_img_container.fadeIn("fast");
                  $sidebar.attr("data-image", "#");
                }
    
                if ($full_page_background.length != 0) {
                  $full_page_background.fadeIn("fast");
                  $full_page.attr("data-image", "#");
                }
    
                background_image = true;
              } else {
                if ($sidebar_img_container.length != 0) {
                  $sidebar.removeAttr("data-image");
                  $sidebar_img_container.fadeOut("fast");
                }
    
                if ($full_page_background.length != 0) {
                  $full_page.removeAttr("data-image", "#");
                  $full_page_background.fadeOut("fast");
                }
    
                background_image = false;
              }
            });
    
            $(".switch-sidebar-mini input").change(function () {
              $body = $("body");
    
              $input = $(this);
    
              if (md.misc.sidebar_mini_active == true) {
                $("body").removeClass("sidebar-mini");
                md.misc.sidebar_mini_active = false;
    
                $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar();
              } else {
                $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar(
                  "destroy"
                );
    
                setTimeout(function () {
                  $("body").addClass("sidebar-mini");
    
                  md.misc.sidebar_mini_active = true;
                }, 300);
              }
    
              // we simulate the window Resize so the charts will get updated in realtime.
              var simulateWindowResize = setInterval(function () {
                window.dispatchEvent(new Event("resize"));
              }, 180);
    
              // we stop the simulation of Window Resize after the animations are completed
              setTimeout(function () {
                clearInterval(simulateWindowResize);
              }, 1000);
            });
          });
        });
  </script>
  <script>
    $(document).ready(function () {
          // Javascript method's body can be found in assets/js/demos.js
          md.initDashboardPageCharts();
        });
  </script>
  {{-- end script --}}


  <!-- Scripts -->
  {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> --}}
  {{-- <script src="{{ asset('backend/js/jquery.min.js') }}" defer></script> --}}
  {{-- <script src="{{ asset('backend/js/popper.min.js') }}" defer></script>
  <script src="{{ asset('backend/js/bootstrap-material-design.min.js') }}" defer></script>
  <script src="{{ asset('backend/js/perfect-scrollbar.jquery.min.js') }}" defer></script>
  <script src="{{ asset('demo/demo.js') }}" defer></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

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
  @if(Session('info'))
  <script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.info("{{Session('info')}}");
  </script>
  @endif
  {{-- End Toastr --}}
  @yield('script')
</body>

</html>