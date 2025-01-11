@extends('layout.Institute_manager.managerlayout')
@section('content')
    {{-- score  --}}
    <main>
        <div class="main-content dashbaord-content clsview-score">
            <div class="head-title">
                <div class="left">
                    <h1 id='username'></h1>
                    <ul class="breadcrumb">

                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active " href="" id="dashboard">Home</a>

                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#" id="">Scoring</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="" id="dashboard"></a>
                        </li>
                    </ul>
                </div>

            </div>
            <form id="studentform">
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3 class="text-" id="addstu_header"></h3>

                            <div class="row">
                                <input name='student_id' type="hidden" id='id' value="">


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="semester">Department</label>
                                        <select name="department" class="form-control" id="department">

                                        </select>
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

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="subject">Subject</label>
                                        <select name="subject" class="form-control" id="subject">

                                        </select>
                                        <span id="subjecterror" class="text-danger error"></span>

                                    </div>
                                </div>












                            </div>
                            <div class="p-3">
                                {{-- <button type="button" class="btn btn-primary" id="create"></button> --}}
                            </div>

                        </div>

                    </div>

                </div>
            </form>

        </div>
        {{-- end score  --}}
        {{-- scoring --}}
        <div class="main-content dashbaord-content clsadd-score">
            <div class="head-title">
                <div class="left">
                    <h1 id='usernames'></h1>
                    <ul class="breadcrumb">

                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active " href="" id="dashboard">Home</a>

                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#" id="">Scoring</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="" id="dashboard"></a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3 class="text-" id="subject_header"></h3>

                        <div class="row">
                            <table class="table table-bordered table-hover" id="studentTable">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Father's Name</th>
                                        <th>20%</th>
                                        <th>Final</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Table body will be dynamically generated -->
                                </tbody>
                            </table>

                        </div>
                        <button class="btn btn-primary" id="updateScores">Save Scores</button>

                    </div>
                </div>
            </div>
        </div>
        {{-- end scoring --}}

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

            $('.main-content.clsview-score').show();

            $('#sidebar .side-menu.top li').removeClass('active');
            $('#sidebar .side-menu.top li#view-score').addClass('active');





            // load the related department
            $.ajax({
                type: "post",
                url: "{{ route('dep_city_list') }}",

                success: function(response) {

                    $('#department').empty();

                    var dep = response[0]
                    $('#department').empty();
                    $("#department").append(
                        '<option class="form-control" disabled selected>None</option>');
                    $.each(dep, function(key, value) {

                        $("#department").append(
                            '<option class="form-control" value="' + value.Did +
                            '">' + value.department_name + '</option>');
                    });


                }
            });


            // end department 
            // department selection
            var department_id;
            $('#department').change(function() {
                var selectedOption = $(this).val();
                department_id = selectedOption;
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

            //end department selection
            // semester selection
            var semester_id;
            $('#semester').change(function() {
                var selectedOption = $(this).val();
                semester_id = selectedOption;
                $('#spin').show();
                $.ajax({
                    url: "{{ route('sem_sub_list') }}",
                    type: 'GET',
                    data: {
                        dep_id: department_id,
                        semester: selectedOption
                    },
                    success: function(response) {

                        var sub = response[0]
                        $('#spin').hide();
                        $('#subject').empty();
                        $('#subject').append(
                            '<option value="" disabled selected>None</option>')
                        response.forEach(element => {
                            $('#subject').append(
                                '<option subname="' + element.subject_name +
                                '" value="' + element.Sid +
                                '" >' + element
                                .subject_name + '</option>')

                        });


                    },
                    error: function(xhr, status, error) {
                        $('#spin').hide();

                    }
                });
            });

            var subject_id;
            $('#subject').change(function() {
                var selectedOption = $(this).val();
                subject_id = selectedOption;
                var selected = $(this).find('option:selected');

                $('#subject_header').html(selected.attr('subname'));

                $('#spin').show();
                $.ajax({
                    url: "{{ route('scoring') }}",
                    type: 'POST',
                    data: {
                        dep_id: department_id,
                        semester: semester_id,
                        subject_id: selectedOption
                    },
                    success: function(response) {
                        $('#spin').hide();
                        $('.main-content').hide();
                        $('.clsadd-score').show();

                        $('#studentTable tbody').empty();

                        // Populate table with fetched data
                        response.forEach(function(student) {
                            var row = '<tr>' +
                                '<td class="studentId">' + student.Sid + '</td>' +
                                '<td>' + student.student_name + '</td>' +
                                '<td>' + student.f_name + '</td>' +
                                '<td contenteditable="true" class="testScore" data-max="20"></td>' +
                                '<td contenteditable="true" class="finalScore" ></td>' +
                                '</tr>';
                            $('#studentTable tbody').append(row);
                        });

                        $('.testScore').on('blur', function() {

                            // Get the maximum value allowed for this element
                            var max = parseInt($(this).data('max'));

                            // Get the current content of the element
                            var content = $(this).text();

                            // Remove any non-numeric characters from the content
                            var numericContent = content.replace(/\D/g, '');

                            // Ensure the value is within the allowed range
                            if (numericContent === '' || parseInt(numericContent) >
                                max) {
                                // If the value exceeds the maximum, set it to the maximum
                                $(this).text(max);
                            } else {
                                // Otherwise, set the content back to the numeric content
                                $(this).text(numericContent);
                            }
                        });
                        $('.finalScore').on('blur', function() {

                            // Get the maximum value allowed for this element
                            var max = 80;

                            // Get the current content of the element
                            var content = $(this).text();

                            // Remove any non-numeric characters from the content
                            var numericContent = content.replace(/\D/g, '');

                            // Ensure the value is within the allowed range
                            if (numericContent === '' || parseInt(numericContent) >
                                max) {
                                // If the value exceeds the maximum, set it to the maximum
                                $(this).text(max);
                            } else {
                                // Otherwise, set the content back to the numeric content
                                $(this).text(numericContent);
                            }
                        });

                    },
                    error: function(xhr, status, error) {
                        $('#spin').hide();

                    }
                });
            });



            $('#updateScores').click(function() {
                var btn = $(this);
                btn.html('')
                btn.html('Saving Score')
                $('#spin').show();
                var scoresToUpdate = [];

                // Iterate through each row in the table
                $('#studentTable tbody tr').each(function() {
                    var sid = $(this).find('.studentId').text();
                    var testScore = $(this).find('.testScore').text();
                    var finalExamScore = $(this).find('.finalScore').text();

                    // Push data for each student into the scoresToUpdate array
                    scoresToUpdate.push({
                        sid: sid,
                        testScore: testScore,
                        finalExamScore: finalExamScore
                    });
                });

                // AJAX call to update scores
                $.ajax({
                    url: "{{ route('store.score') }}", // Your Laravel route to update score
                    method: 'POST',
                    data: {

                        scores: scoresToUpdate,
                        subject: subject_id,
                        semester: semester_id,
                        department: department_id,

                    },
                    success: function(response) {
                        btn.html('')
                        btn.html('Save Score')
                        $('#spin').hide();
                        console.log(response)
                        swal('Success !', response.message, 'success')
                    },
                    error: function(error) {
                        console.log(error)
                        btn.html('')
                        btn.html('Save Score')
                        $('#spin').hide();
                        if (error.responseJSON.message) {

                            swal('Error!', 'Please Don`t enter the duplicated data',
                                'error')

                        }
                        if (error.responseJSON.errors) {

                            swal('Error!', 'Please Check the table of score and try again',
                                'error')

                        }

                    }
                });
            });

            // end semester selection


        });
    </script>
@endsection
