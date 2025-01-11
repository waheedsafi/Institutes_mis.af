<?php

namespace App\Http\Controllers\editor;

use App\Models\Curriculums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class summarycurriculumController extends Controller
{
    //
    public function index(){
        return view('editor.summarycurriculum.curriculum');

    }

    public function loadcurriculum(){

        $depdata=DB::table('departments')
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

    }



    public function storecurriculum(Request $req)
    {
        $filePath = $req->pdf;

        // Check if the file exists
        if (Storage::exists($filePath)) {
            // Retrieve the file content
            $fileContent = Storage::get($filePath);
            // return $fileContent;
            // Set the file content back to the request instance
            $req->merge([
                'pdf' => $fileContent,
            ]);

            // Perform validation
            $req->validate([
                'name' => 'required|string',
                'pdf' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        // Check if the file content is a PDF
                        if (strpos($value, '%PDF') !== 0) {
                            $fail('The :attribute must be a PDF file.');
                        }
                    },
                ],

                'department_id' => 'required|integer',
            ]);
            if (Storage::exists($filePath)) {
                $filename = basename($filePath); // Extract filename from the file path

                // Move the file to the desired location
                $newPath = 'public/curriculum/' . $req->name . time() . '.pdf';
                $pdf = 'curriculum/' . $req->name . time() . '.pdf';
                Storage::move($filePath, $newPath);

                $pdf = 'storage/' . $pdf;
                $existscurriculum = Curriculums::find($req->department_id);
                // return $existscurriculum;
                if($existscurriculum){
                $existscurriculum->delete();
                }
                $curriculum = new Curriculums();

                $curriculum->name = $req->name;
                $curriculum->pdfurl = $pdf;
                $curriculum->Did = $req->department_id;
                $curriculum->save();

                // return ['Successfully Store Curriculum for department ID_no' . $req->department_id;
                return response()->json(
                    [
                        'message' => 'Successfully Store Curriculum for department ID_no' . $req->department_id,
                    ],
                    200,
                );

                // Continue with storing the curriculum...
                // $newPath now contains the new location of the file
                // You can use $newPath as needed
            }
        } else {
            // File not found, handle the error appropriately
            return response()->json(['error' => 'File not found'], 404);
        }
    }

}



