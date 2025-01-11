<?php

namespace App\Http\Controllers\general;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class studnetsearchController extends Controller
{
    //



    public function searsach(Request $req){

        $students = DB::table('students')
        ->join('institutes', 'institutes.Inid', '=', 'students.Inid')
        ->select('student_name', 'f_name', 'l_name', 'Institute_name') 
        ->where('students.kankur_no', $req->id)
        ->first();


        return $students;


    }

    public function search(Request $req){
    
    $req->validate([
    'id' => 'required|string'
]);

  
        $student = DB::table('students')
        ->join('institutes', 'institutes.Inid', '=', 'students.Inid')
        ->select('student_name', 'f_name', 'l_name', 'Institute_name') 
        ->where('students.kankur_no', $req->id)
        ->first();


       
      if($student != null){
            return $student;
        }
        return response()->json([ 'message'=>'Enter Kankoor ID is not exists']);
        


    }
}
