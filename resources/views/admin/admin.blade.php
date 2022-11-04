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

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('backend/css/app.css') }}">
    @yield('styles')
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
    <script src="{{ asset('backend/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('backend/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('backend/js/bootstrap-material-design.min.js') }}" defer></script>
    <script src="{{ asset('backend/js/perfect-scrollbar.jquery.min.js') }}" defer></script>

    @yield('scripts')
</body>

</html>