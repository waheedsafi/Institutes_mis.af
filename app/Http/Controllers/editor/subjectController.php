<?php

namespace App\Http\Controllers\editor;

use App\Models\Subject;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class subjectController extends Controller
{
    //
    public function index()
    {
        return view('editor.subject.subject');
    }

    public function loadsubject(Request $req)
    {
        $dataa = DB::table('subjects')->select('Sid', 'subject_name', 'book_name', 'PDF');

        if ($req->ajax()) {
            return DataTables::of($dataa)
                ->rawColumns(['action'])
                ->make(true);
        }
        return 'faild';
    }

    public function storesubject(Request $req)
    {
        $filePath='';
        if ($req->pdf) {
            $filePath = $req->pdf;
        }
        if (Storage::exists($filePath)) {
            // Retrieve the file content
            $fileContent = Storage::get($filePath);
            // change the request
            $req->merge([
                'pdf' => $fileContent,
            ]);
        }
        // Perform validation
        $req->validate([
            'name' => 'required|string|unique:subjects,subject_name',
            
            'pdf' => [
                'required',
                // function ($attribute, $value, $fail) {
                //     // Check if the file content is a PDF
                //     if (strpos($value, '%PDF') !== 0) {
                //         $fail('The :attribute must be a PDF file.');
                //     }
                // },
            ],

            'book_name' => 'required',
        ]);

        if ($req->subject_id) {
            if (!($subject = Subject::find($req->subject_id))) {
                abort(404);
            }
            if (!$req->pdf) {
                $subject = Subject::find($req->subject_id);

                $subject->subject_name = $req->name;
                $subject->book_name = $req->book_name;
                $subject->save();
            } else {
                if ($req->has('pdf')) {
                    $filename = basename($filePath); // Extract filename from the file path

                    // Move the file to the desired location
                    $newPath = 'public/book/' . $req->name . time() . '.pdf';
                    $pdf = 'book/' . $req->name . time() . '.pdf';
                    Storage::move($filePath, $newPath);

                    $fileNameToStore = $pdf;
                } else {
                    $fileNameToStore = '';
                }

                $subject = Subject::find($req->subject_id);

                if ($subject->PDF && Storage::exists('public/' . $subject->PDF)) {
                    Storage::delete('public/' . $subject->PDF);
                }

                $subject->subject_name = $req->name;
                $subject->book_name = $req->book_name;
                $subject->PDF = $fileNameToStore;
                $subject->created_at = now();

                $subject->save();
            }
            return response()->json(
                [
                    'message' => 'Row by ID: ' . $req->subject_id . ' successfuly Updated.',
                ],
                201,
            );
        } else {
            $pdfpath = '';
            if ($req->has('pdf')) {
                $filename = basename($filePath); // Extract filename from the file path

                // Move the file to the desired location
                $newPath = 'public/book/' . $req->name . time() . '.pdf';
                $pdf = 'book/' . $req->name . time() . '.pdf';
                Storage::move($filePath, $newPath);

                $fileNameToStore = $pdf;
            } else {
                $fileNameToStore = '';
            }

            $subject = new Subject();
            $subject->subject_name = $req->name;
            $subject->book_name = $req->book_name;
            $subject->PDF = $fileNameToStore;
            $subject->created_at = now();

            $subject->save();

            $subject_id = $subject->Sid;

            return response()->json(
                [
                    'message' => 'successfuly add Subject',
                    'subject_id' => $subject_id,
                ],
                201,
            );
        }
    }

    public function deletesubject(Request $req, $sid)
    {
        $subject = Subject::findOrFail($sid);
        //   return 'storage/app/public/'.$subject->PDF;
        // if ( Storage::exists('public/'.$subject->PDF)) {
        //     return 'true';

        // }
        if ($subject->PDF && Storage::exists('public/' . $subject->PDF)) {
            Storage::delete('public/' . $subject->PDF);
        }

        $subject->delete();
        return response()->json(
            [
                'message' => 'successfuly delete Subject',
            ],
            201,
        );
    }

    public function downloadPdf(Subject $subject)
    {
        // return $subject;
        //  if(Storage::exists('app/public/'.$subject->PDF)){
        //                 if(Storage::exists('public\/'.$subject->PDF)){
        // return 'ok';
        //                 }

        $pathofFile = storage_path($subject->PDF);
        // return $pathofFile;
        return response()->download($pathofFile);
        // Check if the subject has a PDF file associated with it
        if (!$subject->PDF || !Storage::exists($subject->PDF)) {
            return response()->json(['message' => 'PDF file not found'], 404);
        }
        // Return the PDF file as a downloadable response
        return response()->download(storage_path($subject->PDF), $subject->subject_name . '.PDF', [], Response::HTTP_OK);
    }
}
