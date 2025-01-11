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
                            <a class="active " href="#">Subjects</a>

                        </li>
                    </ul>
                </div>
                @if (auth()->user()->hasPermissionTo('add-subject'))
                    <a href="javascript:void(0)" id="add_subject" class="btn-download">
                        <i class='bx bxs-plus'></i>
                        <span class="text">New Subject</span>
                    </a>
                @endif
            </div>
            {{-- subject --}}
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3 class="text-" id="stutable_header"></h3>

                    </div>
                    <table id="subjecttable" class="table cell-border table-striped table_yajra">
                        <thead>

                            <th>ID</th>
                            <th>Subject</th>
                            <th>Book Name</th>
                            <th width="100">Actions</th>

                        </thead>
                        <tbody>



                        </tbody>

                    </table>
                </div>

            </div>
            {{-- subject --}}


            {{--  --}}

        </div>



        {{-- add instiute  --}}

        <div class="main-content dashbaord-content clsaddsubject">
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
                            <a class="active" href="#" id="back">Subjects</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="" id="instoption"></a>
                        </li>
                    </ul>
                </div>
                <a href="javascript:void(0)" class="btn-download" id="backmain">
                    <i class=''></i>

                    <span class="text">Back</span>
                </a>
            </div>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3 class="text-" id="add_header">Add Subject</h3>

                        <div class="row">


                            <form id="subjectform">

                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <input name='subject_id' type="hidden" value="" id='subject_id'>
                                        <label for="name">Name*</label>
                                        <input type="text" required name="name" id="name" class="form-control"
                                            placeholder="Name">
                                        <span id="nameerror" class="text-danger error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <label for="book_name">Book Name</label>
                                        <input type="text" name="book_name" id="book_name" class="form-control"
                                            placeholder="Book Name">
                                        <span id="book_nameerror" class="text-danger error"></span>
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class="mb-3">

                                        <label for="pdf">PDF</label>
                                        <input type="file" name="pdf" id="pdf" class="form-control"
                                            placeholder="">
                                        <span id="pdferror" class="text-danger error"></span>

                                    </div>
                                </div> --}}
                                <input type="hidden" name="pdf" id="pdf" class="form-control">
                            </form>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pdf">PDF*</label>
                                    {{-- <input type="file" class="form-control" required id="curriculumpdf" name="pdf"> --}}
                                    <div id="upload-container" class="text-center">
                                        <div id="pdfcontrol" class="form-control p-0 left-0"> <button none id="browseFile"
                                                class="m-0 btn btn-primary">Brows
                                                File</button>
                                            <div style="display: none" class="progress mt-3" style="height: 25px">
                                                <div id="progress_bar"
                                                    class="progress-bar "
                                                    role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                                            </div>
                                        </div>
                                    </div>

                                    <span id="pdferror" class="text-danger error"></span>

                                </div>
                            </div>

                            <div class="p-3">

                                <button type="button" class="btn btn-primary" id="subject_create"></button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="custommodel" id="subjectmodel">
            <div class="customdialog">
                <div class="customcontent autoheight">
                    <div class="table-data">
                        <div class="order">
                            <div class="head">
                                <h3 class="text-" id="addteacher_header">Appended Department To Created Institute</h3>
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


            $('.main-content').hide();
            $('.main-content.clsdashboard').show();

            $('#sidebar .side-menu.top li').removeClass('active');
            $('#sidebar .side-menu.top li#view-subject').addClass('active');
            $('#sidebar .side-menu.top li#view-subject a i').addClass('bx-flashing bx-flip-horizontal');

            // load subject

            var table = $('#subjecttable').DataTable({
                "processing": true,
                "retrieve": true,
                "serverSide": true,
                'paginate': true,
                'searchDelay': 00,
                "bDeferRender": true,
                "responsive": true,
                "autoWidth": false,
                "pageLength": 5,
                "lengthMenu": [
                    [5, 10, 15, 20],
                    [5, 10, 15, 20]
                ],
                ajax: "{{ route('editor.load.subject') }}",
                'columns': [

                    {
                        data: 'Sid'

                    },
                    {
                        data: 'subject_name'
                    },
                    {
                        data: 'book_name',
                        searchable: true,
                    },

                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `
							<div class="btn-group"> <a href="{{ asset('storage/${row.PDF}') }}" target="_blank" class="subjectinfo btn-secondary btn" data-id="">
                            <svg class="filament-link-icon w-4 h-4 mr-1 " style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"> <path d="M433 203.2H213c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V243.3s0-0.1 0.1-0.1H433s0.1 0 0.1 0.1l-0.1 219.9zM702.5 203.2c-82.5 0-150 67.5-150 150s67.5 150 150 150 150-67.5 150-150-67.5-150-150-150z m77.7 227.7c-20.9 20.9-48.4 32.3-77.7 32.3-29.2 0-56.8-11.5-77.7-32.3-20.9-20.9-32.3-48.4-32.3-77.7 0-29.2 11.5-56.8 32.3-77.7 20.9-20.9 48.4-32.3 77.7-32.3 29.2 0 56.8 11.5 77.7 32.3 20.9 20.9 32.3 48.4 32.3 77.7 0 29.2-11.5 56.8-32.3 77.7zM431.3 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9zM812.5 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9z"  fill="#5ABE64" /></svg>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-secondary subjectedit" data-id="${row.Sid}">

                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="24px" fill="#3C91E6"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-secondary  text-danger subjectdelete" data-id="${row.Sid}">

                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" class="text-danger" viewBox="0 0 24 24" width="24px" fill="#F08080"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                            </a>

                            </div> '
						`;
                        }
                    },
                ]

            });









            // end load subject


            $('#add_subject').click(function(e) {
                e.preventDefault();

                $('.main-content').hide();
                $('.main-content.clsaddsubject').show();
                $('#subject_create').html('Add');
                $('#instoption').html('Add');




            });

            // upload file


            let browseFile = $('#browseFile');
            let resumable = new Resumable({
                query: {
                    _token: '{{ csrf_token() }}'
                }, // CSRF token
                target: '{{ route('files.upload.large') }}',
                fileType: ['pdf'],
                chunkSize: 10 * 1024 *
                    1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
                headers: {
                    'Accept': 'application/json'
                },
                testChunks: false,
                throttleProgressCallbacks: 1,
            });

            resumable.assignBrowse(browseFile[0]);

            resumable.on('fileAdded', function(file) { // trigger when file picked
                showProgress();
                
                $('#progress_bar').addClass('progress-bar-striped');
                $('#progress_bar').addClass('progress-bar-animated');
                resumable.upload() // to actually start uploading.
            });
            let progress = $('.progress');


            resumable.on('fileProgress', function(file) { // trigger when file progress update
                updateProgress(Math.floor(file.progress() * 100));
            });

            resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete

                // console.log(file)
                // console.log(response.path)
                
                $('#progress_bar').removeClass('progress-bar-striped');
                $('#progress_bar').removeClass('progress-bar-animated');
                // hideProgress();

                response1 = JSON.parse(response)
            
                $('#pdf').val(response1.path);
                // $('#videoPreview').attr('src', response.path);
                // $('.card-footer').show();
            });

            resumable.on('fileError', function(file, response) { // trigger when there is any error
                console.log(file),
                    console.log(response)
                alert('file uploading error.')
            });



            function showProgress() {
                progress.find('.progress-bar').css('width', '0%');
                progress.find('.progress-bar').html('0%');
                progress.find('.progress-bar').removeClass('bg-success');
                progress.show();
            }

            function updateProgress(value) {
                progress.find('.progress-bar').css('width', `${value}%`)
                progress.find('.progress-bar').html(`${value}%`)
            }

            function hideProgress() {
                progress.hide();
            }

            // upload file
            var save_subject_id;
            var data = $('#subjectform')[0];
            $('#subject_create').click(function(e) {
                $('#subject_create').attr('disabled', true);

                $('#subject_create').html('Saving...')
                $('#spin').show();
                var formdata = new FormData(data);
                $.ajax({
                    method: "POST",
                    url: "{{ route('editor.add.subject') }}",
                    processData: false,
                    contentType: false,
                    data: formdata,


                    success: function(response) {
                        console.log(response)
                        save_subject_id = response.subject_id;

                        $('#subject_create').attr('disabled', false);
                        $('#subject_create').html('Add');

                        $('#id').val('');
                        $('#name').val('');
                        $('#book_name').val('');
                        $('#pdf').val('');
                        $('#pdf').empty('');





                        if (response.message) {
                            $('#spin').hide();

                            table.draw();
                            swal("Success!", response.message, "success");
                            // table.draw();
                            // $('#instituteform')[0].reset();
                            // $('#id').val('');


                        }

                    },
                    error: function(error) {
                        $('#spin').hide();
                        console.log(error);
                        if (error) {
                            $('#subject_create').attr('disabled', false);
                            $('#subject_create').html('Add')

                            if (error.responseJSON.errors.name) {
                                $('#name').addClass('is-invalid');
                                $('#nameerror').html(error.responseJSON.errors.name)
                            }
                            if (error.responseJSON.errors.name == null) {
                                $('#name').removeClass('is-invalid');
                                $('#name').addClass('is-valid');
                                $('#nameerror').html('');

                            }
                            if (error.responseJSON.errors.book_name) {
                                $('#book_name').addClass('is-invalid');
                                $('#book_nameerror').html(error.responseJSON.errors.book_name)
                            }
                            if (error.responseJSON.errors.book_name == null) {
                                $('#book_name').removeClass('is-invalid');
                                $('#book_name').addClass('is-valid');
                                $('#book_nameerror').html('');

                            }
                            if (error.responseJSON.errors.pdf) {
                                $('#pdfcontrol').addClass('is-invalid');
                                $('#pdferror').html(error.responseJSON.errors.pdf)
                            }
                            if (error.responseJSON.errors.pdf == null) {
                                $('#pdfcontrol').removeClass('is-invalid');
                                $('#pdfcontrol').addClass('is-valid');
                                $('#pdferror').html('');

                            }
                        }

                    }
                });

            });


            $('#backmain').click(function() {

                $('.main-content').hide();
                $('.main-content.clsdashboard').show();


            });


            $('body').on('click', '.subjectdelete', function() {

                var Sid = $(this).data('id');

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

                                url: "{{ url('user/sub/editor/delete/subject/'), '' }}/" + Sid,
                                method: 'GET',
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

            // $('body').on('click', '.subjectinfo', function() {



            //     var Sid = $(this).data('id');

            //     console.log(Sid);
            //     // Replace with the actual subject ID
            //     var ajaxUrl = "{{ route('download.pdf', ['subject' => ':id']) }}".replace(':id', Sid);


            //     // Make an AJAX request to fetch the PDF file path
            //     $.ajax({
            //         url: ajaxUrl, // Replace subjectId with the appropriate subject identifier
            //         method: 'GET',
            //         success: function(response) {

            //             // Check if PDF path is available in the response
            //             if (response.pdf_path) {
            //                 console.log(response.pdf_path)
            //                 // Create a temporary link to trigger the file download
            //                 var link = document.createElement('a');
            //                 link.href = response.pdf_path;
            //                 // link.download = 'filename.pdf'; // Specify the filename here
            //                 link.click();
            //             } else {
            //                 console.error('PDF file not found');
            //             }
            //         },
            //         error: function(error) {
            //             console.log(error)
            //             if (error.responseJSON.unauthorize) {
            //                 console.log(error.responseJSON.unauthorize)
            //                 swal('Unauthorzed !', error.responseJSON.unauthorize, 'error');
            //             }
            //         }
            //     });


            // });


            $('body').on('click', '.subjectedit', function() {
                var Sid = $(this).data('id');
                var rowData = table.row($(this).closest('tr')).data();

                $('.main-content').hide();
                $('.main-content.clsaddsubject').show();
                $('#subject_create').html('Update');
                $('#instoption').html('Update');
                $('#add_header').html('')
                $('#add_header').html('Update Subject')

                $('#name').val(rowData.subject_name);
                $('#book_name').val(rowData.book_name);
                $('#subject_id').val(Sid);
            });


        });
    </script>
@endsection
