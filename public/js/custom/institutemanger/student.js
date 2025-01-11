function student(){

    //   info student
    $('body').on('click', '.infobutton', function() {
      var id = $(this).data('id');
      $('#spin').show();
      $('.infobutton').attr('disabled', true);
      stud_id = id;
      var url =studentinfourl
      infourl = url.replace(':studentId', id);
      fetchstudentinfo(infourl,stud_id);
   
  //   end info student



});

 }

function fetchstudentinfo(infourl,stud_id){


  $.ajax({
    url: infourl,
    data: {student_id: stud_id},
    method: 'GET',
    success: function(response) {


      
              $('.main-content').hide();
              $('.clsinfo-student').show();
              updateStudentInfomodel(response);
              $('#spin').hide();




    },
    error: function(error) {
        // console.log(error)
        $('#spin').hide();

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