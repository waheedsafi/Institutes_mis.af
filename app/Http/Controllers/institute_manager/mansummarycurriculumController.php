<?php

namespace App\Http\Controllers\institute_manager;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class mansummarycurriculumController extends Controller
{
    //
    public function index(){

        return view('user.institute.summarycurriculum.curriculum');

        
    }
    
        public function loadcurriculum(){

            $inid= session()->get('Inid');

            $depdata=DB::table('departments')
            ->join('inst_dep_list','inst_dep_list.Did','=','departments.Did')
            ->where('inst_dep_list.Inid',$inid)
            ->select('departments.Did','department_name')->get();

            // return response()->JSON($depdata);



    
        $curriculums = DB::table('curriculums')
            ->select('Did', 'name','pdfurl')
            ->get();
    // return $curriculum;
        // Combine both sets of data into a single array
        $combinedData = [];
        foreach ($depdata as $dep) {
            $curriculum = $curriculums->where('Did', $dep->Did)->first(); // Find the corresponding plan for the subject
            $combinedData[] = [
                'Did' => $dep->Did,
                'department_name' => $dep->department_name,
                'name' => $curriculum ? $curriculum->name : null,
                'pdfurl' => $curriculum ? $curriculum->pdfurl : null, // Add the curriculum URL if it exists
            ];
        }

        // Pass the combined data to the view
        return $combinedData;



        // if($req->ajax()){
        //     return DataTables::of($combinedData)->addColumn('action', function($row){
        //         return '
        //         <a  href="{{asset()}}'.$row->pdfurl.'">
        //         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 214, 17, 1);transform: ;msFilter:;"><path d="m12 16 4-5h-3V4h-2v7H8z"></path><path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path></svg>
        //         </a>
        //         ';
                
        //     })->rawColumns(['action'])
        //     ->make(true);
        // }
        // return response()->json(['message' => 'Not an AJAX request'], 400);


        }


}
