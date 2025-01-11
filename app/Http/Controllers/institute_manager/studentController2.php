<?php

namespace App\Http\Controllers\institute_manager;


use Mpdf\Mpdf;
use \Mpdf\Mpdf as PDF; 
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Department;
use Yajra\DataTables\DataTables;
use App\Models\StudentEnrolClass;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class studentController extends Controller
{
 
 
    //
  
    public function index(){
        return view('user.institute.student.student');
    }
   

    public function studentdataload(Request $req)
    {
        $user = Auth::user();

        $instituteid = session()->get('Inid');

        // $students = DB::table('students')->join('student_enrol_classes', 'student_enrol_classes.student_id', '=', 'students.Sid')->join('classes', 'classes.id', '=', 'student_enrol_classes.class_id')->select('Sid', 'student_name', 'kankur_no', 'status', 'classes.name', 'semester')->where('students.Inid', $instituteid)->get();
        $students = DB::table('students')
        ->leftJoin('student_enrol_classes', 'student_enrol_classes.student_id', '=', 'students.Sid')
        ->leftJoin('classes', 'classes.id', '=', 'student_enrol_classes.class_id')
        ->select('Sid', 'student_name', 'kankur_no', 'status', 'classes.name', 'semester')
        // ->select('Sid', 'student_name', 'kankur_no', 'status', 'classes.name AS class_name', 'semester')
        ->where('students.Inid', $instituteid)
        ->get();

        // dd($students);

        if ($req->ajax()) {
            return DataTables::of($students)
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return 'New';
                    } elseif ($row->status == 2) {
                        return 'Active';
                    } elseif ($row->status == 3) {
                        return 'Graduated';
                    }
                })->addColumn('name',function ($row){
                    if(!$row->name){
                        return 'Only For Exam';
                    }
                    else{
                    return $row->name;
                    }
                })
                ->addColumn('action', function ($row) use ($user) {
                    if ($user->hasPermissionTo('edit-student') && $user->hasPermissionTo('delete-student')) {
                        return '<div class="btn-group"> <a href="javascript:void(0)" class="infobutton btn-secondary btn" data-id="' .
                            $row->Sid .
                            '">
                <svg class="filament-link-icon w-4 h-4 mr-1 " style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"> <path d="M433 203.2H213c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V243.3s0-0.1 0.1-0.1H433s0.1 0 0.1 0.1l-0.1 219.9zM702.5 203.2c-82.5 0-150 67.5-150 150s67.5 150 150 150 150-67.5 150-150-67.5-150-150-150z m77.7 227.7c-20.9 20.9-48.4 32.3-77.7 32.3-29.2 0-56.8-11.5-77.7-32.3-20.9-20.9-32.3-48.4-32.3-77.7 0-29.2 11.5-56.8 32.3-77.7 20.9-20.9 48.4-32.3 77.7-32.3 29.2 0 56.8 11.5 77.7 32.3 20.9 20.9 32.3 48.4 32.3 77.7 0 29.2-11.5 56.8-32.3 77.7zM431.3 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9zM812.5 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9z"  fill="#5ABE64" /></svg>
                </a>
                <a href="javascript:void(0)" class="btn btn-secondary editbutton" data-id="' .
                            $row->Sid .
                            '">

                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="24px" fill="#3C91E6"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                </a>
                <a href="javascript:void(0)" class="btn btn-secondary  text-danger delbutton" data-id="' .
                            $row->Sid .
                            '">

                <svg xmlns="http://www.w3.org/2000/svg" height="20px" class="text-danger" viewBox="0 0 24 24" width="24px" fill="#F08080"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                </a>

                ';
                    } elseif ($user->hasPermissionTo('edit-student')) {
                        return '<div class="btn-group"> <a href="javascript:void(0)" class="infobutton btn-secondary btn" data-id="' .
                            $row->Sid .
                            '">
                    <svg class="filament-link-icon w-4 h-4 mr-1 " style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"> <path d="M433 203.2H213c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V243.3s0-0.1 0.1-0.1H433s0.1 0 0.1 0.1l-0.1 219.9zM702.5 203.2c-82.5 0-150 67.5-150 150s67.5 150 150 150 150-67.5 150-150-67.5-150-150-150z m77.7 227.7c-20.9 20.9-48.4 32.3-77.7 32.3-29.2 0-56.8-11.5-77.7-32.3-20.9-20.9-32.3-48.4-32.3-77.7 0-29.2 11.5-56.8 32.3-77.7 20.9-20.9 48.4-32.3 77.7-32.3 29.2 0 56.8 11.5 77.7 32.3 20.9 20.9 32.3 48.4 32.3 77.7 0 29.2-11.5 56.8-32.3 77.7zM431.3 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9zM812.5 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9z"  fill="#5ABE64" /></svg>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-secondary editbutton" data-id="' .
                            $row->Sid .
                            '">

                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="24px" fill="#3C91E6"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                    </a>


                    ';
                    } elseif ($user->hasPermissionTo('delete-student')) {
                        return '<div class="btn-group"> <a href="javascript:void(0)" class="infobutton btn-secondary btn" data-id="' .
                            $row->Sid .
                            '">
                    <svg class="filament-link-icon w-4 h-4 mr-1 " style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"> <path d="M433 203.2H213c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V243.3s0-0.1 0.1-0.1H433s0.1 0 0.1 0.1l-0.1 219.9zM702.5 203.2c-82.5 0-150 67.5-150 150s67.5 150 150 150 150-67.5 150-150-67.5-150-150-150z m77.7 227.7c-20.9 20.9-48.4 32.3-77.7 32.3-29.2 0-56.8-11.5-77.7-32.3-20.9-20.9-32.3-48.4-32.3-77.7 0-29.2 11.5-56.8 32.3-77.7 20.9-20.9 48.4-32.3 77.7-32.3 29.2 0 56.8 11.5 77.7 32.3 20.9 20.9 32.3 48.4 32.3 77.7 0 29.2-11.5 56.8-32.3 77.7zM431.3 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9zM812.5 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9z"  fill="#5ABE64" /></svg>
                    </a>

                    <a href="javascript:void(0)" class="btn btn-secondary  text-danger delbutton" data-id="' .
                            $row->Sid .
                            '">

                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" class="text-danger" viewBox="0 0 24 24" width="24px" fill="#F08080"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                    </a>

                    ';
                    } else {
                        return '<div class="btn-group"> <a href="javascript:void(0)" class="infobutton btn-secondary btn" data-id="' .
                            $row->Sid .
                            '">
                    <svg class="filament-link-icon w-4 h-4 mr-1 " style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"> <path d="M433 203.2H213c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V243.3s0-0.1 0.1-0.1H433s0.1 0 0.1 0.1l-0.1 219.9zM702.5 203.2c-82.5 0-150 67.5-150 150s67.5 150 150 150 150-67.5 150-150-67.5-150-150-150z m77.7 227.7c-20.9 20.9-48.4 32.3-77.7 32.3-29.2 0-56.8-11.5-77.7-32.3-20.9-20.9-32.3-48.4-32.3-77.7 0-29.2 11.5-56.8 32.3-77.7 20.9-20.9 48.4-32.3 77.7-32.3 29.2 0 56.8 11.5 77.7 32.3 20.9 20.9 32.3 48.4 32.3 77.7 0 29.2-11.5 56.8-32.3 77.7zM431.3 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9zM812.5 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9z"  fill="#5ABE64" /></svg>
                    </a>



                    ';
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return response()->json(['message' => 'Not an AJAX request'], 400);
    }




    public function dep_list(Request $req)
    {


        $inid = session()->get('Inid');

    
        $depdata =DB::table('departments')->join('inst_dep_list','inst_dep_list.Did','=','departments.Did')
        ->select('departments.Did','department_name')->where('inst_dep_list.Inid',  $inid)->get();
         
            $datacity =   DB::table('citys')->select('id','city')->get();
            
         
            $datalist =[$depdata,$datacity];
            return response()->json($datalist);
    
    
    }





public function storestudent(Request $req){


    
    $requestData = $req->all();

    // Modify specific fields in the request data
    $requestData['persentage'] = $this->modifyData($requestData['persentage']);
    $requestData['nid'] = $this->modifyData($requestData['nid']);
    $requestData['phone'] = $this->modifyData($requestData['phone']);

    // Update the request data with the modified values
    $req->replace($requestData);
    
    // return $req;
    
    $req->validate([
          
        'name' => 'required|min:3|max:30',
        'city' => 'required|integer',
        'fname' => 'required',
        'gfname' =>'required',

        'DOB' => 'required',
        'schooldate' => 'required',

        'gender' => 'required|in:0,1',
        'department' => 'required|integer',
        'photo'=>'mimes:jpeg,jpg,png,gif|max:1024',
        'scanfile'=>'mimes:pdf,docx|max:2048',
        // 'nid'=>'integer',
        'persentage'=>'numeric|max:100', 
        'phone'=>'required|numeric|unique:students,phone',
       


    ]);
    

    $inid = session()->get('Inid');
    $city =DB::table('institutes')->join('citys','citys.id','=','institutes.city')
    ->select('citys.en_name')->where('Inid',$inid)->first()->en_name;
   
   
     $short_city = substr($city, 0, 3);
     $last_student_id = DB::table('students')->orderBy('Sid', 'desc')->first()->Sid+1;
 

        // student class and shifting 
    $select_class_id;
    
    $class_id = DB::table('students')->join('student_enrol_classes','Sid','=','student_id')
    ->where("Inid",$inid)->where('Did',$req->department)->where('semester',1)->where('gender',$req->gender)
    ->where('shift_id',$req->shift)->orderBy('Sid','desc')->select('class_id')->first();

    if($class_id){
        $count = DB::table('students')->join('student_enrol_classes','Sid','=','student_id')
        ->where("Inid",$inid)->where('Did',$req->department)->where('semester',1)->where('gender',$req->gender)
        ->where('shift_id',$req->shift)->orderBy('Sid','desc')->select('class_id')->count();
   
        if ($count == 35) {
            $new_class_id = DB::table('classes')
                ->where('id', '>', $class_id->class_id) // Filter records where 'id' is greater than the provided $class_id
                ->where('gender_type', $req->gender) // Filter records based on the gender type specified in the request
                ->min('id'); // Get the minimum value of the 'id' column that meets the conditions

            $select_class_id = $new_class_id;
        } else {
            $select_class_id = $class_id->class_id;
        }
    } else {
        $new_class_id = DB::table('classes')
            ->where('gender_type', $req->gender) // Filter records based on the gender type specified in the request
            ->min('id'); // Get the minimum value of the 'id' column that meets the conditions

        $select_class_id = $new_class_id;
    }
     
    




        //end  student class and shifting 




        

//    return $short_city;

    // Assuming $institute_id contains the institute ID
        // Replace with the actual institute ID
        $date = date('Ymd'); // Get the current date in the format YYYYMMDD
   
        $random_id =$short_city.'-'  .$inid . '-' . $date . '-'.$last_student_id; // Generate a unique ID with a prefix

        // return $random_id;
       
        
    
      
    if($req->student_id){
        $response = DB::table('students')->where('Sid', $req->student_id)->first();

        if(!$response){
            abort(404);
        }
        $student=Student::find($req->student_id);
   

    $photopath = $student->photo;
    if ($req->has('photo')) {
        // Delete old photo
        if ($photopath && Storage::disk('public')->exists($photopath)) {
            Storage::disk('public')->delete($photopath);
        }
        
        $file = $req->file('photo');
        $filename = $req->name . '.' . time() . '.' . $file->getClientOriginalName();
        $photopath = $file->storeAs('studentimages', $filename, 'public');
        $photopath = 'storage/' . $photopath;
    }

    $infopdf = $student->pdf;
    if ($req->has('scanfile')) {
        // Delete old file
        if ($infopdf && Storage::disk('public')->exists($infopdf)) {
            Storage::disk('public')->delete($infopdf);
        }

        $file = $req->file('scanfile');
        $filename = $req->name . '.' . time() . '.' . $file->getClientOriginalName();
        $infopdf = $file->storeAs('studentinfo', $filename, 'public');
        $infopdf = 'storage/' . $infopdf;
    } 

    $student->update([
        'student_name' => $req->name,
        'f_name' => $req->fname,
        'l_name' => $req->lname,
        'g_f_name' => $req->gfname,
        'school_graduation' => $req->schooldate,
        'percentage' => $req->persentage,
        'Did' => $req->department,
        'gender' => $req->gender,
        'photo' => $photopath,
        'nid' => $req->nid,
        'pdf' => $infopdf,
        'DOB' => $req->DOB,
        'city' => $req->city,
        'phone' => $req->phone,
        'updated_at' => now()
    ]);

    return response()->json([ 
        'message' => 'Successfully updated student'
    ], 200);
}
    
    else{

              
                $photopath ;
                if($req->has('photo')){
                   $file = $req->file('photo');
                   $filename = $req->name . '.' . time() . '.' . $file->getClientOriginalName();
                   $photopath=$file->storeAs('studentimages',$filename,'public');
                   $photopath='storage/'.$photopath;
                  

                }else{
                   $photopath ='';
                }
                $infopdf ;
                if($req->has('scanfile')){
                                       
                   $file = $req->file('scanfile');
                   $filename = $req->name . '.' . time() . '.' . $file->getClientOriginalName();
                   $infopdf=$file->storeAs('studentinfo',$filename,'public');
                   
                   $infopdf='storage/'.$infopdf;
                //    return $infopdf;
                }else{
                   $infopdf ='';
                }       
                $student = new Student();
                $student->student_name=$req->name;
                $student->f_name=$req->fname;
                $student->l_name=$req->lname;
                $student->g_f_name=$req->gfname;
                $student->kankur_no=$random_id;
                $student->Inid=$inid;
                $student->school_graduation=$req->schooldate;
                $student->percentage=$req->persentage;
                $student->Did=$req->department;
                $student->status=2;
                $student->gender=$req->gender;
                $student->photo=$photopath;
                $student->semester=1;
                $student->nid=$req->nid;
                $student->pdf=$infopdf;
                $student->DOB=$req->DOB;
                $student->city=$req->city;
                $student->phone=$req->phone;
                $student->created_at = now();
                $student->save();

                $student_id=$student->Sid;
                $enrol = new StudentEnrolClass();
                $enrol->student_id=$student_id;
                $enrol->class_id=$select_class_id;
                $enrol->shift_id=$req->shift;
                $enrol->save();
                

                
    return response()->json([ 
        'message' => 'Successfuly add Student'

            ],201);}

      


        }

        public function delete_student( $Stuid){

             
            $respose = DB::table('students')->where('Sid',$Stuid)->first();
            if(! $respose){
                abort(404);
           
            }
            else{
                    DB::table('students')->where('Sid',$Stuid)->delete();
            return response()->json([ 
                'message' => 'Row by ID: '.$Stuid.' successfuly Deleted.'
        
                    ],201);
            
                }
        
}

public function edit_student(string $Stuid){
       
       
    $response = DB::table('students')->where('Sid', $Stuid)->first();

    
    if(! $response){
        abort(404);
   
    }
    
    return $response; 

}



    // download cards of kankur exam
    public function download_cards(){
        

        $inid = session()->get('Inid');
        $inst_name =DB::table('institutes')->join('citys','citys.id','=','institutes.city')
        ->select('institute_name' , 'citys.city')->where('Inid',$inid)->get();
          
          $students = DB::table('students')->join('departments','departments.Did','=','students.Did')
          ->where('Inid',$inid)
          ->where('status',1)->get(); // Retrieve all students using the query builder
  
      
       
          $data = [
              'students' => $students,
              'institute' => $inst_name
      
      
          ];
        //   return  $data['institute'][0]->institute_name;
  
          $mpdf = new Mpdf();
    $mpdf -> autoScriptToLang =true;
    $mpdf -> autoLangToFont =true;
    $mpdf->WriteHTML(view('user.institute.student.studentcards', $data));
  
    $mpdf->Output();
        
        //   $mpdf->WriteHTML($pdf);
        //   $mpdf->Output();
  
          
      }


















    public function student(){
        $data =DB::table('students')->get();
       return $data;
    
    }


public function storexists(Request $req){
    return $req;
}

    public function storestudentexists(Request $req)
    {
        $inid = session()->get('Inid');

        $requestData = $req->all();

        // Modify specific fields in the request data

        
    
        // return $requestData['persentage'];
    
        $requestData['persentage'] = $this->modifyData($requestData['persentage']);
        $requestData['nid'] = $this->modifyData($requestData['nid']);
        $requestData['phone'] = $this->modifyData($requestData['phone']);
        $requestData['kankur_id'] = $this->modifyData($requestData['kankur_id']);
        $latestRecord = Department::select('Semester_no')->where('Did', $req->department)->latest()->first();
        $requestData['semester'] = $latestRecord->Semester_no;
        // Update the request data with the modified values
        $req->replace($requestData);

    // return $req;
        $req->validate([
            'name' => 'required|min:3|max:30',
            'city' => 'required|integer',
            'fname' => 'required',
            'gfname' =>'required',

            'DOB' => 'required',
            'schooldate' => 'required',

            'gender' => 'required|in:0,1',
            'department' => 'required|integer',
            'photo' => 'mimes:jpeg,jpg,png,gif|max:1024',
            'scanfile' => 'mimes:pdf,docx|max:2048',
            // 'nid' => 'integer',
            'persentage' => 'numeric|max:100',
            'phone' => 'required|numeric|unique:students,phone',
            'kankur_id' => 'required',
            'semester' => 'required',
        ]);

        $photopath;
        if ($req->has('photo')) {
            $file = $req->file('photo');
            $filename = $req->name . '.' . time() . '.' . $file->getClientOriginalName();
            $photopath = $file->storeAs('studentimages', $filename, 'public');
            $photopath = 'storage/' . $photopath;
        } else {
            $photopath = '';
        }
        $infopdf;
        if ($req->has('scanfile')) {
            $file = $req->file('scanfile');
            $filename = $req->name . '.' . time() . '.' . $file->getClientOriginalName();
            $infopdf = $file->storeAs('studentinfo', $filename, 'public');
            $infopdf = 'storage/' . $infopdf;
        } else {
            $infopdf = '';
        }
        $student = new Student();
        $student->student_name = $req->name;
        $student->f_name = $req->fname;
        $student->l_name = $req->lname;
        $student->g_f_name = $req->gfname;
        $student->kankur_no = $req->kankur_id;
        $student->Inid = $inid;
        $student->school_graduation = $req->schooldate;
        $student->percentage = $req->persentage;
        $student->Did = $req->department;
        $student->status = 2;
        $student->gender = $req->gender;
        $student->photo = $photopath;
        $student->semester = $req->semester;

        $student->nid = $req->nid;
        $student->pdf = $infopdf;
        $student->DOB = $req->DOB;
        $student->city = $req->city;
        $student->phone = $req->phone;
        $student->created_at = now();
        $student->save();

        // $student_id = $student->Sid;
        //     $enrol = new StudentEnrolClass();
        //     $enrol->student_id = $student_id;
        //     $enrol->class_id = "";
        //     $enrol->shift_id = "";
        //     $enrol->save();

        return response()->json(
            [
                'message' => 'Successfuly add Student',
            ],
            201,
        );
    }



}
