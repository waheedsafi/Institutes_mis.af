<?php

namespace App\Http\Controllers\Admin\setting;

use App\Enums\SettingEnum;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //


    public function Index(){
        return view('admin.setting.app.setting');
    }

    public function settings(){
        
        return Setting::all();

    }
    public function CurrentYear(){
        
        return Setting::find(SettingEnum::current_year);
    }


}
