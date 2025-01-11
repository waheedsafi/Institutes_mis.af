@extends('layout.Institute_manager.managerlayout')
@section('content')
    <main>
        <div class="main-content dashbaord-content clsview-student">
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
                            <a class="active" href="javascript:void(0)" id="view-student">Studnet</a>
                        </li>
                    </ul>
                </div>
                @if (auth()->user()->hasPermissionTo('download-card'))
                    <a href="{{ route('studnet.downloadcards') }}" class="btn-download" ID="download_cards">
                        <i class='bx bxs-cloud-download'></i>

                        <span class="text">Download Cards</span>
                    </a>
                @endif
                @if (auth()->user()->hasPermissionTo('add-student'))
                    <a href="javascript:void(0)" class="btn-download" ID="add_student">
                        <i class='bx bx-plus'></i>

                        <span class="text">Add Student</span>
                    </a>
                @endif
                @if (auth()->user()->hasPermissionTo('add-exists-student'))
                    <a href="javascript:void(0)" class="btn-download" ID="add_exists_student">
                        <i class='bx bx-plus'></i>

                        <span class="text">Add Exists Student</span>
                    </a>
                @endif
            </div>




            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3 class="text-" id="stutable_header"></h3>

                    </div>
                    <table id="studenttable" class="table cell-border table-striped table_yajra">
                        <thead>

                            <th>ID</th>
                            <th>Name</th>
                            <th>Kankor ID</th>
                            <th>Class</th>
                            <th>Status</th>
                            {{-- <th>Semster</th> --}}
                            <th width="100">Actions</th>

                        </thead>
                        <tbody>



                        </tbody>

                    </table>
                </div>

            </div>

        </div>

        {{-- STUDENT END --}}

        {{-- STUDENT ADD --}}

        <div class="main-content dashbaord-content clsadd-student">
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
                            <a class="active" href="javascript:void(0)" id="menu_student_add">Studnet</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="" id="dashboard">Add</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download" id='addstudent_back'>
                    <i class='bx bx-plus'></i>

                    <span class="text">Back</span>
                </a>
            </div>


            <form id="studentform">
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3 class="text-" id="addstu_header"></h3>
                            <h6 style="direction:rtl">نوټ:په لاندنی فورمه کی یوازی هغه محصلین راجستر کړی کوم چی په لومړی سمستر کی وي او نوم لیکنه باید په ملي ژبو وي، انګلیسي د منلو وړ نه ده
                                <br> توجه: فقط دانشجویانی که سمستر اول هستند می توانید در فرم زیر ثبت نام کنید و ثبت نام باید به زبان های ملی باشد، انگلیسی قابل قبول نیست

                            </h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <input name='student_id' type="hidden" id='id' value="">
                                        <label for="name">Name*</label>
                                        <input type="text" required name="name" id="name" class="form-control"
                                            placeholder="Name">
                                        <span id="nameerror" class="text-danger error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fname">F/Name*</label>
                                        <input type="text" name="fname" required id="fname" class="form-control"
                                            placeholder="Father Name">
                                        <span id="fnameerror" class="text-danger error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lname">Last Name</label>
                                        <input type="text" name="lname" required id="lname" class="form-control"
                                            placeholder="Last Name">
                                        <span id="lnameerror" class="text-danger error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="gfname">GradFather/Name</label>
                                        <input type="text" name="gfname" required id="gfname"
                                            class="form-control" placeholder="GrandFahter Name">
                                        <span id="gfnameerror" class="text-danger error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="schooldate">School Graduation Date</label>
                                        <input type="date" name="schooldate" required id="schooldate"
                                            class="form-control" placeholder="GrandFahter Name">
                                        <span id="schooldateerror" class="text-danger error"></span>
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
                                        <label for="gender">Gender*</label>
                                        <select name="gender" class="form-control" id="gender">
                                            <option value="1">Male</option>
                                            <option value="0">Female</option>
                                        </select>
                                        <span id="gendererror" class="text-danger error"></span>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="shift">Shift *</label>
                                        <select name="shift" class="form-control" id="shift">


                                        </select>
                                        <span id="shifterror" class="text-danger error"></span>

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

                                        <label for="photo">Photo</label>
                                        <input type="file" name="photo" id="photo" class="form-control"
                                            placeholder="Photo">
                                        <span id="photoerror" class="text-danger error"></span>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <label for="scaninfo"
                                            title="Scan of National Identity & 12th Grade Certificate">Information
                                            Scan</label>
                                        <input type="file" name="scanfile" id="scanfile" class="form-control"
                                            placeholder="Photo">
                                        <span id="scanfileerror" class="text-danger error"></span>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" title="National Identity Number ">Nid Number</label>

                                        <input type="text" name="nid" id="nid" class="form-control"
                                            placeholder="89232">
                                        <span id="niderror" class="text-danger error"></span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" title="3 Year(12,11,10) of School Persentage">3Y
                                            Persentage</label>

                                        <input type="text" name="persentage" id="persentage" class="form-control"
                                            placeholder="88.4" value="0.0">
                                        <span id="persentageerror" class="text-danger error"></span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="dob">Date of Birth</label>
                                        @php
                                            $eighteenYearsAgo = date('Y-m-d', strtotime('-18 years'));
                                        @endphp
                                        <input type="date" max="{{ $eighteenYearsAgo }}" name="DOB"
                                            id="DOB" class="form-control">
                                        <span id="DOBerror" class="text-danger error"></span>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone">Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text">+93</span>
                                            <input type="text" maxlength="9" name="phone" id="phone"
                                                class="form-control" placeholder="707070707">
                                        </div>
                                        <span id="phoneerror" class="text-danger error"></span>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone">Semester Type</label>
                                      
                                        <select class="form-control" name="semester_type" id="semester_type">
                                            <option value="0">بهاری</option>
                                            <option value="1">خزانی</option>
                                        </select>
                                        <span id="phoneerror" class="text-danger error"></span>

                                    </div>
                                </div>

                            </div>
                            <div class="p-3">
                                <button type="button" class="btn btn-primary" id="create"></button>
                            </div>

                        </div>

                    </div>

                </div>
            </form>
        </div>
        {{-- STUDENT ADD END --}}
        {{-- include exists student file --}}
        @include('user.institute.student.exists_student')

        {{-- STUDENT VIEW  --}}
        <div class="main-content dashbaord-content clsinfo-student">
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
                            <a class="active" href="javascript:void(0)" id="menu_student_info">Studnet</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="" id="dashboard">Info</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download" id="infostudent_back">
                    <i class='bx bx-plus'></i>

                    <span class="text">Back</span>
                </a>
            </div>

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <a href="" target="_blank" id="infophotolink" rel="noopener noreferrer"> <img
                                        alt="No Photo" class="rounded-circle" id='infophoto' width="150"></a>
                                <div class="mt-3">
                                    <h4 id='infoname'></h4>
                                    <p class="text-secondary mb-1" id='infokankur'></p>
                                    <p class="text-muted font-size-sm" id='infophone'></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    Semester information
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
                                <div class="col-sm-9 text-secondary" id="infofname">

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Grandfather/name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="infogfname">
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
            $('.main-content.clsview-student').show();

            $('#sidebar .side-menu.top li').removeClass('active');
            $('#sidebar .side-menu.top li#view-student').addClass('active');

            table = $('#studenttable').DataTable({
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
                ajax: studnetloadRoute,
                'columns': [

                    {
                        data: 'Sid'
                    },
                    {
                        data: 'student_name'
                    },
                    {
                        data: 'kankur_no'
                    },
                    {
                        data: 'name'


                    },
                    {
                        data: 'status'
                    },
                    // {
                    //     data: 'semester'
                    // },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchabel: false
                    },
                ]
            });


            // add exists student
            $('#add_exists_student').click(function(e) {
                e.preventDefault();

                $('.main-content').hide();
                var sl = '.cls' + 'add-exists-student';
                $(sl).show();
                $('#spin').show();

                $('#addstu_header').html('Add New Student')
                $('#exists_create').html('ADD');
                $('#id').val('');

                $.ajax({
                    method: "post",
                    url: dep_city_list,
                    success: function(response) {
                        $('#exists_department').empty();
                        $('#exists_city').empty();
                        var dep = response[0]
                        var city = response[1]
                        $("#exists_department").append(
                            '<option disabled selected>none</option>');

                        $.each(dep, function(key, value) {

                            $("#exists_department").append(
                                '<option class="form-control" value="' + value.Did +
                                '">' + value.department_name + '</option>');
                        });
                        $.each(city, function(key, value) {

                            $("#exists_city").append(
                                '<option class="form-control" value="' +
                                value.id + '">' + value.city + '</option>');
                        });

                        $('#spin').hide();



                    },
                    error: function(error) {
                        $('#spin').hide();

                        console.log(error);

                    }
                });


            });
            // load semester
            $('#exists_department').change(function(e) {
                let dep_id = $(this).val();
                $('#spin').show();
                $.ajax({
                    type: "get",
                    url: "{{ route('dep_sem_list') }}",
                    data: {
                        id: dep_id
                    },
                    success: function(response) {

                        $('#spin').hide();
                        $('#exists_semester').empty();
                        $('#exists_semester').append(
                            '<option value="" disabled selected>None</option>')

                        for (let index = 1; index <= response.Semester_no; index++) {

                            $('#exists_semester').append('<option selected value="' + index +
                                '">' + index + '</option>')


                        }

                    },
                    error: function(xhr, status, error) {
                        $('#spin').hide();

                    }
                });
            });

            $('#addexistsstudent_back').click(function() {
                $('#addstudent_back').click();
            })
            // store exists student store_exists_student

            $('#exists_create').click(function(e) {
                let formdata = new FormData($('#student_exists_form')[0]);
                $('#exists_create').attr('disabled', true);
                $('#spin').show();


                $('#exists_create').html('Saving...')

                $.ajax({
                    method: "POST",
                    url: "{{ route('store_exists_student') }}",
                    processData: false,
                    contentType: false,
                    data: formdata,


                    success: function(response) {

                        $('#spin').hide();
                        $('#add_exists_student div div input').val('');

                        $('#exists_create').attr('disabled', false);
                        $('#exists_create').html('create');

                        table.draw();
                        if (response.message) {

                            swal("Success!", response.message, "success");

                            //   table.draw();
                            $('#studentform')[0].reset();
                            $('#exists_create').attr('disabled', false);

                            if (response.type == 'update') {
                                $('.main-content').hide();
                                $('.clsview-student').show();
                            }


                        }

                    },
                    error: function(error) {
                        $('#spin').hide();
                        if (error.responseJSON.unauthorize) {
                            swal("Unauthorized Action!", error.responseJSON
                                .unauthorize, "error");
                        }
                        $('#exists_create').html('Save')
                        $('#exists_create').attr('disabled', false);


                        if (error) {
                            // $('#create').attr('disabled', false);
                            $('#exists_create').html('Save')

                            if (error.responseJSON.errors.name) {
                                $('#exists_name').addClass('is-invalid');
                                $('#exists_nameerror').html(error.responseJSON.errors.name)
                            }
                            if (error.responseJSON.errors.name == null) {
                                $('#exists_name').removeClass('is-invalid');
                                $('#exists_name').addClass('is-valid');
                                $('#exists_nameerror').html('');

                            }


                            if (error.responseJSON.errors.fname) {
                                $('#exists_fname').addClass('is-invalid');
                                $('#exists_fnameerror').html(error.responseJSON.errors.fname)
                            }
                            if (error.responseJSON.errors.fname == null) {
                                $('#exists_fname').removeClass('is-invalid');
                                $('#exists_fname').addClass('is-valid');
                                $('#exists_fnameerror').html('');

                            }
                            if (error.responseJSON.errors.gfname) {
                                $('#exists_gfname').addClass('is-invalid');
                                $('#exists_gfnameerror').html(error.responseJSON.errors.gfname)
                            }
                            if (error.responseJSON.errors.gfname == null) {
                                $('#exists_gfname').removeClass('is-invalid');
                                $('#exists_gfname').addClass('is-valid');
                                $('#exists_gfnameerror').html('');

                            }
                            if (error.responseJSON.errors.scanfile) {
                                $('#exists_scanfile').addClass('is-invalid');
                                $('#exists_scanfileerror').html(error.responseJSON.errors
                                    .scanfile)
                            }
                            if (error.responseJSON.errors.scanfile == null) {
                                $('#exists_scanfile').removeClass('is-invalid');
                                $('#exists_scanfile').addClass('is-valid');
                                $('#exists_scanfileerror').html('');

                            }
                            if (error.responseJSON.errors.department) {
                                $('#exists_department').addClass('is-invalid');
                                $('#exists_departmenterror').html(error.responseJSON.errors
                                    .department)
                            }
                            if (error.responseJSON.errors.department == null) {
                                $('#exists_department').removeClass('is-invalid');
                                $('#exists_department').addClass('is-valid');
                                $('#exists_departmenterror').html('');

                            }
                            if (error.responseJSON.errors.gender) {
                                $('#exists_gender').addClass('is-invalid');
                                $('#exists_gendererror').html(error.responseJSON.errors.gender)
                            }
                            if (error.responseJSON.errors.gender == null) {
                                $('#exists_gender').removeClass('is-invalid');
                                $('#exists_gender').addClass('is-valid');
                                $('#exists_gendererror').html('');

                            }
                            if (error.responseJSON.errors.city) {
                                $('#exists_city').addClass('is-invalid');
                                $('#exists_city').html(error.responseJSON.errors.city)
                            }
                            if (error.responseJSON.errors.city == null) {
                                $('#exists_city').removeClass('is-invalid');
                                $('#exists_city').addClass('is-valid');
                                $('#exists_cityerror').html('');

                            }
                            if (error.responseJSON.errors.DOB) {
                                $('#exists_DOB').addClass('is-invalid');
                                $('#exists_DOBerror').html(error.responseJSON.errors.DOB)
                            }
                            if (error.responseJSON.errors.DOB == null) {
                                $('#exists_DOB').removeClass('is-invalid');
                                $('#exists_DOB').addClass('is-valid');
                                $('#exists_DOBerror').html('');


                            }
                            if (error.responseJSON.errors.photo) {
                                $('#exists_photo').addClass('is-invalid');
                                $('#exists_photoerror').html(error.responseJSON.errors.photo)
                            }
                            if (error.responseJSON.errors.photo == null) {
                                $('#exists_photo').removeClass('is-invalid');
                                $('#exists_photo').addClass('is-valid');
                                $('#exists_photoerror').html('');


                            }
                            if (error.responseJSON.errors.kankur_id) {
                                $('#kankur_id').addClass('is-invalid');
                                $('#kankur_iderror').html(error.responseJSON.errors.kankur_id)
                            }
                            if (error.responseJSON.errors.kankur_id == null) {
                                $('#kankur_id').removeClass('is-invalid');
                                $('#kankur_id').addClass('is-valid');
                                $('#kankur_iderror').html('');


                            }
                            if (error.responseJSON.errors.persentage) {
                                $('#exists_persentage ').addClass('is-invalid');
                                $('#exists_persentageerror').html(error.responseJSON.errors
                                    .kankur_id)
                            }
                            if (error.responseJSON.errors.persentage == null) {
                                $('#exists_persentage').removeClass('is-invalid');
                                $('#exists_persentage').addClass('is-valid');
                                $('#exists_persentageerror').html('');


                            }
                            if (error.responseJSON.errors.semester) {
                                $('#exists_semester').addClass('is-invalid');
                                $('#exists_semestererror').html(error.responseJSON.errors
                                    .semester)
                            }
                            if (error.responseJSON.errors.semester == null) {
                                $('#exists_semester').removeClass('is-invalid');
                                $('#exists_semester').addClass('is-valid');
                                $('#exists_semestererror').html('');


                            }

                            if (error.responseJSON.errors.schooldate) {
                                $('#exists_schooldate').addClass('is-invalid');
                                $('#exists_schooldateerror').html(error.responseJSON.errors
                                    .schooldate)
                            }
                            if (error.responseJSON.errors.schooldate == null) {
                                $('#exists_schooldate').removeClass('is-invalid');
                                $('#exists_schooldate').addClass('is-valid');
                                $('#exists_schooldateerror').html('');


                            }

                            if (error.responseJSON.errors.phone) {
                                $('#exists_phone').addClass('is-invalid');
                                $('#exists_phoneerror').html(error.responseJSON.errors
                                    .phone)
                            }
                            if (error.responseJSON.errors.phone == null) {
                                $('#exists_phone').removeClass('is-invalid');
                                $('#exists_phone').addClass('is-valid');
                                $('#exists_phoneerror').html('');


                            }


                        }
                    }
                });


            });

            // end store exists student
            // end exists student


            $('#add_student').click(function(e) {
                // 	e.preventDefault();
                // console.log('clicki')
                $('.main-content').hide();
                var sl = '.cls' + 'add-student';
                $(sl).show();
                $('#spin').show();

                $('#addstu_header').html('Add New Student')
                $('#create').html('ADD');
                $('#id').val('');

                $.ajax({
                    method: "post",
                    url: dep_city_list,
                    success: function(response) {
                  
                        $('#department').empty();
                        $('#city').empty();
                        $('#shift').empty();
                        var dep = response[0]
                        var city = response[1]
                        var shift = response[2]
                   

                        $.each(dep, function(key, value) {

                            $("#exists_department").append(
                                '<option class="form-control" value="' + value.Did +
                                '">' + value.department_name + '</option>');
                            $("#department").append(
                                '<option class="form-control" value="' + value.Did +
                                '">' + value.department_name + '</option>'); 
                               

                                

                        }
                    );
                        
                        $.each(city, function(key, value) {

                            $("#city").append('<option class="form-control" value="' +
                                value.id + '">' + value.city + '</option>');

                                $("#exists_city").append('<option class="form-control" value="' +
                                value.id + '">' + value.city + '</option>');


                        });
                       
                        shift.forEach(element => {
                        var row='<option value="'+element.id+'">'
                            +element.name+'-'+element.start_time+'~'+element.end_time+'</option>'

                            $("#shift").append(row)
                        });
 
                     

                        

                        $('#spin').hide();



                    },
                    error: function(error) {
                        $('#spin').hide();

                        console.log(error);

                    }

                });
        

            });

            var data = $('#studentform')[0];

            // create student
            $('#create').click(function(e) {
                $('#create').attr('disabled', true);

                $('#create').html('Saving...')
                var formdata = new FormData(data);

                $.ajax({
                    method: "POST",
                    url: addstudent,
                    processData: false,
                    contentType: false,
                    data: formdata,


                    success: function(response) {


                        $('#create').attr('disabled', false);
                        table.draw();
                        if (response.message) {

                            swal("Success!", response.message, "success");

                            //   table.draw();
                            $('#studentform')[0].reset();
                            $('#id').val('');
                            $('#create').attr('disabled', false);

                            $('#create').html('create');
                            if (response.type == 'update') {
                                $('.main-content').hide();
                                $('.clsview-student').show();
                            }


                        }

                    },
                    error: function(error) {
                        if (error.responseJSON.unauthorize) {
                            swal("Unauthorized Action!", error.responseJSON
                                .unauthorize, "error");
                        }
                        $('#create').html('Save')
                        $('#create').attr('disabled', false);


                        if (error) {
                            // $('#create').attr('disabled', false);
                            $('#create').html('Save')

                            if (error.responseJSON.errors.name) {
                                $('#name').addClass('is-invalid');
                                $('#nameerror').html(error.responseJSON.errors.name)
                            }
                            if (error.responseJSON.errors.name == null) {
                                $('#name').removeClass('is-invalid');
                                $('#name').addClass('is-valid');
                                $('#nameerror').html('');

                            }

                            if (error.responseJSON.errors.fname) {
                                $('#fname').addClass('is-invalid');
                                $('#fnameerror').html(error.responseJSON.errors.fname)
                            }
                            if (error.responseJSON.errors.fname == null) {
                                $('#fname').removeClass('is-invalid');
                                $('#fname').addClass('is-valid');
                                $('#fnameerror').html('');

                            }

                            if (error.responseJSON.errors.gfname) {
                                $('#gfname').addClass('is-invalid');
                                $('#gfnameerror').html(error.responseJSON.errors.gfname)
                            }
                            if (error.responseJSON.errors.gfname == null) {
                                $('#gfname').removeClass('is-invalid');
                                $('#gfname').addClass('is-valid');
                                $('#gfnameerror').html('');

                            }
                            if (error.responseJSON.errors.scanfile) {
                                $('#scanfile').addClass('is-invalid');
                                $('#scanfileerror').html(error.responseJSON.errors
                                    .scanfile)
                            }
                            if (error.responseJSON.errors.scanfile == null) {
                                $('#scanfile').removeClass('is-invalid');
                                $('#scanfile').addClass('is-valid');
                                $('#scanfileerror').html('');

                            }
                            if (error.responseJSON.errors.department) {
                                $('#department').addClass('is-invalid');
                                $('#departmenterror').html(error.responseJSON.errors.department)
                            }
                            if (error.responseJSON.errors.department == null) {
                                $('#department').removeClass('is-invalid');
                                $('#department').addClass('is-valid');
                                $('#departmenterror').html('');

                            }
                            if (error.responseJSON.errors.gender) {
                                $('#gender').addClass('is-invalid');
                                $('#gendererror').html(error.responseJSON.errors.gender)
                            }
                            if (error.responseJSON.errors.gender == null) {
                                $('#gender').removeClass('is-invalid');
                                $('#gender').addClass('is-valid');
                                $('#gendererror').html('');

                            }
                            if (error.responseJSON.errors.city) {
                                $('#city').addClass('is-invalid');
                                $('#city').html(error.responseJSON.errors.city)
                            }
                            if (error.responseJSON.errors.city == null) {
                                $('#city').removeClass('is-invalid');
                                $('#city').addClass('is-valid');
                                $('#cityerror').html('');

                            }
                            if (error.responseJSON.errors.DOB) {
                                $('#DOB').addClass('is-invalid');
                                $('#DOB').html(error.responseJSON.errors.DOB)
                            }
                            if (error.responseJSON.errors.DOB == null) {
                                $('#DOB').removeClass('is-invalid');
                                $('#DOB').addClass('is-valid');
                                $('#DOBerror').html('');


                            }
                            if (error.responseJSON.errors.photo) {
                                $('#photo').addClass('is-invalid');
                                $('#photoerror').html(error.responseJSON.errors.photo)
                            }
                            if (error.responseJSON.errors.photo == null) {
                                $('#photo').removeClass('is-invalid');
                                $('#photo').addClass('is-valid');
                                $('#photoerror').html('');


                            }
                            if (error.responseJSON.errors.schooldate) {
                                $('#schooldate').addClass('is-invalid');
                                $('#schooldateerror').html(error.responseJSON.errors
                                    .schooldate)
                            }
                            if (error.responseJSON.errors.schooldate == null) {
                                $('#schooldate').removeClass('is-invalid');
                                $('#schooldate').addClass('is-valid');
                                $('#schooldateerror').html('');


                            }
                            if (error.responseJSON.errors.phone) {
                                $('#phone').addClass('is-invalid');
                                $('#phoneerror').html(error.responseJSON.errors
                                    .phone)
                            }
                            if (error.responseJSON.errors.phone == null) {
                                $('#phone').removeClass('is-invalid');
                                $('#phone').addClass('is-valid');
                                $('#phoneerror').html('');


                            }

                        }
                    }
                });


            });
            // end create student
            stud_id = '';
            $('#addstudent_back').click(function(e) {

                $('.main-content').hide();
                $('.clsview-student').show();

                $('#name').val('');
                $('#fname').val('');
                $('#lname').val('');
                $('#gfname').val('');

                $('#department ').empty();
                $('#shift ').empty();



                $('#gender ').val('')
                $('#city ').empty();

                $('#DOB').val('');

                $('#phone').val('');

                $('#infoname').val('');
                $('#infofname').val('');
                $('#infolname').val('');
                $('#infogfname').val('');

                $('#infodepartment ').empty();



                $('#infogender ').empty();
                $('#infocity ').empty();

                $('#infodob').val('');

                $('#infophone').val('');
                $('#infophoto').removeAttr('src');

                // editStudentUrl = editStudentUrl.replace(stud_id, ':studentId');




            });



            // edit student
            $('body').on('click', '.editbutton', function() {
                var id = $(this).data('id');
                $('#spin').show();

                stud_id = id;
                $('.editbutton').attr('disabled', true);
                var url = "{{ route('edit_student', ['Stuid' => ':studentId']) }}"
                editurl = url.replace(':studentId', id);

                $.ajax({
                    method: "post",
                    url: dep_city_list,
                    success: function(response) {
                        $('#department').empty();
                        $('#city').empty();
                        $('#exists_department').empty();
                        $('#gender').empty();
                        $('#gender').append(
                            '<option value="1">Male</option> <option value="0">Female</option>'
                        );
                        
                        $('#id').val('');
                        var dep = response[0]
                        var city = response[1]
                        var shift = response[2]


                     



                        $.ajax({
                            url: editurl,
                            method: 'GET',
                            success: function(response) {
                               
                        if(response.student_id !== null ){

                            $.each(dep, function(key, value) {

                            $("#department").append(
                            '<option class="form-control" value="' + value.Did +
                            '">' + value.department_name + '</option>');
                            });
                            $.each(city, function(key, value) {

                            $("#city").append('<option class="form-control" value="' +
                            value.id + '">' + value.city + '</option>');
                            });
                            shift.forEach(element => {
                        var row='<option value="'+element.id+'">'
                            +element.name+'-'+element.start_time+'~'+element.end_time+'</option>'

                            $("#shift").append(row)
                        });


                                $('.main-content').hide();
                                var sl = '.cls' + 'add-student';
                                $(sl).show();
                                $('#addstu_header').html('Edit Student')
                                $('#create').html('Update');


                                $('#id').val(response.Sid);
                                $('#name').val('');
                                $('#name').val(response.student_name);
                                $('#fname').val('');
                                $('#fname').val(response.f_name);
                                $('#lname').val('');
                                $('#lname').val(response.l_name);
                                $('#gfname').val('');
                                $('#gfname').val(response.g_f_name);

                                $('#schooldate').val('');
                                $('#schooldate').val(response.school_graduation);
                                
                                $('#nid').val('');
                                $('#nid').val(response.nid);
                                
                                $('#persentage').val('');
                                $('#persentage').val(response.percentage);
                                

                                $('#department option[value="' + response.Did +
                                    '"]').attr('selected', 'selected')


                                $('#semester_type option[value="' + response.semester_type +
                                '"]').attr('selected', 'selected')

                                    $('#shift option[value="' + response.shift_id +
                                    '"]').attr('selected', 'selected')
                            
                                    $('#gender option[value="' +response.gender +'"]')
                                        .attr('selected', 'selected')

                                    $('#city option[value="' + response.city + '"]')
                                        .attr('selected', 'selected')



                                $('#DOB').val('');
                                $('#DOB').val(response.DOB);

                                $('#phone').val('');
                                $('#phone').val(response.phone);
                                $('#spin').hide();



                       }

                          
                             if(response.student_id === null ){

                                $.each(dep, function(key, value) {

                                $("#exists_department").append(
                                    '<option class="form-control" value="' + value.Did +
                                    '">' + value.department_name + '</option>');
                                });
                                $.each(city, function(key, value) {

                                $("#exists_city").append('<option class="form-control" value="' +
                                    value.id + '">' + value.city + '</option>');
                                });

                                $('.main-content').hide();
                                var sl = '.cls' + 'add-exists-student';
                                $(sl).show();
                                
                                // $('#add_exists_student').click();
                                $('#add_exists_stu_header').html('Edit Student')
                                $('#exists_create').html('Update');


                                $('#exists_id').val(response.Sid);
                                $('#exists_name').val('');
                                $('#exists_name').val(response.student_name);
                                $('#exists_fname').val('');
                                $('#exists_fname').val(response.f_name);
                                $('#exists_lname').val('');
                                $('#exists_lname').val(response.l_name);
                                $('#exists_gfname').val('');
                                $('#exists_gfname').val(response.g_f_name);
                                $('#kankur_id').val('');
                                $('#kankur_id').val(response.kankur_no);
                                $('#exists_schooldate').val('');
                                $('#exists_schooldate').val(response.school_graduation);
                                // $('#exists_gfname').val('');
                                // $('#exists_gfname').val(response.g_f_name);
                                // $('#exists_gfname').val('');
                                // $('#exists_gfname').val(response.g_f_name);
                                
                                setTimeout(function() {
                                // $('#myElement').hide();

                                $('#exists_department option[value="'+response.Did+'"]').attr('selected', 'selected')

                                }, 2);
                            
                           
                                // $('#exists_department option[value="' + response.Did +
                                //     '"]').attr('selected', 'selected')

                                // $('#gender').empty();
                                // $('#gender').append(
                                //     '<option vlaue="1">Male</option><option vlaue="0">Female</option>'
                                // );

                                $('#exists_gender option[value="' + response.gender + '"]')
                                    .attr('selected', true)

                                $('#exists_city option[value="' + response.city + '"]')
                                    .attr('selected', 'selected')

                                $('#exists_DOB').val('');
                                $('#exists_DOB').val(response.DOB);

                               
                                $('#exists_phone').val('');
                                $('#exists_phone').val(response.phone);

                                $('#exists_nid').val('');
                                $('#exists_nid').val(response.nid);

                                $('#exists_persentage').val('');
                                $('#exists_persentage').val(response.percentage);
                                $('#spin').hide();



                            }
                            },
                            error: function(error) {
                                $('#spin').hide();

                                console.log(error)
                            }
                        });
                    },
                    error: function(error) {
                        $('#spin').hide();

                        console.log(error);

                    }
                });


            });
            // end edit student





            

            // delete student
            $('body').on('click', '.delbutton', function() {
                var id = $(this).data('id');
                deleteUrl = deleteStudentUrl.replace(':studentId', id);

                console.log('id');
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

                                url: deleteUrl,
                                method: 'GET',
                                success: function(response) {
                                    swal("Success!", response.message, "success");

                                    table.draw();
                                    deleteUrl = '';


                                },
                                error: function(error) {
                                    console.log(error)
                                }
                            });

                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });

            });
            // end delete student


            //   info student
            $('body').on('click', '.infobutton', function() {
                var id = $(this).data('id');
                $('#spin').show();
                $('.infobutton').attr('disabled', true);
                stud_id = id;
                var url = "{{ route('info_student', ['Stuid' => ':studentId']) }}"
                infourl = url.replace(':studentId', id);
                $.ajax({
                    method: "post",
                    url: dep_city_list,
                    success: function(response) {
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
                            url: infourl,
                            method: 'GET',
                            success: function(response) {
                                var student_name = response.student_name.charAt(0)
                                    .toUpperCase() + response.student_name.slice(1);

                                var studnetphoto = "{{ asset(':studentimage') }}";

                                studnetphoto = studnetphoto.replace(':studentimage',
                                    response.photo)

                                $('.main-content').hide();
                                var sl = '.cls' + 'info-student';
                                $(sl).show();
                                $('#addstu_header').html('Edit Student')
                                $('#create').html('Update');
                                $('#infophoto').attr('src', studnetphoto)
                                $('#infophotolink').attr('href', studnetphoto)

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

                                $('#spin').hide();




                            },
                            error: function(error) {
                                console.log(error)
                                $('#spin').hide();

                            }
                        });
                    },
                    error: function(error) {
                        $('#spin').hide();

                        console.log(error);

                    }
                });


            });

            //   end info student

            //   back to student
            $('#infostudent_back').click(function(e) {
                e.preventDefault();
                $('#addstudent_back').click();
            });
            $('#menu_student_info').click(function(e) {
                e.preventDefault();
                $('#addstudent_back').click();
            });
            $('#menu_student_').click(function(e) {
                e.preventDefault();
                $('#addstudent_back').click();
            });
            // end student

        });
    </script>
@endsection
{{-- 	END  STUDENT VIEW  --}}
