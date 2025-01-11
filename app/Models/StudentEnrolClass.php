<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEnrolClass extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'student_id',
        'class_id',
        'shift_id',
        'semester_type'
    ];
    protected $primaryKey ='student_id';
    public function student()
    {


        return $this->belongsTo(Student::class, 'student_id');
    }
}
