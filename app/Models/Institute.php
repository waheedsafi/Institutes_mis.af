<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Institute extends Model
{
    use HasFactory,LogsActivity;


    protected $fillable = ['Inid','Institute_name','city','location','CEO','status','create_date','founder','updated_at']; 

    protected $primaryKey = 'Inid';
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }
}
