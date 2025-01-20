<?php

namespace App\Http\Controllers\institute_manager\card;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class CardController extends Controller
{
    //

        public function downloadCardKey($id){
        
            //  return $id;

       
        // Validate the provided $id to ensure it's a valid student ID
    $query = Student::join('institutes', 'students.Inid', '=', 'institutes.Inid')
    ->join('departments', 'departments.Did', '=', 'students.Did')
    ->leftJoin('citys', 'citys.id', '=', 'institutes.city')
    ->where('students.Sid', $id)
    ->select(
        'students.student_name',
        'students.kankur_no',
        'students.f_name',
        'students.photo',
        'institutes.institute_name',
        'departments.department_name',
        'citys.city as city_name'
    )
    ->first(); // Use `first()` if you expect one result.

            // Return the result
            // return $query;
            

              


  
              //   return  $data['institute'][0]->institute_name;
    
              $mpdf = new Mpdf();
              $mpdf->autoScriptToLang = true;
              $mpdf->autoLangToFont = true;
              $mpdf->WriteHTML(view('user.institute.student.cards.StudentSingleCardKey', ['student'=>$query])->render());;

        //           return response($mpdf->Output('', 'S')) // 'S' means return as string
        // ->header('Content-Type', 'application/pdf')
        // ->header('Content-Disposition', 'inline; filename="student_card.pdf"');

             $mpdf->Output($query->student_name.'_'.$query->department_name.'.pdf','D');

              //   $mpdf->WriteHTML($pdf);
              //   $mpdf->Output();
  
            
        }

        public function downloadCardKeys(){
        
    }
}
