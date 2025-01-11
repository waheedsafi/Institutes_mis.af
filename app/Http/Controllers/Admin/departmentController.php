<?php

namespace App\Http\Controllers\Admin;

use view;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class departmentController extends Controller{


    //
    public function index(Request $request){
        $user = DB::table('departments');
        
        if(!empty($request->get('keyword'))){
            $user = $user->where('department_name','like','%'.$request->get('keyword').'%');
           
        }
        $user = $user->Paginate(3);

            return view('admin.department.department',['depdata' => $user]);
    }
    public function create(){
        return view('admin.department.add_department');
    }
    public function adddepartment(Request $req){
   
        $user= DB::table('departments')
                ->insert( 
                    [
                        'department_name'=>$req->name,
                        'Semester_no'=>$req->semester,
                        

                ]);
                if($user){
                    return redirect()->back()->with('message','succefuly added');
                }
                else{
                    return redirect()->back()->withErrors('error',$user);

                }

        }
        public function delete_department(string $Did){
            $user = DB::table('departments')
                ->where('Did',$Did)
                ->delete();
            

        
        if($user){
            return redirect()->back()->with('message','succefuly delete');

        }
        else{

        }
    }
    public function update_department(string $Did){
        $user = DB::table('departments')->where('Did',$Did)->get();
        
        return view('admin.departments.update_department',['depdata' => $user]);      

    }
    public function update(Request $req ,$id){

        $user = DB::table('departments')->where('Did' , $id)
        ->update([
                        'department_name'=>$req->name,
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
    public function department_info(string $Did){
        $user = DB::table('departments')->where('Did',$Did)->get();
        
        return view('admin.departments.department_info',['depdata' => $user]);     

    }


    }

    

