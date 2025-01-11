<?php

namespace App\Traits\student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\StudentEnrolClass;

trait StudentTrait {

    

    public function getStudentInfo($req) {
        try {
            // Fetch the student data with joins
            $data = Student::join('departments', 'departments.Did', '=', 'students.Did')
    ->leftJoin('student_enrol_classes', 'student_id', '=', 'Sid')
    ->leftJoin('shifts', 'student_enrol_classes.shift_id', '=', 'shifts.id')
    ->join('citys', 'students.city', '=', 'citys.id') // Use the correct column, e.g., city_id
    ->where('Sid', $req->student_id)
    ->first();

return $data;

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching the student data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
