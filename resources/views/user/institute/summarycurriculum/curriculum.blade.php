@extends('layout.Institute_manager.managerlayout')
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
                url: "{{ route('manager.loadcurriculum') }}",


                success: function(response) {
                    console.log(response)
                    $('#departmenttable tbody').empty();
                    response.forEach(department => {
                        let link ="{{asset('')}}"+department.pdfurl;
                        console.log(link)
                        var  row ='<tr><td>'+department.department_name+'</td>'+
                        '<td>  '+department.name+'</td>'+
                        '<td><a title="Download PDF" target="_blank" href="'+link+'"  >'+
                           '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 214, 17, 1);transform: ;msFilter:; "><path d="m12 16 4-5h-3V4h-2v7H8z"></path><path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path></svg>'+
                         
                            '</a></td>'+
                        '</tr>'

                        
                    $('#departmenttable tbody').append(row);
                        
                    });
               

                }
            });
            
            // start of remove subject in department

            $('tbody').on('click', '.addcurriculumbtn', function() {

                var id = $(this).data('id');
                $('#curriculmform').append('<input type="hidden" value="'+id+'" id="department_id" name="department_id">');
                $('.main-content').hide();
                $('.main-content.clsadd_carriculum').show();
                
            });

            // end of remove subject in department

// save curriculum button
            $("#btncurriculumsave").click(function (e) { 
                e.preventDefault();

                var data=$('#curriculmform')[0];
                var formdata = new FormData(data);
                $('#spin').show();
            $("#btncurriculumsave").attr('disabled',true);
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
        
                         
             if (error.responseJSON.errors.name==null) {
                $('#curriculumname').removeClass('is-invalid');
                $('#curriculumname').addClass('is-valid');
                $('#curriculumnameerror').html('')
             }else{
                $('#curriculumname').addClass('is-invalid');
                $('#curriculumnameerror').html(error.responseJSON.errors.name)
             }
          
             if (error.responseJSON.errors.pdf == null) {
                $('#curriculumpdf').addClass('is-valid');
                $('#curriculumpdf').removeClass('is-invalid'); 
                $('#curriculumpdferror').html('')
             }
             else{
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
