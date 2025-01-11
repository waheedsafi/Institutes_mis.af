<?php


use App\Http\Controllers\institute_manager\managerController;
use App\Http\Controllers\institute_manager\settingController;
use App\Http\Controllers\institute_manager\studentController;
use App\Http\Controllers\institute_manager\teacherController;
use App\Http\Controllers\institute_manager\studyplanController;
use App\Http\Controllers\institute_manager\mancurriculumController;
use App\Http\Controllers\institute_manager\scoreController;
use App\Http\Controllers\institute_manager\mansummarycurriculumController;




Route::group(['prefix' => 'user'],function(){

Route::group(['middleware' => 'user.auth'],function(){



//   start manager routes



Route::get('manager/index',[managerController::class,'index'])
    ->name('manager.index')->middleware('permission:view-home');
    
    Route::get('manager/setting',[settingController::class,'index'])
    ->name('manager.setting')->middleware('permission:view-setting');
    
    Route::post('/manager/change/photo',[managerController::class,'change_photo'])
    ->name('manager.change_photo')->middleware('permission:change-photo');

    Route::post('/manager/change/password',[managerController::class,'change_password'])
    ->name('manager.change_password')->middleware('permission:change-password');


    Route::get('manager/student',[studentController::class,'index'])
    ->name('manager.student')
    ->middleware('permission:view-student');

    Route::get('manager/studentlist',[studentController::class,'studentdataload'])
    ->name('manager.studentload')
    ->middleware('permission:view-student');
    
    Route::post('/manager/det_city_list',[studentController::class,'dep_list'])
    ->name('dep_city_list');
    
    Route::post('/manager/store/student',[studentController::class,'storestudent'])
    ->name('storestudent')->middleware('permission:add-student');

    Route::post('/manager/store.exists/student',[studentController::class,'storestudentexists'])
    ->name('store_exists_student')->middleware('permission:add-exists-student');

    

    Route::get('manager/delete_student/{Stuid}',[studentController::class,'delete_student'])
    ->name('delete_student')->middleware('permission:delete-student');

    
    Route::get('manager/edit_student/{Stuid}',[studentController::class,'edit_student'])
    ->name('edit_student')->middleware('permission:edit-student');

    Route::get('manager/info_student', [studentController::class, 'info_student'])
    ->name('info_student')
    ->middleware('permission:info-student');


            
        Route::get('manager/download_cards/{range}', [studentController::class, 'download_cards'])
        ->name('studnet.downloadcards')
        ->middleware('permission:download-card');

        

        
        Route::get('manager/totalcount/download_cards', [studentController::class,'download_cards_count'])
        ->name('download_card_count')
        ->middleware('permission:download-card');

    Route::get('manager/teacher',[teacherController::class,'index'])
    ->name('manager.teacher')->middleware('permission:view-teacher');

    Route::get('manager/teacherlist',[teacherController::class,'teacherdataload'])
    ->name('manager.teacherload')->middleware('permission:view-teacher');

    Route::post('/manager/store/teacher',[teacherController::class,'storeteacher'])
    ->name('storeteacher')->middleware('permission:add-teacher');

    Route::get('manager/edit_teacher/{teachid}',[teacherController::class,'edit_teacher'])
    ->name('edit_teacher')->middleware('permission:edit-teacher');

    Route::get('manager/info_teacher/{teachid}',[teacherController::class,'edit_teacher'])
    ->name('info_teacher')->middleware('permission:info-teacher');

    Route::get('manager/delete_teacher/{teachid}',[teacherController::class,'delete_teacher'])
    ->name('delete_teacher')->middleware('permission:delete-teacher');


    
    
    Route::get('manager/view/score',[scoreController::class,'index'])
    ->name('manager.scoring')->middleware('permission:view-score');
    
  
    
    Route::get('manager/semester/subject',[scoreController::class,'subject'])
    ->name('sem_sub_list');
    
    Route::post('manager/student/scoring',[scoreController::class,'scoring'])
    ->name('scoring')->middleware('permission:view-score');

    Route::post('manager/score/store',[scoreController::class,'store_score'])
    ->name('store.score')->middleware('permission:add-score');

// manager carriculm routes 

  
Route::get('manager/curriculum/books',[mancurriculumController::class,'index'])
->name('manager.curriculum')->middleware('permission:view-curriculum');

Route::get('manager/department/list',[mancurriculumController::class,'dep_list'])
->name('institute.department');

Route::POST('manager/view/list/curriculum',[mancurriculumController::class,'curriculum_list'])
->name('manager.curriculum.list')->middleware('permission:view-curriculum');

// summary curriculum 


Route::get('manager/curriculum',[mansummarycurriculumController::class,'index'])
->name('manager.summarycurriculum')->middleware('permission:view-curriculum');

Route::get('manager/load/curriculum',[mansummarycurriculumController::class,'loadcurriculum'])
->name('manager.loadcurriculum')->middleware('permission:view-curriculum');;




// manager study_plan

    Route::post('manager/curriculum/study.plan',[studyplanController::class,'check'])
    ->name('manager.study_plan')->middleware('permission:add-studyplan');
    
    
    Route::post('manager/curriculum/study.plan/update',[studyplanController::class,'update'])
    ->name('manager.update.studyplan')->middleware('permission:add-studyplan');




// manager carriculm routes 

// Croquis routes

Route::get('manager/croquis/view',[mancurriculumController::class,'index'])
->name('manager.croquis')->middleware('permission:view-croquis');




// croquis end routes
// end of manager routes

});

});

