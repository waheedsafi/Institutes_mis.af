@extends('layout.Institute_manager.managerlayout')
@section('content')
    {{-- teacher --}}
    <main>
        <div class="main-content dashbaord-content clsview-teacher">
            <div class="head-title">
                <div class="left">
                    <h1 id='usernames'></h1>
                    <ul class="breadcrumb">

                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active " id="dashboard">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="javascript:void(0)" id="view-student">Teacher</a>
                        </li>
                    </ul>
                </div>
                <a href="javascript:void(0)" class="btn-download" ID="add_teacher">
                    <i class='bx bx-plus'></i>

                    <span class="text">Add Teacher</span>
                </a>
            </div>




            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3 class="text-" id="stutable_header"></h3>

                    </div>
                    <table id="teachertable" class="table cell-border table-striped table_yajra">
                        <thead>

                            <th>ID</th>
                            <th>Name</th>
                            <th>Education</th>
                            <th>Phone</th>
                            <th>Join</th>
                            <th width="100">Actions</th>

                        </thead>
                        <tbody>



                        </tbody>

                    </table>
                </div>

            </div>

        </div>

        {{-- end teacher --}}

        {{-- add teacher --}}

        <div class="main-content dashbaord-content clsadd-teacher">
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
                            <a class="active" href="#" id="menu_teacher_add">Teacher</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="" id="teacher_option"></a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download" id="teacher_back">
                    <i class='bx bx-plus'></i>

                    <span class="text">Back</span>
                </a>
            </div>


            <form id="teacherform">
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3 class="text-" id="addteacher_header"></h3>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <input name='teacher_id' type="hidden" id='teacher_id'>
                                        <label for="name">Name*</label>
                                        <input type="text" required name="name" id="teachname" class="form-control"
                                            placeholder="Name">
                                        <span id="teachnameerror" class="text-danger error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fname">F/Name*</label>
                                        <input type="text" name="fname" required id="teachfname" class="form-control"
                                            placeholder="Father Name">
                                        <span id="teachfnameerror" class="text-danger error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lname">Last Name</label>
                                        <input type="text" name="lname" required id="teachlname" class="form-control"
                                            placeholder="Last Name">
                                        <span id="lnameerror" class="text-danger error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="education">Education</label>
                                        <select name="education" id="teacheducation" class="form-control">
                                            <option value="associate">Associate degree</option>
                                            <option value="bachelor">Bachelor’s degree</option>
                                            <option value="master">Master’s degree</option>
                                            <option value="doctoral">Doctoral degree</option>
                                            <option value="professional">Professional degree</option>

                                        </select>
                                        <span id="teacheducationerror" class="text-danger error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="experince">Experince*</label>
                                        <select name="experince" class="form-control" id="teachexperince">
                                            <option class="form-control" value="1">1 Year</option>
                                            <option class="form-control" value="1">2 Year</option>
                                            <option class="form-control" value="1">3 Year</option>
                                            <option value="1">4 Year</option>
                                        </select>
                                        <span id="experinceerror" class="text-danger error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="gender">Gender*</label>
                                        <select name="gender" class="form-control" id="teachgender">
                                            <option value="1">Male</option>
                                            <option value="0">Female</option>
                                        </select>
                                        <span id="gendererror" class="text-danger error"></span>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="department">Department*</label>
                                        <select name="department" class="form-control" id="department">

                                        </select>
                                        <span id="departmenterror" class="text-danger error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="city">Org/Province*</label>
                                        <select name="city" class="form-control" id="city">


                                        </select>
                                        <span id="cityerror" class="text-danger error"></span>

                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="contract">Contract Type</label>
                                        <select name="contract" class="form-control" id="teachcontract">
                                            <option value="permanent">Permanent</option>
                                            <option value="temprory">Temprory</option>

                                        </select>
                                        <span id="cityerror" class="text-danger error"></span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="teachemail" class="form-control"
                                            placeholder="Email">
                                        <span id="emailerror" class="text-danger error"></span>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="salary">Salary</label>
                                        <div class="input-group">
                                            <input type="text" name="salary" id="teachsalary" class="form-control"
                                                placeholder="Salary">
                                            <div class="input-group-append">
                                                <span class="input-group-text">AF</span>
                                            </div>
                                        </div>
                                        <span id="teachsalaryerror" class="text-danger error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <label for="photo">Photo</label>
                                        <input type="file" name="photo" id="teachphoto" class="form-control"
                                            placeholder="Photo">
                                        <span id="teachphotoerror" class="text-danger error"></span>


                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="dob">Join</label>
                                        <?php
                                        $currentDate = date('Y-m-d');
                                        ?>
                                        <input type="date" max="<?php echo $currentDate; ?>" name="join" id="teachjoin"
                                            class="form-control">
                                        <span id="teachjoinerror" class="text-danger error"></span>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone">Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text">+93</span>
                                            <input type="text" maxlength="9" name="phone" id="teachphone"
                                                class="form-control" placeholder="707070707">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="p-3">
                                <button type="button" class="btn btn-primary" id="createteacher"></button>
                            </div>

                        </div>

                    </div>

                </div>
            </form>
        </div>

        {{-- end add teacher --}}

        {{-- teacher VIEW  --}}
        <div class="main-content dashbaord-content clsinfo-teacher">
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
                            <a class="active" href="javascript:void(0)" id="menu_teacher_info">Teacher</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="" id="dashboard">Info</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download" id="infoteacher_back">
                    <i class='bx bx-plus'></i>

                    <span class="text">Back</span>
                </a>
            </div>

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img alt="No Photo" class="rounded-circle" id='tinfophoto' width="150">
                                <div class="mt-3">
                                    <h4 id='tinfoname'></h4>
                                    <p class="text-secondary mb-1" id='#tinfoemail'></p>
                                    <p class="text-muted font-size-sm" id='tinfophone'></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    Education information
                                </h6>
                                <span class="text-secondary"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                </h6>
                                <span class="text-secondary"></span>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                </h6>
                                <span class="text-secondary"></span>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                </h6>
                                <span class="text-secondary"></span>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                </h6>
                                <span class="text-secondary"></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Father Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="tinfofname">

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Grandfather/name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Department</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select name="" class="form-control form-control-plaintext text-secondary p-0"
                                        disabled id="infodepartment">

                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Stutas</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="infostatus">

                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id='infogender'>

                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Semester</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id='infosemester'>

                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">DOB</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id='infodob'>

                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">City</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select name="" class="form-control form-control-plaintext text-secondary p-0"
                                        disabled id="infocity">

                                    </select>
                                </div>
                            </div>
                            {{-- en --}}
                        </div>
                    </div>
                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3">
                                        <i class="material-icons text-info mr-2">Attendance </i>
                                    </h6>
                                    <small>Semester1</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Anatomy</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>present</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>absent</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%"
                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>parmachology</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%"
                                            aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3">
                                        <i class="material-icons text-info mr-2">Persentage</i>
                                    </h6>
                                    <small>pharmacology</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Anatomy</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Sehat kahlan</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Interior</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%"
                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Physichs</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%"
                                            aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
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
            $('.main-content.clsview-teacher').show();

            $('#sidebar .side-menu.top li').removeClass('active');
            $('#sidebar .side-menu.top li#view-teacher').addClass('active');




            // teacher part


            // e.preventDefault();


            var table = $('#teachertable').DataTable({
                "processing": true,
                "retrieve": true,
                "serverSide": true,
                'paginate': true,
                'searchDelay': 700,
                "bDeferRender": true,
                "responsive": true,
                "autoWidth": false,
                "pageLength": 5,
                "lengthMenu": [
                    [5, 10, 15, 20],
                    [5, 10, 15, 20]
                ],
                ajax: teacherloadRoute,
                'columns': [

                    {
                        data: 'Tid'
                    },
                    {
                        data: 'teacher_name'
                    },
                    {
                        data: 'education'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'join_date'
                    },
                    // { data: 'action', name: 'action', orderable: false, searchabel: false },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `
						
                                        <div class="btn-group"> <a href="javascript:void(0)" class="teachinfobutton btn-secondary btn" data-id="${row.Tid}">
                            <svg class="filament-link-icon w-4 h-4 mr-1 " style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"> <path d="M433 203.2H213c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V243.3s0-0.1 0.1-0.1H433s0.1 0 0.1 0.1l-0.1 219.9zM702.5 203.2c-82.5 0-150 67.5-150 150s67.5 150 150 150 150-67.5 150-150-67.5-150-150-150z m77.7 227.7c-20.9 20.9-48.4 32.3-77.7 32.3-29.2 0-56.8-11.5-77.7-32.3-20.9-20.9-32.3-48.4-32.3-77.7 0-29.2 11.5-56.8 32.3-77.7 20.9-20.9 48.4-32.3 77.7-32.3 29.2 0 56.8 11.5 77.7 32.3 20.9 20.9 32.3 48.4 32.3 77.7 0 29.2-11.5 56.8-32.3 77.7zM431.3 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9zM812.5 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9z"  fill="#5ABE64" /></svg>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-secondary teacheditbutton" data-id="${row.Tid}">
                        
                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="24px" fill="#3C91E6"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-secondary  text-danger teachdelbutton" data-id="${row.Tid}">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" class="text-danger" viewBox="0 0 24 24" width="24px" fill="#F08080"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                            </a>
                            
                            </div> '
                                    `;
                        }
                    }
                ]
            });




            $('#menu_teacher_add').click(function(e) {
                $('#view-teacher').click();

            });
            // add teacher
            $('#add_teacher').click(function(e) {
                // 	e.preventDefault();
                // console.log('clicki')
                $('.main-content').hide();
                var sl = '.cls' + 'add-teacher';
                $(sl).show();
                $('#addteacher_header').html('Add New Teacher')
                $('#createteacher').html('ADD');

                $.ajax({
                    method: "post",
                    url: dep_city_list,
                    success: function(response) {
                        var dep = response[0]
                        var city = response[1]

                        $.each(dep, function(key, value) {

                            $("#department").append(
                                '<option class="form-control" value="' + value.Did +
                                '">' + value.department_name + '</option>');
                        });
                        $.each(city, function(key, value) {

                            $("#city").append('<option class="form-control" value="' +
                                value.id + '">' + value.city + '</option>');
                        });




                    },
                    error: function(error) {
                        if (error.responseJSON.unauthorize) {
                            swal("Unauthorized !", error.responseJSON.unauthorize, "error");

                        }
                        console.log(error);

                    }
                });

            });
            // end add teacher

            // store teacher 
            var teadata = $('#teacherform')[0];
            $('#createteacher').click(function(e) {
                $('#createteacher').attr('disabled', true);

                $('#createteacher').html('Saving...')
                var formdata = new FormData(teadata);

                $.ajax({
                    method: "POST",
                    url: addteacher,
                    processData: false,
                    contentType: false,
                    data: formdata,


                    success: function(response) {
                        $('#createteacher').attr('disabled', false);
                        if (response.message) {

                            swal("Success!", response.message, "success");

                            table.draw();
                            $('#teacherform')[0].reset();
                            $('#id').val('');
                            $('#createteacher').attr('disabled', false);

                            $('#createteacher').html('Add');



                        }

                    },
                    error: function(error) {

                        if (error.responseJSON.unauthorize) {
                            swal("Unauthorized !", error.responseJSON.unauthorize, "error");

                        }
                        if (error) {
                            $('#createteacher').attr('disabled', false);
                            $('#createteacher').html('Add')

                            if (error.responseJSON.errors.name) {
                                $('#teachname').addClass('is-invalid');
                                $('#teachnameerror').html(error.responseJSON.errors.name)
                            }
                            if (error.responseJSON.errors.name == null) {
                                $('#teachname').removeClass('is-invalid');
                                $('#teachname').addClass('is-valid');
                                $('#teachnameerror').html('');

                            }
                            if (error.responseJSON.errors.fname) {
                                $('#teachfname').addClass('is-invalid');
                                $('#teachfnameerror').html(error.responseJSON.errors.fname)
                            }
                            if (error.responseJSON.errors.fname == null) {
                                $('#teachfname').removeClass('is-invalid');
                                $('#teachfname').addClass('is-valid');
                                $('#teachfnameerror').html('');

                            }

                            if (error.responseJSON.errors.gender) {
                                $('#teachgender').addClass('is-invalid');
                                $('#teachgendererror').html(error.responseJSON.errors.gender)
                            }
                            if (error.responseJSON.errors.gender == null) {
                                $('#teachgender').removeClass('is-invalid');
                                $('#teachgender').addClass('is-valid');
                                $('#teachgendererror').html('');

                            }

                            if (error.responseJSON.errors.join) {
                                $('#teachjoin').addClass('is-invalid');
                                $('#teachjoinerror').html(error.responseJSON.errors.join)
                            }
                            if (error.responseJSON.errors.join == null) {
                                $('#teacjoin').removeClass('is-invalid');
                                $('#teachjoin').addClass('is-valid');
                                $('#teachjoinerror').html('');


                            }
                            if (error.responseJSON.errors.photo) {
                                $('#teachphoto').addClass('is-invalid');
                                $('#teachphotoerror').html(error.responseJSON.errors.photo)
                            }
                            if (error.responseJSON.errors.photo == null) {
                                $('#teachphoto').removeClass('is-invalid');
                                $('#teachphoto').addClass('is-valid');
                                $('#teachphotoerror').html('');


                            }

                            if (error.responseJSON.errors.salary) {
                                $('#teachsalary').addClass('is-invalid');
                                $('#teachsalaryerror').html(error.responseJSON.errors.salary)
                            }
                            if (error.responseJSON.errors.salary == null) {
                                $('#teachsalary').removeClass('is-invalid');
                                $('#teachsalary').addClass('is-valid');
                                $('#teachsalaryerror').html('');


                            }

                        }
                    }
                });


            });
            // end store teacher

            // edit teacher
            $('body').on('click', '.teacheditbutton', function() {
                var id = $(this).data('id');
                stud_id = id;
                var editTeacherUrl = "{{ route('edit_teacher', ['teachid' => ':teacherId']) }}";
                editTeacherUrl = editTeacherUrl.replace(':teacherId', id);

                $('#spin').show();


                $.ajax({
                    url: editTeacherUrl,
                    method: 'GET',
                    success: function(response) {
                        $('#spin').hide();
                        $('.main-content').hide();
                        var sl = '.cls' + 'add-teacher';
                        $(sl).show();
                        $('#addteacher_header').html('Edit Teacher')
                        $('#createteacher').html('Update');


                        $('#teacher_id').val(id);

                        $('#teachname').val(response.teacher_name);

                        $('#teachfname').val(response.f_name);
                        $('#teachlname').val(response.last_name);
                        $('#teachgfname').val(response.g_f_name);

                        $('#teachgender option[value="' + response.gender + '"]').attr(
                            'selected', 'selected')

                        $('#teachcontract option[value="' + response.contract_type + '"]').attr(
                            'selected', 'selected')


                        $('#teachexperince option[value="' + response.experince + '"]').attr(
                            'selected', 'selected')

                        $('#teacheducation option[value="' + response.education + '"]').attr(
                            'selected', 'selected')


                        $('#teachjoin').val(response.join_date);


                        $('#teachphone').val(response.phone);
                        $('#teachemail').val(response.email);
                        $('#teachsalary').val(response.salary);





                    },
                    error: function(error) {
                        $('#spin').hide();
                        if (error.responseJSON.unauthorize) {
                            swal("Unauthorized !", error.responseJSON.unauthorize, "error");

                        }
                    }
                });




            });
            // end edit teacher

            // delete teacher 
            $('body').on('click', '.teachdelbutton', function() {
                var id = $(this).data('id');
                $('#spin').show();

                deleteTeacherUrl = deleteTeacherUrl.replace(':teacherId', id);
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!" + id,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({

                                url: deleteTeacherUrl,
                                method: 'GET',
                                success: function(response) {
                                    swal("Success!", response.message, "success");
                                    $('#spin').hide();

                                    table.draw();

                                },
                                error: function(error) {
                                    console.log(error)
                                    $('#spin').hide();

                                }
                            });

                        } else {
                            swal("Your imaginary file is safe!");
                            $('#spin').hide();

                        }
                    });

            });
            // end delete teacher 


            //   info teacher 
            $('body').on('click', '.teachinfobutton', function() {
                var id = $(this).data('id');
                stud_id = id;
                $('#spin').show();
                var editTeacherUrl = "{{ route('info_teacher', ['teachid' => ':teacherId']) }}";
                editTeacherUrl = editTeacherUrl.replace(':studentId', id);
                $.ajax({
                    method: "post",
                    url: dep_city_list,
                    success: function(response) {
                        $('#spin').hide();

                        $('#infodepartment').empty();
                        $('#city').empty();
                        var dep = response[0]
                        var city = response[1]

                        $.each(dep, function(key, value) {

                            $("#infodepartment").append(
                                '<option class="form-control" value="' + value.Did +
                                '">' + value.department_name + '</option>');
                        });
                        $.each(city, function(key, value) {

                            $("#infocity").append(
                                '<option class="form-control" value="' + value.id +
                                '">' + value.city + '</option>');
                        });



                        $.ajax({
                            url: editTeacherUrl,
                            method: 'GET',
                            success: function(response) {
                                $('#spin').hide();

                                var student_name = response.student_name.charAt(0)
                                    .toUpperCase() + response.student_name.slice(1);

                                studnetphoto = studnetphoto.replace(':studentimage',
                                    response.photo)
                                $('.main-content').hide();
                                var sl = '.cls' + 'info-student';
                                $(sl).show();
                                $('#addstu_header').html('Edit Student')
                                $('#create').html('Update');
                                $('#infophoto').attr('src', studnetphoto)

                                $('#infokankur').html(response.kankur_no);
                                $('#infoname').html(student_name + '  ' + response
                                    .l_name);
                                $('#infophone').html(response.phone);
                                $('#infofname').html(response.f_name);
                                $('#infolname').html(response.l_name);
                                $('#infostatus').html(response.status);
                                $('#infodob').html(response.DOB);

                                $('#infosemester').html(response.semester);
                                $('#infogfname').html(response.g_f_name);
                                $('#infodepartment option[value="' + response.Did +
                                    '"]').attr('selected', 'selected')



                                gender = 'Male'
                                if (response.gender == 0) {
                                    gender = 'Famale'
                                }
                                $('#infogender').html(gender)
                                $('#infocity option[value="' + response.city + '"]')
                                    .attr('selected', 'selected')






                            },
                            error: function(error) {


                                if (error.responseJSON.unauthorize) {
                                    swal('Unauthorized !', error.responseJSON
                                        .unauthorize, 'error');
                                }
                                $('#spin').hide();
                            }
                        });
                    },
                    error: function(error) {

                        if (error.responseJSON.unauthorize) {
                            swal('Unauthorized !', error.responseJSON.unauthorize, 'error');
                        }
                        $('#spin').hide();

                    }
                });






            });

            //   end info teacher

            // teacher back
            $('#teacher_back').click(function(e) {

                $('.main-content').hide();
                $('.clsview-teacher').show();

                $('#teacher_id').val('');
                $('#teachfname').val('');
                $('#teachcontract').val('');
                $('#teachemail').val('');

                $('#teachcontract ').val('');



                $('#teacheducation ').val('');
                $('#teachexperince ').val('');

                $('#teachname').val('');

                $('#teachlname').val('');

                $('#teachsalary').val('');
                $('#teachphone').val('');
                $('#teachjoin').val('');
                $('#infogfname').val('');

                $('#infodepartment ').empty();



                $('#infogender ').empty();
                $('#infocity ').empty();

                $('#infodob').val('');

                $('#infophone').val('');

                editStudentUrl = editStudentUrl.replace(stud_id, ':studentId');




            });




        });
    </script>
@endsection
