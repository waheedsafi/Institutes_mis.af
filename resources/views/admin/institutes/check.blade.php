<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APMI Admin-</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/all.min.css') }}">
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="{{ asset('css/adminlte/adminlte.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom/custom.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
    <script src="{{ asset('js/jQuery/jquery.js') }}"></script>
    {{-- <link href="{{ asset('css/custom/style.css') }}" rel="stylesheet"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="{{ asset('#') }}" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <div class="navbar-nav pl-2">
                <!-- <ol class="breadcrumb p-0 m-0 bg-white">
      <li class="breadcrumb-item active">Dashboard</li>
     </ol> -->
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="{{ asset('#') }}" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="{{ asset('#') }}">
                        <img src="{{ Auth::guard('user')->user()->photo }}" class='img-circle elevation-2'
                            width="40" height="40" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                        <h4 class="h4 mb-0"><strong>Admin Name</strong></h4>
                        <div class="mb-3">{{ Auth::guard('user')->user()->email }}</div>
                        <div class="dropdown-divider"></div>
                        <a href="{{ asset('#') }}" class="dropdown-item">
                            <i class="fas fa-user-cog mr-2"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ asset('#') }}" class="dropdown-item">
                            <i class="fas fa-lock mr-2"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('adminlogout') }}" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_institute">Add
            New</button>

        <div class="modal fade bg-transparnt " id="add_institute" tabindex="-1" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content  " style="">
                    <div style="">

                        <form id="addinstitute">
                            {{-- <form action="{{ route ('addins') }}" method="POST" id="addinstitute"> --}}
                            <header class="text-center">
                                <h3 id="modal-title" calss="text-center "></h3>
                            </header>
                            {{-- @csrf --}}
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">

                                                <label for="name">Name</label>
                                                <input type="text" required name="name" id="name"
                                                    class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="city">City</label>
                                                <input type="text" name="city" required id="city"
                                                    class="form-control" placeholder="City">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">

                                                <label for="founder">Founder</label>
                                                <input type="text" name="founder" id="founder"
                                                    class="form-control" placeholder="founder">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">

                                                <label for="CEO">CEO</label>
                                                <input type="text" name="CEO" id="CEO"
                                                    class="form-control" placeholder="CEO">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">

                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">Block</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">

                                                <label for="create_date">Create Date</label>
                                                <input type="date"
                                                    max="{{ date('Y') }}-{{ date('m') }}-{{ date('d') }}"
                                                    name="create_date" id="create_date" class="form-control"
                                                    placeholder="2000/3/3">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="Address">Address</label>
                                                <textarea name="location" id="location" class="form-control" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="p-3">
                                <button id='create'>create</button>
                                <a class="btn btn-outline-dark ml-3" data-bs-toggle="modal"
                                    data-bs-target="#add_institute">Cancel</a>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>


        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#modal-title').html('Login')
                var formdata = $('#addinstitute')[0];
                $('#create').click(function(e) {

                    e.preventDefault();


                    var from = new FormData(formdata);
                    //  console.log(from);






                    $.ajax({

                        //   method:"POST",
                        url: "{{ route('addins') }}",
                        data: jQuery('#addinstitute').serrialize(),
                        //   processData: false,
                        //   contentType: false,
                        //   data: from,
                        type: 'post';



                        success: function(data) {

                        },
                        error: function(error) {
                            console.log(error);
                        }

                    });


                });

            });
        </script>
        <script src="{{ asset('js/jQuery/jquery.min.js') }} "></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('js/bootstrap/bootstrap.bundle.js') }}"></script>

        <script src="{{ asset('js/adminlte/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('js/adminlte/demo.js') }}"></script>
