<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>APMI-@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- bocicon link -->

    <link href="{{ asset('css/custom/style.css') }}" rel="stylesheet">




</head>

<body>



    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->

    <!-- Footer End -->
    <!-- Back to Top -->
    {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> --}}

    <!-- JavaScript Libraries -->


    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
