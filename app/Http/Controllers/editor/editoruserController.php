<?php

namespace App\Http\Controllers\editor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\InstituteUser;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class editoruserController extends Controller
{
    //

    public function index(){
       return view('editor.user.users'); 
    }

    public function dataload(Request $req){


        // $dataa = DB::table('institutes')->get();
        $dataa = User::join('instituteusers', 'users.id', '=', 'instituteusers.Uid')
        ->join('institutes', 'institutes.Inid', '=', 'instituteusers.Inid')
        ->select('users.id', 'users.name', 'users.email' ,'users.phone', 'institutes.Institute_name')
        ->get();

        // for edit the users
        // <a href="javascript:void(0)" class="btn btn-secondary editbutton" data-id="'.$row->id.'">
        // <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
        //      </svg>
        // </a>
                                 
   
    
        if($req->ajax()){
            return DataTables::of($dataa)
            ->rawColumns(['action'])
            ->make(true);
        }
        return 'faild';



}


            public function store(Request $req){

                $req->validate([
                             
                    'name' => 'required|min:3|max:30',
                    'email' => 'required|email|unique:users,email',
                    'city' => 'required',
                    'institute' =>'required',
                    'password' => 'required|min:6',
                    'confirm' => 'required|min:6|same:password',
                    'photo'=>'mimes:jpeg,jpg,png,gif|max:256'

            
                ]);
               
                            $role=DB::table('roles')->select('id')->where('access_level',8)
                            ->where('role_name','Institute Manager')->get()->first();
                            $role= $role->id;
                            // return $role;
                         
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
                                     $user->role =$role;
                                     $user->password = Hash::make($req->password);
                                     $user->f_name = $req->fname;
                                     $user->phone = $req->phone;
                                     $user->photo = $photopath;
                                     $user->save();
                                    //  return $req->institute;
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





             public function delete(Request $req ,$Userid){


                    return $userid;
             }


            }
