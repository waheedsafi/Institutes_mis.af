<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Student;
use App\Models\StudentEnrolClass;

trait StudentHelper
{
    public function validateStudent(Request $req, $student_id = null)
    {
        $req->validate([
            'name' => 'required|min:3|max:30',
            'city' => 'required|integer',
            'fname' => 'required',
            'gfname' => 'required',
            'DOB' => 'required',
            'schooldate' => 'required',
            'gender' => 'required|in:0,1',
            'department' => 'required|integer',
            'photo' => 'mimes:jpeg,jpg,png,gif|max:256',
            'scanfile' => 'mimes:pdf,docx|max:512',
            'nid' => 'integer',
            'persentage' => 'numeric|max:100',
            'phone' => [
                'required',
                'numeric',
                // Rule::unique('students')->ignore($student_id),
            ],
        ]);
    }

    public function handleFileUpload(Request $req, $field, $path, $oldFile = null)
    {
        if ($req->has($field)) {
            if ($oldFile && Storage::disk('public')->exists($oldFile)) {
                Storage::disk('public')->delete($oldFile);
            }

            $file = $req->file($field);
            $filename = $req->name . '.' . time() . '.' . $file->getClientOriginalName();
            $storedPath = $file->storeAs($path, $filename, 'public');
            return 'storage/' . $storedPath;
        }
        return $oldFile;
    }

    public function generateStudentId($city, $inid)
    {
        $short_city = substr($city, 0, 3);
        $last_student_id = DB::table('students')->orderBy('Sid', 'desc')->first()->Sid + 1;
        $date = date('Ymd');
        return $short_city . '-' . $inid . '-' . $date . '-' . $last_student_id;
    }

    public function selectClassId($req, $inid)
    {
        $class_id = DB::table('students')
            ->join('student_enrol_classes', 'Sid', '=', 'student_id')
            ->where('Inid', $inid)
            ->where('Did', $req->department)
            ->where('semester', 1)
            ->where('gender', $req->gender)
            ->where('shift_id', $req->shift)
            ->orderBy('Sid', 'desc')
            ->select('class_id')
            ->first();

        if ($class_id) {
            $count = DB::table('students')
                ->join('student_enrol_classes', 'Sid', '=', 'student_id')
                ->where('Inid', $inid)
                ->where('Did', $req->department)
                ->where('semester', 1)
                ->where('gender', $req->gender)
                ->where('shift_id', $req->shift)
                ->orderBy('Sid', 'desc')
                ->count();

            if ($count == 35) {
                return DB::table('classes')
                    ->where('id', '>', $class_id->class_id)
                    ->where('gender_type', $req->gender)
                    ->min('id');
            } else {
                return $class_id->class_id;
            }
        } else {
            return DB::table('classes')
                ->where('gender_type', $req->gender)
                ->min('id');
        }
    }

    public function modifyData($data)
    {
        // Implement your data modification logic here
        return $data;
    }
}
