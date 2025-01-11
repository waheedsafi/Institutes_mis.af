@extends('layout.mainlayout')
@section('title', 'Login')
@section('navbutton')

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link ">Home</a>
            <a href="/about" class="nav-item nav-link">About</a>


            <a href="contact.html" class="nav-item nav-link">Contact</a>
        </div>

    </div>
@endsection
@section('content')
    {{-- <div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid"  src="{{ asset('img/medical.png')}}" alt="">
            <div class="background">
                
                <div class="shape"></div>
                <div class="shape"></div>
            </div> --}}

    <form action="{{ route('user.authenticate') }}" method="POST">
        @csrf
        <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z"></path><path d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z"></path></svg>

        </h3>
        <h3>Login</h3>

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

        <button cancel><a href="{{ route('welcome') }}" style="text-decoration:none">Back</a></button>

    </form>
    {{-- </div>

        </div>
</div> --}}

@endsection
