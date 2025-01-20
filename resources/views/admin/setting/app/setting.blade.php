@extends('layout.admin.adminlayout')
@section('title', 'Add-Institute')

@section('link')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@endsection
@section('content')
    <section class="content-header">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}

            </div>
        @endif
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Setting</h1>
                </div>
                <div class="col-sm-6 text-right">
                    {{-- <a href="{{ route('admin.add_instititue')}}" class="btn btn-primary">New Institute</a> --}}
                    <button type="button" id="addnew" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#usermodal">Add new</button>

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card bg-light text-dark m-2">
            <div class="container-fluid p-2 align-center">

                <table id="userstable" class=" table   table-striped table-hover rounded border border-info">
                    <thead>

                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Photo</th>
                        <th width="100">Actions</th>

                    </thead>
                    <tbody>
                    </tbody>

                </table>


            </div>
        </div>
        <!-- /.card -->
    </section>

    {{-- add user --}}
    {{-- <div class="modal fade bg-transparnt " id="add_institute" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true"> --}}
    <div class="modal fade" id="usermodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content  " style="">
                <div style="">

                    <form id="userform">
                        {{-- <form action="{{ route ('addins') }}" method="POST" id="addinstitute"> --}}
                        <header class="text-center">
                            <h3 id="modal_title" calss="text-center "></h3>
                        </header>
                        {{-- @csrf --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <input name='user_id' type="hidden" id='id'>
                                            <label for="name">Name*</label>
                                            <input type="text" required name="name" id="name"
                                                class="form-control" placeholder="Name">
                                            <span id="nameerror" class="text-danger error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email">Email*</label>
                                            <input type="email" autocomplete="off" name="email" required id="email"
                                                class="form-control" placeholder="email">
                                            <span id="emailerror" class="text-danger error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="password">Password</label>
                                            <input type="password" name="password" autocomplete="off" id="password"
                                                class="form-control" placeholder="password">
                                            <span id="passworderror" class="text-danger error"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="confirm">Confirm Password*</label>
                                            <input type="password" name="confirm" id="confirm" class="form-control"
                                                placeholder="confirm">
                                            <span id="confirmerror" class="text-danger error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="role">Role</label>
                                            <select name="role" id="role" class="form-control">

                                            </select>
                                            <span id="roleerror" class="text-danger error"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="institute">Institute</label>
                                            <select name="institute" id="institute" class="form-control">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="fname">F/Name</label>
                                            <input type="text" name="fname" id="fname" class="form-control"
                                                placeholder="Father Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="photo">Photo</label>
                                            <input type="file" name="photo" id="photo" class="form-control"
                                                placeholder="Father Name">
                                            <span class="text-danger" id="photoerror"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="city">City</label>
                                            <select name="city" id="city" class="form-control">

                                            </select>
                                            <span id="cityerror" class="text-danger error"></span>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="p-3">
                            <button type="button" class="btn btn-secondary" id="close"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="create"></button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    {{-- end add --}}

    {{-- info modal start --}}
    <div class="modal fade" id="infomodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content m-3">
                <div class="modal-header">
                    <header class="text-center">
                        <h3 id="infomodal-title" calss="text-center "></h3>
                    </header>

                </div>
                <div class="row no-gutters pr-2 pl-2">
                    <div class="col-lg-9 d-flex col-6">
                        <div class="modal-body  pt-0 pr-0   d-flex align-items-center color-1">


                            {{-- start info --}}

                            {{-- <div class="col-lg-12 bg-primaray">

                  

                    <div class="col-md-12 " style="min-height:150px" >
                    <div class="col-md-4  mb-4">
                      <img src="" alt="No Photo" style="background-color:blue; min-width:100px; min-height:100%; height: auto; ">
                    </div>
                    <div class="col-md-6">
                      <hr>
                      <div> Name: <span id="infoname"></span></div>

                    </div>
                    </div>

                    </div> --}}


                            <div class="card">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="photo.jpg" class="card-img" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">First Name Last Name</h5>
                                            <p class="card-text">Email: example@example.com</p>
                                            <p class="card-text">Phone: 123-456-7890</p>
                                            <p class="card-text">City: New York</p>
                                            <!-- Add other information here -->
                                        </div>
                                    </div>
                                </div>
                            </div>






                            {{-- end info  --}}

                        </div>


                    </div>




                </div>
            </div>
        </div>
    </div>
    {{-- end info modal --}}

    {{-- dep add modal  --}}
    <div class="modal fade" id="depmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content m-3">
                <div class="modal-header">
                    <header class="text-center">
                        <h3 id="adddep-title" calss="text-center "> ADD Department</h3>
                    </header>
                </div>
                <form id='depform'>
                    <div class="modal-body m-2  pt-0 color-1">

                        <div class="col-md-12 pb-2">
                            <div class="mb-10">
                                <input type="hidden" name="institute_id" id="institute_id" value="">
                                <select name="Did" class="form-control" id="depselect">

                                </select>
                                <span id="deperror" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-12 pb-2">
                            <div class="mb-10">
                                <button id="depsave" class="btn btn-primary form-control ">Save</button>

                </form>
            </div>
        </div>
        <div class="col-md-12 pb-2">
            <div class="mb-10">
                <button type="button" class="btn btn-sm btn-secondary form-control" id="depclose"
                    data-bs-dismiss="modal">Close</button>

            </div>
        </div>


    </div>


    </div>
    </div>
    </div>








    {{-- end add --}}
@endsection


@section('saidbar')

    @include('layout.admin.adminsidebar')

@endsection

@section('scrtip')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#modal_title').html('Add User');
            $('#infomodal-title').html('About');
            $('#create').html('create');


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('#userstable').DataTable({
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
                ajax: "{{ route('admin.users.load') }}",
                'columns': [

                    {
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'role_name',
                        name: 'rele_name',
                        "searchable": false
                    },
                    {
                        data: 'photo'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]

            });

            $('#addnew').click(function() {
                //strat
                console.log('click')
                $.ajax({
                    method: "post",
                    url: "{{ route('institute_list') }}",
                    success: function(response) {
                        console.log(response[2])
                        var insti = response[0]
                        var city = response[1]
                        var role = response[2]
                        $('#institute').append('  <option value="" selected >none</option>');
                        $.each(insti, function(key, value) {

                            $("#institute").append(
                                '<option class="form-control" value="' + value
                                .Inid + '">' + value.Institute_name + '</option>');
                        });
                        $.each(city, function(key, value) {

                            $("#city").append('<option class="form-control" value="' +
                                value.id + '">' + value.city + '</option>');
                        });
                        $.each(role, function(key, value) {

                            $("#role").append('<option class="form-control" value="' +
                                value.id + '">' + value.role_name + '</option>');
                        });





                    },
                    error: function(error) {

                        console.log(error);

                    }
                });


                // end
            });



            var data = $('#userform')[0];
            var confpass = $('#confirm').html();
            var pass = $('#password').html();





            $('#create').click(function(e) {
                $('#create').attr('disabled', true);

                $('#create').html('Saving...')
                var formdata = new FormData(data);

                $.ajax({
                    method: "POST",
                    url: "{{ route('adduser') }}",
                    processData: false,
                    contentType: false,
                    data: formdata,


                    success: function(response) {
                        $('#create').attr('disabled', false);
                        if (response.message) {

                            swal("Success!", response.message, "success");

                            table.draw();
                            $('#instituteform')[0].reset();
                            $('#id').val('');
                            $('#modal_title').html('Create User');
                            $('#create').html('create');



                        }

                    },
                    error: function(error) {

                        console.log(error);
                        if (error) {
                            $('#create').attr('disabled', false);
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
                            if (error.responseJSON.errors.email) {
                                $('#email').addClass('is-invalid');
                                $('#emailerror').html(error.responseJSON.errors.email)
                            }
                            if (error.responseJSON.errors.email == null) {
                                $('#email').removeClass('is-invalid');
                                $('#email').addClass('is-valid');
                                $('#emailerror').html('');

                            }
                            if (error.responseJSON.errors.confirm) {
                                $('#confirm').addClass('is-invalid');
                                $('#confirmerror').html(error.responseJSON.errors.confirm)
                            }
                            if (error.responseJSON.errors.confirm == null) {
                                $('#confirm').removeClass('is-invalid');
                                $('#confirm').addClass('is-valid');
                                $('#confirmerror').html('');

                            }
                            if (error.responseJSON.errors.password) {
                                $('#password').addClass('is-invalid');
                                $('#passworderror').html(error.responseJSON.errors.password)
                            }
                            if (error.responseJSON.errors.password == null) {
                                $('#password').removeClass('is-invalid');
                                $('#password').addClass('is-valid');
                                $('#passworderror').html('');

                            }
                            if (error.responseJSON.errors.role) {
                                $('#role').addClass('is-invalid');
                                $('#roleerror').html(error.responseJSON.errors.role)
                            }
                            if (error.responseJSON.errors.role == null) {
                                $('#role').removeClass('is-invalid');
                                $('#role').addClass('is-valid');
                                $('#roleerror').html('');

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
                            if (error.responseJSON.errors.photo) {
                                $('#photo').addClass('is-invalid');
                                $('#photoerror').html(error.responseJSON.errors.photo)
                            }
                            if (error.responseJSON.errors.photo == null) {
                                $('#photo').removeClass('is-invalid');
                                $('#photo').addClass('is-valid');
                                $('#photoerror').html('');


                            }

                        }
                    }
                });


            });

            $('body').on('click', '.editbutton', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: "{{ url('/user/edit_user/'), '' }}/" + id + "",
                    method: 'GET',
                    success: function(response) {
                        $('#').modal('show');
                        $('#modal_title').html('Update User');
                        $('#create').html('Update');
                        $('#name').val(response.student_name);
                        $('#email').val(response.email);
                        //  $('#password').val(response.password);
                        $('#confirm').val(response.confirm);
                        $('#location').val(response.location);
                        $('#password').val(response.password);
                        $('#email').val(response.email);
                        $('#create_date').val(response.create_date);
                        $('#id').val(response.Inid);

                        $('#role option[value="' + response.role + '"]').attr('selected',
                            'selected')



                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            });


            $('body').on('click', '.delbutton', function() {
                var id = $(this).data('id');

                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({

                                url: "{{ url('/user/delete_user/'), '' }}/" + id + "",
                                method: 'GET',
                                success: function(response) {
                                    // console.log(response.message)
                                    swal("Success!", response.message, "success");


                                    if (response.responseJSON.message) {

                                        swal('warning', response.responseJSON.message,
                                            "warning")
                                    }
                                    table.draw();

                                },
                                error: function(error) {
                                    if (error.responseJSON.message) {
                                        swal('Warning ', 'You can not delete the perant',
                                            "warning")

                                    }
                                }
                            });

                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });

            });



            $('#close').click(function() {
                $('#instituteform')[0].reset();
                $('#institute').empty();
                $('#city').empty();
                $('#role').empty();


            });





            var depvar;
            var institute_id;
            $('body').on('click', '.infobutton', function() {
                var id = $(this).data('id');
                institute_id = id;

                $.ajax({
                    url: "{{ url('/user/edit_user/'), '' }}/" + id + "",
                    method: 'GET',
                    success: function(response) {
                        $('#infomodal').modal('show');

                        $('#create').html('Update');
                        $('#infoname').val(response.name);
                        console.log(response)
                        $('#infoconfirm').val(response.confirm);
                        $('#infoaddress').val(response.location);
                        $('#infopassword').val(response.password);
                        $('#infoemail').val(response.email);
                        $('#infocreate').val(response.create_date);
                        $('#infoupdate').val(response.updated_at);
                        $('#infoid').val(response.Inid);

                        $('#role option[value="' + response.role + '"]').attr('selected',
                            'selected')



                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
                jQuery.fn.depfun = function() {
                    $.ajax({
                        url: "{{ url('/user/departmentlist/'), '' }}/" + id + "",
                        method: 'GET',
                        success: function(response) {


                            $.each(response, function(key, value) {
                                $("#deplist").append('<tr><td>' + value
                                    .department_name +
                                    '</td><td><a  href="javascript:void(0)"  at="' +
                                    value.Did +
                                    '" class="btn btn-danger btn-sm deletedep">Del</a></td></tr>'
                                    );
                            });



                        },
                        error: function(error) {
                            console.log(error)
                        }
                    });
                }

                $('deplist').depfun();

            });
            $('body').on('click', '.deletedep', function() {
                var inid = $('#infoid').val();
                var did = $(this).attr('at');
                swal({
                        title: "Are you sure?",
                        text: "To Remove Department From Institute ! ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({

                                url: "{{ url('/user/remove_dep/'), '' }}/" + inid + "/" + did,
                                method: 'GET',
                                success: function(response) {
                                    $("#deplist").empty();
                                    $('deplist').depfun();
                                    swal("Success!", response.message, "success");



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
            $('#infoclose').click(function(e) {

                $("#deplist").empty();


            });
            $('#adddep').click(function(e) {
                $('#institute_id').val(institute_id)
                $.ajax({
                    method: "post",
                    url: "{{ route('depadd') }}",
                    success: function(response) {
                        $('#depmodal').modal('show');

                        $.each(response, function(key, value) {
                            $("#depselect").append(
                                '<option class="form-control" value="' + value.Did +
                                '">' + value.department_name + '</option>');
                        });






                    },
                    error: function(error) {

                        console.log(error);

                    }
                });

            });

            var depdata = $('#depform')[0];
            $('#depsave').click(function() {

                $('#depsave').attr('disabled', true);

                $('#depsave').html('Saving...')
                var formdata = new FormData(depdata);
                $.ajax({
                    method: "POST",
                    url: "{{ route('depsave') }}",
                    processData: false,
                    contentType: false,
                    data: formdata,


                    success: function(response) {
                        $('#depsave').attr('disabled', false);
                        $('#depsave').html('Save');
                        //  start

                        // end
                        if (response.message) {
                            swal("Success!", response.message, "success");
                            $('#depmodal').modal('hide');
                            $('#deplist').empty();
                            $('deplist').depfun();
                            $('#depselect').empty()
                            $('#depselect').removeClass('is-invalid')
                            $('#deperror').html('')




                        }
                    },

                    error: function(error) {

                        $('#depsave').attr('disabled', false);
                        $('#depsave').html('Save')
                        console.log(error);
                        if (error.responseJSON.errors.Did) {

                            $('#depselect').addClass('is-invalid');
                            $('#deperror').html('This department Exist');



                        }
                    }
                });




            });
            $('#depclose').click(function() {

                $('#depselect').empty();
                $("#deperror").html('')
                $("#deperror").removeClass('is-invalid')

            });
        });
    </script>









@endsection
