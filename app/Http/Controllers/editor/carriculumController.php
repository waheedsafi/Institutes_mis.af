<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class carriculumController extends Controller
{
    //
    public function index(){
        return view('editor.curriculum.curriculum');
    }

    public function curriculum_list(Request $req){


        $data=DB::table('sub_in_dep')->join('subjects','subjects.Sid','=','sub_in_dep.Sid')
        ->select('id','subject_name','book_name','PDF','credit')->where('semester_no',$req->semester)
        ->where('Did',$req->dep_id)->get();
        return $data;

    }

    public function remove_subject(Request $req){
        $data=DB::table('sub_in_dep')->where('id',$req->id)->delete();
        return response()->json(['success'=>'Successfully remove subject from department']);

    }

    public function append_subject(Request $req){

        // return  $req;
        $req->validate([
            'credit'=>'required|integer|max:8|min:1',
            

        ]);
        
                $check = DB::table('sub_in_dep')
                ->where('Did', $req->dep_id)
                ->where('semester_no', $req->semester)
                ->where('Sid', $req->subject_id)
                ->exists();

            if ($check) {
                return response()->json(['exists' => 'This subject already exists in this department.'],422);
            }else{
                DB::table('sub_in_dep')->insert([
                    'Did'=>$req->dep_id,
                    'Sid'=>$req->subject_id,
                    'semester_no'=>$req->semester,
                    'credit'=>$req->credit
                ]);
                return response()->json(['success'=>'Successfuly append subject to department.'],200);
            }

        // return response()->json($req);
    }
}
