<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;  

class Student extends Model
{
    use HasFactory,LogsActivity;



  
    protected $primaryKey = 'Sid';
    protected $fillable=(['student_name','kankur_no']);
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['Sid','student_name','Inid','Did']);
        // Chain fluent methods for configuration options
    }

    public function enrolments()
    {
        return $this->hasMany(StudentEnrolClass::class, 'student_id');
    }

    public function institute(){
        return $this->belongsTo(Institute::class,'Inid','Inid');
    }

     public function department(){
        return $this->belongsTo(Department::class,'Did','Did');
    }

}
