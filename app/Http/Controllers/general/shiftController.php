<?php

namespace App\Http\Controllers\general;

use App\Models\Shift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class shiftController extends Controller
{
    //

    public function shiftload(){

        $data = Shift::get();
        return $data;
    }
}
