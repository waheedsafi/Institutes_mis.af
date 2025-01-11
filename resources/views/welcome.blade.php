@extends('layout.mainlayout')
@section('title','Home')
@section('navbutton')
<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="/" class="nav-item nav-link active">Home</a>
        <a href="/about" class="nav-item nav-link">About</a>

    
        <a href="contact.html" class="nav-item nav-link">Contact</a>
    </div>
    <a href="{{ route('UserLogin') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
</div>
@endsection

@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid"  src="{{ asset('img/medical.png')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">This System Design for Private Medical Institutes</h5>
                                <h1 class="display-3 text-white animated slideInDown">خپله د امتحان نتیجه وګوری
                                   <br> Find Your Exam result
                                </h1>
                              
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Find</a>
                                <a  href="{{ route('UserLogin') }}" >Login</a>
                                {{-- href="{{ route('UserLogin') }}" --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Carousel End -->
    {{-- login start --}}
    <div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content ">
          
                 {{-- strat --}}
                <form action="{{ route('user.authenticate') }}" method="POST">
                   
                     
                    @csrf
                    <h3 >Login Here</h3>
            
                    <label for="username" >Username</label>
                    <input type="email"  name="email" placeholder="Plaese insert Email" value="{{ old('email') }}" class="form-control @error('email') is-invalid
                        
                    @enderror" id="email">
                    @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                        
                    @enderror
            
                    <label for="password" >Password</label>
                    <input type="password"name="password" placeholder="Password"  class="form-control @error('password') is-invalid
                        
                    @enderror"id="password">
                    @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                        
                    @enderror
                    @include('user.massage')
                       
                    <div class="modal-footer">
                        <button  login class="btn btn-primary" type="submit">Log In</button>
                        <button type="button" cancel class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           
                      </div>
                </form>
                {{-- end --}}
              </div>
            </div>
    
      </div>
    {{-- login end --}}
    <!-- Service Start -->
    <div class="container-x py-4">
        <div class="container">
            <div class="row text-center " >
                
                <div class=" col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Institutes List</h5>
                            <p>All Register Institute</p>
                        </div>
                    </div>
                </div>
                <div class=" col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Book Library</h5>
                            <p>All Book</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('img/medical.png')}}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to APMI</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <div class="row gy-2 gx-4 mb-4">
                       
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
                <h1 class="mb-5">Department Catogories</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('img/medical.png')}}" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Pharmacy</h5>
                                    <small class="text-primary">50 cridet</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('img/medical.png')}}" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Anotomy</h5>
                                    <small class="text-primary">49 cridet</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('img/medical.png')}}" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Pharmacology</h5>
                                    <small class="text-primary">60 Cridet</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('img/medical.png')}}" alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                            <h5 class="m-0">City Scan</h5>
                            <small class="text-primary">43 Cridet</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories end -->



    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Institute</h6>
                <h1 class="mb-5">You can Join With</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('img/medical.png')}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('img/medical.png')}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('img/medical.png')}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('img/medical.png')}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
        
@endsection
 