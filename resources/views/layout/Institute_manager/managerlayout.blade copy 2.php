<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <script src="jQuery/jquery.js"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/custom/managerstyle.css') }}">

    <title id="pagetitle">

    </title>
</head>

<body>

    <script>
        var myArray = @json(session('institute'));
        // Now you can work with myArray in your JavaScript code

        var permisi = {!! json_encode($perdata) !!};
        var institute = {!! json_encode($institute_data) !!}

        var department = {!! json_encode($departments) !!}
        var studnetloadRoute = "{{ route('manager.studentload') }}";
        var editStudentUrl = "{{ route('edit_student', ['Stuid' => ':studentId']) }}";
        var deleteStudentUrl = "{{ route('delete_student', ['Stuid' => ':studentId']) }}";
        var studnetphoto = "{{ asset(':studentimage') }}";
        var addstudent = "{{ route('storestudent') }}";
        var dep_city_list = "{{ route('dep_city_list') }}";



        var teacherloadRoute = "{{ route('manager.teacherload') }}";
        var addteacher = "{{ route('storeteacher') }}"
        var editTeacherUrl = "{{ route('edit_teacher', ['teachid' => ':teacherId']) }}";
        var deleteTeacherUrl = "{{ route('delete_teacher', ['teachid' => ':teacherId']) }}";

        var userimage = "{{ asset($institute_data->photo) }}";

        chg_photo_url = "{{ route('manager.change_photo') }}"

        chg_password_url = "{{ route('manager.change_password') }}"
    </script>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text" id="insitute_name"></span>
        </a>
        <ul class="side-menu top">

            <li id="dashboard" class="active dash">
                <a href="javascript:void(0)">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            {{-- @if (Auth()->user()->Haspermissionto)
    
@endif --}}
            <li id="view-student">
                <a href="javascript:void(0)">
                    <i class='bx bxs-graduation'></i>
                    <span class="text">Student</span>
                </a>
            </li>
            <li id="view-teacher">
                <a href="javascript:void(0)">
                    <i class='bx bxs-group'></i>
                    <span class="text">Teacher</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Other</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-group'></i>
                    <span class="text">Other</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li class="dash" id="manager-setting">
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li class="dash">
                <a href="{{ route('adminlogout') }}" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
            <li class="dash">
                <div class="mb-3">{{ Auth::guard('user')->user()->email }}</div>

            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input" hidden>
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <script>
                    console.log(institute)
                    console.log('heljoj')
                </script>
                <img src="{{ asset($institute_data->photo) }}">
            </a>
        </nav>

        <!-- NAVBAR -->

        @yield('content')

    </section>

    <script src="{{ asset('js/custom/script.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

</body>

</html>
