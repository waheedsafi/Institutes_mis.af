@extends('layout.editor.editorlayout')
@section('content')
    <!-- MAIN -->
    <main>
        {{-- MAIN HOME --}}
        <div class="main-content dashbaord-content clsdashboard">
            <div class="head-title">
                <div class="left">
                    <h1 id='username'>
                        {{ auth()->user()->name }}
                    </h1>
                    <ul class="breadcrumb">

                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active " href="" id="dashboard">Home</a>

                        </li>
                    </ul>
                </div>
                {{-- <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a> --}}
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3>{{ $studnetcount }}</h3>
                        <p>All Student</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>{{ $activestudent }}</h3>
                        <p>Active Student</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                     
                        <h3>{{ $institutecount }}</h3>
                        <p>All Institute</p>
                    </span>
                </li>
            </ul>




        </div>
        {{-- MAIN HOME END --}}

        {{-- other blade --}}
        {{-- @include('user.institute.student.student')
@include('user.institute.teacher.teacher')
@include('user.institute.setting.setting') --}}


    </main>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            });


            $('.main-content').hide();
            $('.main-content.clsdashboard').show();


            $.each(department, function(array, key) {

                var listItem = '<li>' + key.department_name + ' --- Semester No  :  ' + key.Semester_no +
                    '</li>';
                $('#departmentslist').append(listItem);
            });


        });
    </script>
@endsection
