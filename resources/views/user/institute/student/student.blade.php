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
                <a href="javascript:void(0)" class="btn-download"  target="_blank" id="download_cards">
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
                            <th>Semester Type</th>
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
                                        {{-- <input type="date" name="schooldate" required id="schooldate"
                                            class="form-control" placeholder="GrandFahter Name"> --}}

                                            <select id="schooldate"  class="form-control" required name="schooldate">
                                                <option value="">Select Year</option>
                                            </select>
                                            
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
                                        <label title='The main residence of the province' for="city">Org/Province*</label>
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
                                        <label for="phone" title="National Identity Number ">Tizker Number</label>

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
                                            $eighteenYearsAgo = date('Y-m-d', strtotime('-16 years'));
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
        {{-- @include('user.institute.student.exists_student') --}}

         {{-- add exists student  --}}

 <div class="main-content dashbaord-content clsadd-exists-student">
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
        <a href="#" class="btn-download" id='addexistsstudent_back'>
            <i class='bx bx-plus'></i>

            <span class="text">Back</span>
        </a>
    </div>


    <form id="student_exists_form">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3 class="text-" id="addstu_header"></h3>
                    <h6 style="direction: rtl">
                        توجه: فقط دانشجویانی که فارغ التحصیل شده اند و آماده شرکت در امتحان دولتی هستند می توانید در فرم زیر ثبت نام کنید و ثبت نام باید به زبان های ملی باشد، انگلیسی قابل قبول نیست
                        <br>
                        
                                نوټ:په لاندنی فورمه کی یوازی هغه محصلین راجستر کړی کوم چی فارغ شوی او دولتی ازموینی ته اماده دی  نوم لیکنه باید په ملي ژبو وي، انګلیسي د منلو وړ نه ده
                    </h6>
                    <div class="row" id='add_exists_student'>
                        <div class="col-md-6">
                            <div class="mb-3">

                                <input name='student_id' type="hidden" id='exists_idk' value="">
                                <label for="name">Name*</label>
                                <input type="text" required name="name" id="exists_name"
                                    class="form-control" placeholder="Name">
                                <span id="exists_nameerror" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fname">F/Name*</label>
                                <input type="text" name="fname" required id="exists_fname"
                                    class="form-control" placeholder="Father Name">
                                <span id="exists_fnameerror" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" required id="exists_lname"
                                    class="form-control" placeholder="Last Name">
                                <span id="exists_lnameerror" class="text-danger error"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gfname">GradFather/Name</label>
                                <input type="text" name="gfname" required id="exists_gfname"
                                    class="form-control" placeholder="GrandFahter Name">
                                <span id="exists_gfnameerror" class="text-danger error"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gfname">Kankur ID*</label>
                                <input type="text" name="kankur_id" required id="kankur_id"
                                    class="form-control" placeholder="Kab-130932">
                                <span id="kankur_iderror" class="text-danger error"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="schooldate">School Graduation Date</label>
                               
                                {{-- <input type="date" name="schooldate" required id="exists_schooldate"
                                    class="form-control" placeholder="GrandFahter Name"> --}}
                                    
                                    <select id="exists_schooldate"  class="form-control" required name="schooldate">
                                        <option value="">Select Year</option>
                                    </select>
                                <span id="exists_schooldateerror" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="department">Department*</label>
                                <select name="department" class="form-control" id="exists_department">

                                </select>
                                <span id="exists_departmenterror" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="semester">Semester*</label>
                                <select name="semester" class="form-control" id="exists_semester">
                                    
                                </select>
                                <span id="exists_semestererror" class="text-danger error"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gender">Gender*</label>
                                <select name="gender" class="form-control" id="exists_gender">
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                                <span id="exists_gendererror" class="text-danger error"></span>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="city">Org/Province*</label>
                                <select name="city" class="form-control" id="exists_city">


                                </select>
                                <span id="exists_cityerror" class="text-danger error"></span>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">

                                <label for="photo">Photo</label>
                                <input type="file" name="photo" id="exists_photo" class="form-control"
                                    placeholder="Photo">
                                <span id="exists_photoerror" class="text-danger error"></span>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">

                                <label for="nid"
                                    title="Scan of National Identity & 12th Grade Certificate">Information
                                    Scan</label>
                                <input type="file" name="scanfile" id="exists_scanfile" class="form-control"
                                    placeholder="Photo">
                                <span id="exists_scanfileerror" class="text-danger error"></span>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" title="National Identity Number ">Tizker Number</label>

                                <input type="text" name="nid" id="nid" class="form-control"
                                    placeholder="89232">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" title="3 Year(12,11,10) of School Persentage">3Y
                                    Persentage</label>

                                <input type="text" name="persentage" id="exists_persentage"
                                    class="form-control" placeholder="88.4" value='0.0'>
                                <span id="exists_persentageerror" class="text-danger error"></span>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="dob">Date of Birth</label>
                                @php
                                    $eighteenYearsAgo = date('Y-m-d', strtotime('-18 years'));
                                @endphp
                                <input type="date" max="{{ $eighteenYearsAgo }}" name="DOB"
                                    id="exists_DOB" class="form-control">
                                <span id="exists_DOBerror" class="text-danger error"></span>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text">+93</span>
                                    <input type="text" maxlength="9" name="phone" id="exists_phone"
                                        class="form-control" placeholder="707070707">

                                </div>
                                <span id="exists_phoneerror" class="text-danger error"></span>

                            </div>
                        </div>


                    </div>
                    <div class="p-3">
                        <button type="button" class="btn btn-primary" id="exists_create"></button>
                    </div>
                    

                    <div class="p-3">
                 
                        <a href="https://youtu.be/HnvDi1pvikQ" style="font-size:1rem"><i class='bx bxl-youtube'   style='color:#c74747; '></i>Click here for help</a>


                   
                    </div>
                </div>

                </div>

            </div>
        
    </form>
         

