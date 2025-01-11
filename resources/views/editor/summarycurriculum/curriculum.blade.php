@extends('layout.editor.editorlayout')
@section('content')
    <!-- MAIN -->
    <main>


        {{-- main content  --}}

        <div class="main-content dashbaord-content clsmain">
            <div class="head-title">
                <div class="left">
                    <h1 id='username'>
                        {{ auth()->user()->name }}
                    </h1>
                    <ul class="breadcrumb">

                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active " href="{{ route('editor.index') }}" id="">Home</a>

                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#" id="back">Carriculum</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="" id="instoption">List</a>
                        </li>
                    </ul>
                </div>

            </div>



            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3 class="text-" id="add_header">Carriculum List</h3>

                        <div class="row">




                            <table class="table" id="departmenttable">
                                <thead>
                                    <th>Department</th>
                                    <th>Curriculum</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>

                                </tbody>

                            </table>




                            <div class="p-3">

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- end main --}}



        {{-- start add curriculum in department --}}
        <div class="main-content dashbaord-content clsadd_carriculum">
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
                            <a class="active back_home" href="javascript:void(0)" id="back">Carriculum</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i> <a class="active" href="#" id="back">Add
                                Subject To department</a></li>
                        <li>
                            <a class="active" href="" id="instoption"></a>
                        </li>
                    </ul>
                </div>
                <a href="javascript:void(0)" id="back_home" class="btn-download back_home">
                    <i class='bx bxs-plus'></i>
                    <span class="text">Back</span>
                </a>

            </div>



            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3 class="text-" id="curreculmadd_header"></h3>

                        <div class="row">


                            <form id="curriculmform">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Name*</label>
                                        <input type="text" class="form-control" required id="curriculumname"
                                            name="name">
                                        <span id="curriculumnameerror" class="text-danger error"></span>

                                    </div>
                                </div>
                                <input type="text" hidden name="pdf" val="" id="curriculumpdf">
                            </form>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pdf">Curriculum PDF*</label>
                                    {{-- <input type="file" class="form-control" required id="curriculumpdf" name="pdf"> --}}
                                    <div id="upload-container" class="text-center">
                                        <div class="form-control p-0 left-0"> <button none id="browseFile"
                                                class="m-0 btn btn-primary">Brows
                                                File</button>
                                            <div style="display: none" class="progress mt-3" style="height: 25px">
                                                <div id="progress_bar"
                                                    class="progress-bar progress-bar-striped progress-bar-animated"
                                                    role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                                            </div>
                                        </div>
                                    </div>

                                    <span id="curriculumpdferror" class="text-danger error"></span>

                                </div>
                            </div>
                        </div>




                        <div class="p-3">
                            <a href="javascript:void(0)" id="btncurriculumsave" class="btn btn-primary">Save</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        {{-- end add curriculum in department --}}



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

            $('.actionbtn').attr('disabled', true);
            $('.main-content').hide();
            $('.main-content.clsmain').show();

            $('#sidebar .side-menu.top li').removeClass('active');
            $('#sidebar .side-menu.top li#view-summarycurriculum').addClass('active');

            // load department
            $.ajax({
                type: "get",
                url: "{{ route('editor.loadcurriculum') }}",


                success: function(response) {

                    $('#departmenttable tbody').empty();
                    response.forEach(department => {
                        let link = "{{ asset('') }}" + department.pdfurl;
                        console.log(link)
                        var row = '<tr><td>' + department.department_name + '</td>' +
                            '<td><a  <a target="_blank" href="' + link + '"  > ' + department
                            .name + '</a></td>' +
                            '<td><a href="javascript:void(0)" class="addcurriculumbtn" data-id=' +
                            department.Did + '>' +
                            '<svg fill="#4cf60e" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 885.389 885.389" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M560.988,212.188c-179.2,0-324.4,145.2-324.4,324.4s145.2,324.4,324.4,324.4c179.2,0,324.4-145.2,324.4-324.4 S740.188,212.188,560.988,212.188z M745.789,570.188c0,11-9,20-20,20h-91.2c-11,0-20,9-20,20v91.2c0,11-9,20-20,20h-67.2 c-11,0-20-9-20-20v-91.2c0-11-9-20-20-20H386.188c-5.5,0-10-4.5-10-10v-77.199c0-11,9-20,20-20h91.201c11,0,20-9,20-20v-91.2 c0-11,9-20,20-20h67.2c11,0,20,9,20,20v91.2c0,11,9,20,20,20h91.2c11,0,20,9,20,20V570.188z"></path> <path d="M153.588,416.489c5.6,0.1,10.7-3.301,12.8-8.4l60.7-145.8c2-4.9,5.9-8.8,10.8-10.8l145.8-60.7c5.2-2.2,8.5-7.2,8.4-12.8 c-0.101-5.6-3.601-10.6-8.8-12.6l-364.4-140.1c-5.1-1.9-10.8-0.7-14.6,3.1l-0.3,0.3c-3.8,3.8-5,9.6-3.1,14.6l140.1,364.399 C142.988,412.989,147.988,416.489,153.588,416.489z"></path> </g> </g></svg>' +
                            '</a></td>' +
                            '</tr>'


                        $('#departmenttable tbody').append(row);

                    });


                }
            });


            //upload the file


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
                resumable.upload() // to actually start uploading.
            });
            let progress = $('.progress');


            resumable.on('fileProgress', function(file) { // trigger when file progress update
                updateProgress(Math.floor(file.progress() * 100));
            });

            resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete

                // console.log(file)
                // console.log(response.path)
                // $('#progress_bar').removeClass('progress-bar-animated');
                // hideProgress();

                response1 = JSON.parse(response)
                console.log(response1.path)
                $('#curriculumpdf').val(response1.path);
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


            // end upload



            // start of remove subject in department

            $('tbody').on('click', '.addcurriculumbtn', function() {

                var id = $(this).data('id');
                $('#curriculmform').append('<input type="hidden" value="' + id +
                    '" id="department_id" name="department_id">');
                $('.main-content').hide();
                $('.main-content.clsadd_carriculum').show();

            });

            // end of remove subject in department

            // save curriculum button
            $("#btncurriculumsave").click(function(e) {
                e.preventDefault();

                var data = $('#curriculmform')[0];
                var formdata = new FormData(data);
                $('#spin').show();
                $("#btncurriculumsave").attr('disabled', true);
                $('#btncurriculumsave').html('Saving..')


                $.ajax({
                    method: "POST",
                    url: "{{ route('editor.addcurriculum') }}",
                    processData: false,
                    contentType: false,
                    data: formdata,


                    success: function(response) {
                        $('#spin').hide();
                        $('#btncurriculumsave').attr('disabled', false);
                        $('#btncurriculumsave').html('Save')
                        $('#curriculmform')[0].reset();
                        $('#department_id').val('');


                        $('#curriculumname').removeClass('is-invalid');
                        $('#curriculumnameerror').html('')


                        $('#curriculumpdf').removeClass('is-invalid');
                        $('#curriculumpdferror').html('')

                        if (response.message) {

                            swal("Success!", response.message, "success");
                            $('.back_home').click();
                            table.draw();
                            $('#curriculmform')[0].reset();
                            $('#department_id').val('');




                        }

                    },
                    error: function(error) {

                        $('#spin').hide();
                        $('#btncurriculumsave').attr('disabled', false);
                        $('#btncurriculumsave').html('Save')
                        console.log(error)
                        if (error.responseJSON) {


                            if (error.responseJSON.errors.name == null) {
                                $('#curriculumname').removeClass('is-invalid');
                                $('#curriculumname').addClass('is-valid');
                                $('#curriculumnameerror').html('')
                            } else {
                                $('#curriculumname').addClass('is-invalid');
                                $('#curriculumnameerror').html(error.responseJSON.errors.name)
                            }

                            if (error.responseJSON.errors.pdf == null) {
                                $('#curriculumpdf').addClass('is-valid');
                                $('#curriculumpdf').removeClass('is-invalid');
                                $('#curriculumpdferror').html('')
                            } else {
                                $('#curriculumpdf').addClass('is-invalid');
                                $('#curriculumpdferror').html(error.responseJSON.errors.pdf)
                            }
                        }
                        // if (error.responseText) {
                        //     console.log(error.message)
                        //     swal('Error',error.responseText.error.pdf,'error');

                        // }
                    }
                });
            });
            // save curriculum end








            // back to home

            $('.back_home').click(function(e) {
                $('.main-content').hide();
                $('.main-content.clsmain').show();
                $('#department_id').val('');


            });
            // end back to home
            // load institue






        });
    </script>
@endsection
