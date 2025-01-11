<?php

namespace App\Http\Controllers\Admin;

use view;

use Carbon\Carbon;
use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class institutecontroller extends Controller
{
    //


    public function index1(){
        return view('admin.institutes.institutes');
    }
    public function index(Request $req){


        // $dataa = DB::table('institutes')->get();
        $dataa = DB::table('institutes')
        ->join('citys','citys.id','=','institutes.city')
        ->select('Inid','Institute_name','CEO','citys.city','status');

    
                                 
  
    
        if($req->ajax()){
            return DataTables::of($dataa)->addColumn('status',function($row){if($row->status==1){return 'Active';}else{return 'Block';}})->
            addColumn('action', function($row){
                return '<div class="btn-group"> <a href="javascript:void(0)" class="btn btn-secondary infobutton" data-id="'.$row->Inid.'">
                <svg class="filament-link-icon w-4 h-4 mr-1 " style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"> <path d="M433 203.2H213c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V243.3s0-0.1 0.1-0.1H433s0.1 0 0.1 0.1l-0.1 219.9zM702.5 203.2c-82.5 0-150 67.5-150 150s67.5 150 150 150 150-67.5 150-150-67.5-150-150-150z m77.7 227.7c-20.9 20.9-48.4 32.3-77.7 32.3-29.2 0-56.8-11.5-77.7-32.3-20.9-20.9-32.3-48.4-32.3-77.7 0-29.2 11.5-56.8 32.3-77.7 20.9-20.9 48.4-32.3 77.7-32.3 29.2 0 56.8 11.5 77.7 32.3 20.9 20.9 32.3 48.4 32.3 77.7 0 29.2-11.5 56.8-32.3 77.7zM431.3 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9zM812.5 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9z"  fill="#5ABE64" /></svg>
                </a>
                <a href="javascript:void(0)" class="btn  btn-secondary editbutton" data-id="'.$row->Inid.'">
                <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                     </svg>
                </a>
                <a href="javascript:void(0)" class="btn btn-secondary text-danger delbutton" data-id="'.$row->Inid.'">
                <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
             </svg>
                </a>
                </div>
                 ';

            })->rawColumns(['action'])
            ->make(true);
      

        } 
        return 'faild';



}
    public function create(){
       $role = DB::table('roles')->get('access_level');
        if ($role[1]==2){      
              return view('admin.institutes.add_institutes');
        
        };
        return Redirect()->back();

    }
    public function addInstitute(Request $req){
        
 
       
        
   
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

                $req->validate([
          
                    'name' => 'required|min:3|max:30|unique:institutes,Institute_name',
                    'CEO' => 'required',
                    'city' => 'required'
            
                ]);
               
    $user = DB::table('institutes')->insert([
        'Institute_name'=>$req->name,
        'city'=>$req->city,
        'location'=>$req->location,
        'CEO'=>$req->CEO,
        'status'=>$req->status,
        'create_date'=>$req->create_date,
        'founder'=>$req->founder


    ]);
    return response()->json([ 
        'message' => 'successfuly add institute'

            ],201);}

        // institute::create([
        //     'name' => 'waheed',
        //     'type' => 'it'
        // ]);




    }
        public function delete_institute( $Inid){

             
                $respose = DB::table('institutes')->where('Inid',$Inid)->first();
                if(! $respose){
                    abort(404);
               
                }
                else{
                        DB::table('institutes')->where('Inid',$Inid)->delete();
                return response()->json([ 
                    'message' => 'Row by ID: '.$Inid.' successfuly Deleted.'
            
                        ],201);
                
                    }
            
    }
    // public function update_institute(string $Inid){
    //     $user = DB::table('institutes')->where('Inid',$Inid)->get();
        
    //     return view('admin.institutes.update_institute',['instdata' => $user]);      

    // }
    public function update_institute(string $Inid){
       
       
        $respose =    institute::where('Inid',$Inid)->first();
        
        if(! $respose){
            abort(404);
       
        }
        
        return $respose; 
    
 }
    public function update(Request $req ,$id){

        $user = DB::table('institutes')->where('Inid' , $id)
        ->update([
                        'Institute_name'=>$req->name,
                        'city'=>$req->city,
                        'location'=>$req->location,
                        'CEO'=>$req->CEO,
                        'status'=>$req->status,
                        'create_date'=>$req->create_date,
                        'founder'=>$req->founder



        ]);
        if($user){
            return redirect()->back()->with('message','succefuly update');
        }
    }
    public function institute_info(string $Inid){
  
        $data=    DB::table('departments')->join('inst_dep_list','inst_dep_list.Did','=','departments.Did')->
            where('inst_dep_list.Inid',$Inid)->get();
  
            return response()->json($data);
  
        //     $user = DB::table('institutes')->where('Inid',$Inid)->get();
        
    //     return view('admin.institutes.institute_info',['instdata' => $user]);     

    // }

    }


    public function depremove(string $Inid,$did){
        $respose = DB::table('inst_dep_list')->where('Inid',$Inid,'Did',$did);
        if(! $respose){
            abort(404);
       
        }
        else{
                DB::table('inst_dep_list')->where('Inid',$Inid)->where('Did',$did)->delete();
        return response()->json([ 
            'message' => 'Row by ID: '.$did.' successfuly Deleted.'
    
                ],201);
        
            }
    
    }
  

public function depaddtoinst(){

    
    $data=    DB::table('departments')->select('Did','department_name')->get();

    return response()->json($data);


}
public function depsave(Request $req){

$req->validate([
          
        // 'dep_id' => 'required|unique:inst_dep_list'->where('Inid',$req->institute_id).'Did',
      'Did'=>[

            'required', 

            Rule::unique('inst_dep_list')->where(function ($query) use ($req) {

                return $query
                    ->whereInid($req->institute_id)
                    ->whereDid($req->Did);
            }),
        ]
                ]);
               
    $user = DB::table('inst_dep_list')->insert([
        'Inid'=>$req->institute_id,
        'Did'=>$req->Did,
        'add_date'=>Carbon::now(),
        'created_at'=>Carbon::now()

    ]);
    return response()->json([ 
        'message' => 'Successfuly added Department'

            ],201);}

}



    

