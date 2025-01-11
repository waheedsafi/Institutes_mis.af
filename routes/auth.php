<?php
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\logoutController;


Route::group(['middleware' => 'user.guest'],function(){

// Route::get('/Login',[LoginController::class,'login'])->name('user.login');
Route::get('Login',[LoginController::class,'login'])->middleware(['role-mid'])->name('UserLogin');
Route::POST('authenticate',[LoginController::class,'authenticate'])->name('user.authenticate');

});
Route::group(['middleware' => 'user.auth'],function(){

Route::get('logout',[logoutController::class,'logout'])->name('adminlogout');

});
