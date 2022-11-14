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
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('backend/css/app.css') }}">
    @yield('style')
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
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <!-- <script src="{{ asset('backend/js/jquery.min.js') }}" defer></script> -->
    <script src="{{ asset('backend/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('backend/js/bootstrap-material-design.min.js') }}" defer></script>
    <script src="{{ asset('backend/js/perfect-scrollbar.jquery.min.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
    @yield('script')
</body>

</html>