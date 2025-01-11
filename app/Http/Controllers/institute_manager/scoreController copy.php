<?php

namespace App\Http\Controllers\institute_manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class scoreController extends Controller
{
    //
    public function index(){

        
        return view('user.institute.score.score');
    }


    public function semster(Request $request){

        $semester = DB::table('departments')->select('Semester_no')
        ->where('Did',$request->id)->first();
        return  $semester;

    }
    public function subject(Request $request){
        $subject =DB::table('sub_in_dep')->join('subjects','subjects.Sid','=','sub_in_dep.Sid')
        ->select('subjects.Sid','subject_name')->where('Did',$request->dep_id)
        ->where('semester_no',$request->semester)->get();
     return response()->json($subject);
    }

    public function   scoring(Request $request)
    {   
        $ins_id=session()->get('Inid');
        $student =DB::table('students')->select('Sid','student_name','f_name')
        ->where('Inid',$ins_id)->where('Did',$request->dep_id)->where('semester',$request->semester)
        ->get();
    
        return $student;

    }


    public function store_score(Request $request)
    {
      
        $rules = [
            'scores.*.testScore' => 'required|numeric|max:20',
            'scores.*.sid' => 'required|numeric|max:20',
            'scores.*.finalExamScore' => 'required|numeric|max:80',
            'semester' => 'required',
            'subject' =>'required',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules);
    
        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
     
    
        $scoresToUpdate = $request->input('scores');
        $semester=$request->input('semester');
        $subject=$request->input('subject');
        $department_id=$request->input('department');
        




       $semester_no_dep=DB::table('departments')->select('Semester_no')->where('Did',$department_id)->first();
    
       $subjects_id=DB::table('sub_in_dep')->select('Sid')->where('semester_no',$semester)
       ->where('Did',$department_id)->get();
      
        $semst;
        if($semester==$semester_no_dep){
            $semst ='';
        }
        else{
            $semst=$semester+1;
        }
       
       

          // Loop through $scoresToUpdate and update scores accordingly
    foreach ($scoresToUpdate as $score) {
        
     
        
        $sid = $score['sid'];
        $testScore = $score['testScore'];
        $finalExamScore = $score['finalExamScore'];

        // Perform the update operation for each student
     
        DB::table('scores')->insert([
            'Sid' => $subject,
            'Stuid' =>$sid,
            'semester' =>$semester,
            'test' => $testScore,
             'final' => $finalExamScore,
             
            ]);
            $chg;
            foreach($subjects_id as $id){
                $sub_id=$id->Sid;
            
              $record =  DB::table('scores') ->where('Sid', $sub_id)
              ->where('semester', $semester)
              ->where('Stuid', $sid)
              ->exists();
        
                if(!$record){
                    return 'hel';
                    $chg=false;

                    break;
                }
               
         
            }
            if($semester==$semester_no_dep){
                DB::table('students')->update([
                    'semester' =>$semst,
                    'status' =>3
                ])->where('Sid',$sid);

            }
            elseif($chg){
                DB::table('students')->update([
                    'semester' =>$semst
                ])->where('Sid',$sid);
            }

    }

        
    
        return response()->json(['message' => 'Scores updated successfully']);
    }


}
