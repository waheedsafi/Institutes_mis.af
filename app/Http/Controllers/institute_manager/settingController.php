<?php

namespace App\Http\Controllers\institute_manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class settingController extends Controller
{
    //
    public function index(){
        return view('user.institute.setting.setting');
    }
}
