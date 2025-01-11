@extends('layout.Institute_manager.managerlayout')
@section('content')
    <script>
        var department = {!! json_encode($departments) !!}
    </script>

    <!-- MAIN -->
    <main>
        {{-- MAIN HOME --}}
        <div class="main-content dashbaord-content clsdashboard">
            <div class="head-title">
                <div class="left">
                    <h1 id='username'></h1>
                    <ul class="breadcrumb">

                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active " href="" id="dashboard">Home</a>

                        </li>
                    </ul>
                </div>
                <span class="btn-download">




                    <span id="gregorian-clock">{{ now()->format('h:i A') }}</span>

                    <!-- JavaScript to update the clock every second -->
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Get the content of the #gregorian-clock span
                            var clockSpan = document.getElementById('gregorian-clock');

                            // Function to update the clock every second
                            function updateClock() {
                                // Get the current time
                                var currentTime = new Date();

                                // Extract hours, minutes, and seconds
                                var hours = currentTime.getHours();
                                var minutes = currentTime.getMinutes();

                                var ampm = hours >= 12 ? 'PM' : 'AM';
                                hours = hours % 12 || 12; // Convert 0 to 12-hour format

                                // Add leading zeros to single-digit minutes and seconds
                                minutes = minutes < 10 ? '0' + minutes : minutes;
                                seconds = seconds < 10 ? '0' + seconds : seconds;

                                // Update the clock display
                                clockSpan.textContent = hours + ':' + minutes + ' ' + ampm;

                                // Increment minutes and update clock if seconds reach 60
                                if (seconds === 59) {
                                    // Add 1 minute
                                    currentTime.setMinutes(currentTime.getMinutes() + 1);

                                    // Update hours, minutes, and AM/PM
                                    hours = currentTime.getHours();
                                    minutes = currentTime.getMinutes();
                                    ampm = hours >= 12 ? 'PM' : 'AM';
                                    hours = hours % 12 || 12; // Convert 0 to 12-hour format

                                    // Add leading zeros to single-digit minutes
                                    minutes = minutes < 10 ? '0' + minutes : minutes;

                                    // Update the clock display with the new time
                                    clockSpan.textContent = hours + ':' + minutes + ' ' + ampm;
                                }
                            }

                            // Update the clock every second
                            setInterval(updateClock, 1000);

                            // Call updateClock initially to avoid delay
                            updateClock();
                        });
                    </script>

                </span>

            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3>{{ $activestudent }}</h3>
                        <p>Active Student</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>{{ $teachers }} </h3>
                        <p>Teacher</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>{{ $allstudent }}</h3>
                        <p>All Student</p>
                    </span>
                </li>
            </ul>

            <div class="table-data">
                <div class="order">
                    <div class="head license">
                        <h3>Institute License & Finance</h3>

                    </div>
                    <table class='license'>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Expire Date</th>
                                <th>Remain Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="license">
                                <td>
                                    License
                                    {{-- <p>{{$institute_data->expire_date}}</p> --}}
                                </td>
                                <td>
                                    @isset($institute_license->expire_date)
                                        {{ $institute_license->expire_date }}
                                    @else
                                        N/A
                                    @endisset
                                </td>
                                @isset($institute_license->expire_date)
                                    @php
                                        $expireDate = \Carbon\Carbon::createFromFormat(
                                            'Y/m/d',
                                            $institute_license->expire_date,
                                        );
                                        $currentTime = \Carbon\Carbon::now();
                                        $diff = $currentTime->diff($expireDate);
                                    @endphp
                                    <td>
                                        @if ($currentTime > $expireDate)
                                            <p class="status pending"> Expired :
                                                {{ $diff->y }}Y,{{ $diff->m }}M,{{ $diff->d }}D ago</p>
                                        @else
                                            @if ($diff->y . '/' . $diff->m . '/' . $diff->d > '0/6/1')
                                                <p class="status completed">Remaining time:
                                                    {{ $diff->y }}Y,{{ $diff->m }}M, and {{ $diff->d }}D</p>
                                            @else
                                                <p class="status process">Remaining time:
                                                    {{ $diff->y }}Y,{{ $diff->m }}M, and {{ $diff->d }}D</p>
                                            @endif
                                        @endif
                                    </td>
                                @else
                                    <td><span class="status pending">N/A</span></td>
                                @endisset

                            </tr>
                            <tr>
                                <td>
                                    <p>ISA</p>
                                </td>
                                <td>

                                    @isset($isa->expire_date)
                                        {{ $isa->expire_date }}
                                    @else
                                        N/A
                                    @endisset
                                </td>
                                @isset($isa->expire_date)
                                    @php
                                        $expireDate = \Carbon\Carbon::createFromFormat('Y/m/d', $isa->expire_date);
                                        $currentTime = \Carbon\Carbon::now();
                                        $diff = $currentTime->diff($expireDate);
                                    @endphp
                                    <td>
                                        @if ($currentTime > $expireDate)
                                            <p class="status pending"> Expired :
                                                {{ $diff->y }}Y,{{ $diff->m }}M,{{ $diff->d }}D ago</p>
                                        @else
                                            @if ($diff->y . '/' . $diff->m . '/' . $diff->d > '0/6/1')
                                                <p class="status completed">Remaining time:
                                                    {{ $diff->y }}Y,{{ $diff->m }}M, and {{ $diff->d }}D</p>
                                            @else
                                                <p class="status process">Remaining time:
                                                    {{ $diff->y }}Y,{{ $diff->m }}M, and {{ $diff->d }}D</p>
                                            @endif
                                        @endif
                                    </td>
                                @else
                                    <td><span class="status pending">N/A</span></td>
                                @endisset



                            </tr>
                            <tr>
                                <td>
                                    <p>Finance</p>
                                </td>
                                <td>
                                    @isset($finance->end_date)
                                        {{ $finance->end_date }}
                                    @else
                                        N/A
                                    @endisset
                                </td>
                                @isset($finance->end_date)
                                    @php

                                        $expireDate = \Carbon\Carbon::createFromFormat('Y/m/d', $finance->end_date);
                                        $currentTime = \Carbon\Carbon::now();
                                        $diff = $currentTime->diff($expireDate);
                                    @endphp

                                    <td>
                                        @if ($currentTime > $expireDate)
                                            <p class="status pending"> Expired :
                                                {{ $diff->y }}Y,{{ $diff->m }}M,{{ $diff->d }}D ago</p>
                                        @else
                                            @if ($diff->y . '/' . $diff->m . '/' . $diff->d > '0/6/1')
                                                <p class="status completed">Remaining time:
                                                    {{ $diff->y }}Y,{{ $diff->m }}M, and {{ $diff->d }}D</p>
                                            @else
                                                <p class="status process">Remaining time:
                                                    {{ $diff->y }}Y,{{ $diff->m }}M, and {{ $diff->d }}D</p>
                                            @endif
                                        @endif
                                    @else
                                    <td><span class="status pending">N/A</span></td>
                                @endisset

                            </tr>


                        </tbody>
                    </table>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Departments</h3>

                    </div>
                    <ul class="todo-list" id="departmentslist">

                    </ul>
                </div>
            </div>

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
