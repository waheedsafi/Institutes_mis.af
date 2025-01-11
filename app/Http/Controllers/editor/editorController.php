<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class editorController extends Controller
{
    //

    public function index(){

        $userid=  Auth()->user()->id;

        $role = DB::table('roles')->join('users','users.role','=','roles.id')->select('roles.role_name')
        ->where('users.id',$userid)->get()->first();
        $role=$role->role_name;
        session()->put('role_name',$role);
        $studentCount=DB::table('students')->count();
        $activestudent=DB::table('students')->where('status',2)->count();
        $instituteCount=DB::table('institutes')->count();

      
        

        return view('editor.index',[
            'studnetcount'=>$studentCount,
            'activestudent'=>$activestudent,
            'institutecount'=>$instituteCount

        ]);

    }
}
