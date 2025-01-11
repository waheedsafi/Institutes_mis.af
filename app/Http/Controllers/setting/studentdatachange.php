<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class studentdatachange extends Controller
{
    //

    public function change(Request $req){
        
       $data= DB::table('students')->select('Sid','school_graduation')->get();


       foreach ($data as $student) {
        // Extract the year from the school_graduation date
        $year = Carbon::parse($student->school_graduation)->year;
        // return $year;
        // Update the record with just the year
        DB::table('students')->where('Sid', $student->Sid)->update(['school_graduation' => $year]);
    }

    
    return'succussfuly complete';

    }
}
