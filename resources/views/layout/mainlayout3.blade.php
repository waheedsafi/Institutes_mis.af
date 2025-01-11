<!DOCTYPE html>
<html lang="en">

<head>
    <!-- bocicon link -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <!-- <script src="https://kit.fontawesome.com/f46da85a49.js" crossorigin="anonymous"></script> -->
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>


    <!-- css link -->
    <link rel="stylesheet" href="css/custom/lay3/style.css">
    <script src="js/custom/lay3/script.js"></script>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;1,700&display=swap"
        rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APMI-@yield('title')</title>
</head>

<body>

    <!-- navbar start-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3 fixed-top ">
        <a class="navbar-brand d-lg-none ml-auto" href="#">Afghanistan Private Institute</a>


        <a class="navbar-brand mx-auto d-none d-lg-block" href="#">Afghanistan Private Institute</a>
        {{-- <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> --}}
        <button type="button" class="navbar-toggler me-4 collapsed" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <span class="navbar-toggler-icon"></span>
        </button> --}}
        {{-- <div class="collapse navbar-collapse" id="navbarNav"> --}}
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav mx-auto  nav-button">
                <li class="nav-item active">
                    <a class="nav-link" href="#" id="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about" id="">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="newss" href="#news">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto  d-sm-flex">
                <li class="nav-item">
                    <a class="btn btn-success" href="{{ route('UserLogin') }}">Login </a>
                </li>
            </ul>
        </div>

    </nav>
    <!-- navbar end -->

    @yield('content')


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>
