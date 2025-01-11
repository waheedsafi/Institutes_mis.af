<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class permissionController extends Controller
{
    //
public function permission(){
    return view('admin.role.permission');
}

public function loadroles(Request $req){
    $data=DB::table('roles')->select('id','role_name','access_level');



    if($req->ajax()){
        return DataTables::of($data)->addColumn('action', function($row){
            return '<div class="btn-group"> <a href="javascript:void(0)" class="btn btn-secondary infobutton" data-id="'.$row->id.'">
            <svg class="filament-link-icon w-4 h-4 mr-1 " style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"> <path d="M433 203.2H213c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V243.3s0-0.1 0.1-0.1H433s0.1 0 0.1 0.1l-0.1 219.9zM702.5 203.2c-82.5 0-150 67.5-150 150s67.5 150 150 150 150-67.5 150-150-67.5-150-150-150z m77.7 227.7c-20.9 20.9-48.4 32.3-77.7 32.3-29.2 0-56.8-11.5-77.7-32.3-20.9-20.9-32.3-48.4-32.3-77.7 0-29.2 11.5-56.8 32.3-77.7 20.9-20.9 48.4-32.3 77.7-32.3 29.2 0 56.8 11.5 77.7 32.3 20.9 20.9 32.3 48.4 32.3 77.7 0 29.2-11.5 56.8-32.3 77.7zM431.3 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9zM812.5 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9z"  fill="#5ABE64" /></svg>
            </a>
            <a href="javascript:void(0)" class="btn  btn-secondary editbutton" data-id="'.$row->id.'">
            <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                 </svg>
            </a>
            <a href="javascript:void(0)" class="btn btn-secondary text-danger delbutton" data-id="'.$row->id.'">
            <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
         </svg>
            </a>
            </div>
             ';

        })->rawColumns(['action'])
        ->make(true);



    }
}



        public function role_permission($roleid){

            $permis = DB::table('role_permissions')
            ->join('permissions', 'permissions.id', '=', 'role_permissions.permission_id')
            ->where('role_permissions.role_id', $roleid)
            ->select('permissions.id', 'name', 'slag')
            ->get();
        

            $role = DB::table('roles')->where('id',$roleid)
            ->select('role_name','access_level')->get();

            // DB:table(role)
            // DB:table('roles')->get
           
        
            $data =[
                $role,
                $permis
            ];
           
            return response()->json($data);


        }

        public function loadpermission(){

            $data =DB::table('permissions')->get();
            return $data;

        }


        public function updatepermission(Request $request,$roleId){

            $selectedPermissions = $request->input('permissions');

            // Update the role's permissions using the query builder
            DB::table('role_permissions')->where('role_id', $roleId)->delete(); // Remove existing permissions
            foreach ($selectedPermissions as $permissionId) {
                DB::table('role_permissions')->insert(['role_id' => $roleId, 'permission_id' => $permissionId]);
            }
    
            return response()->json(['message' => 'Permissions updated successfully'], 200);
     


        }

}
