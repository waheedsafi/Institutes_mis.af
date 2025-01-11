<?php

namespace App\Http\Controllers\institute_manager;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class teacherController extends Controller
{
    //

    public function index(){
        return view('user.institute.teacher.teacher');
    }
    public function teacherdataload(Request $req){


        $instituteid = session()->get('Inid');

        $teacher = DB::table('teachers')
        ->select('Tid', 'teacher_name', 'education', 'phone', 'join_date')
        ->where('Inid',$instituteid)
        ->get();
                                 
   
    
        if($req->ajax()){
            return DataTables::of($teacher)->addColumn('action', function($row){
                return '<div class="btn-group"> <a href="javascript:void(0)" class="teachinfobutton btn-secondary btn" data-id="'.$row->Tid.'">
                <svg class="filament-link-icon w-4 h-4 mr-1 " style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"> <path d="M433 203.2H213c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V243.3s0-0.1 0.1-0.1H433s0.1 0 0.1 0.1l-0.1 219.9zM702.5 203.2c-82.5 0-150 67.5-150 150s67.5 150 150 150 150-67.5 150-150-67.5-150-150-150z m77.7 227.7c-20.9 20.9-48.4 32.3-77.7 32.3-29.2 0-56.8-11.5-77.7-32.3-20.9-20.9-32.3-48.4-32.3-77.7 0-29.2 11.5-56.8 32.3-77.7 20.9-20.9 48.4-32.3 77.7-32.3 29.2 0 56.8 11.5 77.7 32.3 20.9 20.9 32.3 48.4 32.3 77.7 0 29.2-11.5 56.8-32.3 77.7zM431.3 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9zM812.5 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9z"  fill="#5ABE64" /></svg>
                </a>
                <a href="javascript:void(0)" class="btn btn-secondary teacheditbutton" data-id="'.$row->Tid.'">
           
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="24px" fill="#3C91E6"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                </a>
                <a href="javascript:void(0)" class="btn btn-secondary  text-danger teachdelbutton" data-id="'.$row->Tid.'">
             
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" class="text-danger" viewBox="0 0 24 24" width="24px" fill="#F08080"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                </a>
                
                ';
                
            })->rawColumns(['action'])
            ->make(true);
        }
        return response()->json(['message' => 'Not an AJAX request'], 400);
    }


    public function storeteacher(Request $req){
      
        $inid = session()->get('Inid');
      
        $requestData = $req->all();
        // Modify specific fields in the request data
        $requestData['salary'] = $this->modifyData($requestData['salary']);

        $requestData['phone'] = $this->modifyData($requestData['phone']);

        // Update the request data with the modified values
        $req->replace($requestData);
    
          
        if($req->teacher_id){
            $response = DB::table('teachers')->where('Tid', $req->teacher_id)->first();

            if(!$response){
                abort(404);
            }
            DB::table('teachers')
    ->where('Tid', $req->teacher_id)
    ->update([
        'teacher_name'=>$req->name,
        'f_name'=>$req->fname,
        'last_name'=>$req->lname,
        'education'=>$req->education,
        'experince'=>$req->experince,
        'Inid'=>$inid,
        'contract_type'=>$req->contract,
        'email'=>$req->email,
        'gender'=>$req->gender,
        'salary'=>$req->salary,
        'join_date'=>$req->join,
        'phone'=>$req->phone,
        'updated_at' => now()
    
            ]);
            return response()->json([ 
                'message' => 'Row by ID: '.$req->teacher_id.' successfuly Updated.'
        
                    ],201);
        
                }
                else{
    
                    $req->validate([
              
                        'name' => 'required|min:3|max:30',
                        'fname' => 'required',
                        'join' => 'required',
                        'gender' => 'required|in:0,1',
                        'education'=>'required',
                       'salary' => [
                        'required','integer',
                        function ($attribute, $value, $fail) use ($req) {
                            if ($req->education == 'associate' && $value < 8000) {
                                $fail("Grade associate salary must be more than 8000.");
                            } elseif ($req->education =='bachelor' && $value < 10000) {
                                $fail("Grade bachelor salary must be more than 10000.");
                            } elseif ($req->education == 'master' && $value < 12000) {
                                $fail("Grade master salary must be more than 12000.");
                            }
                            elseif ($req->education == 'doctoral' && $value < 14000) {
                                $fail("Grade doctoral salary must be more than 14000.");
                            }
                            elseif ($req->education == 'professional' && $value < 16000) {
                                $fail("Grade professional salary must be more than 16000.");
                            }
                        },
                    ],
                        
                     
                        'photo'=>'mimes:jpeg,jpg,png,gif|max:256'
    
                
                    ]);
                    $photopath ;
                    if($req->has('photo')){
                                           
                       $file = $req->file('photo');
                       $filename = $req->name . '.' . time() . '.' . $file->getClientOriginalName();
                       $photopath=$file->storeAs('teacherimage',$filename,'public');
                    }else{
                       $photopath ='';
                    }
                   
        $userid = DB::table('teachers')->insertGetId([
            'teacher_name'=>$req->name,
            'f_name'=>$req->fname,
            'last_name'=>$req->lname,
            'education'=>$req->education,
            'experince'=>$req->experince,
            'Inid'=>$inid,
            'department_id'=>$req->department,
            'city_id'=>$req->city,
            'contract_type'=>$req->contract,
            'email'=>$req->email,
            'gender'=>$req->gender,
            'photo'=>$photopath,
            'salary'=>$req->salary,
            'join_date'=>$req->join,
            'phone'=>$req->phone,
            'created_at' => now()
    
    
    
            
    
    
        ]);
        return response()->json([ 
            'message' => 'successfuly add Teacher'
    
                ],201);}
    
            // institute::create([
            //     'name' => 'waheed',
            //     'type' => 'it'
            // ]);
    
    
        
        
    
    
    
    
    
    
    
    
            }



            public function edit_teacher(string $teachid){
       
       
                $response = DB::table('teachers')->where('Tid', $teachid)->first();
            
                
                if(! $response){
                    abort(404);
               
                }
                
                return $response; 
            
            }
            

    




// delete teacher function 

public function delete_teacher( $teachid){

             
    $respose = DB::table('teachers')->where('Tid',$teachid)->first();
    if(! $respose){
        abort(404);
   
    }
    else{
            DB::table('teachers')->where('Tid',$teachid)->delete();
    return response()->json([ 
        'message' => 'Row by ID: '.$teachid.' successfuly Deleted.'

            ],201);
    
        }

}







}