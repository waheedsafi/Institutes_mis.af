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
                            <a class="active " href="{{ route('editor.index') }}">Home</a>

                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active " href="{{ route('editor.users') }}">User</a>

                        </li>
                    </ul>
                </div>
                @if (auth()->user()->hasPermissionTo('add-user'))
                    <a href="javascript" id="add_user" class="btn-download">
                        <i class='bx bxs-plus'></i>
                        <span class="text">New User</span>
                    </a>
                @endif
            </div>
            {{-- user --}}
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3 class="text-" id="stutable_header"></h3>

                    </div>
                    <table id="usertable" class="table cell-border table-striped table_yajra">
                        <thead>

                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Institutes</th>
                            <th>Phone</th>
                            <th width="100">Actions</th>

                        </thead>
                        <tbody>



                        </tbody>

                    </table>
                </div>

            </div>
            {{-- user --}}


        </div>
        {{-- MAIN HOME END --}}

        {{-- add user --}}

        <div class="main-content dashbaord-content clsadduser">
            <div class="head-title">
                <div class="left">
                    <h1 id='username'>
                        {{ auth()->user()->name }}
                    </h1>
                    <ul class="breadcrumb">

                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active " href="{{ route('editor.index') }}">Home</a>

                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active " href="{{ route('editor.users') }}">User</a>

                        </li>
                    </ul>
                </div>

                <a href="javascript" class="btn-download">
                    <i class='bx bxs-plus'></i>
                    <span class="text">Back</span>
                </a>

            </div>
            {{-- user --}}
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3 class="text" id="formheader"></h3>

                    </div>
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

                                            <label for="institute">Institute</label>
                                            <select name="institute" id="institute" class="form-control">

                                            </select>
                                            <span id="#errorinstitute" class="text-danger error"></span>

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

                                            <label for="fname">Phone</label>
                                            <div class="input-group">
                                                <span class="input-group-text">+93</span>
                                                <input type="number" maxlength="9" name="phone" id="phone"
                                                    class="form-control" placeholder="707070707">
                                            </div>
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

                            <button type="button" class="btn btn-primary" id="user_create"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- end add user --}}


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

            $('#sidebar .side-menu.top li').removeClass('active');
            $('#sidebar .side-menu.top li#view-user').addClass('active');

            // load user 

            var table = $('#usertable').DataTable({
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
                ajax: "{{ route('editor.load.user') }}",
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
                        data: 'Institute_name'
                    },
                    {
                        data: 'phone'
                    },


                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `
							<div class="btn-group"> <a href="javascript:void(0)" class="teachinfobutton btn-secondary btn" data-id="${row.id}">
                            <svg class="filament-link-icon w-4 h-4 mr-1 " style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"> <path d="M433 203.2H213c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V243.3s0-0.1 0.1-0.1H433s0.1 0 0.1 0.1l-0.1 219.9zM702.5 203.2c-82.5 0-150 67.5-150 150s67.5 150 150 150 150-67.5 150-150-67.5-150-150-150z m77.7 227.7c-20.9 20.9-48.4 32.3-77.7 32.3-29.2 0-56.8-11.5-77.7-32.3-20.9-20.9-32.3-48.4-32.3-77.7 0-29.2 11.5-56.8 32.3-77.7 20.9-20.9 48.4-32.3 77.7-32.3 29.2 0 56.8 11.5 77.7 32.3 20.9 20.9 32.3 48.4 32.3 77.7 0 29.2-11.5 56.8-32.3 77.7zM431.3 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9zM812.5 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9z"  fill="#5ABE64" /></svg>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-secondary teacheditbutton" data-id="${row.id}">
                        
                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="24px" fill="#3C91E6"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-secondary  text-danger btnuserdel" data-id="${row.id}">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" class="text-danger" viewBox="0 0 24 24" width="24px" fill="#F08080"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                            </a>
                            
                           </div> `;
                        }
                    },
                ]

            });
            // end load user



            $('#add_user').click(function(e) {
                e.preventDefault();

                $('.main-content').hide();
                $('.main-content.clsadduser').show();
                $('#formheader').html("Add Institute User");
                $('#user_create').html('Add');
                $('#spin').show();
                // load city
                $.ajax({
                    method: "post",
                    url: "{{ route('institute_list') }}",
                    success: function(response) {
                        console.log(response[2])
                        $('#spin').hide();
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





                    },
                    error: function(error) {

                        console.log(error);

                    }
                });
                // end load city



            });




            var data = $('#userform')[0];
            var confpass = $('#confirm').html();
            var pass = $('#password').html();

            $('#user_create').click(function(e) {
                e.preventDefault();
                $('#spin').show();
                $('#user_create').attr('disabled', true);

                $('#user_create').html('Saving...')
                var formdata = new FormData(data);

                $.ajax({
                    method: "POST",
                    url: "{{ route('editor.adduser') }}",
                    processData: false,
                    contentType: false,
                    data: formdata,


                    success: function(response) {
                        $('#spin').hide();
                        $('#user_create').attr('disabled', false);
                        $('#user_create').html('Add')

                        if (response.message) {

                            swal("Success!", response.message, "success");

                            $('#userform')[0].reset();
                            $('#id').val('');
                            table.draw();




                        }

                    },
                    error: function(error) {
                        $('#spin').hide();

                        console.log(error);
                        if (error) {
                            $('#user_create').attr('disabled', false);
                            $('#user_create').html('Add')

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
                                $('#emailerror').html(error.responseJSON.errors
                                    .email)
                            }
                            if (error.responseJSON.errors.email == null) {
                                $('#email').removeClass('is-invalid');
                                $('#email').addClass('is-valid');
                                $('#emailerror').html('');

                            }
                            if (error.responseJSON.errors.confirm) {
                                $('#confirm').addClass('is-invalid');
                                $('#confirmerror').html(error.responseJSON.errors
                                    .confirm)
                            }
                            if (error.responseJSON.errors.confirm == null) {
                                $('#confirm').removeClass('is-invalid');
                                $('#confirm').addClass('is-valid');
                                $('#confirmerror').html('');

                            }
                            if (error.responseJSON.errors.password) {
                                $('#password').addClass('is-invalid');
                                $('#passworderror').html(error.responseJSON.errors
                                    .password)
                            }
                            if (error.responseJSON.errors.password == null) {
                                $('#password').removeClass('is-invalid');
                                $('#password').addClass('is-valid');
                                $('#passworderror').html('');

                            }

                            if (error.responseJSON.errors.institute) {
                                $('#institute').addClass('is-invalid');
                                $('#errorinstitute').html(error.responseJSON.errors
                                    .institute)
                            }
                            if (error.responseJSON.errors.institute == null) {
                                $('#institute').removeClass('is-invalid');
                                $('#institute').addClass('is-valid');
                                $('#errorinstitute').html('');


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
                                $('#photoerror').html(error.responseJSON.errors
                                    .photo)
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

            
            
            $('body').on('click', '.btnuserdel', function() {

var Uid = $(this).data('id');

swal({
        title: "Are you sure?",
        text: "Are you sure to delete this subjects! ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $('#spin').show();
            $.ajax({

                url: "{{ route('editor.delete.user')}}",
                // url: "{{ url('user/sub/editor/delete/user/'), '' }}/" + Uid,
               
                method: 'GET',
                data: {userid:Uid},
                success: function(response) {
                    $('#spin').hide();

                    swal("Success!", response.message, "success");
                    table.draw();


                },
                error: function(error) {
                    console.log(error)
                    $('#spin').hide();

                    if (error.responseJSON.unauthorize) {
                        swal("Unauthorized !",
                            "You not authorize to this action", "error");
                    }

                }
            });

        } else {
            swal("Your imaginary file is safe!");
        }

    });


});


        });
    </script>
@endsection
