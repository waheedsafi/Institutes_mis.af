<?php

namespace App\Http\Controllers\general;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class dayController extends Controller
{
    //

    public function   load(Request $req){

        $language ;
        if($req->lang=='en'){
            $language="en_name";
        }
        elseif($req->lang=='ps'){
            $language="ps_name";
        }
        else{
            $language="pr_name";

        }


        $data =DB::table('week_days')->select('id',$language)->get();
        return response()->json($data);
    }
}
