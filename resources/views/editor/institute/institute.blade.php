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
                            <a class="active " href="{{ route('editor.users') }}">Institute</a>

                        </li>
                    </ul>
                </div>
                @if (auth()->user()->hasPermissionTo('add-institute'))
                    <a href="javascript:void(0)" id="add_institute" class="btn-download">
                        <i class='bx bxs-plus'></i>
                        <span class="text">New Institute</span>
                    </a>
                @endif
            </div>
            {{-- user --}}
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3 class="text-" id="stutable_header"></h3>

                    </div>
                    <table id="institutetable" class="table cell-border table-striped table_yajra">
                        <thead>

                            <th>ID</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>Status</th>
                            <th>No Students</th>
                            <th>Create Date</th>
                            <th width="100">Actions</th>

                        </thead>
                        <tbody>



                        </tbody>

                    </table>
                </div>

            </div>
            {{-- user --}}


            {{--  --}}

        </div>



        {{-- add instiute  --}}

        <div class="main-content dashbaord-content clsaddinstitue">
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
                            <a class="active" href="#" id="back">Institute</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="" id="instoption"></a>
                        </li>
                    </ul>
                </div>
                <a href="javascript:void(0)" class="btnbackmain btn-download" id="backmain">
                    <i class='bx bx-plus'></i>

                    <span class="text">Back</span>
                </a>
            </div>


            <form id="instituteform">
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3 class="text-" id="addteacher_header">Add Institute</h3>

                            <div class="row">



                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <input name='institute_id' type="hidden" id='id'>
                                        <label for="name">Name*</label>
                                        <input type="text" required name="name" id="name" class="form-control"
                                            placeholder="Name">
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


                                <div class="p-3">

                                    <button type="button" class="btn btn-primary" id="institue_create"></button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="custommodel" id="departmentmodel">
            <div class="customdialog">
                <div class="customcontent autoheight">
                    <div class="table-data">
                        <div class="order">
                            <div class="head">
                                <h3 class="text-" id="modelheader">Appended Department To Created Institute</h3>
                            </div>
                            <div class="row bg-gray">
                                <div id='departmentcheck' class="row">

                                </div>
                            </div>
                            <div class="p-3">

                                <button type="button" class="btn btn-secondry" id="department_close">Cancel</button>
                                <button type="button" class="btn btn-secondry" id="department_skip">Skip</button>
                                <button type="button" class="btn btn-primary" id="department_add">Add</button>
                                <button type="button" class="btn btn-primary" id="only_add_dep">Add</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- end add institute --}}
        {{-- MAIN HOME END --}}



        {{-- institue info start  --}}
            @include('editor.institute.instituteinfo')
       
        {{-- institute info end  --}}

          {{-- institue departement info start  --}}
          @include('editor.institute.departmentstudent')
       
          {{-- institute department info end  --}}

            {{-- institue student info start  --}}
            @include('editor.institute.studentinfo')
       
            {{-- institute student info end  --}}
        {{-- other blade --}}
        {{-- @include('user.institute.student.student')
@include('user.institute.teacher.teacher')
@include('user.institute.setting.setting') --}}


    </main>
@endsection

@section('script')
<script>
      let  institutedepartmentstudentroute ="{{ route ('editor.institute.department.student') }}";

// route for fetch specific student info
let  studentinfodataroute   ="{{ route('editor.student.info') }}";
// use for institute department student
let institutefordepart ;

// only asset

let changablesrc = "{{ asset(':changeurl') }}";


//info icon url
let infoicon =" {{ asset('svg/icons.svg#icon-info') }}";
//edit icon url
let editicon =" {{ asset('svg/icons.svg#icon-edit') }}";
//delete icon url
let deleteicon =" {{ asset('svg/icons.svg#icon-delete') }}";
//add icon url
let addicon =" {{ asset('svg/icons.svg#icon-add') }}";

