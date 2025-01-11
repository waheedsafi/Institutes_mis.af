@extends('layout.admin.adminlayout')
@section('title', 'Permission')

@section('link')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}


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
                    <h1>Roles</h1>
                </div>
                <div class="col-sm-6 text-right">
                    {{-- <a href="{{ route('admin.add_instititue')}}" class="btn btn-primary">New Institute</a> --}}

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content main-content  clsindex">
        <!-- Default box -->
        <div class="card bg-light text-dark m-2">
            <div class="container-fluid p-2">

                <table id="roletable" class="table cell-border table-striped ">
                    <thead>

                        <th>Role</th>
                        <th>Access Level</th>
                        <th width="100">Actions</th>

                    </thead>
                    <tbody>
                    </tbody>

                </table>


            </div>
        </div>
        <!-- /.card -->
    </section>


    <section class="content main-content  clspermission">
        <!-- Default box -->
        <div class="card bg-light text-dark m-2">
            <div class="container-fluid p-2">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <input type="hidden" id="roleid" value="">
                            <label for="name">Role Name:</label>

                            <div class="form-control" id='role_name'></div>
                            {{-- <input type="text" disabled name="name" id="infoname" class="form-control " placeholder="Name">	 --}}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mb-3">

                            <label for="name">Access Level:</label>
                            <div class="form-control" id='access_level'></div>
                            {{-- <input type="text" disabled name="name" id="infoname" class="form-control " placeholder="Name">	 --}}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-6">

                            <label for="name">All Permissions:</label>
                            <div id='permissionchk' class="row"></div>
                            {{-- <input type="text" disabled name="name" id="infoname" class="form-control " placeholder="Name">	 --}}
                        </div>
                    </div>


                </div>
                <button id="updatapermission" class="btn btn-primary " style="margin-top:10px;">Update</button>

            </div>

        </div>

        <!-- /.card -->
    </section>


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
            $('.main-content').hide();
            $('.clsindex').show();
            $('#modal_title').html('Add Instititue');
            $('#infomodal-title').html('About');
            $('#create').html('create');


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('#roletable').DataTable({
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
                ajax: "{{ route('admin.roleload') }}",
                'columns': [

                    {
                        data: 'role_name'
                    },
                    {
                        data: 'access_level'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchabel: false
                    },
                ]
            });


            // updatepermission 

            $('#updatapermission').click(function() {
                //strat
                $('#updatapermission').html('saving..')
                $('#updatapermission').attr('disabled', true)
                var selectedPermissions = [];
                $('input[name="permissions[]"]:checked').each(function() {
                    selectedPermissions.push($(this).val());
                });
                var roleid = $('#roleid').val();


                url = "{{ route('updatepermission', ['roleid' => 'id']) }}";
                urll = url.replace('id', +roleid);
                console.log(urll)
                $.ajax({
                    method: "post",
                    url: urll,

                    data: {
                        permissions: selectedPermissions
                    },

                    success: function(response) {

                        $('#updatapermission').html('Update')
                        $('#updatapermission').attr('disabled', false)

                        $('.main-content').hide();
                        $('.clsindex').show();








                    },
                    error: function(error) {

                        console.log(error);

                    }
                });


                // end
            });

            //end update permission 


            $('body').on('click', '.editbutton', function() {
                var id = $(this).data('id');
                $('#roleid').val('')
                $('#roleid').val(id)
                $('.main-content').hide();
                $('.clspermission').show();
                console.log(id);
                var url = "{{ route('role_permission', ['roleid' => 'id']) }}";
                urll = url.replace('id', +id);

                $.ajax({
                    type: "get",
                    url: "{{ route('loadpermission') }}",

                    success: function(response) {
                        var chklist = $('#permissionchk');
                        chklist.empty();
                        response.forEach(function(permission) {
                            var checkbox = $(
                                '<div class="col-sm-6"> <div class="form-group form-check"> <label class="form-check-label"> <input class="form-check-input" type="checkbox" id="' +
                                permission.slag + '" name="permissions[]" value="' +
                                permission.id + '">' + permission.name +
                                '</label> </div></div>');
                            // var label = $('');
                            // chklist.append(label);
                            chklist.append(checkbox);

                        });




                        $.ajax({
                            method: "get",
                            url: urll,
                            // var editTeacherUrl = "{{ route('edit_teacher', ['teachid' => ':teacherId']) }}";

                            success: function(response) {
                                var role = response[0]
                                var permis = response[1]

                                $('#role_name').html(role[0]['role_name'])
                                $('#access_level').html(role[0]['access_level'])




                                $.each(permis, function(key, value) {
                                    var sla = '#' + value.slag;
                                    $(sla).prop('checked', true);
                                });



                            },
                            error: function(error) {

                                console.log(error);

                            }
                        });
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

                                url: "{{ url('/user/delete_institute/'), '' }}/" + id + "",
                                method: 'GET',
                                success: function(response) {
                                    swal("Success!", response.message, "success");

                                    table.draw();

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



            $('#close').click(function() {
                $('#instituteform')[0].reset();
                $('#deplist > tr > td').remove();
                $('#city').empty();
                $('#id').val('');
                $('#create').html('create');

            });





            var depvar;
            var institute_id;
            $('body').on('click', '.infobutton', function() {
                var id = $(this).data('id');
                institute_id = id;
                $.ajax({
                    method: "post",
                    url: "{{ route('institute_list') }}",
                    success: function(response) {

                        var city = response[1]



                        $.each(city, function(key, value) {

                            $("#infocity").append(
                                '<option class="form-control" value="' + value.id +
                                '">' + value.city + '</option>');
                        });





                    },
                    error: function(error) {

                        console.log(error);

                    }
                });
                $.ajax({
                    url: "{{ url('/user/edit_institute/'), '' }}/" + id + "",
                    method: 'GET',
                    success: function(response) {
                        $('#infomodal').modal('show');

                        $('#create').html('Update');
                        $('#infoname').val(response.Institute_name);
                        console.log(response.Institute_name)
                        $('#infoceo').val(response.CEO);
                        $('#infoaddress').val(response.location);
                        $('#infofounder').val(response.founder);

                        $('#infocreate').val(response.create_date);
                        $('#infoupdate').val(response.updated_at);
                        $('#infoid').val(response.Inid);

                        $('#infostatus option[value="' + response.status + '"]').attr(
                            'selected', 'selected')
                        $('#infocity option[value="' + response.city + '"]').attr('selected',
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
