<?php

namespace App\Http\Controllers\editor;

use App\Models\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class timetableController extends Controller
{
    //


    public function store(Request $req)
    {

       $exist= DB::table('time_tables')->join('sub_in_dep','sub_in_dep.id','=','time_tables.subject_id')
        ->where('Did',$req->dep_id)->where('semester_no',$req->semester);
        
     

        if($exist->exists()){

            $data= DB::table('time_tables')->join('sub_in_dep','sub_in_dep.id','=','time_tables.subject_id')
            ->where('Did',$req->dep_id)->where('semester_no',$req->semester)->select('time_tables.id')->get();
          
            foreach($data as $id){
            $timet=TimeTable::find($id->id);
            $timet->delete();
           
            }

        }



        foreach ($req->data as $item) {
            
      
            if ($item['sub_Id']) {
                $timetable= new TimeTable();
                $timetable->subject_id=$item['sub_Id'];
                $timetable->day_id=$item['day'];
                $timetable->save();
                 
            }
      
            
    
        }
    
        return response()->json(['message' => 'Data saved successfully'],200);
        // Return a response if necessary
      

    }
}