</script>
<script src="{{ asset('js/custom/editor/institute.js') }}"></script>
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
            $('#sidebar .side-menu.top li#view-institute').addClass('active');

            // load institue 

            var table = $('#institutetable').DataTable({
           
                dom: '<"top"fBl<"clear">>rt<"bottom"lp><"clear">',
    buttons: [
        {
            text: 'My Button',
            action: function (e, dt, node, config) {
                alert('Button clicked!');
            }
        }
    ],
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
                ajax: "{{ route('editor.load.institute') }}",
                'columns': [

                    {
                        data: 'Inid'

                    },
                    {
                        data: 'Institute_name'
                    },
                    {
                        data: 'city',
                        searchable: true,
                    },
                    {
                        data: 'status'

                    },
                    {
                        data:'student_count'
                    },

                    {
                        data: 'create_date'
                    },


                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return ` <div class="btn-group">
            <a href="javascript:void(0)" class="btninstituteinfo btn-secondary btn" data-id="${row.Inid}">
                <svg class="filament-link-icon" width="24" height="24">
              
                  <use xlink:href="${infoicon}"></use>


                </svg>
            </a>
            <a href="javascript:void(0)" class="btn btn-secondary teacheditbutton" data-id="${row.Inid}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;" >
                    <use xlink:href="${editicon}"></use>
                </svg>
            </a>
            <a href="javascript:void(0)" class="btn btn-secondary text-danger teachdelbutton" data-id="${row.Inid}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                    <use xlink:href="${deleteicon}"></use>
                </svg>
            </a>
            <a href="javascript:void(0)" class="btn btn-secondary text-danger btnadddepartment" data-id="${row.Inid}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                    <use xlink:href="${addicon}"></use>
                </svg>
            </a>
        </div>`;
                        }
                    },
                    
                ]

            });









            // end load institute


            $('#add_institute').click(function(e) {
                e.preventDefault();

                $('.main-content').hide();
                $('.main-content.clsaddinstitue').show();
                $('#institue_create').html('Add');
                $('#instoption').html('Add');
                $('#spin').show();
                // load city
                $.ajax({
                    method: "post",
                    url: "{{ route('institute_list') }}",
                    success: function(response) {

                        var city = response[1]



                        $.each(city, function(key, value) {

                            $("#city").append('<option class="form-control" value="' +
                                value.id + '">' + value.city + '</option>');
                        });

                        $('#spin').hide();




                    },
                    error: function(error) {

                        console.log(error);

                    }
                });
                // end load city



            });
            var save_institute_id;
            var data = $('#instituteform')[0];
            $('#institue_create').click(function(e) {
                $('#institue_create').attr('disabled', true);

                $('#create').html('Saving...')
                $('#spin').show();
                var formdata = new FormData(data);
                $.ajax({
                    method: "POST",
                    url: "{{ route('editor.add.institute') }}",
                    processData: false,
                    contentType: false,
                    data: formdata,


                    success: function(response) {
                        console.log(response)
                        save_institute_id = response.institute_id;
                        console.log(save_institute_id)
                        $('#institue_create').attr('disabled', false);
                        $('#instiute_create').html('Add');

                        $('#id').val('');
                        $('#create_date').val('');
                        $('#CEO').val('');
                        $('#location').val('');
                        $('#name').val('');
                        $('#city').empty('');
                        $('#founder').val('');
                        $('row div div input').val('');
                        $('#departmentmodel').show();
                        

                        $('#department_close').hide();
                        $('#only_add_dep').hide();
                        

                        $('#spin').show();
                        // WHEN CREATE INSTITUTE LOAD DEPARTMENT TO THIS INSTITUTE

                        $.ajax({
                            type: "post",
                            url: "{{ route('depadd') }}",

                            success: function(response) {
                                var chklist = $('#departmentcheck');
                                    $('#spin').hide();


                                response.forEach(function(department) {
                                    var checkbox = $(
                                        '<div class="col-sm-6"> <div class="form-group form-check"> <label class="form-check-label"> <input class="form-check-input" type="checkbox" id="' +
                                        department.department_name +
                                        '" name="department[]" value="' +
                                        department.Did + '">' +
                                        department.department_name +
                                        '</label> </div></div>');
                                    // var label = $('');
                                    // chklist.append(label);
                                    chklist.append(checkbox);

                                });





                            }
                        });

                        // END WHEN CREATE INSTITUTE LOAD DEPARTMENT TO THIS INSTITUTE



                        if (response.message) {


                            // swal("Success!", response.message, "success");

                            // table.draw();
                            // $('#instituteform')[0].reset();
                            // $('#id').val('');


                        }

                    },
                    error: function(error) {
                        $('#spin').hide();
                        console.log(error);
                        if (error) {
                            $('#institue_create').attr('disabled', false);
                            $('#institue_create').html('Add')

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
            // skip append department to institute
            $('#department_skip').click(function(e) {
                e.preventDefault();
                $('#departmentmodel').hide();
                $('#spin').hide();
                swal('Success!', 'Successfuly add only Institute', 'success')

            });
            // end skip append department to institute

            $('#department_add').click(function(e) {
                $('#spin').show();

                //strat
                $('#department_add').html('saving..')
                $('#department_add').attr('disabled', true)
                var departmentcheck = [];
                $('input[name="department[]"]:checked').each(function() {
                    departmentcheck.push($(this).val());
                });
                var instituteid = save_institute_id;


                url = "{{ route('append_department', ['Inid' => 'id']) }}";
                urll = url.replace('id', +instituteid);
                console.log(urll)
                $.ajax({
                    method: "post",
                    url: urll,

                    data: {
                        department: departmentcheck
                    },

                    success: function(response) {
                        $('#spin').hide();
                        $('#add_department').html('Add')
                        $('#add_department').attr('disabled', false)

                        $('#departmentmodel').hide();
                        swal('Success!',
                            'Successfully Add Institute\nAnd\nSuccessfully Append Some Department',
                            'success');









                    },
                    error: function(error) {

                        console.log(error);

                    }
                });


                // end
            });







// institute info 

            $('body').on('click','.btninstituteinfo',function(){
            
            var    institute_id =  $(this).data('id');
            
            institutefordepart =institute_id;
                


                $.ajax({
                    type: "POST",
                    url: "{{ route('editor.institute.departmentinfo') }}",
                    data: {
                        Inid:institute_id,
                    },
                    
                    success: function (response) {
                        
                // $('#spin').show();
                $('.main-content').hide();
                $('.main-content.clsinstituteinfo').show();
 
                        if ($.fn.DataTable.isDataTable('#departmentinfo')) {
                        $('#departmentinfo').DataTable().clear().destroy();
}
                        // departmentinfo
                    let table = $('#departmentinfo').DataTable({
                        "retrieve": true,
                        "paginate": true,
                        "searchDelay": 700,
                        "responsive": true,
                        "autoWidth": false,
                        "pageLength": 15,
                        "lengthMenu": [
                            [5, 10, 15, 20],
                            [5, 10, 15, 20]
                        ],
                    });

                    // Iterate through response data and add rows to the DataTable
            response.forEach(function(department) {
                table.row.add([
                    department.Did,                    // ID (Department ID)
                    department.department_name,        // Department Name
                    department.total,                  // Student Count
                    `<div class="btn-group"> <a href="javascript:void(0)" class="btndepartmentinfo btn-secondary btn" data-id="${department.Did}">   <svg class="filament-link-icon w-4 h-4 mr-1 " style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"> <path d="M433 203.2H213c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V243.3s0-0.1 0.1-0.1H433s0.1 0 0.1 0.1l-0.1 219.9zM702.5 203.2c-82.5 0-150 67.5-150 150s67.5 150 150 150 150-67.5 150-150-67.5-150-150-150z m77.7 227.7c-20.9 20.9-48.4 32.3-77.7 32.3-29.2 0-56.8-11.5-77.7-32.3-20.9-20.9-32.3-48.4-32.3-77.7 0-29.2 11.5-56.8 32.3-77.7 20.9-20.9 48.4-32.3 77.7-32.3 29.2 0 56.8 11.5 77.7 32.3 20.9 20.9 32.3 48.4 32.3 77.7 0 29.2-11.5 56.8-32.3 77.7zM431.3 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9zM812.5 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9z"  fill="#5ABE64" /></svg></div>` // Actions (e.g., Edit button)
                ]).draw(false);
            });
                    },
                    error:function (error){
                        console.log(error)
                        
                        if(error.responseJSON.unauthorize){
                            swal('unauthorize !',error.responseJSON.unauthorize,'error')
                        }
                        if(error.responseJSON.error){
                            swal('Error!',error.responseJSON.error,'error')
                        }
                    }
                });







            });
         
// end institute info 
// add department 
let institute_id;
$('body').on('click','.btnadddepartment',function()
{
               institute_id =  $(this).data('id');
            
                $('#spin').show();
             
                $('#departmentmodel').show()
                $('#modelheader').html('');

                $('#modelheader').html('Append Department to selected Institute');
                $('#department_skip').hide();
                $('#department_add').hide();
                
                $.ajax({
                            type: "post",
                            url: "{{ route('depadd') }}",

                            success: function(response) {
                $('#spin').hide();
                                
                                var chklist = $('#departmentcheck');

                                response.forEach(function(department) {
                                    var checkbox = $(
                                        '<div class="col-sm-6"> <div class="form-group form-check"> <label class="form-check-label"> <input class="form-check-input" type="checkbox" '+
                                            'id="depchk'+department.Did +
                                        '" name="department[]" value="' +
                                        department.Did + '">' +
                                        department.department_name +
                                        '</label> </div></div>');
                                    // var label = $('');
                                    // chklist.append(label);
                                    chklist.append(checkbox);

                                });


                                $.ajax({
                                    type: "POST",
                                    url: "{{route('editor.institute_department_list')}}",
                                    data: {
                                        institute_id:institute_id
                                    },
                                    
                                    success: function (response) {

                                $.each(response, function(key, value) {
                                    var sla = '#depchk' + value.Did;
                                    $(sla).prop('checked', true);
                                });
                    $('#spin').hide();

                                    },
                                    error: function(error){
                                        $('#department_close').click();
               
                            $('#spin').hide();
                            if(error.responseJSON.unauthorize){
                            swal('Error !',error.responseJSON.unauthorize,'error')

                            }

                                    }
                                });


                            }
                        });







});
            // close model
            $('#department_close').click(function(){
                $('#departmentmodel').hide()
                var chklist = $('#departmentcheck');
                chklist.empty();
                
            })

            $('#only_add_dep').click(function (e) { 
                e.preventDefault();

                

                $('#spin').show();

                //strat
                $('#only_add_dep').html('saving..')
                $('#only_add_dep').attr('disabled', true)
                var departmentcheck = [];
                $('input[name="department[]"]:checked').each(function() {
                    departmentcheck.push($(this).val());
                });
           

                
                url = "{{ route('editor.add_department_license', ['Inid' => 'id']) }}";

                urll = url.replace('id', +institute_id);
                console.log(urll)
                $.ajax({
                    method: "post",
                    url: urll,

                    data: {
                        department: departmentcheck

                    },

                    success: function(response) {
                    
                        $('#spin').hide();
                        $('#only_add_dep').html('Add')
                        $('#only_add_dep').attr('disabled', false)

                        $('#department_close').click();
                        swal('Success!',
                            'Successfully Append Some Department',
                            'success');









                    },
                    error: function(error) {
                        $('#only_add_dep').html('Add')
                        $('#only_add_dep').attr('disabled', false)
                        $('#department_close').click();
                        $('#departmentmodel').hide();
                            $('#spin').hide();
                            if(error.responseJSON.unauthorize){
                            swal('Error !',error.responseJSON.unauthorize,'error')

                            }
                            console.log(error);
                            swal('Error !',error,'error')
                      

                    }
                });




            });
// end add department 



            $('.btnbackmain').click(function() {
                $('#instituteform')[0].reset();

                // $('#departmentinfo').empty();
                $('#deplist > tr > td').remove();
                $('#city').empty();
                $('#id').val('');
                
                $('.main-content').hide();
                $('.main-content.clsdashboard').show();

            });



            // script other part
            departmentstudentinfo();

        });
    </script>
@endsection
