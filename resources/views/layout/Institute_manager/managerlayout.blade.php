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
    <script src="{{ asset('js/custom/sweetalert.js') }}"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <script src="jQuery/jquery.js"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/custom/managerstyle.css') }}">

    <title id="pageitle">
        {{ session('institutedata')->Institute_name }}:
        {{ session('institutedata')->name }}



    </title>
</head>

<body>
    <div id="spin">
        <div id="spinnermain">

            <div id="spinner" class="spinner"></div>

        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const colorChangingDiv = document.getElementById('spinner');

            // Function to generate a random color in hex format
            function getRandomColor() {
                return '#' + Math.floor(Math.random() * 16777215).toString(16);
            }

            // Function to change the border color of the div
            function changeBorderColor() {
                const randomColor = getRandomColor();

                colorChangingDiv.style.borderLeftColor = randomColor;
            }

            // Change the border color every 1 second (1000 milliseconds)
            setInterval(changeBorderColor, 300);
        });
    </script>
    <script>
        var institutedata = @json(session('institutedata'));


        // Now you can work with myArray in your JavaScript code




        var studnetloadRoute = "{{ route('manager.studentload') }}";
        // var editStudentUrl = "{{ route('edit_student', ['Stuid' => ':studentId']) }}";
        var deleteStudentUrl = "{{ route('delete_student', ['Stuid' => ':studentId']) }}";

        var addstudent = "{{ route('storestudent') }}";
        var dep_city_list = "{{ route('dep_city_list') }}";



        var teacherloadRoute = "{{ route('manager.teacherload') }}";
        var addteacher = "{{ route('storeteacher') }}"

        var deleteTeacherUrl = "{{ route('delete_teacher', ['teachid' => ':teacherId']) }}";




        chg_password_url = "{{ route('manager.change_password') }}"
    </script>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            {{ session('institutedata')->Institute_name }}
            <span class="text" id="insitute_name"></span>
        </a>
        <ul class="side-menu top">

            <li id="dashboard" class="active dash">
                <a href="{{ route('manager.index') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>

            @if (auth()->user()->hasPermissionTo('view-student'))
                <li id="view-student">
                    <a href="{{ route('manager.student') }}">
                        <i class='bx bxs-graduation'></i>
                        <span class="text">Student</span>
                    </a>
                </li>
            @else
            @endif
            @if (auth()->user()->hasPermissionTo('view-teacher'))
                <li id="view-teacher">
                    <a href="{{ route('manager.teacher') }}">
                        <i class='bx bxs-group'></i>
                        <span class="text">Teacher</span>
                    </a>
                </li>
            @else
            @endif
            @if (auth()->user()->hasPermissionTo('view-scoring'))
                <li>
                    <a href="#">
                        <i class='bx bxs-message-dots'></i>
                        <span class="text">Other</span>
                    </a>
                </li>
            @else
            @endif
            @if (auth()->user()->hasPermissionTo('view-score'))
                <li id="view-score">
                    <a href="{{ route('manager.scoring') }}">
                        <i class='bx bx-list-ol'></i>
                        <span class="text">Scoring</span>
                    </a>
                </li>
            @else
            @endif
            
            @if (auth()->user()->hasPermissionTo('view-curriculum'))
            <li id="view-summarycurriculum">
                <a href="{{ route('manager.summarycurriculum') }}">
                    <i class='bx bxs-book'></i>
                    <span class="text">Curriculums</span>
                </a>
            </li>
        @else
        @endif
        @if (auth()->user()->hasPermissionTo('view-curriculum'))
        <li id="view-curriculum">
            <a href="{{ route('manager.curriculum') }}">
                <i class='bx bxs-book'></i>
                <span class="text">Curriculums Books</span>
            </a>
        </li>
    @else
    @endif
    
            @if (auth()->user()->hasPermissionTo('view-timetable'))
                <li id="view-timetable">
                    <a href="#">
                        <i class='bx bxs-book-open '></i>
                        <span class="text">TimeTables</span>
                    </a>
                </li>
            @else
            @endif
            @if (auth()->user()->hasPermissionTo('view-croquis'))
            <li id="view-croquis">
                <a href="{{ route('manager.croquis') }}">
                    <i class='bx bxs-book'></i>
                    <span class="text">Croquis of building</span>
                </a>
            </li>
        @else
        @endif



        </ul>
        <ul class="side-menu">
            <li class="dash" id="manager-setting">
                <a href="{{ route('manager.setting') }}">
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

            <form action="#">
                <div class="form-input" hidden>
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            {{-- <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a> --}}
            <a href="#" class="profile">

                <img src="{{ asset(Auth()->user()->photo) }}">
            </a>
        </nav>

        <!-- NAVBAR -->

        @yield('content')

    </section>

    {{-- <script src="{{ asset('js/custom/script.js') }}"></script> --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>


</body>
<script>
    // Toggle sidebar
    document.querySelector('#content nav .bx.bx-menu').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('hide');
        if (window.innerWidth < 480) {
            document.getElementById('sidebar').classList.toggle('mobile');

        }
    });

    // Handle search button click
    document.querySelector('#content nav form .form-input button').addEventListener('click', function(e) {
        if (window.innerWidth < 576) {
            e.preventDefault();
            var form = document.querySelector('#content nav form');
            form.classList.toggle('show');
            var bxIcon = form.querySelector('.form-input button .bx');
            if (form.classList.contains('show')) {
                bxIcon.classList.remove('bx-search');
                bxIcon.classList.add('bx-x');
            } else {
                bxIcon.classList.remove('bx-x');
                bxIcon.classList.add('bx-search');
            }
        }
    });

    // Update sidebar and search form visibility
    function updateSidebarAndSearchFormVisibility() {
        if (window.innerWidth > 769) {
            document.getElementById('sidebar').classList.remove('hide');
        }
        if (window.innerWidth < 480) {
            document.getElementById('sidebar').classList.add('hide');

            document.getElementById('sidebar').classList.add('mobile');

        }
        else if (window.innerWidth < 768) {
            document.getElementById('sidebar').classList.remove('mobile');

            document.getElementById('sidebar').classList.add('hide');

        }
         else if (window.innerWidth > 576) {
            var bxIcon = document.querySelector('#content nav form .form-input button .bx');
            bxIcon.classList.remove('bx-x');
            bxIcon.classList.add('bx-search');
            document.querySelector('#content nav form').classList.remove('show');
        }

    }

    // Initial check on page load
    updateSidebarAndSearchFormVisibility();

    // Update visibility on window resize
    window.addEventListener('resize', function() {
        updateSidebarAndSearchFormVisibility();
        if (window.innerWidth > 576) {
            var bxIcon = document.querySelector('#content nav form .form-input button .bx');
            bxIcon.classList.remove('bx-x');
            bxIcon.classList.add('bx-search');
            document.querySelector('#content nav form').classList.remove('show');
        }
    });
