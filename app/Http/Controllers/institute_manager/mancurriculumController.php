<?php

namespace App\Http\Controllers\institute_manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class mancurriculumController extends Controller
{
    //
    public function index(){
        return view('user.institute.curriculum.curriculum');

    }


// function for load specific semester and department subjcts 
// public function curriculum_list(Request $req){

//     $inid= session()->get('Inid');

//     $data=DB::table('sub_in_dep')->join('subjects','subjects.Sid','=','sub_in_dep.Sid')
//     // ->join('study_plans','study_plans.subject_id','=','sub_in_dep.id')
//     ->select('sub_in_dep.id','subject_name','book_name','PDF','credit')->where('semester_no',$req->semester)
//     ->where('Did',$req->dep_id)->get();
    
//     $plandata=DB::table('sub_in_dep')->join('study_plans','study_plans.subject_id','=','sub_in_dep.id')
//     ->select('sub_in_dep.id','pdfurl')->where('institute_id',$inid)->where('semester_no',$req->semester)
//     ->where('Did',$req->dep_id)->get();
//     $data=[
//         'data'=>$data,
//         'plan'=>$plandata

//     ];
//  return $data;
    
// }
public function curriculum_list(Request $req)
{
    $inid = session()->get('Inid');

    // Retrieve data from the first query
    $subjects = DB::table('sub_in_dep')
        ->join('subjects', 'subjects.Sid', '=', 'sub_in_dep.Sid')
        ->select('sub_in_dep.id', 'subject_name', 'book_name', 'PDF', 'credit')
        ->where('semester_no', $req->semester)
        ->where('Did', $req->dep_id)
        ->get();

    // Retrieve data from the second query
    $plans = DB::table('sub_in_dep')
        ->join('study_plans', 'study_plans.subject_id', '=', 'sub_in_dep.id')
        ->select('sub_in_dep.id', 'pdfurl')
        ->where('institute_id', $inid)
        ->where('semester_no', $req->semester)
        ->where('Did', $req->dep_id)
        ->get();

    // Combine both sets of data into a single array
    $combinedData = [];
    foreach ($subjects as $subject) {
        $plan = $plans->where('id', $subject->id)->first(); // Find the corresponding plan for the subject
        $combinedData[] = [
            'id' => $subject->id,
            'subject_name' => $subject->subject_name,
            'book_name' => $subject->book_name,
            'PDF' => $subject->PDF,
            'credit' => $subject->credit,
            'pdfurl' => $plan ? $plan->pdfurl : null, // Add the plan URL if it exists
        ];
    }

    // Pass the combined data to the view
    return $combinedData;
}



    public function dep_list(){

        // return Auth()->user()->id;

        $inid= session()->get('Inid');
        

        
        
        $data=    DB::table('departments')->join('inst_dep_list','inst_dep_list.Did','=','departments.Did')->where('Inid',$inid)
        ->select('departments.Did','department_name')->get();

        return response()->json($data);
    }
}
