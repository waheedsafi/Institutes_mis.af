<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class checkController extends Controller
{
    //
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
}
