function departmentstudentinfo() {

    // Handle the click event for department info
    $('body').on('click', '.btndepartmentinfo', function () {
      
        let department_id = $(this).data('id'); // Get department ID
        $('.main-content').hide();
        $('.clsdepartmentstudent').show();
        $('#spin').show();
  
   

        // Fetch department student data
        fetchDepartmentStudentData(institutefordepart, department_id);
    });
  
  
  
    $('body').on('click', '.btndepartmentstudent', function () {
      
      let student_id = $(this).data('id'); // Get department ID
    
      $('#spin').show();
  
      // Fetch department student data
      fetchStudentInfoData(student_id);
  });
 
//   BACK TO DEPARTMENT STUDENT
                backfromstudentinfo();

// back to institute info
                backfromdepartmentstudent()
}
  
  function fetchStudentInfoData(student_id){
  
  
      $.ajax({
          type: "POST",
          url: studentinfodataroute,
          data: {
              student_id : student_id 
          },
         
          success: function (response) {
             
              $('.main-content').hide();
              $('.clsdepartmentstudentinfo').show();
              updateStudentInfomodel(response);
              $('#spin').hide();
  
  
          }
          ,
          error: function (error){
              $('#spin').hide();
              if (error.responseJSON.unauthorize) {
                  swal('Error!', error.responseJSON.unauthorize, 'error');
              }
          }
      });
  }
  function updateStudentInfomodel(response){
  
      
  
      var student_name = response.student_name.charAt(0)
      .toUpperCase() + response.student_name.slice(1);
  
  
  studnetphoto = changablesrc.replace(':changeurl',
      response.photo)

      
  studnetfile = changablesrc.replace(':changeurl',
    response.pdf)
  $('#spin').hide();
      
  
      $('#infophoto').attr('src', '')
      $('#infophotolink').attr('href', '')
  
  $('#infophoto').attr('src', studnetphoto)
  $('#infophotolink').attr('href', studnetphoto)
  
  $('#infokankur').html('');
  $('#infokankur').html(response.kankur_no);
  $('#infoname').html('');
  $('#infoname').html(student_name + '  ' + response
      .l_name);
  $('#infophone').html('');
  $('#infophone').html(response.phone);
  $('#infofname').html('');
  $('#infofname').html(response.f_name);
  $('#infolname').html('');
  $('#infolname').html(response.l_name);
  
      
  let status = 'New';
  
  if(response.status === 1){
      status ='نوی'
  
  }
  if(response.status === 2){
      status ='فعال'
  
  }
  if(response.status === 3){
      status ='فارغ'
  
  }
  $('#infostatus').html('');
  
  $('#infostatus').html(status);
  
  $('#infodob').html('');
  $('#infodob').html(response.DOB);
  
  $('#infosemester').html('');
  
  $('#infosemester').html(response.semester);
  
  
  $('#infogfname').html('');
  $('#infogfname').html(response.g_f_name);
  
  $('#infodepartment').html('');
  $('#infodepartment').html(response.department_name);
  
  
  
  $('#schoolgr').html('');
  $('#schoolgr').html(response.school_graduation);
  
  
  $('#infoPersentage').html('');
  $('#infoPersentage').html(response.percentage);
  
  
  
  $('#infonid').html('');
  $('#infonid').html(response.nid);
  
  
  $('#infophone').html('');
  $('#infophone').html('0'+response.phone);
  
  
  $('#infosemester_type').html('');
  
  semester_t ='بهاری'
  if(response.semester_type === 1){
      semester_t ='خزانی'
  }
  $('#infosemester_type').html(semester_t);
  
  
  $('#infoshifts').html('');
  $('#infoshifts').html(response.name);
  
  
  
  gender = 'نارینه'
  if (response.gender == 0) {
      gender = 'ښځینه'
  }
  $('#infogender').html('');
  
  $('#infogender').html(gender)
  
  $('#infocity').html('')
  $('#infocity').html(response.city)
  


$('#infopdfurl').attr('href','')

  if (response.pdf){
    $('#infopdfurl').attr('href',studnetfile)

  }
  else{
    $('#infopdfurl').attr('href', 'about:blank');
  }

  
  
  
  }
  
  
  

  // Function to fetch department student data via AJAX
  function fetchDepartmentStudentData(instituteId, departmentId) {
    $.ajax({
        type: "post",
        url: institutedepartmentstudentroute, // Ensure this variable is passed correctly
        data: {
            inst_id: instituteId,
            dep_id: departmentId
        },
        success: function (response) {
            $('#spin').hide();
            // Update DataTable with the response data
            updateDepartmentStudentTable(response);
        },
        error: function (error) {
            $('#spin').hide();
            if (error.responseJSON.unauthorize) {
                swal('Error!', error.responseJSON.unauthorize, 'error');
            }
        }
    });
  }
  
  // Function to initialize or update the DataTable
  function updateDepartmentStudentTable(response) {
    if ($.fn.DataTable.isDataTable('#departmentstudenttable')) {
        $('#departmentstudenttable').DataTable().clear().destroy();
}

    if (Array.isArray(response)) {
      let table = $('#departmentstudenttable').DataTable({
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
      response.forEach(function (student) {
          table.row.add([
              student.Sid,
              student.student_name,
              student.f_name,
              student.semester_type === 1 ? 'خزانی' : student.semester_type === 0 ? 'بهاری' : 'فارغ',
              student.semester,
              
              `<div class="btn-group">
                   <div class="btn-group">
              <a href="javascript:void(0)" class="btndepartmentstudent btn-secondary btn" data-id="${student.Sid}">
                  <svg class="filament-link-icon" width="24" height="24">
                
                    <use xlink:href="${infoicon}"></use>
  
  
                  </svg>
              </a>
              </div>`
          ]).draw(false);
      });
  } else {
      console.error("Response is not an array:", response);
  }
  }
  

  function backfromstudentinfo(){

    $('#backfromstudentinfo').click(function (e) { 
        e.preventDefault();

        $('.main-content').hide();
        $('.clsdepartmentstudent').show();
       
        
    });
    


  }

  function backfromdepartmentstudent(){

    $('#backfromdepartmentstudent').click(function (e) { 
        e.preventDefault();

        $('.main-content').hide();
        $('.clsinstituteinfo').show();
       
        
    });
  }