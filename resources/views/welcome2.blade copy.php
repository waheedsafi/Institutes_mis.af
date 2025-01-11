@extends('layout.mainlayout3')





@section('content')
    <!-- slider Section -->
    <main id="slider">
        <div class="container-fluid main-content carousel-content">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/624111.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/drew-hays-tGYrlchfObE-unsplash (1).jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/piron-guillaume-kJwZxH6jins-unsplash.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        {{-- loign --}}
        <div class=" main-content login-content background">


            <form class="login" action="{{ route('user.authenticate') }}" method="POST">
                @csrf
                <h3>Login Here</h3>

                <label for="username">Username</label>
                <input type="email" name="email" placeholder="Plaese insert Email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid
            
        @enderror" id="email">
                @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror

                <label for="password">Password</label>
                <input type="password"name="password" placeholder="Password"
                    class="form-control @error('password') is-invalid
            
        @enderror"id="password">
                @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
                @include('user.massage')
                <button login>Log In</button>

            </form>
        </div>


        {{-- login --}}
    </main>


    <!-- slider Section end -->
    <!-- book and library -->
    <!-- Institutes List -->
    <div class="container px-4 py-2" id="featured-3">

        <div class="row g-4 py-5 row-cols-1 row-cols-lg-2 ">
            <div class="feature col shadow-sm p-3">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-light  fs-2 mb-3">
                    <box-icon type='solid' name='home-alt-2'></box-icon>
                </div>
                <h3 class="fs-2 text-body-emphasis">Institutes List</h3>
                <p>All Register Institutes</p>

            </div>
            <div class="feature col shadow-sm p-3">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-light bg-gradient fs-2 mb-3">
                    <box-icon name='library'></box-icon>
                </div>
                <h3 class="fs-2 text-body-emphasis">Books Library</h3>
                <p>All Books</p>

            </div>

        </div>
    </div>
    <!-- book and library -->
    <!-- Institutes List -->


    <!-- News Start -->
    <section id="news" style="background-color: #f4f4f4; padding: 40px 0;">
        <div class="container">
            <h3 class="bg-success text-white p-2 rounded mb-4">News</h3>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header ">Date</div>
                        <img src="img/624111.jpg" class="card-img-top" alt="Service 1">

                        <div class="card-body">
                            <h5 class="card-title">Service 1</h5>
                            <p class="card-text">Description of service 1. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header ">Date</div>
                        <img src="img/624111.jpg" class="card-img-top" alt="Service 1">

                        <div class="card-body">
                            <h5 class="card-title">Service 1</h5>
                            <p class="card-text">Description of service 1. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header ">Date</div>
                        <img src="img/624111.jpg" class="card-img-top" alt="Service 1">

                        <div class="card-body">
                            <h5 class="card-title">Service 1</h5>
                            <p class="card-text">Description of service 1. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- news End -->

    <!-- About section start -->
    <!-- <section class="About container" id="about">
                    <h3>About Us</h3>
                  </section> -->
    <!-- About Section Ends -->

    <!-- contact us -->
    <section id="contact" style="background-color: #f4f4f4; padding: 40px 0;">
        <div class="container rounded bg-white shadow p-4">
            <h3 class="bg-success text-white p-2 rounded mb-4">Contact Us</h3>
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4>Our Location</h4>
                    <p>123 Street Name, City, Country</p>
                    <h4>Email</h4>
                    <p>info@example.com</p>
                    <h4>Phone</h4>
                    <p>+123 456 7890</p>
                </div>
            </div>
        </div>
    </section>



    <!-- contact us end -->


    {{-- ministry iframe --}}

    <section id="contact" style="background-color: #f4f4f4; padding: 40px 0;">
        <div class="container rounded bg-white shadow p-4">

        </div>
    </section>

    {{-- end iframe  --}}
    <!-- Footer Section start-->
    <section class="footer">
        <footer class="py-2 container rounded shadow-lg">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5>Subscribe to our newsletter</h5>
                        <p>Monthly digest of what's new and exciting from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>© 2023 Company, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24"
                                height="24">
                                <use xlink:href="#twitter"></use>
                            </svg></a></li>
                    <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24"
                                height="24">
                                <use xlink:href="#instagram"></use>
                            </svg></a></li>
                    <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24"
                                height="24">
                                <use xlink:href="#facebook"></use>
                            </svg></a></li>
                </ul>
            </div>
        </footer>
    </section>
    <!-- Footer section Ends -->
@endsection
