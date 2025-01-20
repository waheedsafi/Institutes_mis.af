<?php


use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\institutecontroller;
use App\Http\Controllers\Admin\departmentController;
use App\Http\Controllers\Admin\permissionController;
use App\Http\Controllers\Admin\setting\SettingController;


  Route::get('Setting/CurrentYear',[SettingController::class,'CurrentYear'])->name('SettingCurrentYear');


  Route::get('App/Setting',[SettingController::class,'Index'])->name('SettingIndex');
  

Route::group(['prefix' => 'user'],function(){


Route::group(['middleware' => 'user.auth'],function(){


  Route::group(['middleware' => 'user.admin'],function(){


// for the admin
Route::get('admin/dashbord',[AdminController::class,'index'])
->name('admin.dashboard');


Route::get('admin/institute',[institutecontroller::class,'index1'])->name('admin.institute');

Route::get('admin/institute/index',[institutecontroller::class,'index'])->name('admin.institute.index');

Route::post('admin/add_institute',[institutecontroller::class,'create'])->name('admin.add_instititue');

Route::post('admin/add',[institutecontroller::class,'addInstitute'])->name('addins');


Route::get('admin/user',[userController::class,'index'])->name('admin.users');

Route::get('user/dataload',[userController::class,'dataload'])->name('admin.users.load');

Route::get('admin/add_user',[userController::class,'create'])->name('admin.add_user');

Route::post('admin/add-user',[userController::class,'adduser'])->name('adduser');

Route::get('delete_user/{user_id}',[userController::class,'delete_user'])->name('delete_user');


Route::get('edit_user/{user_id}',[userController::class,'edit_user'])->name('edit_user');




// Route::post('admin/add/user',[permission::class,'adduser'])->name('adduser');



Route::get('admin/department',[departmentController::class,'index'])->name('admin.department');

Route::get('admin/add_department',[departmentController::class,'create'])->name('admin.add_department');

Route::post('admin/adddepartment',[departmentController::class,'adddepartment'])->name('adddepartment');

Route::post('admin/update_department/{id}',[departmentController::class,'update_department'])->name('update_depdata');

Route::post('admin/delete_department',[departmentController::class,'adddepartment'])->name('delete_depdata');



// role and permission routes 


 Route::get('admin/permission',[permissionController::class,'permission'])->name('admin.permission');
Route::get('admin/permission/roles',[permissionController::class,'loadroles'])->name('admin.roleload');

Route::get('admin/role/permissions/{roleid}',[permissionController::class,'role_permission'])->name('role_permission');

Route::get('admin/permissionload',[permissionController::class,'loadpermission'])->name('loadpermission');

Route::post('admin/update/permissions/{roleid}',[permissionController::class,'updatepermission'])
->name('updatepermission');





    
Route::get('departmentlist/{inid}',[institutecontroller::class,'institute_info'])->name('institute_info');
  
  Route::get('delete_institute/{Inid}',[institutecontroller::class,'delete_institute'])->name('delete_institute');
  
  Route::get('remove_dep/{Inid}/{did}',[institutecontroller::class,'depremove'])->name('depdelete');
  
 
  Route::post('/admin/added',[institutecontroller::class,'depsave'])->name('depsave');
 
 
  Route::get('edit_institute/{Inid}',[institutecontroller::class,'update_institute'])->name('update_institute');
  Route::post('admin/updateinstitute/{id}',[institutecontroller::class,'update'])->name('updateinstitute');
  

  



// end admin
});



});
});