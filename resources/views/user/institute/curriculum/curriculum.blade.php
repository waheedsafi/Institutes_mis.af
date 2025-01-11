@extends('layout.Institute_manager.managerlayout')
@section('content')
    <!-- MAIN -->
    <main>


        {{-- main content  --}}

        <div class="main-content dashbaord-content clsmain">
            <div class="head-title">
                <div class="left">
                    <h1 id='username'>
                        {{ auth()->user()->name }}
                    </h1>
                    <ul class="breadcrumb">

                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active " href="" id="{{ route('editor.index') }}">Home</a>

                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#" id="back">Carriculum</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="" id="instoption"></a>
                        </li>
                    </ul>
                </div>

            </div>



            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3 class="text-" id="add_header">Add Carriculum</h3>

                        <div class="row">




                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="department">Departments*</label>
                                    <select name="department" id="department" class="form-control"></select>
                                    <span id="departmenterror" class="text-danger error"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="semester">Semester</label>
                                    <select name="semester" class="form-control" id="semester">

                                    </select>
                                    <span id="semestererror" class="text-danger error"></span>
                                </div>
                            </div>




                            <div class="p-3">

                                <button type="button" class="btn btn-primary actionbtn" id="view_list">View
                                    List</button>



                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- end main --}}

        {{-- start subject list in department  --}}
        <div class="main-content dashbaord-content clssubject_list">
            <div class="head-title">
                <div class="left">
                    <h1 id='username'>
                        {{ auth()->user()->name }}
                    </h1>
                    <ul class="breadcrumb">

                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active " href="" id="{{ route('editor.index') }}">Home</a>

                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active back_home" href="#" id="back">Carriculum</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i> <a class="active" href="#" id="back">Subject
                                List</a></li>
                        <li>
                            <a class="active" href="" id="instoption"></a>
                        </li>
                    </ul>
                </div>
                <a href="javascript:void(0)" id="back_home" class="btn-download back_home">
                    <i class='bx bxs-plus'></i>
                    <span class="text">Back</span>
                </a>

            </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3 class="text-" id="subject_list_header"></h3>

                        <div class="row">
                            <table class="table table-bordered " id="subject_table">
                                <thead>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Book Name</th>
                                        <th>Credit</th>
                                        <th>Study Plan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Table body will be dynamically generated -->
                                </tbody>
                            </table>

                        </div>
                        {{-- <button class="btn btn-primary" id="updateScores">Save Scores</button> --}}

                    </div>
                </div>
            </div>
        </div>
        {{-- end subject list in department  --}}


        {{-- start add subject in department --}}
        <div class="main-content dashbaord-content clsadd_carriculum">
            <div class="head-title">
                <div class="left">
                    <h1 id='username'>
                        {{ auth()->user()->name }}
                    </h1>
                    <ul class="breadcrumb">

                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active " href="" id="{{ route('editor.index') }}">Home</a>

                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active back_home" href="javascript:void(0)" id="back">Carriculum</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i> <a class="active" href="#" id="back">Add
                                Subject To department</a></li>
                        <li>
                            <a class="active" href="" id="instoption"></a>
                        </li>
                    </ul>
                </div>
                <a href="javascript:void(0)" id="back_home" class="btn-download back_home">
                    <i class='bx bxs-plus'></i>
                    <span class="text">Back</span>
                </a>

            </div>



            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3 class="text-" id="curreculmadd_header"></h3>

                        <div class="row">




                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="table">Subject In Department</label>
                                    <table class="table table-bordered " id="append_subject_table">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Credits</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Table body will be dynamically generated -->
                                        </tbody>
                                    </table>
                                    <span id="subject_droperror" class="text-danger error"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="table">Subjects</label>
                                    <table class="table table-bordered " id="select_subject_table">
                                        <thead>
                                            <tr>
                                                <th>Subject
                                                </th>
                                                <th>Book Name</th>
                                                <th style="width:50px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Table body will be dynamically generated -->
                                        </tbody>
                                    </table>
                                </div>

                                <span id="semestererror" class="text-danger error"></span>
                            </div>
                        </div>




                        <div class="p-3">

                        </div>

                    </div>
                </div>
            </div>
        </div>



        {{-- end add subject in department --}}




        {{-- add time table  --}}

        <div class="main-content dashbaord-content clsstudyplan">
            <div class="head-title">
                <div class="left">
                    <h1 id='username'>
                        {{ auth()->user()->name }}
                    </h1>
                    <ul class="breadcrumb">

                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active " href="" id="{{ route('editor.index') }}">Home</a>

                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active back_home" href="javascript:void(0)" id="back">Carriculum</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i> <a class="active" href="#" id="back">Study
                                Plan</a></li>
                        <li>
                            <a class="active" href="" id="instoption"></a>
                        </li>
                    </ul>
                </div>
                <a href="javascript:void(0)" id="back_home" class="btn-download back_home">
                    <i class='bx bxs-plus'></i>
                    <span class="text">Back</span>
                </a>

            </div>



            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3 class="text-" id="studyplanadd_header"></h3>
                        <form id="studyplanform">
                            <div class="row">

                                <div class="col-md-6">
                                    <input type="hidden" name="studyplan_id" id='studyplan_idinp'>
                                    <input type="file" name="studyplan" class="form-control" id="studyplaninp">
                                </div>
                                <div class="col-md-6">
                                    <div id="pdfRenderer"></div>

                                </div>


                            </div>
                        </form>




                        <div class="p-3">
                            <a class="btn btn-primary" target="_blank" id="seestudyplanbtn"
                                rel="noopener noreferrer"></a>
                            <button class="btn btn-primary" id="add_studyplanbtn"></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- end add time table  --}}

        <div class="custommodel" id="departmentmodel">
            <div class="customdialog">
                <div class="customcontent autoheight">
                    <div class="table-data">
                        <div class="order">
                            <div class="head">
                                <h3 class="text-" id="addteacher_header">Appended Department To Created Institute
                                </h3>
                            </div>
                            <div class="row bg-gray">
                                <div id='departmentcheck' class="row">

                                </div>
                            </div>
                            <div class="p-3">

                                <button type="button" class="btn btn-secondry" id="department_skip">Skip</button>
                                <button type="button" class="btn btn-primary" id="department_add">Add</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- end add institute --}}
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

            $('.actionbtn').attr('disabled', true);
            $('.main-content').hide();
            $('.main-content.clsmain').show();

            $('#sidebar .side-menu.top li').removeClass('active');
            $('#sidebar .side-menu.top li#view-curriculum').addClass('active');

            // load department 
            $.ajax({
                type: "get",
                url: "{{ route('institute.department') }}",



                success: function(response) {
                    $("#department").append('<option value="" disabled selected>None</option>');
                    $.each(response, function(key, value) {

                        $("#department").append(
                            '<option class="form-control" value="' + value.Did + '">' +
                            value.department_name +
                            '</opation>'
                        );
                    });

                }
            });
            var department_id;
            var department_name;
            $('#department').change(function() {
                var selectedOption = $(this).val();
                var selectedOptiontext = $(this).find('option:selected').text();
                department_id = selectedOption;
                department_name = selectedOptiontext;
                $('#spin').show();
                $.ajax({
                    url: "{{ route('dep_sem_list') }}",
                    type: 'GET',
                    data: {
                        id: selectedOption
                    },
                    success: function(response) {

                        $('#spin').hide();
                        $('#semester').empty();
                        $('#semester').append(
                            '<option value="" disabled selected>None</option>')
                        for (let index = 1; index <= response.Semester_no; index++) {

                            $('#semester').append('<option value="' + index +
                                '">' + index + '</option>')

                        }

                    },
                    error: function(xhr, status, error) {
                        $('#spin').hide();

                    }
                });
            });

            var semester_id;
            $('#semester').change(function() {
                var sem = $(this).val();
                semester_id = sem;

                $('.actionbtn').attr('disabled', false);

            });


            // view subject list 

            // var subtable = $('#view_list').click(function(e) {
            //     $('#spin').show();
            //     var subtable = $.ajax({
            //         type: "post",
            //   url: "{{ route('manager.curriculum.list') }}",
            //         data: {
            //             dep_id: department_id,
            //             semester: semester_id
            //         },

            //         success: function(response) {


            //             $('#subject_list_header').html("Subject In " + department_name);
            //             $('.main-content').hide();
            //             $('.main-content.clssubject_list').show();
            //             $('#spin').hide();
            //             $('#subject_table tbody').empty();
            //             response.forEach(function(subject) {
            //                 var link = 'storage/' + subject.PDF;
            //                 let plan;
            //                 var planpdfurl
            //                 if (subject.pdfurl === null) {

            //                     plan =
            //                         '<i class="bx bxs-x-circle" style="color:#f10606;font-size:29px;"  ></i>'

            //                 } else {
            //                     url = 'storage/' + subject.pdfurl;


            //                     planpdfurl =
            //                         '{{ asset("'+url+'") }}';
            //                     console.log(planpdfurl)

            //                     plan =
            //                         '<i class="bx bx-check-shield" style="color:#19f106;font-size:29px;"  ></i>'
            //                 }
            //                 var row =
            //                     '<tr><td><a href="{{ asset(':link') }}" target="_blank">' +
            //                     subject
            //                     .subject_name + '</a></td><td>' +
            //                     subject.book_name + '</td><td>' + subject.credit +
            //                     '</td> <td style="text-align:center; text-size:1rem"><a href="" target="_blank">' +
            //                     plan +
            //                     '<a></td><td><div>   <a href="javascript:void(0)" class="btn btn-secondary  text-danger removesubject" data-id="' +
            //                     subject.id +
            //                     '"> <svg xmlns="http://www.w3.org/2000/svg" height="20px" class="text-danger" viewBox="0 0 24 24" width="24px" fill="#F08080"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg> ' +
            //                     '  </a> </div></td></tr>';

            //                 row = row.replace(':link', link)
            //                 $('#subject_table tbody').append(row);

            //             });
            //         },
            //         error: function(error) {
            //             console.log(error)
            //             $('#spin').hide();

            //         }
            //     });
            // });

            // Define the AJAX request function
            function getSubjectData(department_id, semester_id) {
                return $.ajax({
                    type: "post",
                    url: "{{ route('manager.curriculum.list') }}",
                    data: {
                        dep_id: department_id,
                        semester: semester_id
                    },
                });
            }

            // Click event handler for the view list button
            $('#view_list').click(function(e) {
                $('#spin').show();
                $('#subject_table tbody').empty(); // Clear existing table rows

                // Call the AJAX request function
                getSubjectData(department_id, semester_id)
                    .done(function(response) {
                        $('#subject_list_header').html("Subject In " + department_name);
                        $('.main-content').hide();
                        $('.main-content.clssubject_list').show();
                        $('#spin').hide();

                        // Process response data and append rows to the table
                        response.forEach(function(subject) {
                            var link = 'storage/' + subject.PDF;
                            var plan = subject.pdfurl === null ?
                                '<i class="bx bxs-x-circle" style="color:#f10606;font-size:29px;"  ></i>' :
                                '<i class="bx bx-check-shield" style="color:#19f106;font-size:29px;"  ></i>';
                            var row =
                                '<tr><td>   <a href=" {{ asset(':link') }}"  target="_blank" >' +
                                subject.subject_name + '</a></td><td>' +
                                subject.book_name + '</td><td>' + subject.credit +
                                '</td><td style="text-align:center; text-size:1rem">' +
                                '<a href="{{ asset('storage/') }}/' + (subject.pdfurl ? '' +
                                    subject.pdfurl :
                                    '') + '" target="_blank">' +
                                plan + '</a></td><td>' +
                                '<div><a href="javascript:void(0)" class="btn btn-secondary text-danger editstudyplan" data-id="' +
                                subject.id + '">' +
                                '<svg fill="#4cf60e" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 885.389 885.389" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M560.988,212.188c-179.2,0-324.4,145.2-324.4,324.4s145.2,324.4,324.4,324.4c179.2,0,324.4-145.2,324.4-324.4 S740.188,212.188,560.988,212.188z M745.789,570.188c0,11-9,20-20,20h-91.2c-11,0-20,9-20,20v91.2c0,11-9,20-20,20h-67.2 c-11,0-20-9-20-20v-91.2c0-11-9-20-20-20H386.188c-5.5,0-10-4.5-10-10v-77.199c0-11,9-20,20-20h91.201c11,0,20-9,20-20v-91.2 c0-11,9-20,20-20h67.2c11,0,20,9,20,20v91.2c0,11,9,20,20,20h91.2c11,0,20,9,20,20V570.188z"></path> <path d="M153.588,416.489c5.6,0.1,10.7-3.301,12.8-8.4l60.7-145.8c2-4.9,5.9-8.8,10.8-10.8l145.8-60.7c5.2-2.2,8.5-7.2,8.4-12.8 c-0.101-5.6-3.601-10.6-8.8-12.6l-364.4-140.1c-5.1-1.9-10.8-0.7-14.6,3.1l-0.3,0.3c-3.8,3.8-5,9.6-3.1,14.6l140.1,364.399 C142.988,412.989,147.988,416.489,153.588,416.489z"></path> </g> </g></svg>' +
                                '</a></div></td></tr>';

                            row = row.replace(':link', link);
                            $('#subject_table tbody').append(row);
                        });
                    })
                    .fail(function(error) {
                        console.log(error);
                        $('#spin').hide();
                    });
            });

            // end view subject list 
            function openPdf(url) {
                window.open(url, '_blank');
            }


            // start of remove subject in department
            let studyplan_id;
            $('tbody').on('click', '.editstudyplan', function() {

                var id = $(this).data('id');
                studyplan_id = id;
                $('#studyplan_idinp').val(id)
                $.ajax({
                    type: "post",
                    url: "{{ route('manager.study_plan') }}",
                    data: {
                        id: id
                    },

                    success: function(response) {
                        $('.main-content').hide();
                        $('.main-content.clsstudyplan').show();

                        if (response) {
                            $('#studyplanadd_header').html('Update Stady plan');
                            $('#seestudyplanbtn').html('See Old');
                            $('#seestudyplanbtn').attr('href', '{{ asset('storage/') }}/' +
                                response)
                            $('#add_studyplanbtn').html('Update');
                        } else {
                            $('#studyplanadd_header').html('Add Stady plan');


                            $('#seestudyplanbtn').attr('hidden', true);

                            $('#add_studyplanbtn').html('Add');


                        }


                    },
                    error: function(error) {


                        if (error.responseJSON.unauthorize) {
                            swal('Error !', error.responseJSON.unauthorize, 'error')
                        }
                    }



                });
                let studyform = $('#studyplanform')[0];
                $('#add_studyplanbtn').click(function(e) {
                    let studydata = new FormData(studyform);

                    $.ajax({
                        method: "POST",
                        url: "{{ route('manager.update.studyplan') }}",
                        data: studydata,


                        processData: false,
                        contentType: false,

                        success: function(response) {

                            swal('Success !', response, 'success')

                        },
                        error: function(error) {

                            if (error.responseJSON.errors.studyplan[0]) {
                                swal('Error !', error.responseJSON.errors.studyplan[0],
                                    'error')
                            }
                        }
                    });

                });



            });

            // end of remove subject in department
















            // back to home 

            $('.back_home').click(function(e) {
                $('.main-content').hide();
                $('.main-content.clsmain').show();
                $('#seestudyplanbtn').attr('hidden', false);
                $('#seestudyplanbtn').html('');

                $('#add_studyplanbtn').html('');


            });
            // end back to home 
            // load institue 






        });
    </script>
@endsection
