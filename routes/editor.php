<?php
use App\Http\Controllers\Admin\LoginController;

use App\Http\Controllers\editor\editorController;
use App\Http\Controllers\editor\subjectController;
use App\Http\Controllers\editor\timetableController;
use App\Http\Controllers\editor\carriculumController;
use App\Http\Controllers\editor\editoruserController;
use App\Http\Controllers\editor\editorlicenseController;
use App\Http\Controllers\editor\editorinstituteController;
use App\Http\Controllers\editor\summarycurriculumController;

Route::group(['prefix' => 'user'],function(){


Route::group(['middleware' => 'user.auth'],function(){
  // start of Editor Routes 
  Route::group(['middleware' => 'user.editor'],function(){
        Route::get('sub/index',[editorController::class,'index'])
        ->name('editor.index')->middleware('permission:view-home');
        
        
        Route::get('sub/users',[editoruserController::class,'index'])
        ->name('editor.users')->middleware('permission:view-user');

        Route::get('department/student/count',[editoruserController::class,'StudentCountasDep'])
        ->name('student.count.as.dep');
        
        Route::get('user/sub/dataload',[editoruserController::class,'dataload'])
        ->name('editor.load.user')->middleware('permission:view-user');
       
        Route::get('user/sub/editor/delete/user',[editoruserController::class,'delete'])
        ->name('editor.delete.user')->middleware('permission:delete-user');

        
        Route::get('user/sub/institute',[editorinstituteController::class,'index'])
        ->name('editor.institute')->middleware('permission:view-institute');
        
        Route::get('user/sub/institute/load',[editorinstituteController::class,'load'])
        ->name('editor.load.institute')->middleware('permission:view-institute');
        
        Route::POST('user/sub/institute/store',[editorinstituteController::class,'store'])
        ->name('editor.add.institute')->middleware('permission:add-institute');
        
        Route::POST('user/sub/user/store',[editoruserController::class,'store'])
        ->name('editor.adduser')->middleware('permission:add-user');


      Route::POST('/sub/user/institute/departmentinfo',[editorinstituteController::class,'departmentinfo'])->name('editor.institute.departmentinfo')->middleware('permission:info-institute');


      

      Route::POST('/sub/user/institute/department/student',[editorinstituteController::class,'InstituteDepartmentStudent'])->name('editor.institute.department.student')->middleware('permission:view-student');


      Route::POST('/sub/user/institute/department/student/info',[editorinstituteController::class,'StudentInfo'])->name('editor.student.info')->middleware('permission:info-student');
        
        Route::post('editor/append/department/{Inid}',[editorinstituteController::class,'appenddepartment'])
        ->name('append_department');
        
        // strat of carriculum routes
        Route::get('sub/view/curriculum',[carriculumController::class,'index'])
        ->name('editor.curriculum')->middleware('permission:view-curriculum');
        
        Route::POST('sub/view/list/curriculum',[carriculumController::class,'curriculum_list'])
        ->name('curriculum_list')->middleware('permission:view-curriculum');

        Route::POST('sub/list/curriculum/remove/subject',[carriculumController::class,'remove_subject'])
        ->name('remove_subject')->middleware('permission:delete-curriculum');


        Route::POST('sub/subject/append/department',[carriculumController::class,'append_subject'])
        ->name('editor.append_subject')->middleware('permission:add-curriculum');



        // summary curriucluym

        Route::get('sub/view/summarycurriculum',[summarycurriculumController::class,'index'])
        ->name('editor.summarycurriculum')->middleware('permission:view-curriculum');
       
        Route::get('sub/view/load/summarycurriculum',[summarycurriculumController::class,'loadcurriculum'])
        ->name('editor.loadcurriculum')->middleware('permission:view-curriculum');
        
        Route::POST('sub/store/summarycurriculum',[summarycurriculumController::class,'storecurriculum'])
        ->name('editor.addcurriculum')->middleware('permission:add-curriculum');
        // end of carriculum routes


        // start of timetable route

        Route::POST('sub/timetable/store',[timetableController::class,'store'])->name('store.timetable')
        ->middleware('permission:add-timetable');

        // end of timetable route 

        // start of subjects routes

        Route::get('sub/view/subject',[subjectController::class,'index'])
        ->name('editor.subject')->middleware('permission:view-subject');
       
        Route::get('sub/load/subject',[subjectController::class,'loadsubject'])
        ->name('editor.load.subject')->middleware('permission:view-subject');
       

        Route::post('sub/store/subject',[subjectController::class,'storesubject'])
        ->name('editor.add.subject')->middleware('permission:add-subject');

        Route::get('sub/editor/delete/subject/{Sid}',[subjectController::class,'deletesubject'])
        ->name('editor.delete.subject')->middleware('permission:delete-subject');


        Route::get('sub/editor/edit/subject/{Sid}',[subjectController::class,'editsubject'])
        ->name('editor.edit.subject')->middleware('permission:edit-subject');

        Route::get('sub/subject/download-pdf/{subject}', [subjectController::class,'downloadPdf'])
        ->name('download.pdf')->middleware('permission:edit-subject');;

        // end of subjects routes

  // editor license route start
        
        Route::POST('sub/institute/department/license/{Inid}',[editorlicenseController::class,'appenddepartment'])
        ->name('editor.add_department_license')->middleware('permission:add-department_license');

        Route::POST('sub/institute/department/list/',[editorlicenseController::class,'inst_dep_list'])
        ->name('editor.institute_department_list')->middleware('permission:add-department_license');

        // editor license route end

});
});
});
