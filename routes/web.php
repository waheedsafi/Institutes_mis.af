<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\role\permission;
use App\Http\Controllers\general\dayController;
use App\Http\Controllers\general\shiftController;
use App\Http\Controllers\file\fileUploadController;
use App\Http\Controllers\general\studnetsearchController;
use App\Http\Controllers\setting\studentdatachange;
use App\Http\Controllers\Admin\institutecontroller;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\institute_manager\scoreController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/downloadallfiletostorage',[fileUploadController::class ,'downloadFolder']);

Route::get('/changedata',[studentdatachange::class,'change']);


Route::get('/test-db-connection', function () {
    try {
        DB::connection()->getPdo();
        return "Database connection is successful.";
    } catch (\Exception $e) {
        return "Database connection failed: " . $e->getMessage();
    }
});

Route::get('/', function () {
    return view('welcome2');
})->name('welcome');

Route::POST('/studentsearch',[studnetsearchController::class,'search'])->name('search_student');

Route::get('/about', function () {
    return view('about');

});

Route::group(['prefix' => 'user'],function(){

Route::group(['middleware' => 'user.auth'],function(){
 
                    // NO PRIVACY ROUTE 

                    Route::post('/admin/institute_list',[userController::class,'institute_list'])->name('institute_list');

                    Route::post('/admin/add/dep',[institutecontroller::class,'depaddtoinst'])->name('depadd');

                    Route::get('manager/department/semster',[scoreController::class,'semster'])
                    ->name('dep_sem_list');

                    Route::get('day/load',[dayController::class,'load'])->name('day.load');

                    Route::get('shift/load',[shiftController::class,'shiftload'])->name('load.shift');

                    Route::post('/large/file/upload', [fileUploadController::class, 'uploadLargeFiles'])->name('files.upload.large');

                    // END 



                    Route::get('/testp',[testController::class,'index'])->middleware('permission:view-sudent ');



   
});
});


require __DIR__.'/auth.php';
require __DIR__.'/editor.php';
require __DIR__.'/admin.php';
require __DIR__.'/manager.php';
require __DIR__.'/manager/cards.php';
    
