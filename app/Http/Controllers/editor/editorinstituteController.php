<?php

namespace App\Http\Controllers\editor;

use App\Models\Institute;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Student;


class editorinstituteController extends Controller
{
    //

    public function index(){
        return view('editor.institute.institute');
    }

    public function load(Request $req){

     
        $studentCountSubquery = DB::table('students')
        ->select('students.Inid', DB::raw('COUNT(*) as student_count'))
        ->groupBy('students.Inid');

        $dataa = DB::table('institutes')
        ->join('citys', 'citys.id', '=', 'institutes.city')
        ->leftJoinSub($studentCountSubquery, 'student_counts', function ($join) {
            $join->on('institutes.Inid', '=', 'student_counts.Inid');
        })
        ->select('institutes.Inid', 'institutes.Institute_name', 'institutes.create_date', 'citys.city', 'institutes.status', 'student_counts.student_count')
        ->get();
                                 
  
    
        if($req->ajax()){
            return DataTables::of($dataa)->addColumn('status',function($row){if($row->status==1){return 'Active';}else{return 'Block';}})
            ->rawColumns(['action'])
            ->make(true);
      

        } 
        return 'faild';



}


                public function store(Request $req){
        
 
       
                    $req->validate([
                          
                        'name' => 'required|min:3|max:30|unique:institutes,Institute_name',
                        'CEO' => 'required',
                        'city' => 'required'
                
                    ]);
   
                    if($req->institute_id){
                        $institute = institute::where('Inid',$req->institute_id);
                        if(!$institute){
                            abort(404);
                        }
                        $institute->update([
                        'Institute_name'=>$req->name,
                        'city'=>$req->city,
                        'location'=>$req->location,
                        'CEO'=>$req->CEO,
                        'status'=>$req->status,
                        'create_date'=>$req->create_date,
                        'founder'=>$req->founder
                
                
                        ]);
                        return response()->json([ 
                            'message' => 'Row by ID: '.$req->institute_id.' successfuly Updated.'
                    
                                ],201);
                    
                            }
                            else{
                
                              
                               
                 
                       $institute = new Institute();
                        $institute->Institute_name = $req->name;
                        $institute->city = $req->city;
                        $institute->location = $req->location;
                        $institute->CEO = $req->CEO;
                        $institute->status = $req->status;
                        $institute->create_date = $req->create_date;
                        $institute->founder = $req->founder;
                        $institute->save();
                 

                        $institute_id = $institute->Inid;
                            
                    return response()->json([ 
                        'message' => 'successfuly add institute',
                        'institute_id' =>$institute_id
                
                            ],201);}
                
                   
                
                
                
                
                    }

                    public function appenddepartment(Request $request,$Inid){

                        $selecteddepartment = $request->input('department');
            
                        // Update the role's permissions using the query builder
                        DB::table('inst_dep_list')->where('Inid', $Inid)->delete(); // Remove existing permissions
                        foreach ($selecteddepartment as $departmentid) {
                            DB::table('inst_dep_list')->insert(['Inid' =>$Inid,
                             'Did' => $departmentid,
                            'add_date'=> Carbon::now(),
                                ]);
                        }
                
                        return response()->json(['message' => 'Department append successfully'], 200);
                 
            
            
                    }


   
                    public function departmentinfo(Request $req) {
    try {
        // Fetch the count of students per department along with the department ID
        $countByDepartment = DB::table('students')
            ->join('departments', 'students.Did', '=', 'departments.Did')
            ->select('departments.Did', 'departments.department_name', DB::raw('count(*) as total'))
            ->groupBy('departments.Did', 'departments.department_name')
            ->where('students.Inid',$req->Inid)->get();
            
        // Return the result as a JSON response
        return response()->json( $countByDepartment, 200);

    } catch (\Exception $e) {
        // Handle any errors
        return response()->json(['error' => 'Something went wrong. Please try again later.'], 500);
    }
}

        

public function InstituteDepartmentStudent(Request $req)
{
    $data = Student::select('Sid', 'student_name', 'f_name', 'semester', 'semester_type')
        ->leftjoin('student_enrol_classes', 'student_id', '=', 'Sid')
        ->where('Inid', $req->inst_id)
        ->where('Did', $req->dep_id)
        ->get();

    // Check if the request is an AJAX request
    if ($req->ajax()) {
        // You can directly return the data as JSON
        return response()->json($data);
    }

    return 'failed';
}
      
               
            
              
               
public function StudentInfo(Request $req){

    
    try {
        $data = Student::join('departments', 'departments.Did', '=', 'students.Did')
        ->leftJoin('student_enrol_classes', 'student_enrol_classes.student_id', '=', 'students.Sid')
        ->leftJoin('shifts', 'student_enrol_classes.shift_id', '=', 'shifts.id')
        ->join('citys', 'students.city', '=', 'citys.id')  // Specify 'students.city' here
        ->where('students.Sid', $req->student_id)
        ->first();

    return $data;
        } catch (\Exception $e) {
            // Handle the exception and return a response or log the error
            return response()->json([
                'message' => 'An error occurred while fetching the student data',
                'error' => $e->getMessage()  // Get the exception message for debugging
            ], 500);
        }


}






               
               
                        }


  