</script>
<script>
    // header
    console.log(institutedata)
    var usernamecap = institutedata.name.charAt(0).toUpperCase() + institutedata.name.slice(1);
    document.getElementById('username').innerHTML = usernamecap;
    document.getElementById('usernames').innerHTML = usernamecap;
</script>
<script>
    // li button activetion
    var links = document.querySelectorAll('#sidebar .side-menu.top li a');
    links.forEach(function(link) {
        link.addEventListener('click', function() {
            var li = this.parentElement;



            var allLis = document.querySelectorAll('#sidebar .side-menu.top li');
            allLis.forEach(function(item) {
                item.classList.remove('active');
                document.getElementById('manager-setting').classList.remove('active');
            });

            li.classList.add('active');
        });
    });

    document.getElementById('manager-setting').addEventListener('click', function() {
        var allLis = document.querySelectorAll('#sidebar .side-menu.top li');
        allLis.forEach(function(item) {
            item.classList.remove('active');
        });
        var li = this;
        li.classList.add('active');

    });
</script>
<script>
    // Handle switch mode change
    $('#switch-mode').on('change', function() {
        if ($(this).is(':checked')) {
            $('body').addClass('dark');
        } else {
            $('body').removeClass('dark');
        }
    });
</script>


@yield('script')

</html>
