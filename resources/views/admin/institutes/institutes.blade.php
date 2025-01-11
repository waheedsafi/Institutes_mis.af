@extends('layout.admin.adminlayout')
@section('title', 'Add-Institute')

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
                    <h1>Institutes</h1>
                </div>
                <div class="col-sm-6 text-right">
                    {{-- <a href="{{ route('admin.add_instititue')}}" class="btn btn-primary">New Institute</a> --}}
                    <button type="button" id="addnew" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#institutemodal">Add New</button>

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card bg-light text-dark m-2">
            <div class="container-fluid p-2">

                <table id="institutetable" class="table cell-border table-striped ">
                    <thead>

                        <th>ID</th>
                        <th>Name</th>
                        <th>CEO</th>
                        <th>City</th>
                        <th>Status</th>
                        <th width="100">Actions</th>

                    </thead>
                    <tbody>
                    </tbody>

                </table>


            </div>
        </div>
        <!-- /.card -->
    </section>

    {{-- add insti --}}
    {{-- <div class="modal fade bg-transparnt " id="add_institute" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true"> --}}
    <div class="modal fade" id="institutemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content  " style="">
                <div style="">

                    <form id="instituteform">
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

                                            <input name='institute_id' type="hidden" id='id'>
                                            <label for="name">Name*</label>
                                            <input type="text" required name="name" id="name"
                                                class="form-control" placeholder="Name">
                                            <span id="nameerror" class="text-danger error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="city">City*</label>
                                            <select name="city" id="city" class="form-control"></select>
                                            <span id="cityerror" class="text-danger error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="founder">Founder</label>
                                            <input type="text" name="founder" id="founder" class="form-control"
                                                placeholder="founder">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="CEO">CEO*</label>
                                            <input type="text" name="CEO" id="CEO" class="form-control"
                                                placeholder="CEO">
                                            <span id="ceoerror" class="text-danger error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Block</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="create_date">Create Date</label>
                                            <input type="date"
                                                max="{{ date('Y') }}-{{ date('m') }}-{{ date('d') }}"
                                                name="create_date" id="create_date" class="form-control"
                                                placeholder="2000/3/3">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="Address">Address</label>
                                            <textarea name="location" id="location" class="form-control" cols="30" rows="5"></textarea>
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




                            <div class="row">

                                <input name='institute_id' type="hidden" id='id'>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <input type="hidden" id="infoid" name="infoid" value="">
                                        <label for="name">Name:</label>
                                        <input type="text" disabled name="name" id="infoname"
                                            class="form-control " placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">City:</label>
                                        <select disabled class="form-control" name="infocity" id="infocity">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">founder:</label>
                                        <input type="text" disabled name="name" id="infofounder"
                                            class="form-control " placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">CEO:</label>
                                        <input type="text" disabled name="name" id="infoceo"
                                            class="form-control " placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Status:</label>
                                        <select type="select" disabled name="name" id="infostatus"
                                            class="form-control " placeholder="Name">
                                            <option value="1">Active</option>
                                            <option value="0">Block</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Address:</label>
                                        <textarea type="textarea" disabled name="name" id="infoaddress" class="form-control " placeholder="Name">	
                </textarea>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Create Date:</label>
                                        <input type="date" disabled name="name" id="infocreate"
                                            class="form-control " placeholder="Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Last Update:</label>
                                        <input type="text" disabled name="name" id="infoupdate"
                                            class="form-control " placeholder="Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <button type="button" class="btn btn-md btn-secondary" id="infoclose"
                                        data-bs-dismiss="modal">Close</button>

                                </div>

                            </div>


                        </div>


                    </div>



                    <div class="col-lg-3 d-flex col-6">
                        <div class="modal-body  pl-0  pt-0 color-1">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th style="">Remove</th>
                                    </tr>
                                </thead>
                                <tbody id="deplist">



                                </tbody>
                            </table>
                            <div class="postion-absolute col-md-6 pb-0">
                                <button id='adddep' class=" btn-md btn btn-primary bottom-0">Add </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


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
            $('#modal_title').html('Add Instititue');
            $('#infomodal-title').html('About');
            $('#create').html('create');


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('#institutetable').DataTable({
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
                ajax: "{{ route('admin.institute.index') }}",
                'columns': [

                    {
                        data: 'Inid'
                    },
                    {
                        data: 'Institute_name'
                    },
                    {
                        data: 'CEO'
                    },
                    {
                        data: 'city'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchabel: false
                    },
                ]
            });


            // load city

            $('#addnew').click(function() {
                //strat
                console.log('click')
                $.ajax({
                    method: "post",
                    url: "{{ route('institute_list') }}",
                    success: function(response) {

                        var city = response[1]



                        $.each(city, function(key, value) {

                            $("#city").append('<option class="form-control" value="' +
                                value.id + '">' + value.city + '</option>');
                        });





                    },
                    error: function(error) {

                        console.log(error);

                    }
                });


                // end
            });

            //end load city 


            var data = $('#instituteform')[0];
            $('#create').click(function(e) {
                $('#create').attr('disabled', true);

                $('#create').html('Saving...')
                var formdata = new FormData(data);
                $.ajax({
                    method: "POST",
                    url: "{{ route('addins') }}",
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
                            $('#modal_title').html('create instititue');
                            $('#create').html('create');

                            $('#close').trigger('click');


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
                            if (error.responseJSON.errors.city) {
                                $('#city').addClass('is-invalid');
                                $('#cityerror').html(error.responseJSON.errors.city)
                            }
                            if (error.responseJSON.errors.city == null) {
                                $('#city').removeClass('is-invalid');
                                $('#city').addClass('is-valid');
                                $('#cityerror').html('');

                            }
                            if (error.responseJSON.errors.CEO) {
                                $('#CEO').addClass('is-invalid');
                                $('#ceoerror').html(error.responseJSON.errors.CEO)
                            }
                            if (error.responseJSON.errors.CEO == null) {
                                $('#CEO').removeClass('is-invalid');
                                $('#CEO').addClass('is-valid');
                                $('#ceoerror').html('');

                            }
                        }

                    }
                });

            });

            $('body').on('click', '.editbutton', function() {
                var id = $(this).data('id');
                $.ajax({
                    method: "post",
                    url: "{{ route('institute_list') }}",
                    success: function(response) {

                        var city = response[1]



                        $.each(city, function(key, value) {

                            $("#city").append('<option class="form-control" value="' +
                                value.id + '">' + value.city + '</option>');
                        });






                        $.ajax({
                            url: "{{ url('/user/edit_institute/'), '' }}/" + id + "",
                            method: 'GET',
                            success: function(response) {
                                $('#institutemodal').modal('show');
                                $('#modal_title').html('Update institute');
                                $('#create').html('Update');
                                $('#name').val(response.Institute_name);
                                $('#CEO').val(response.CEO);
                                $('#location').val(response.location);
                                $('#founder').val(response.founder);
                                $('#city').val(response.city);
                                $('#create_date').val(response.create_date);
                                $('#id').val(response.Inid);

                                $('#status option[value="' + response.status + '"]')
                                    .attr('selected', 'selected')
                                $('#city option[value="' + response.city + '"]')
                                    .attr('selected', 'selected')



                            },
                            error: function(error) {
                                console.log(error)
                            }
                        });
                    },
                    error: function(error) {

                        console.log(error);

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
