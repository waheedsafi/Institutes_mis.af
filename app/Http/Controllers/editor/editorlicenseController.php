<?php

namespace App\Http\Controllers\editor;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class editorlicenseController extends Controller
{
    //

    public function appenddepartment(Request $request,$Inid){


        $selecteddepartment = $request->input('department');

        // Update the role's permissions using the query builder
        DB::table('inst_dep_list')->where('Inid', $Inid)->delete(); // Remove existing permissions
        foreach ($selecteddepartment as $departmentid) {
            DB::table('inst_dep_list')->insert(['Inid' =>$Inid,
             'Did' => $departmentid,
            'add_date'=> Carbon::now(),
                ]);
        }


        return response()->json(['message' => 'Department append successfully'], 200);
 


    }

    public function inst_dep_list(Request $request){


        $data =DB::table('inst_dep_list')->select('Did')->where('Inid',$request->institute_id)->get();
        return $data;

    }
}
