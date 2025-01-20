<?php

use App\Http\Controllers\institute_manager\card\CardController;






       
        Route::get('student/single/download/card/{id}', [CardController::class, 'downloadCardKey']);
       


Route::group(['prefix' => 'user'],function(){

Route::group(['middleware' => 'user.auth'],function(){



//   start manager  cards routes



            
        Route::get('student/single/download/card/{id}', [CardController::class, 'downloadCardKey'])
        ->name('studentSingleCard')
        ->middleware('permission:download-card');




});

});

