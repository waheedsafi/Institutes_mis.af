<?php

namespace App\Http\Controllers\institute_manager;

use App\Models\StudyPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class studyplanController extends Controller
{
    //
    public function check(Request $req){
        // $plan ? $plan->pdfurl : null
        $inid =session()->get('Inid');
        
        $pdfurl =DB::table('study_plans')->where('institute_id',$inid)->where('subject_id',$req->id)
        ->select('pdfurl')->get()->first();
        // return $pdfurl->pdfurl;
        $data = $pdfurl ? $pdfurl->pdfurl : null;
        return $data;

    }

    public function update(Request $req){
        $inid =session()->get('Inid');

        $req->validate([
            'studyplan_id'=>'required',
            'studyplan'=>'required|mimes:pdf,dotx,docx,doc'
        ]);
        $pdfurl =DB::table('study_plans')->where('institute_id',$inid)->where('subject_id',$req->studyplan_id)
        ->select('pdfurl','id')->get()->first();

        if($pdfurl){
            
            StudyPlan::find($pdfurl->id)->delete();

            if ($pdfurl->pdfurl && Storage::exists('public/'.$pdfurl->pdfurl)) {
            

                Storage::delete('public/'.$pdfurl->pdfurl);
            }
        }
       
        $filenameWithExt = $req->file('studyplan')->getClientOriginalName();
       
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    

        $fileNameToStore = time().$filenameWithExt;

        $path = $req->file('studyplan')->storeAs('public/studyplan', $fileNameToStore);
        $fileNameToStore='studyplan/'.$fileNameToStore;
 
        $study= new StudyPlan();
        $study->institute_id=$inid;
        $study->subject_id=$req->studyplan_id;
        $study->pdfurl=$fileNameToStore;
        $study->save();
        return response()->json('Successfully Update the Study Plan',200);
    }
}
