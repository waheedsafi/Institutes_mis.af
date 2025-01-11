<?php

namespace App\Http\Controllers\Admin;

use view;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class institutecontroller extends Controller
{
    //
    public function index(Request $request){

        $user = DB::table('institutes');
        
        if(!empty($request->get('keyword'))){
            $user = $user->where('institute_name','like','%'.$request->get('keyword').'%')
            ->orwhere('city','like','%'.$request->get('keyword').'%')
            ->orwhere('CEO','like','%'.$request->get('keyword').'%');
        }
        $user = $user->Paginate(3);
//  
            return view('admin.institutes.institutes',['instdata' => $user]);
    }
    public function create(){
       $role = DB::table('roles')->get('access_level');
        if ($role[1]==2){      
              return view('admin.institutes.add_institutes');
        
        };
        return Redirect()->back();

    }
    public function addInstitute(Request $req){
        //  this part is for check the permission
        // $role = DB::table('roles')->get('access_level');
        // if ($role[0]=='2'){      
            $req->validate([
                    'name'=>'required',
                    'CEO' => 'required',
                    'location' => 'required',
            ]);
            return 'succee';
        // $user= DB::table('institutes')
        //         ->insert( 
        //             [
        //                 'Institute_name'=>$req->name,
        //                 'city'=>$req->city,
        //                 'location'=>$req->location,
        //                 'CEO'=>$req->CEO,
        //                 'status'=>$req->status,
        //                 'create_date'=>$req->create_date,
        //                 'founder'=>$req->founder
        //         ]);
        //         // if($user){
                //     // return redirect()->back()->with('message','succefuly added');
                // }
                // else{
                //     // return redirect()->back()->withErrors('error',$user);

                // }
            // };
            // return Redirect()->back()->with('can,t add student');
    
        }
        public function delete_institute(string $Inid){
            $user = DB::table('institutes')
                ->where('Inid',$Inid)
                ->delete();
            

        
        if($user){
            return redirect()->back()->with('message','succefuly delete');

        }
        else{

        }
    }
    public function update_institute(string $Inid){
        $user = DB::table('institutes')->where('Inid',$Inid)->get();
        
        return view('admin.institutes.update_institute',['instdata' => $user]);      

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
        $user = DB::table('institutes')->where('Inid',$Inid)->get();
        
        return view('admin.institutes.institute_info',['instdata' => $user]);     

    }


    }

    

