@extends('layout.Institute_manager.managerlayout')
@section('content')
    {{-- setting  --}}
    <main>
        <div class="main-content dashbaord-content clsmanager-setting">
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
                            <a class="active" href="javascript:void(0)" id="">Settings</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="" id="dashboard"></a>
                        </li>
                    </ul>
                </div>
                <a href="" class="btn-download" id="dashboard">
                    <i class='bx bx-plus'></i>

                    <span class="text">Back</span>
                </a>
            </div>

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img alt="No Photo" class="rounded-circle" id='managerphoto' width="150" height="150">
                                <div class="mt-3">
                                    {{-- <h4 id='managername'></h4> --}}
                                    <p class="text-secondary mb-1">
                                        <button class="btn btn-sm btn-primary" id="change-photo">Change Photo</button>
                                    </p>
                                    <p class="text-muted font-size-sm">
                                        <button class="btn w-100 btn-sm btn-primary" id="change-password">Change Pass
                                        </button>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    Institute Grade
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
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="managername">
                                    <input type="text" id="managern">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Father Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="managerfname">

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="manageremail">
                                </div>
                            </div>


                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="managerphone">

                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">City</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="managercity">

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"><button id="mng_edit_btn" class="btn btn-primary">Edit</button></h6>
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
        {{-- end setting  --}}


        {{-- change photo --}}
        <div class="main-content dashbaord-content clschange-photo">
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
                            <a class="active" href="javascript:void(0)" id="">Settings</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="" id="chgwindow"></a>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('manager.setting') }}" class="btn-download">
                    <i class='bx bx-plus'></i>

                    <span class="text">Back</span>
                </a>
            </div>



            <div class="table-data">
                <div class="order">
                    <div class="head license">
                        <h3 id='chgphotoheader'></h3>

                    </div>
                    <div class="d-flex flex-column-reverse mb-3 align-items-center text-center">

                        {{-- CHANGE PASSWORD --}}
                        <div class='managerchange chgpassword '>
                            <form action="" id="chg_password_form">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="password">Old Password</label>
                                                <input name="old_password" id="old_password" class="form-control"
                                                    type="password">
                                                <span id="old_password_error" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="new password">New Password</label>
                                                <input name="new_password" id="new_password" class="form-control"
                                                    type="password">
                                                <span id="new_password_error" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Confirm Password</label>
                                                <input name="confirm_password" id="confirm_password" class="form-control"
                                                    type="password">
                                                <span id="confirm_password_error" class="text-danger"></span>

                                            </div>
                                        </div>
                                        <div class="mb3">
                                            <a class="btn btn-primary " href="javascript:void(0)"
                                                id="chg_password_btn">Change Password</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- END CHANGE PASSWORD --}}
                        <div class='managerchange chgphoto '>
                            <form action="" id="chg_photo_form">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img class="" style="max-height:500px; max-width:100%"
                                                alt="No image Exist" id="chgphoto">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">


                                                <input type="file" id='change_mng_photo' name="change_photo"
                                                    class="form-control">
                                                <span id='chg_photo_error' class="text-danger"></span>
                                            </div>

                                            <button class="btn btn-primary" id="chg_photo_btn">change photo</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class='managerchange changeinfo col-md-6'>
                            <form action="">
                                <div class="row">
                                    <div class="col-md-12  align-items-center">
                                        <div class="mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" id='mngeditname'>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="name">Father/Name</label>

                                            <input type="text" class="form-control" name='fname' id="mngeditfname">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="phone">Phone</label>

                                            <input type="text" class="form-control" name='phone' id="mngeditphone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="email">Email</label>

                                            <input type="text" class="form-control" name='email' id="mngeditemail">
                                        </div>
                                    </div>

                                </div>
                            </form>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </main>
    {{-- end change photo --}}
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            });

            console.log(institutedata)
            $('.main-content').hide();
            $('.main-content.clsmanager-setting').show();

            $('#sidebar .side-menu.top li').removeClass('active');
            $('#manager-setting').addClass('active');




            $('#sidebar .side-menu.top li').removeClass('active');
            var li = $(this).parent();
            li.addClass('active');

            var id = li.attr('id');

            $('.main-content').hide();
            var sl = '.cls' + id;

            $('.clsmanager-setting').show();

            var change = "{{ asset(':image') }}";

            var image = change.replace(':image', institutedata.photo);
            // editStudentUrl = editStudentUrl.replace(stud_id, ':studentId');
            $('#managerphoto').attr('src', image)
            $('#managername').html(institutedata.name)

            $('#managerfname').html(institutedata.f_name)

            $('#managerphone').html(institutedata.phone)
            $('#manageremail').html(institutedata.email)
            $('#managercity').html(institutedata.city)




            $('#change-photo').click(function(e) {
                e.preventDefault();
                $('.main-content').hide();
                $('.clschange-photo').show();
                $('.managerchange').hide();
                $('.chgphoto').show();
                $('#chgwindow').html('Photo');
                $('#chgphotoheader').html('Change Photo');
                $('#chgphoto').attr('src', image)

            });
            $('#mng_edit_btn').click(function(e) {
                e.preventDefault();
                $('.main-content').hide();
                $('.clschange-photo').show();
                $('.managerchange').hide();
                $('.changeinfo').show();
                $('#chgwindow').html('Information')
                $('#mngeditname').val(institutedata.name);
                $('#mngeditfname').val(institutedata.f_name);
                $('#mngeditphone').val(institutedata.phone);
                $('#mngeditemail').val(institutedata.email);
                $('#chgphotoheader').html('Change Information');
                // $('#mngcity').append('<option>' + institute.city + '</option>')

            });

            // change photo

            // change password
            $('#change-password').click(function(e) {
                e.preventDefault();
                $('.main-content').hide();
                $('#chgwindow').html('Password')
                $('.clschange-photo').show();
                $('.managerchange').hide();
                $('.chgpassword').show();
                $('#chgphotoheader').html('Change Password');


            });
            // 
            $('#change_mng_photo').change(function() {
                var input = this;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#chgphoto').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
            var chg_photo_data = $('#chg_photo_form')[0];

            $('#chg_photo_btn').click(function(e) {
                var formdata = new FormData(chg_photo_data);
                $('#chg_photo_btn').attr('disabled', true);
                $('#chg_photo_btn').html('Changing')
                $.ajax({
                    method: "POST",
                    url: "{{ route('manager.change_photo') }}",
                    processData: false,
                    contentType: false,
                    data: formdata,
                    success: function(response) {
                        $('#chg_photo_btn').attr('disabled', false);
                        $('#chg_photo_btn').html('Change Photo')
                        console.log(response)
                        if (response.message) {

                            swal("Success!", response.message, "success");

                            //   table.draw();
                            $('#setting_back').click();



                        }

                    },
                    error: function(error) {

                        if (error.responseJSON.unauthorize) {
                            swal("Unauthorized !", error.responseJSON.unauthorize, "error");

                        }
                        if (error) {
                            $('#chg_photo_btn').attr('disabled', false);
                            $('#chg_photo_btn').html('Change Photo')

                            if (error.responseJSON.errors.change_photo) {
                                $('#change_mng_photo').addClass('is-invalid');
                                $('#chg_photo_error').html(error.responseJSON.errors
                                    .change_photo)
                            }
                        }
                    }
                });


            });
            // end change photo

            // change password

            chg_password_data = $('#chg_password_form')[0];

            $('#chg_password_btn').click(function(e) {
                var formdata = new FormData(chg_password_data);
                console.log(formdata)
                $('#chg_passwrd_btn').attr('disabled', true);
                $('#chg_password_btn').html('Changing')

                $.ajax({
                    method: "POST",
                    url: chg_password_url,
                    processData: false,
                    contentType: false,
                    data: formdata,
                    success: function(response) {
                        $('#chg_password_btn').attr('disabled', false);
                        $('#chg_password_btn').html('Change Password')
                        console.log(response)
                        if (response.error) {
                            $('#old_password').addClass('is-invalid');
                            $('#old_password_error').html(response.error)
                        }
                        if (response.message) {

                            swal("Success!", response.message, "success");
                            $('#setting_back').click();
                            //   table.draw();



                        }

                    },
                    error: function(error) {
                        if (error.responseJSON.unauthorize) {
                            swal("Unauthorized !", error.responseJSON.unauthorize, "error");

                        }

                        if (error) {
                            $('#chg_password_btn').attr('disabled', false);
                            $('#chg_password_btn').html('Change Password')

                            if (error.responseJSON.errors.old_password) {
                                $('#old_password').addClass('is-invalid');
                                $('#old_password_error').html(error.responseJSON.errors
                                    .old_password)
                            }
                            if (error.responseJSON.errors.new_password) {
                                $('#new_password').addClass('is-invalid');
                                $('#new_password_error').html(error.responseJSON.errors
                                    .new_password)
                            }
                            if (error.responseJSON.errors.confirm_password) {
                                $('#confirm_password').addClass('is-invalid');
                                $('#confirm_password_error').html(error.responseJSON.errors
                                    .confirm_password)
                            }
                        }
                    }
                });


            });



            // end change password

            // back to manager setting

            $('#setting_back').click(function(e) {
                e.preventDefault();
                $('#manager-setting').click();

            });
            // end back to manager setting 

        });
    </script>
@endsection
