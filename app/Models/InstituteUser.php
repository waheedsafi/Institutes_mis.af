<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteUser extends Model
{
    use HasFactory;
    protected $table='instituteusers';
    protected $fillable=['Uid','Inid'];
    public function institute()
    {
        return $this->belongsTo(Institute::class, 'Inid', 'Inid');
    }


    
}
