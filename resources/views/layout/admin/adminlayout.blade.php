<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		{{-- <title>APMI Admin-@yield('title') </title> --}}
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
		{{-- <link rel="stylesheet" href="{{ asset('css/font-awesome/css/all.min.css') }}"> --}}
		<!-- Theme style -->
		{{-- <link rel="stylesheet" href="{{ asset('css/adminlte/adminlte.min.css') }}"> --}}
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
		<link rel="stylesheet" href="{{ asset('css/custom/custom.css') }} ">
		{{-- <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.css')}}"> --}}
		<script src="{{ asset('js/jQuery/jquery.js')}}"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
		
		<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		@yield('link')
		
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
					  	<a class="nav-link" data-widget="pushmenu" href="{{ asset('#') }}" role="button"><i class="fas fa-bars"></i></a>
					</li>					
				</ul>
				<div class="navbar-nav pl-2">
					<!-- <ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item active">Dashboard</li>
					</ol> -->
				</div>

			
				<ul class="navbar-nav ml-auto">
					
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="{{ asset('#')}}" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					<li class="nav-item dropdown pr-2">
						<a class="nav-link p-0 pr-3" data-toggle="dropdown" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							
							<img src="{{asset(Auth::guard('user')->user()->photo)}}" class='img-circle elevation-2' width="40" height="40" alt="">
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-5" aria-labelledby="dropdownMenuButton1">
							<h4 class="h4 mb-0"><strong>Admin Name</strong></h4>
							<div class="mb-3">{{ Auth::guard('user')->user()->email }}</div>
							<div class="dropdown-divider"></div>
							<a href="{{ asset('#')}}" class="dropdown-item">
								<i class="fas fa-user-cog mr-2"></i> Settings								
							</a>
							<div class="dropdown-divider"></div>
							<a href="{{ asset('#')}}" class="dropdown-item">
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
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="#" class="brand-link">
					<img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light">APMI</span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user (optional) -->
					<nav class="mt-2">
					@yield('saidbar');
					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
         	</aside>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
			@yield('content')
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				
				<strong>Afghanistan Private Midecal Institutes Head Office .
			</footer>
			
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		{{-- <script src="{{ asset('js/jQuery/jquery.min.js')}} "></script> --}}
		<!-- Bootstrap 4 -->
		{{-- <script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
		<!-- AdminLTE App -->
		<script src="{{asset('js/bootstrap/bootstrap.bundle.js')}}"></script>
		
		<script src="{{ asset('js/adminlte/adminlte.min.js') }}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{ asset('js/adminlte/demo.js')}}"></script>
		
		@yield('scrtip')
	</body>
</html>