</div>
    

{{-- end add exists students --}}

        {{-- STUDENT VIEW  --}}


      @include('user.institute.student.studentinfo')

           {{-- start download card --}}

           @include('user.institute.student.download_card')


           {{-- end card download --}}
   
    </main>
@endsection

@section('script')
<script src="{{ asset('js/custom/institutemanger/student.js') }}"></script>

<script>
    // student info url
    let  studentinfourl ="{{ route('info_student')}}"


    // changebel path url
let changablesrc = "{{ asset(':changeurl') }}";

</script>

<script>
    window.onload = function() {
            var select = document.getElementById('schooldate');
            var select1 = document.getElementById('exists_schooldate');
            var startYear = 1980;
            var currentYear = new Date().getFullYear();

            for (var year = currentYear; year >= startYear; year--) {
                var option = document.createElement('option');
                option.value = year;
                option.text = year;
             
                select.appendChild(option.cloneNode(true)); // Clone the option for the second select
                select1.appendChild(option);
            }
        };
    </script>

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
                         data: 'semester_type'

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




// download card page 
$('#download_cards').click(function(e) {
                e.preventDefault();

                $('.main-content').hide();
                var sl = '.cls' + 'download_card';
                $(sl).show();
                $('#spin').show();

                $('#addstu_header').html('Cards')
             
                $('#id').val('');

                $.ajax({
                    method: "get",
                    url: "{{ route('download_card_count') }}",

                    success: function(response) {
                $('#spin').hide();

                        $('#student_range').empty();
                        $('#student_range').append('<option selected disabled>None</option>');
                        const totalCount = parseInt(response);
                            const chunkSize = 50;
                            let start = 1;
                            let end;

                            // Generate options based on chunks of 50
                            while (start <= totalCount) {
                                end = Math.min(start + chunkSize - 1, totalCount);
                                $('#student_range').append(`<option value="${start}">${start} - ${end} students</option>`);
                                start = end + 1;
                            }
                        },
                    error: function(error) {
                        $('#spin').hide();
                    
                        console.log(error);

                    }
                });


            });


            $('#student_range').change(function (e) { 
                e.preventDefault();
             // Get the range value from the input field
                let range = $('#student_range').val();
                
                // Use a JavaScript variable to hold the URL template
                let cardUrlTemplate = "{{ url('/user/manager/download_cards/')}}/"+range;
                
                // Replace the placeholder with the actual range value
                // let cardUrl = cardUrlTemplate.replace(':range', range);

                // Update the href attribute of the download link
                $('#download_submit').attr('href', cardUrlTemplate);


            });
   // end download card page 









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
                            $('#exists_semester').append(
                                '<option value="" disabled selected>None</option>')

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
                        $('#exists_semester').append('<option value="" disabled selected>None</option>');
                    

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
                                                        if (error.responseJSON.errors.nid) {
                                $('#nid').addClass('is-invalid');
                                $('#nid').html(error.responseJSON.errors.DOB)
                            }
                            if (error.responseJSON.errors.DOB == null) {
                                $('#nid').removeClass('is-invalid');
                                $('#nid').addClass('is-valid');
                                $('#niderror').html('');


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
     


            // other javascrip code 
            student();
        });
    </script>
@endsection
{{-- 	END  STUDENT VIEW  --}}
