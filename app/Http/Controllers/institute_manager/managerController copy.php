<?php

namespace App\Http\Controllers\institute_manager;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class managerController extends Controller
{
    //

    public function index(){
      $userid=  session()->get('userid');
        $datarole=DB::table('roles')->join('users','users.role','=','roles.id')
        ->where('users.id',$userid)->get('roles.id')->first();
            $institute_data=DB::table('institutes')
            ->join('instituteusers','instituteusers.Inid','=','institutes.Inid')
            ->join('users','instituteusers.Uid','=','users.id')
            ->join('citys','citys.id','=','institutes.Inid')
            ->where('instituteusers.Uid',$userid)->get()->first();
        // return($institute_data);
        session()->put('Inid',$institute_data->Inid);

        session()->put('roleid',$datarole->id);
        
        $institute_license =DB::table('license')->where('Inid',$institute_data->Inid)
        ->get('expire_date')->first();
          
        $isa =DB::table('license_i_s_a')->where('Inid',$institute_data->Inid)
        ->get('expire_date')->first();
          
        $finance =DB::table('finance')->where('Inid',$institute_data->Inid)
        ->get('end_date')->first();

        $data_per=DB::table('permissions')->join('role_permissions','role_permissions.permission_id','=', 'permissions.id')
        ->where('role_permissions.role_id',$datarole->id)->get('slag')->all();
 
        $departments = DB::table('departments')->join('inst_dep_list','departments.Did','=','inst_dep_list.Did')
        ->where('inst_dep_list.Inid',$institute_data->Inid)->select('department_name','Semester_no')->get();

        $data='';


        
        // for testing 
        // return $departments;
        // return $isa->expire_date;
        // return $institute_data;
        // return $data;
        // return $institute_license->expire_date;
        
        return view('user.institute.index',[
            'perdata' => $data_per,
            'institute_data'=>$institute_data,
            'institute_license'=>$institute_license,
            'isa' => $isa,
            'finance' =>$finance,
            'departments' =>$departments



        ]);

    }

    public function change_photo(Request $req){

        $req->validate([
          
            'change_photo'=>'required|mimes:jpeg,jpg,png,gif|max:256'

    
        ]);
  
        if ($req->hasFile('change_photo')) {

            $userId = $req->session()->get('userid'); // Assuming the user_id is stored in the session
            $oldPhotoPath = DB::table('users')->where('id', $userId)->value('photo'); // Get the old photo path
            $name = DB::table('users')->where('id', $userId)->value('name'); // Get the old photo path

            if ($oldPhotoPath) {
                                // String with the part to remove
                $partToRemove = "storage/";

                // Remove the part from the string
                $newurl = str_replace($partToRemove, "", $oldPhotoPath);
              
            storage::delete('E:\Privatesector\institutes\public\storage\userimages\waheed.1703661645.khan.JPG');

            }
           
            $file = $req->file('change_photo');
            $filename = $name . '.' . time() . '.' . $file->getClientOriginalName();
            $photopath=$file->storeAs('userimages',$filename,'public');
             $photopath='storage/'.$photopath; 
             
             DB::table('users')->where('id',$userId)->update([
                'photo' =>$photopath
             ]);
             return response()->json([ 
                'message' => 'successfuly change Photo'
        
                    ],201);

        }
        return redirect()->back()->with('error', 'Failed to update photo.');
    


    }

public  function change_password(Request $req){

    
    $req->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:6|different:old_password',
        'confirm_password' => 'required|same:new_password',
    ]);

    $user = auth()->User(); // Assuming the user is authenticated

    if (!Hash::check($req->old_password, $user->password)) {
        return  response()->json([ 
            'error' => 'This is incorrect'
    
                ],201);
    }

    $user->password = Hash::make($req->new_password);
    $user->save();

    return  response()->json([ 
        'message' => 'password successfuly change'

            ],201);



}


}
