<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Institute;
use Illuminate\Http\Request;
use App\Models\InstituteUser;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    //
    public function index(Request $request){
    
        return view('admin.user.user');
    
    
    
    
        // $user = DB::table('users')->join('roles','roles.id','=','users.role');
        
        // if(!empty($request->get('keyword'))){
        //     $user = $user->where('name','like','%'.$request->get('keyword').'%')
            
        //     ->orwhere('role_name','like','%'.$request->get('keyword').'%');
        // }
        // $user = $user->Paginate(3);

        //     return view('admin.user.user',['userdata' => $user]);
    }    
    public function dataload(Request $req){


        // $dataa = DB::table('institutes')->get();
        $dataa = DB::table('users')->join('roles','users.role','=','roles.id')
        ->select('users.id','users.name','users.email','roles.role_name','users.photo');


        // for edit the users
        // <a href="javascript:void(0)" class="btn btn-secondary editbutton" data-id="'.$row->id.'">
        // <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
        //      </svg>
        // </a>
                                 
   
    
        if($req->ajax()){
            return DataTables::of($dataa)->addColumn('action', function($row){
                return '<div class="btn-group"> <a href="javascript:void(0)" class="infobutton btn-secondary btn" data-id="'.$row->id.'">
                <svg class="filament-link-icon w-4 h-4 mr-1 " style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"> <path d="M433 203.2H213c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V243.3s0-0.1 0.1-0.1H433s0.1 0 0.1 0.1l-0.1 219.9zM702.5 203.2c-82.5 0-150 67.5-150 150s67.5 150 150 150 150-67.5 150-150-67.5-150-150-150z m77.7 227.7c-20.9 20.9-48.4 32.3-77.7 32.3-29.2 0-56.8-11.5-77.7-32.3-20.9-20.9-32.3-48.4-32.3-77.7 0-29.2 11.5-56.8 32.3-77.7 20.9-20.9 48.4-32.3 77.7-32.3 29.2 0 56.8 11.5 77.7 32.3 20.9 20.9 32.3 48.4 32.3 77.7 0 29.2-11.5 56.8-32.3 77.7zM431.3 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9zM812.5 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9z"  fill="#5ABE64" /></svg>
                </a>
          
                <a href="javascript:void(0)" class="btn btn-secondary  text-danger delbutton" data-id="'.$row->id.'">
                <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
             </svg>
                </a>
                
                ';
            })->addColumn('photo', function ($row) {
                $url= asset('storage/'.$row->photo);
                return '<img href="'.$url.'" src="'.$url.'" border="0" width="40" height="40" class="img-rounded" align="center" alt="No Image" />';
            })
            ->rawColumns(['photo','action'])
            ->make(true);
        }
        return 'faild';



}
public function institute_list(Request $req){



    
    $datainst = institute::all('Inid','Institute_name');
     
        $datacity =   DB::table('citys')->get();
        $datarole =   DB::table('roles')->get();
     
        $datalist =[$datainst,$datacity,$datarole];
        return response()->json($datalist);


}
    public function create(){
        return view('admin.user.user_add');
    }
    
    
    
    public function adduser(Request $req){
       $data = DB::table('roles')
                ->join('users','role','=','roles.id')
                ->where('users.id', session()->get('userid'))->get()->first();
            
                if($data->access_level== 1 ){


                
                
                if($req->user_id){
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
                    
                                'name' => 'required|min:3|max:30',
                                'email' => 'required|unique:users,email',
                                'city' => 'required',
                                'role' => 'required',
                                'password' => 'required|min:6',
                                'confirm' => 'required|min:6|same:password',
                                'photo'=>'mimes:jpeg,jpg,png,gif|max:256'

                        
                            ]);
                            $photopath ;
                            if($req->has('photo')){
                                                
                            $file = $req->file('photo');
                            $filename = $req->name . '.' . time() . '.' . $file->getClientOriginalName();
                            $photopath=$file->storeAs('userimages',$filename,'public');
                                $photopath='storage/'.$photopath;
                            }else{
                            $photopath ='';
                            }
                        
                            $user = new User();
                            $user->name = $req->name;
                            $user->city = $req->city;
                            $user->email = $req->email;
                            $user->role = $req->role;
                            $user->password = Hash::make($req->password);
                            $user->f_name = $req->fname;
                            $user->phone = $req->phone;
                            $user->photo = $photopath;
                            $user->save();
                    
                            $userid = $user->id;
                if($req->institute){
                $instituteUser = new Instituteuser;
                $instituteUser->Uid = $userid; // Replace $uid with the actual user ID
                $instituteUser->Inid = $req->institute; // Replace $inid with the actual institute ID
                $instituteUser->save();
                }
                return response()->json([ 
                    'message' => 'successfuly add user'

                        ],201);}

                    // institute::create([
                    //     'name' => 'waheed',
                    //     'type' => 'it'
                    // ]);


                }
                else{
                    return 'faild you can not add user';
                }   

    }


    public function edit_user(string $user_id){
       
       
        $respose =    User::where('id',$user_id)->first();
        
        if(! $respose){
            abort(404);
       
        }
        
        return $respose; 
    
 }


 public function delete_user($user_id){
    
    $respose = DB::table('users')->where('id',$user_id)->first();
    // return $respose;
    if(! $respose){
        abort(404);
   
    }
    else{
            DB::table('users')->where('id',$user_id)->delete();
    return response()->json([ 
        'message' => 'Row by ID: '.$Inid.' successfuly Deleted.'

            ],201);
    
        }
 }



}
